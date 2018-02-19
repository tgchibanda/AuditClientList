<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start();
?>
<?php include_once "rcfg11.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "phprptinc/ewmysql.php") ?>
<?php include_once "rphpfn11.php" ?>
<?php include_once "rusrfn11.php" ?>
<?php include_once "Engaged_Clientsrptinfo.php" ?>
<?php

//
// Page class
//

$Engaged_Clients_rpt = NULL; // Initialize page object first

class crEngaged_Clients_rpt extends crEngaged_Clients {

	// Page ID
	var $PageID = 'rpt';

	// Project ID
	var $ProjectID = "{06DE337B-A50D-4D7A-AB45-E9D5CED3210F}";

	// Page object name
	var $PageObjName = 'Engaged_Clients_rpt';

	// Page headings
	var $Heading = '';
	var $Subheading = '';

	// Page heading
	function PageHeading() {
		global $ReportLanguage;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "TableCaption"))
			return $this->TableCaption();
		return "";
	}

	// Page subheading
	function PageSubheading() {
		global $ReportLanguage;
		if ($this->Subheading <> "")
			return $this->Subheading;
		return "";
	}

	// Page name
	function PageName() {
		return ewr_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ewr_CurrentPage() . "?";
		if ($this->UseTokenInUrl) $PageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Export URLs
	var $ExportPrintUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportPdfUrl;
	var $ReportTableClass;
	var $ReportTableStyle = "";

	// Custom export
	var $ExportPrintCustom = FALSE;
	var $ExportExcelCustom = FALSE;
	var $ExportWordCustom = FALSE;
	var $ExportPdfCustom = FALSE;
	var $ExportEmailCustom = FALSE;

	// Message
	function getMessage() {
		return @$_SESSION[EWR_SESSION_MESSAGE];
	}

	function setMessage($v) {
		ewr_AddMessage($_SESSION[EWR_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[EWR_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		ewr_AddMessage($_SESSION[EWR_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[EWR_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		ewr_AddMessage($_SESSION[EWR_SESSION_SUCCESS_MESSAGE], $v);
	}

	function getWarningMessage() {
		return @$_SESSION[EWR_SESSION_WARNING_MESSAGE];
	}

	function setWarningMessage($v) {
		ewr_AddMessage($_SESSION[EWR_SESSION_WARNING_MESSAGE], $v);
	}

		// Show message
	function ShowMessage() {
		$hidden = FALSE;
		$html = "";

		// Message
		$sMessage = $this->getMessage();
		$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sMessage;
			$html .= "<div class=\"alert alert-info ewInfo\">" . $sMessage . "</div>";
			$_SESSION[EWR_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$sWarningMessage = $this->getWarningMessage();
		$this->Message_Showing($sWarningMessage, "warning");
		if ($sWarningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sWarningMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sWarningMessage;
			$html .= "<div class=\"alert alert-warning ewWarning\">" . $sWarningMessage . "</div>";
			$_SESSION[EWR_SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sSuccessMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sSuccessMessage;
			$html .= "<div class=\"alert alert-success ewSuccess\">" . $sSuccessMessage . "</div>";
			$_SESSION[EWR_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sErrorMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sErrorMessage;
			$html .= "<div class=\"alert alert-danger ewError\">" . $sErrorMessage . "</div>";
			$_SESSION[EWR_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo "<div class=\"ewMessageDialog\"" . (($hidden) ? " style=\"display: none;\"" : "") . ">" . $html . "</div>";
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") // Header exists, display
			echo $sHeader;
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") // Fotoer exists, display
			echo $sFooter;
	}

	// Validate page request
	function IsPageRequest() {
		if ($this->UseTokenInUrl) {
			if (ewr_IsHttpPost())
				return ($this->TableVar == @$_POST("t"));
			if (@$_GET["t"] <> "")
				return ($this->TableVar == @$_GET["t"]);
		} else {
			return TRUE;
		}
	}
	var $Token = "";
	var $CheckToken = EWR_CHECK_TOKEN;
	var $CheckTokenFn = "ewr_CheckToken";
	var $CreateTokenFn = "ewr_CreateToken";

	// Valid Post
	function ValidPost() {
		if (!$this->CheckToken || !ewr_IsHttpPost())
			return TRUE;
		if (!isset($_POST[EWR_TOKEN_NAME]))
			return FALSE;
		$fn = $this->CheckTokenFn;
		if (is_callable($fn))
			return $fn($_POST[EWR_TOKEN_NAME]);
		return FALSE;
	}

	// Create Token
	function CreateToken() {
		global $grToken;
		if ($this->CheckToken) {
			$fn = $this->CreateTokenFn;
			if ($this->Token == "" && is_callable($fn)) // Create token
				$this->Token = $fn();
			$grToken = $this->Token; // Save to global variable
		}
	}

	//
	// Page class constructor
	//
	function __construct() {
		global $conn, $ReportLanguage;

		// Language object
		$ReportLanguage = new crLanguage();

		// Parent constuctor
		parent::__construct();

		// Table object (Engaged_Clients)
		if (!isset($GLOBALS["Engaged_Clients"])) {
			$GLOBALS["Engaged_Clients"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["Engaged_Clients"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";

		// Page ID
		if (!defined("EWR_PAGE_ID"))
			define("EWR_PAGE_ID", 'rpt', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EWR_TABLE_NAME"))
			define("EWR_TABLE_NAME", 'Engaged Clients', TRUE);

		// Start timer
		if (!isset($GLOBALS["grTimer"]))
			$GLOBALS["grTimer"] = new crTimer();

		// Debug message
		ewr_LoadDebugMsg();

		// Open connection
		if (!isset($conn)) $conn = ewr_Connect($this->DBID);

		// Export options
		$this->ExportOptions = new crListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ewExportOption";

		// Search options
		$this->SearchOptions = new crListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ewSearchOption";

		// Filter options
		$this->FilterOptions = new crListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ewFilterOption fEngaged_Clientsrpt";

		// Generate report options
		$this->GenerateOptions = new crListOptions();
		$this->GenerateOptions->Tag = "div";
		$this->GenerateOptions->TagClassName = "ewGenerateOption";
	}

	//
	// Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $gsEmailContentType, $ReportLanguage, $Security, $UserProfile;
		global $gsCustomExport;

		// Get export parameters
		if (@$_GET["export"] <> "")
			$this->Export = strtolower($_GET["export"]);
		elseif (@$_POST["export"] <> "")
			$this->Export = strtolower($_POST["export"]);
		$gsExport = $this->Export; // Get export parameter, used in header
		$gsExportFile = $this->TableVar; // Get export file, used in header
		$gsEmailContentType = @$_POST["contenttype"]; // Get email content type

		// Setup placeholder
		// Setup export options

		$this->SetupExportOptions();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->ValidPost()) {
			echo $ReportLanguage->Phrase("InvalidPostRequest");
			$this->Page_Terminate();
			exit();
		}

		// Create Token
		$this->CreateToken();
	}

	// Set up export options
	function SetupExportOptions() {
		global $Security, $ReportLanguage, $ReportOptions;
		$exportid = session_id();
		$ReportTypes = array();

		// Printer friendly
		$item = &$this->ExportOptions->Add("print");
		$item->Body = "<a class=\"ewrExportLink ewPrint\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("PrinterFriendly", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("PrinterFriendly", TRUE)) . "\" href=\"" . $this->ExportPrintUrl . "\">" . $ReportLanguage->Phrase("PrinterFriendly") . "</a>";
		$item->Visible = FALSE;
		$ReportTypes["print"] = $item->Visible ? $ReportLanguage->Phrase("ReportFormPrint") : "";

		// Export to Excel
		$item = &$this->ExportOptions->Add("excel");
		$item->Body = "<a class=\"ewrExportLink ewExcel\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToExcel", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToExcel", TRUE)) . "\" href=\"" . $this->ExportExcelUrl . "\">" . $ReportLanguage->Phrase("ExportToExcel") . "</a>";
		$item->Visible = TRUE;
		$ReportTypes["excel"] = $item->Visible ? $ReportLanguage->Phrase("ReportFormExcel") : "";

		// Export to Word
		$item = &$this->ExportOptions->Add("word");
		$item->Body = "<a class=\"ewrExportLink ewWord\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToWord", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToWord", TRUE)) . "\" href=\"" . $this->ExportWordUrl . "\">" . $ReportLanguage->Phrase("ExportToWord") . "</a>";
		$item->Visible = FALSE;
		$ReportTypes["word"] = $item->Visible ? $ReportLanguage->Phrase("ReportFormWord") : "";

		// Export to Pdf
		$item = &$this->ExportOptions->Add("pdf");
		$item->Body = "<a class=\"ewrExportLink ewPdf\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToPDF", TRUE)) . "\" href=\"" . $this->ExportPdfUrl . "\">" . $ReportLanguage->Phrase("ExportToPDF") . "</a>";
		$item->Visible = FALSE;

		// Uncomment codes below to show export to Pdf link
//		$item->Visible = TRUE;

		$ReportTypes["pdf"] = $item->Visible ? $ReportLanguage->Phrase("ReportFormPdf") : "";

		// Export to Email
		$item = &$this->ExportOptions->Add("email");
		$url = $this->PageUrl() . "export=email";
		$item->Body = "<a class=\"ewrExportLink ewEmail\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToEmail", TRUE)) . "\" id=\"emf_Engaged_Clients\" href=\"javascript:void(0);\" onclick=\"ewr_EmailDialogShow({lnk:'emf_Engaged_Clients',hdr:ewLanguage.Phrase('ExportToEmail'),url:'$url',exportid:'$exportid',el:this});\">" . $ReportLanguage->Phrase("ExportToEmail") . "</a>";
		$item->Visible = TRUE;
		$ReportTypes["email"] = $item->Visible ? $ReportLanguage->Phrase("ReportFormEmail") : "";
		$ReportOptions["ReportTypes"] = $ReportTypes;

		// Drop down button for export
		$this->ExportOptions->UseDropDownButton = FALSE;
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseImageAndText = $this->ExportOptions->UseDropDownButton;
		$this->ExportOptions->DropDownButtonPhrase = $ReportLanguage->Phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->Add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Filter button
		$item = &$this->FilterOptions->Add("savecurrentfilter");
		$item->Body = "<a class=\"ewSaveFilter\" data-form=\"fEngaged_Clientsrpt\" href=\"#\">" . $ReportLanguage->Phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->Add("deletefilter");
		$item->Body = "<a class=\"ewDeleteFilter\" data-form=\"fEngaged_Clientsrpt\" href=\"#\">" . $ReportLanguage->Phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton; // v8
		$this->FilterOptions->DropDownButtonPhrase = $ReportLanguage->Phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->Add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Set up options (extended)
		$this->SetupExportOptionsExt();

		// Hide options for export
		if ($this->Export <> "") {
			$this->ExportOptions->HideAllOptions();
			$this->FilterOptions->HideAllOptions();
		}

		// Set up table class
		if ($this->Export == "word" || $this->Export == "excel" || $this->Export == "pdf")
			$this->ReportTableClass = "ewTable";
		else
			$this->ReportTableClass = "table ewTable";
	}

	// Set up search options
	function SetupSearchOptions() {
		global $ReportLanguage;

		// Filter panel button
		$item = &$this->SearchOptions->Add("searchtoggle");
		$SearchToggleClass = $this->FilterApplied ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ewSearchToggle" . $SearchToggleClass . "\" title=\"" . $ReportLanguage->Phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->Phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"fEngaged_Clientsrpt\">" . $ReportLanguage->Phrase("SearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Reset filter
		$item = &$this->SearchOptions->Add("resetfilter");
		$item->Body = "<button type=\"button\" class=\"btn btn-default\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ResetAllFilter", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ResetAllFilter", TRUE)) . "\" onclick=\"location='" . ewr_CurrentPage() . "?cmd=reset'\">" . $ReportLanguage->Phrase("ResetAllFilter") . "</button>";
		$item->Visible = TRUE && $this->FilterApplied;

		// Button group for reset filter
		$this->SearchOptions->UseButtonGroup = TRUE;

		// Add group option item
		$item = &$this->SearchOptions->Add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide options for export
		if ($this->Export <> "")
			$this->SearchOptions->HideAllOptions();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $ReportLanguage, $EWR_EXPORT, $gsExportFile;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		if ($this->Export <> "" && array_key_exists($this->Export, $EWR_EXPORT)) {
			$sContent = ob_get_contents();
			if (ob_get_length())
				ob_end_clean();

			// Remove all <div data-tagid="..." id="orig..." class="hide">...</div> (for customviewtag export, except "googlemaps")
			if (preg_match_all('/<div\s+data-tagid=[\'"]([\s\S]*?)[\'"]\s+id=[\'"]orig([\s\S]*?)[\'"]\s+class\s*=\s*[\'"]hide[\'"]>([\s\S]*?)<\/div\s*>/i', $sContent, $divmatches, PREG_SET_ORDER)) {
				foreach ($divmatches as $divmatch) {
					if ($divmatch[1] <> "googlemaps")
						$sContent = str_replace($divmatch[0], '', $sContent);
				}
			}
			$fn = $EWR_EXPORT[$this->Export];
			if ($this->Export == "email") { // Email
				if (@$this->GenOptions["reporttype"] == "email") {
					$saveResponse = $this->$fn($sContent, $this->GenOptions);
					$this->WriteGenResponse($saveResponse);
				} else {
					echo $this->$fn($sContent, array());
				}
				$url = ""; // Avoid redirect
			} else {
				$saveToFile = $this->$fn($sContent, $this->GenOptions);
				if (@$this->GenOptions["reporttype"] <> "") {
					$saveUrl = ($saveToFile <> "") ? ewr_FullUrl($saveToFile, "genurl") : $ReportLanguage->Phrase("GenerateSuccess");
					$this->WriteGenResponse($saveUrl);
					$url = ""; // Avoid redirect
				}
			}
		}

		// Close connection if not in dashboard
		if (!$this->ShowReportInDashboard)
			ewr_CloseConn();

		// Go to URL if specified
		if ($url <> "") {
			if (!EWR_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			ewr_SaveDebugMsg();
			header("Location: " . $url);
		}
		if (!$this->ShowReportInDashboard)
			exit();
	}

	// Initialize common variables
	var $ExportOptions; // Export options
	var $SearchOptions; // Search options
	var $FilterOptions; // Filter options

	// Paging variables
	var $RecIndex = 0; // Record index
	var $RecCount = 0; // Record count
	var $StartGrp = 0; // Start group
	var $StopGrp = 0; // Stop group
	var $TotalGrps = 0; // Total groups
	var $GrpCount = 0; // Group count
	var $GrpCounter = array(); // Group counter
	var $DisplayGrps = 5; // Groups per page
	var $GrpRange = 10;
	var $Sort = "";
	var $Filter = "";
	var $PageFirstGroupFilter = "";
	var $UserIDFilter = "";
	var $DrillDown = FALSE;
	var $DrillDownInPanel = FALSE;
	var $DrillDownList = "";

	// Clear field for ext filter
	var $ClearExtFilter = "";
	var $PopupName = "";
	var $PopupValue = "";
	var $FilterApplied;
	var $SearchCommand = FALSE;
	var $ShowHeader;
	var $GrpColumnCount = 0;
	var $SubGrpColumnCount = 0;
	var $DtlColumnCount = 0;
	var $Cnt, $Col, $Val, $Smry, $Mn, $Mx, $GrandCnt, $GrandSmry, $GrandMn, $GrandMx;
	var $TotCount;
	var $GrandSummarySetup = FALSE;
	var $GrpIdx;
	var $DetailRows = array();
	var $ShowReportInDashboard = FALSE;
	var $TopContentClass = "col-sm-12 ewTop";
	var $LeftContentClass = "ewLeft";
	var $CenterContentClass = "col-sm-12 ewCenter";
	var $RightContentClass = "ewRight";
	var $BottomContentClass = "col-sm-12 ewBottom";

	//
	// Page main
	//
	function Page_Main() {
		global $rs;
		global $rsgrp;
		global $Security;
		global $grFormError;
		global $grDrillDownInPanel;
		global $ReportBreadcrumb;
		global $ReportLanguage;
		global $grDashboardReport;

		// Show report in dashboard
		$this->ShowReportInDashboard = $grDashboardReport;

		// Set field visibility for detail fields
		$this->company_name->SetVisibility();
		$this->company_reg_number->SetVisibility();
		$this->date_resigned->SetVisibility();
		$this->engagement_date->SetVisibility();
		$this->service_type->SetVisibility();
		$this->first_engagement_date->SetVisibility();
		$this->client_turnover->SetVisibility();
		$this->accounting_framework->SetVisibility();
		$this->when_next_irba->SetVisibility();
		$this->year_of_afs->SetVisibility();
		$this->jse_listed->SetVisibility();
		$this->amount_billed->SetVisibility();
		$this->isqc_2->SetVisibility();
		$this->isqc_1->SetVisibility();
		$this->irba_code->SetVisibility();
		$this->companies_act->SetVisibility();
		$this->group_structure->SetVisibility();
		$this->anticipated_rotation_partner->SetVisibility();
		$this->rotation_year->SetVisibility();
		$this->rotation_period->SetVisibility();
		$this->city->SetVisibility();
		$this->engagement_id->SetVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$nDtls = 23;
		$nGrps = 1;
		$this->Val = &ewr_InitArray($nDtls, 0);
		$this->Cnt = &ewr_Init2DArray($nGrps, $nDtls, 0);
		$this->Smry = &ewr_Init2DArray($nGrps, $nDtls, 0);
		$this->Mn = &ewr_Init2DArray($nGrps, $nDtls, NULL);
		$this->Mx = &ewr_Init2DArray($nGrps, $nDtls, NULL);
		$this->GrandCnt = &ewr_InitArray($nDtls, 0);
		$this->GrandSmry = &ewr_InitArray($nDtls, 0);
		$this->GrandMn = &ewr_InitArray($nDtls, NULL);
		$this->GrandMx = &ewr_InitArray($nDtls, NULL);

		// Set up array if accumulation required: array(Accum, SkipNullOrZero)
		$this->Col = array(array(FALSE, FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE));

		// Set up groups per page dynamically
		$this->SetUpDisplayGrps();

		// Set up Breadcrumb
		if ($this->Export == "")
			$this->SetupBreadcrumb();
		$this->company_name->SelectionList = "";
		$this->company_name->DefaultSelectionList = "";
		$this->company_name->ValueList = "";

		// Check if search command
		$this->SearchCommand = (@$_GET["cmd"] == "search");

		// Load default filter values
		$this->LoadDefaultFilters();

		// Load custom filters
		$this->Page_FilterLoad();

		// Set up popup filter
		$this->SetupPopup();

		// Load group db values if necessary
		$this->LoadGroupDbValues();

		// Handle Ajax popup
		$this->ProcessAjaxPopup();

		// Extended filter
		$sExtendedFilter = "";

		// Restore filter list
		$this->RestoreFilterList();

		// Build extended filter
		$sExtendedFilter = $this->GetExtendedFilter();
		ewr_AddFilter($this->Filter, $sExtendedFilter);

		// Build popup filter
		$sPopupFilter = $this->GetPopupFilter();

		//ewr_SetDebugMsg("popup filter: " . $sPopupFilter);
		ewr_AddFilter($this->Filter, $sPopupFilter);

		// Check if filter applied
		$this->FilterApplied = $this->CheckFilter();

		// Call Page Selecting event
		$this->Page_Selecting($this->Filter);

		// Search options
		$this->SetupSearchOptions();

		// Get sort
		$this->Sort = $this->GetSort($this->GenOptions);

		// Get total count
		$sSql = ewr_BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(), $this->Filter, $this->Sort);
		$this->TotalGrps = $this->GetCnt($sSql);
		if ($this->DisplayGrps <= 0 || $this->DrillDown || $this->ShowReportInDashboard) // Display all groups
			$this->DisplayGrps = $this->TotalGrps;
		$this->StartGrp = 1;

		// Show header
		$this->ShowHeader = TRUE;

		// Set up start position if not export all
		if ($this->ExportAll && $this->Export <> "")
			$this->DisplayGrps = $this->TotalGrps;
		else
			$this->SetUpStartGroup($this->GenOptions);

		// Set no record found message
		if ($this->TotalGrps == 0) {
				if ($this->Filter == "0=101") {
					$this->setWarningMessage($ReportLanguage->Phrase("EnterSearchCriteria"));
				} else {
					$this->setWarningMessage($ReportLanguage->Phrase("NoRecord"));
				}
		}

		// Hide export options if export/dashboard report
		if ($this->Export <> "" || $this->ShowReportInDashboard)
			$this->ExportOptions->HideAllOptions();

		// Hide search/filter options if export/drilldown/dashboard report
		if ($this->Export <> "" || $this->DrillDown || $this->ShowReportInDashboard) {
			$this->SearchOptions->HideAllOptions();
			$this->FilterOptions->HideAllOptions();
			$this->GenerateOptions->HideAllOptions();
		}

		// Get current page records
		$rs = $this->GetRs($sSql, $this->StartGrp, $this->DisplayGrps);
		$this->SetupFieldCount();
	}

	// Accummulate summary
	function AccumulateSummary() {
		$cntx = count($this->Smry);
		for ($ix = 0; $ix < $cntx; $ix++) {
			$cnty = count($this->Smry[$ix]);
			for ($iy = 1; $iy < $cnty; $iy++) {
				if ($this->Col[$iy][0]) { // Accumulate required
					$valwrk = $this->Val[$iy];
					if (is_null($valwrk)) {
						if (!$this->Col[$iy][1])
							$this->Cnt[$ix][$iy]++;
					} else {
						$accum = (!$this->Col[$iy][1] || !is_numeric($valwrk) || $valwrk <> 0);
						if ($accum) {
							$this->Cnt[$ix][$iy]++;
							if (is_numeric($valwrk)) {
								$this->Smry[$ix][$iy] += $valwrk;
								if (is_null($this->Mn[$ix][$iy])) {
									$this->Mn[$ix][$iy] = $valwrk;
									$this->Mx[$ix][$iy] = $valwrk;
								} else {
									if ($this->Mn[$ix][$iy] > $valwrk) $this->Mn[$ix][$iy] = $valwrk;
									if ($this->Mx[$ix][$iy] < $valwrk) $this->Mx[$ix][$iy] = $valwrk;
								}
							}
						}
					}
				}
			}
		}
		$cntx = count($this->Smry);
		for ($ix = 0; $ix < $cntx; $ix++) {
			$this->Cnt[$ix][0]++;
		}
	}

	// Reset level summary
	function ResetLevelSummary($lvl) {

		// Clear summary values
		$cntx = count($this->Smry);
		for ($ix = $lvl; $ix < $cntx; $ix++) {
			$cnty = count($this->Smry[$ix]);
			for ($iy = 1; $iy < $cnty; $iy++) {
				$this->Cnt[$ix][$iy] = 0;
				if ($this->Col[$iy][0]) {
					$this->Smry[$ix][$iy] = 0;
					$this->Mn[$ix][$iy] = NULL;
					$this->Mx[$ix][$iy] = NULL;
				}
			}
		}
		$cntx = count($this->Smry);
		for ($ix = $lvl; $ix < $cntx; $ix++) {
			$this->Cnt[$ix][0] = 0;
		}

		// Reset record count
		$this->RecCount = 0;
	}

	// Accummulate grand summary
	function AccumulateGrandSummary() {
		$this->TotCount++;
		$cntgs = count($this->GrandSmry);
		for ($iy = 1; $iy < $cntgs; $iy++) {
			if ($this->Col[$iy][0]) {
				$valwrk = $this->Val[$iy];
				if (is_null($valwrk) || !is_numeric($valwrk)) {
					if (!$this->Col[$iy][1])
						$this->GrandCnt[$iy]++;
				} else {
					if (!$this->Col[$iy][1] || $valwrk <> 0) {
						$this->GrandCnt[$iy]++;
						$this->GrandSmry[$iy] += $valwrk;
						if (is_null($this->GrandMn[$iy])) {
							$this->GrandMn[$iy] = $valwrk;
							$this->GrandMx[$iy] = $valwrk;
						} else {
							if ($this->GrandMn[$iy] > $valwrk) $this->GrandMn[$iy] = $valwrk;
							if ($this->GrandMx[$iy] < $valwrk) $this->GrandMx[$iy] = $valwrk;
						}
					}
				}
			}
		}
	}

	// Get count
	function GetCnt($sql) {
		$conn = &$this->Connection();
		$rscnt = $conn->Execute($sql);
		$cnt = ($rscnt) ? $rscnt->RecordCount() : 0;
		if ($rscnt) $rscnt->Close();
		return $cnt;
	}

	// Get recordset
	function GetRs($wrksql, $start, $grps) {
		$conn = &$this->Connection();
		$conn->raiseErrorFn = $GLOBALS["EWR_ERROR_FN"];
		$rswrk = $conn->SelectLimit($wrksql, $grps, $start - 1);
		$conn->raiseErrorFn = '';
		return $rswrk;
	}

	// Get row values
	function GetRow($opt) {
		global $rs;
		if (!$rs)
			return;
		if ($opt == 1) { // Get first row
				$this->FirstRowData = array();
				$this->FirstRowData['company_name'] = ewr_Conv($rs->fields('company_name'), 200);
				$this->FirstRowData['company_reg_number'] = ewr_Conv($rs->fields('company_reg_number'), 200);
				$this->FirstRowData['date_resigned'] = ewr_Conv($rs->fields('date_resigned'), 200);
				$this->FirstRowData['engagement_date'] = ewr_Conv($rs->fields('engagement_date'), 200);
				$this->FirstRowData['service_type'] = ewr_Conv($rs->fields('service_type'), 200);
				$this->FirstRowData['first_engagement_date'] = ewr_Conv($rs->fields('first_engagement_date'), 200);
				$this->FirstRowData['client_turnover'] = ewr_Conv($rs->fields('client_turnover'), 200);
				$this->FirstRowData['accounting_framework'] = ewr_Conv($rs->fields('accounting_framework'), 200);
				$this->FirstRowData['when_next_irba'] = ewr_Conv($rs->fields('when_next_irba'), 200);
				$this->FirstRowData['year_of_afs'] = ewr_Conv($rs->fields('year_of_afs'), 200);
				$this->FirstRowData['jse_listed'] = ewr_Conv($rs->fields('jse_listed'), 200);
				$this->FirstRowData['amount_billed'] = ewr_Conv($rs->fields('amount_billed'), 200);
				$this->FirstRowData['isqc_2'] = ewr_Conv($rs->fields('isqc_2'), 200);
				$this->FirstRowData['isqc_1'] = ewr_Conv($rs->fields('isqc_1'), 200);
				$this->FirstRowData['irba_code'] = ewr_Conv($rs->fields('irba_code'), 200);
				$this->FirstRowData['companies_act'] = ewr_Conv($rs->fields('companies_act'), 200);
				$this->FirstRowData['group_structure'] = ewr_Conv($rs->fields('group_structure'), 200);
				$this->FirstRowData['anticipated_rotation_partner'] = ewr_Conv($rs->fields('anticipated_rotation_partner'), 200);
				$this->FirstRowData['rotation_year'] = ewr_Conv($rs->fields('rotation_year'), 200);
				$this->FirstRowData['rotation_period'] = ewr_Conv($rs->fields('rotation_period'), 200);
				$this->FirstRowData['city'] = ewr_Conv($rs->fields('city'), 200);
				$this->FirstRowData['engagement_id'] = ewr_Conv($rs->fields('engagement_id'), 200);
		} else { // Get next row
			$rs->MoveNext();
		}
		if (!$rs->EOF) {
			$this->company_name->setDbValue($rs->fields('company_name'));
			$this->company_reg_number->setDbValue($rs->fields('company_reg_number'));
			$this->date_resigned->setDbValue($rs->fields('date_resigned'));
			$this->engagement_date->setDbValue($rs->fields('engagement_date'));
			$this->service_name->setDbValue($rs->fields('service_name'));
			$this->service_type->setDbValue($rs->fields('service_type'));
			$this->first_engagement_date->setDbValue($rs->fields('first_engagement_date'));
			$this->client_turnover->setDbValue($rs->fields('client_turnover'));
			$this->accounting_framework->setDbValue($rs->fields('accounting_framework'));
			$this->when_next_irba->setDbValue($rs->fields('when_next_irba'));
			$this->year_of_afs->setDbValue($rs->fields('year_of_afs'));
			$this->jse_listed->setDbValue($rs->fields('jse_listed'));
			$this->amount_billed->setDbValue($rs->fields('amount_billed'));
			$this->isqc_2->setDbValue($rs->fields('isqc_2'));
			$this->isqc_1->setDbValue($rs->fields('isqc_1'));
			$this->irba_code->setDbValue($rs->fields('irba_code'));
			$this->companies_act->setDbValue($rs->fields('companies_act'));
			$this->group_structure->setDbValue($rs->fields('group_structure'));
			$this->anticipated_rotation_partner->setDbValue($rs->fields('anticipated_rotation_partner'));
			$this->rotation_year->setDbValue($rs->fields('rotation_year'));
			$this->rotation_period->setDbValue($rs->fields('rotation_period'));
			$this->city->setDbValue($rs->fields('city'));
			$this->engagement_id->setDbValue($rs->fields('engagement_id'));
			$this->start_notes->setDbValue($rs->fields('start_notes'));
			$this->Val[1] = $this->company_name->CurrentValue;
			$this->Val[2] = $this->company_reg_number->CurrentValue;
			$this->Val[3] = $this->date_resigned->CurrentValue;
			$this->Val[4] = $this->engagement_date->CurrentValue;
			$this->Val[5] = $this->service_type->CurrentValue;
			$this->Val[6] = $this->first_engagement_date->CurrentValue;
			$this->Val[7] = $this->client_turnover->CurrentValue;
			$this->Val[8] = $this->accounting_framework->CurrentValue;
			$this->Val[9] = $this->when_next_irba->CurrentValue;
			$this->Val[10] = $this->year_of_afs->CurrentValue;
			$this->Val[11] = $this->jse_listed->CurrentValue;
			$this->Val[12] = $this->amount_billed->CurrentValue;
			$this->Val[13] = $this->isqc_2->CurrentValue;
			$this->Val[14] = $this->isqc_1->CurrentValue;
			$this->Val[15] = $this->irba_code->CurrentValue;
			$this->Val[16] = $this->companies_act->CurrentValue;
			$this->Val[17] = $this->group_structure->CurrentValue;
			$this->Val[18] = $this->anticipated_rotation_partner->CurrentValue;
			$this->Val[19] = $this->rotation_year->CurrentValue;
			$this->Val[20] = $this->rotation_period->CurrentValue;
			$this->Val[21] = $this->city->CurrentValue;
			$this->Val[22] = $this->engagement_id->CurrentValue;
		} else {
			$this->company_name->setDbValue("");
			$this->company_reg_number->setDbValue("");
			$this->date_resigned->setDbValue("");
			$this->engagement_date->setDbValue("");
			$this->service_name->setDbValue("");
			$this->service_type->setDbValue("");
			$this->first_engagement_date->setDbValue("");
			$this->client_turnover->setDbValue("");
			$this->accounting_framework->setDbValue("");
			$this->when_next_irba->setDbValue("");
			$this->year_of_afs->setDbValue("");
			$this->jse_listed->setDbValue("");
			$this->amount_billed->setDbValue("");
			$this->isqc_2->setDbValue("");
			$this->isqc_1->setDbValue("");
			$this->irba_code->setDbValue("");
			$this->companies_act->setDbValue("");
			$this->group_structure->setDbValue("");
			$this->anticipated_rotation_partner->setDbValue("");
			$this->rotation_year->setDbValue("");
			$this->rotation_period->setDbValue("");
			$this->city->setDbValue("");
			$this->engagement_id->setDbValue("");
			$this->start_notes->setDbValue("");
		}
	}

	// Set up starting group
	function SetUpStartGroup($options = array()) {

		// Exit if no groups
		if ($this->DisplayGrps == 0)
			return;
		$startGrp = (@$options["start"] <> "") ? $options["start"] : @$_GET[EWR_TABLE_START_GROUP];
		$pageNo = (@$options["pageno"] <> "") ? $options["pageno"] : @$_GET["pageno"];

		// Check for a 'start' parameter
		if ($startGrp != "") {
			$this->StartGrp = $startGrp;
			$this->setStartGroup($this->StartGrp);
		} elseif ($pageNo != "") {
			$nPageNo = $pageNo;
			if (is_numeric($nPageNo)) {
				$this->StartGrp = ($nPageNo-1)*$this->DisplayGrps+1;
				if ($this->StartGrp <= 0) {
					$this->StartGrp = 1;
				} elseif ($this->StartGrp >= intval(($this->TotalGrps-1)/$this->DisplayGrps)*$this->DisplayGrps+1) {
					$this->StartGrp = intval(($this->TotalGrps-1)/$this->DisplayGrps)*$this->DisplayGrps+1;
				}
				$this->setStartGroup($this->StartGrp);
			} else {
				$this->StartGrp = $this->getStartGroup();
			}
		} else {
			$this->StartGrp = $this->getStartGroup();
		}

		// Check if correct start group counter
		if (!is_numeric($this->StartGrp) || $this->StartGrp == "") { // Avoid invalid start group counter
			$this->StartGrp = 1; // Reset start group counter
			$this->setStartGroup($this->StartGrp);
		} elseif (intval($this->StartGrp) > intval($this->TotalGrps)) { // Avoid starting group > total groups
			$this->StartGrp = intval(($this->TotalGrps-1)/$this->DisplayGrps) * $this->DisplayGrps + 1; // Point to last page first group
			$this->setStartGroup($this->StartGrp);
		} elseif (($this->StartGrp-1) % $this->DisplayGrps <> 0) {
			$this->StartGrp = intval(($this->StartGrp-1)/$this->DisplayGrps) * $this->DisplayGrps + 1; // Point to page boundary
			$this->setStartGroup($this->StartGrp);
		}
	}

	// Load group db values if necessary
	function LoadGroupDbValues() {
		$conn = &$this->Connection();
	}

	// Process Ajax popup
	function ProcessAjaxPopup() {
		global $ReportLanguage;
		$conn = &$this->Connection();
		$fld = NULL;
		if (@$_GET["popup"] <> "") {
			$popupname = $_GET["popup"];

			// Check popup name
			// Build distinct values for company_name

			if ($popupname == 'Engaged_Clients_company_name') {
				$bNullValue = FALSE;
				$bEmptyValue = FALSE;
				$sFilter = $this->Filter;

				// Call Page Filtering event
				$this->Page_Filtering($this->company_name, $sFilter, "popup");
				$sSql = ewr_BuildReportSql($this->company_name->SqlSelect, $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), $this->company_name->SqlOrderBy, $sFilter, "");
				$rswrk = $conn->Execute($sSql);
				while ($rswrk && !$rswrk->EOF) {
					$this->company_name->setDbValue($rswrk->fields[0]);
					$this->company_name->ViewValue = @$rswrk->fields[1];
					if (is_null($this->company_name->CurrentValue)) {
						$bNullValue = TRUE;
					} elseif ($this->company_name->CurrentValue == "") {
						$bEmptyValue = TRUE;
					} else {
						ewr_SetupDistinctValues($this->company_name->ValueList, $this->company_name->CurrentValue, $this->company_name->ViewValue, FALSE, $this->company_name->FldDelimiter);
					}
					$rswrk->MoveNext();
				}
				if ($rswrk)
					$rswrk->Close();
				if ($bEmptyValue)
					ewr_SetupDistinctValues($this->company_name->ValueList, EWR_EMPTY_VALUE, $ReportLanguage->Phrase("EmptyLabel"), FALSE);
				if ($bNullValue)
					ewr_SetupDistinctValues($this->company_name->ValueList, EWR_NULL_VALUE, $ReportLanguage->Phrase("NullLabel"), FALSE);
				$fld = &$this->company_name;
			}

			// Output data as Json
			if (!is_null($fld)) {
				$jsdb = ewr_GetJsDb($fld, $fld->FldType);
				if (ob_get_length())
					ob_end_clean();
				echo $jsdb;
				exit();
			}
		}
	}

	// Set up popup
	function SetupPopup() {
		global $ReportLanguage;
		$conn = &$this->Connection();
		if ($this->DrillDown)
			return;

		// Process post back form
		if (ewr_IsHttpPost()) {
			$sName = @$_POST["popup"]; // Get popup form name
			if ($sName <> "") {
				$cntValues = (is_array(@$_POST["sel_$sName"])) ? count($_POST["sel_$sName"]) : 0;
				if ($cntValues > 0) {
					$arValues = $_POST["sel_$sName"];
					if (trim($arValues[0]) == "") // Select all
						$arValues = EWR_INIT_VALUE;
					$this->PopupName = $sName;
					if (ewr_IsAdvancedFilterValue($arValues) || $arValues == EWR_INIT_VALUE)
						$this->PopupValue = $arValues;
					if (!ewr_MatchedArray($arValues, $_SESSION["sel_$sName"])) {
						if ($this->HasSessionFilterValues($sName))
							$this->ClearExtFilter = $sName; // Clear extended filter for this field
					}
					$_SESSION["sel_$sName"] = $arValues;
					$_SESSION["rf_$sName"] = @$_POST["rf_$sName"];
					$_SESSION["rt_$sName"] = @$_POST["rt_$sName"];
					$this->ResetPager();
				}
			}

		// Get 'reset' command
		} elseif (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];
			if (strtolower($sCmd) == "reset") {
				$this->ClearSessionSelection('company_name');
				$this->ResetPager();
			}
		}

		// Load selection criteria to array
		// Get company_name selected values

		if (is_array(@$_SESSION["sel_Engaged_Clients_company_name"])) {
			$this->LoadSelectionFromSession('company_name');
		} elseif (@$_SESSION["sel_Engaged_Clients_company_name"] == EWR_INIT_VALUE) { // Select all
			$this->company_name->SelectionList = "";
		}
	}

	// Reset pager
	function ResetPager() {

		// Reset start position (reset command)
		$this->StartGrp = 1;
		$this->setStartGroup($this->StartGrp);
	}

	// Set up number of groups displayed per page
	function SetUpDisplayGrps() {
		$sWrk = @$_GET[EWR_TABLE_GROUP_PER_PAGE];
		if ($sWrk <> "") {
			if (is_numeric($sWrk)) {
				$this->DisplayGrps = intval($sWrk);
			} else {
				if (strtoupper($sWrk) == "ALL") { // Display all groups
					$this->DisplayGrps = -1;
				} else {
					$this->DisplayGrps = 5; // Non-numeric, load default
				}
			}
			$this->setGroupPerPage($this->DisplayGrps); // Save to session

			// Reset start position (reset command)
			$this->StartGrp = 1;
			$this->setStartGroup($this->StartGrp);
		} else {
			if ($this->getGroupPerPage() <> "") {
				$this->DisplayGrps = $this->getGroupPerPage(); // Restore from session
			} else {
				$this->DisplayGrps = 5; // Load default
			}
		}
	}

	// Render row
	function RenderRow() {
		global $rs, $Security, $ReportLanguage;
		$conn = &$this->Connection();
		if (!$this->GrandSummarySetup) { // Get Grand total
			$bGotCount = FALSE;
			$bGotSummary = FALSE;

			// Get total count from sql directly
			$sSql = ewr_BuildReportSql($this->getSqlSelectCount(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
			$rstot = $conn->Execute($sSql);
			if ($rstot) {
				$this->TotCount = ($rstot->RecordCount()>1) ? $rstot->RecordCount() : $rstot->fields[0];
				$rstot->Close();
				$bGotCount = TRUE;
			} else {
				$this->TotCount = 0;
			}
		$bGotSummary = TRUE;

			// Accumulate grand summary from detail records
			if (!$bGotCount || !$bGotSummary) {
				$sSql = ewr_BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
				$rs = $conn->Execute($sSql);
				if ($rs) {
					$this->GetRow(1);
					while (!$rs->EOF) {
						$this->AccumulateGrandSummary();
						$this->GetRow(2);
					}
					$rs->Close();
				}
			}
			$this->GrandSummarySetup = TRUE; // No need to set up again
		}

		// Call Row_Rendering event
		$this->Row_Rendering();

		//
		// Render view codes
		//

		if ($this->RowType == EWR_ROWTYPE_TOTAL && !($this->RowTotalType == EWR_ROWTOTAL_GROUP && $this->RowTotalSubType == EWR_ROWTOTAL_HEADER)) { // Summary row
			ewr_PrependClass($this->RowAttrs["class"], ($this->RowTotalType == EWR_ROWTOTAL_PAGE || $this->RowTotalType == EWR_ROWTOTAL_GRAND) ? "ewRptGrpAggregate" : "ewRptGrpSummary" . $this->RowGroupLevel); // Set up row class

			// company_name
			$this->company_name->HrefValue = "";

			// company_reg_number
			$this->company_reg_number->HrefValue = "";

			// date_resigned
			$this->date_resigned->HrefValue = "";

			// engagement_date
			$this->engagement_date->HrefValue = "";

			// service_type
			$this->service_type->HrefValue = "";

			// first_engagement_date
			$this->first_engagement_date->HrefValue = "";

			// client_turnover
			$this->client_turnover->HrefValue = "";

			// accounting_framework
			$this->accounting_framework->HrefValue = "";

			// when_next_irba
			$this->when_next_irba->HrefValue = "";

			// year_of_afs
			$this->year_of_afs->HrefValue = "";

			// jse_listed
			$this->jse_listed->HrefValue = "";

			// amount_billed
			$this->amount_billed->HrefValue = "";

			// isqc_2
			$this->isqc_2->HrefValue = "";

			// isqc_1
			$this->isqc_1->HrefValue = "";

			// irba_code
			$this->irba_code->HrefValue = "";

			// companies_act
			$this->companies_act->HrefValue = "";

			// group_structure
			$this->group_structure->HrefValue = "";

			// anticipated_rotation_partner
			$this->anticipated_rotation_partner->HrefValue = "";

			// rotation_year
			$this->rotation_year->HrefValue = "";

			// rotation_period
			$this->rotation_period->HrefValue = "";

			// city
			$this->city->HrefValue = "";

			// engagement_id
			$this->engagement_id->HrefValue = "";
		} else {
			if ($this->RowTotalType == EWR_ROWTOTAL_GROUP && $this->RowTotalSubType == EWR_ROWTOTAL_HEADER) {
			} else {
			}

			// company_name
			$this->company_name->ViewValue = $this->company_name->CurrentValue;
			$this->company_name->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// company_reg_number
			$this->company_reg_number->ViewValue = $this->company_reg_number->CurrentValue;
			$this->company_reg_number->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// date_resigned
			$this->date_resigned->ViewValue = $this->date_resigned->CurrentValue;
			$this->date_resigned->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// engagement_date
			$this->engagement_date->ViewValue = $this->engagement_date->CurrentValue;
			$this->engagement_date->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// service_type
			$this->service_type->ViewValue = $this->service_type->CurrentValue;
			$this->service_type->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// first_engagement_date
			$this->first_engagement_date->ViewValue = $this->first_engagement_date->CurrentValue;
			$this->first_engagement_date->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// client_turnover
			$this->client_turnover->ViewValue = $this->client_turnover->CurrentValue;
			$this->client_turnover->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// accounting_framework
			$this->accounting_framework->ViewValue = $this->accounting_framework->CurrentValue;
			$this->accounting_framework->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// when_next_irba
			$this->when_next_irba->ViewValue = $this->when_next_irba->CurrentValue;
			$this->when_next_irba->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// year_of_afs
			$this->year_of_afs->ViewValue = $this->year_of_afs->CurrentValue;
			$this->year_of_afs->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// jse_listed
			$this->jse_listed->ViewValue = $this->jse_listed->CurrentValue;
			$this->jse_listed->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// amount_billed
			$this->amount_billed->ViewValue = $this->amount_billed->CurrentValue;
			$this->amount_billed->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// isqc_2
			$this->isqc_2->ViewValue = $this->isqc_2->CurrentValue;
			$this->isqc_2->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// isqc_1
			$this->isqc_1->ViewValue = $this->isqc_1->CurrentValue;
			$this->isqc_1->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// irba_code
			$this->irba_code->ViewValue = $this->irba_code->CurrentValue;
			$this->irba_code->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// companies_act
			$this->companies_act->ViewValue = $this->companies_act->CurrentValue;
			$this->companies_act->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// group_structure
			$this->group_structure->ViewValue = $this->group_structure->CurrentValue;
			$this->group_structure->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// anticipated_rotation_partner
			$this->anticipated_rotation_partner->ViewValue = $this->anticipated_rotation_partner->CurrentValue;
			$this->anticipated_rotation_partner->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// rotation_year
			$this->rotation_year->ViewValue = $this->rotation_year->CurrentValue;
			$this->rotation_year->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// rotation_period
			$this->rotation_period->ViewValue = $this->rotation_period->CurrentValue;
			$this->rotation_period->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// city
			$this->city->ViewValue = $this->city->CurrentValue;
			$this->city->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// engagement_id
			$this->engagement_id->ViewValue = $this->engagement_id->CurrentValue;
			$this->engagement_id->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// company_name
			$this->company_name->HrefValue = "";

			// company_reg_number
			$this->company_reg_number->HrefValue = "";

			// date_resigned
			$this->date_resigned->HrefValue = "";

			// engagement_date
			$this->engagement_date->HrefValue = "";

			// service_type
			$this->service_type->HrefValue = "";

			// first_engagement_date
			$this->first_engagement_date->HrefValue = "";

			// client_turnover
			$this->client_turnover->HrefValue = "";

			// accounting_framework
			$this->accounting_framework->HrefValue = "";

			// when_next_irba
			$this->when_next_irba->HrefValue = "";

			// year_of_afs
			$this->year_of_afs->HrefValue = "";

			// jse_listed
			$this->jse_listed->HrefValue = "";

			// amount_billed
			$this->amount_billed->HrefValue = "";

			// isqc_2
			$this->isqc_2->HrefValue = "";

			// isqc_1
			$this->isqc_1->HrefValue = "";

			// irba_code
			$this->irba_code->HrefValue = "";

			// companies_act
			$this->companies_act->HrefValue = "";

			// group_structure
			$this->group_structure->HrefValue = "";

			// anticipated_rotation_partner
			$this->anticipated_rotation_partner->HrefValue = "";

			// rotation_year
			$this->rotation_year->HrefValue = "";

			// rotation_period
			$this->rotation_period->HrefValue = "";

			// city
			$this->city->HrefValue = "";

			// engagement_id
			$this->engagement_id->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == EWR_ROWTYPE_TOTAL) { // Summary row
		} else {

			// company_name
			$CurrentValue = $this->company_name->CurrentValue;
			$ViewValue = &$this->company_name->ViewValue;
			$ViewAttrs = &$this->company_name->ViewAttrs;
			$CellAttrs = &$this->company_name->CellAttrs;
			$HrefValue = &$this->company_name->HrefValue;
			$LinkAttrs = &$this->company_name->LinkAttrs;
			$this->Cell_Rendered($this->company_name, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// company_reg_number
			$CurrentValue = $this->company_reg_number->CurrentValue;
			$ViewValue = &$this->company_reg_number->ViewValue;
			$ViewAttrs = &$this->company_reg_number->ViewAttrs;
			$CellAttrs = &$this->company_reg_number->CellAttrs;
			$HrefValue = &$this->company_reg_number->HrefValue;
			$LinkAttrs = &$this->company_reg_number->LinkAttrs;
			$this->Cell_Rendered($this->company_reg_number, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// date_resigned
			$CurrentValue = $this->date_resigned->CurrentValue;
			$ViewValue = &$this->date_resigned->ViewValue;
			$ViewAttrs = &$this->date_resigned->ViewAttrs;
			$CellAttrs = &$this->date_resigned->CellAttrs;
			$HrefValue = &$this->date_resigned->HrefValue;
			$LinkAttrs = &$this->date_resigned->LinkAttrs;
			$this->Cell_Rendered($this->date_resigned, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// engagement_date
			$CurrentValue = $this->engagement_date->CurrentValue;
			$ViewValue = &$this->engagement_date->ViewValue;
			$ViewAttrs = &$this->engagement_date->ViewAttrs;
			$CellAttrs = &$this->engagement_date->CellAttrs;
			$HrefValue = &$this->engagement_date->HrefValue;
			$LinkAttrs = &$this->engagement_date->LinkAttrs;
			$this->Cell_Rendered($this->engagement_date, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// service_type
			$CurrentValue = $this->service_type->CurrentValue;
			$ViewValue = &$this->service_type->ViewValue;
			$ViewAttrs = &$this->service_type->ViewAttrs;
			$CellAttrs = &$this->service_type->CellAttrs;
			$HrefValue = &$this->service_type->HrefValue;
			$LinkAttrs = &$this->service_type->LinkAttrs;
			$this->Cell_Rendered($this->service_type, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// first_engagement_date
			$CurrentValue = $this->first_engagement_date->CurrentValue;
			$ViewValue = &$this->first_engagement_date->ViewValue;
			$ViewAttrs = &$this->first_engagement_date->ViewAttrs;
			$CellAttrs = &$this->first_engagement_date->CellAttrs;
			$HrefValue = &$this->first_engagement_date->HrefValue;
			$LinkAttrs = &$this->first_engagement_date->LinkAttrs;
			$this->Cell_Rendered($this->first_engagement_date, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// client_turnover
			$CurrentValue = $this->client_turnover->CurrentValue;
			$ViewValue = &$this->client_turnover->ViewValue;
			$ViewAttrs = &$this->client_turnover->ViewAttrs;
			$CellAttrs = &$this->client_turnover->CellAttrs;
			$HrefValue = &$this->client_turnover->HrefValue;
			$LinkAttrs = &$this->client_turnover->LinkAttrs;
			$this->Cell_Rendered($this->client_turnover, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// accounting_framework
			$CurrentValue = $this->accounting_framework->CurrentValue;
			$ViewValue = &$this->accounting_framework->ViewValue;
			$ViewAttrs = &$this->accounting_framework->ViewAttrs;
			$CellAttrs = &$this->accounting_framework->CellAttrs;
			$HrefValue = &$this->accounting_framework->HrefValue;
			$LinkAttrs = &$this->accounting_framework->LinkAttrs;
			$this->Cell_Rendered($this->accounting_framework, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// when_next_irba
			$CurrentValue = $this->when_next_irba->CurrentValue;
			$ViewValue = &$this->when_next_irba->ViewValue;
			$ViewAttrs = &$this->when_next_irba->ViewAttrs;
			$CellAttrs = &$this->when_next_irba->CellAttrs;
			$HrefValue = &$this->when_next_irba->HrefValue;
			$LinkAttrs = &$this->when_next_irba->LinkAttrs;
			$this->Cell_Rendered($this->when_next_irba, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// year_of_afs
			$CurrentValue = $this->year_of_afs->CurrentValue;
			$ViewValue = &$this->year_of_afs->ViewValue;
			$ViewAttrs = &$this->year_of_afs->ViewAttrs;
			$CellAttrs = &$this->year_of_afs->CellAttrs;
			$HrefValue = &$this->year_of_afs->HrefValue;
			$LinkAttrs = &$this->year_of_afs->LinkAttrs;
			$this->Cell_Rendered($this->year_of_afs, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// jse_listed
			$CurrentValue = $this->jse_listed->CurrentValue;
			$ViewValue = &$this->jse_listed->ViewValue;
			$ViewAttrs = &$this->jse_listed->ViewAttrs;
			$CellAttrs = &$this->jse_listed->CellAttrs;
			$HrefValue = &$this->jse_listed->HrefValue;
			$LinkAttrs = &$this->jse_listed->LinkAttrs;
			$this->Cell_Rendered($this->jse_listed, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// amount_billed
			$CurrentValue = $this->amount_billed->CurrentValue;
			$ViewValue = &$this->amount_billed->ViewValue;
			$ViewAttrs = &$this->amount_billed->ViewAttrs;
			$CellAttrs = &$this->amount_billed->CellAttrs;
			$HrefValue = &$this->amount_billed->HrefValue;
			$LinkAttrs = &$this->amount_billed->LinkAttrs;
			$this->Cell_Rendered($this->amount_billed, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// isqc_2
			$CurrentValue = $this->isqc_2->CurrentValue;
			$ViewValue = &$this->isqc_2->ViewValue;
			$ViewAttrs = &$this->isqc_2->ViewAttrs;
			$CellAttrs = &$this->isqc_2->CellAttrs;
			$HrefValue = &$this->isqc_2->HrefValue;
			$LinkAttrs = &$this->isqc_2->LinkAttrs;
			$this->Cell_Rendered($this->isqc_2, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// isqc_1
			$CurrentValue = $this->isqc_1->CurrentValue;
			$ViewValue = &$this->isqc_1->ViewValue;
			$ViewAttrs = &$this->isqc_1->ViewAttrs;
			$CellAttrs = &$this->isqc_1->CellAttrs;
			$HrefValue = &$this->isqc_1->HrefValue;
			$LinkAttrs = &$this->isqc_1->LinkAttrs;
			$this->Cell_Rendered($this->isqc_1, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// irba_code
			$CurrentValue = $this->irba_code->CurrentValue;
			$ViewValue = &$this->irba_code->ViewValue;
			$ViewAttrs = &$this->irba_code->ViewAttrs;
			$CellAttrs = &$this->irba_code->CellAttrs;
			$HrefValue = &$this->irba_code->HrefValue;
			$LinkAttrs = &$this->irba_code->LinkAttrs;
			$this->Cell_Rendered($this->irba_code, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// companies_act
			$CurrentValue = $this->companies_act->CurrentValue;
			$ViewValue = &$this->companies_act->ViewValue;
			$ViewAttrs = &$this->companies_act->ViewAttrs;
			$CellAttrs = &$this->companies_act->CellAttrs;
			$HrefValue = &$this->companies_act->HrefValue;
			$LinkAttrs = &$this->companies_act->LinkAttrs;
			$this->Cell_Rendered($this->companies_act, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// group_structure
			$CurrentValue = $this->group_structure->CurrentValue;
			$ViewValue = &$this->group_structure->ViewValue;
			$ViewAttrs = &$this->group_structure->ViewAttrs;
			$CellAttrs = &$this->group_structure->CellAttrs;
			$HrefValue = &$this->group_structure->HrefValue;
			$LinkAttrs = &$this->group_structure->LinkAttrs;
			$this->Cell_Rendered($this->group_structure, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// anticipated_rotation_partner
			$CurrentValue = $this->anticipated_rotation_partner->CurrentValue;
			$ViewValue = &$this->anticipated_rotation_partner->ViewValue;
			$ViewAttrs = &$this->anticipated_rotation_partner->ViewAttrs;
			$CellAttrs = &$this->anticipated_rotation_partner->CellAttrs;
			$HrefValue = &$this->anticipated_rotation_partner->HrefValue;
			$LinkAttrs = &$this->anticipated_rotation_partner->LinkAttrs;
			$this->Cell_Rendered($this->anticipated_rotation_partner, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// rotation_year
			$CurrentValue = $this->rotation_year->CurrentValue;
			$ViewValue = &$this->rotation_year->ViewValue;
			$ViewAttrs = &$this->rotation_year->ViewAttrs;
			$CellAttrs = &$this->rotation_year->CellAttrs;
			$HrefValue = &$this->rotation_year->HrefValue;
			$LinkAttrs = &$this->rotation_year->LinkAttrs;
			$this->Cell_Rendered($this->rotation_year, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// rotation_period
			$CurrentValue = $this->rotation_period->CurrentValue;
			$ViewValue = &$this->rotation_period->ViewValue;
			$ViewAttrs = &$this->rotation_period->ViewAttrs;
			$CellAttrs = &$this->rotation_period->CellAttrs;
			$HrefValue = &$this->rotation_period->HrefValue;
			$LinkAttrs = &$this->rotation_period->LinkAttrs;
			$this->Cell_Rendered($this->rotation_period, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// city
			$CurrentValue = $this->city->CurrentValue;
			$ViewValue = &$this->city->ViewValue;
			$ViewAttrs = &$this->city->ViewAttrs;
			$CellAttrs = &$this->city->CellAttrs;
			$HrefValue = &$this->city->HrefValue;
			$LinkAttrs = &$this->city->LinkAttrs;
			$this->Cell_Rendered($this->city, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// engagement_id
			$CurrentValue = $this->engagement_id->CurrentValue;
			$ViewValue = &$this->engagement_id->ViewValue;
			$ViewAttrs = &$this->engagement_id->ViewAttrs;
			$CellAttrs = &$this->engagement_id->CellAttrs;
			$HrefValue = &$this->engagement_id->HrefValue;
			$LinkAttrs = &$this->engagement_id->LinkAttrs;
			$this->Cell_Rendered($this->engagement_id, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);
		}

		// Call Row_Rendered event
		$this->Row_Rendered();
		$this->SetupFieldCount();
	}

	// Setup field count
	function SetupFieldCount() {
		$this->GrpColumnCount = 0;
		$this->SubGrpColumnCount = 0;
		$this->DtlColumnCount = 0;
		if ($this->company_name->Visible) $this->DtlColumnCount += 1;
		if ($this->company_reg_number->Visible) $this->DtlColumnCount += 1;
		if ($this->date_resigned->Visible) $this->DtlColumnCount += 1;
		if ($this->engagement_date->Visible) $this->DtlColumnCount += 1;
		if ($this->service_type->Visible) $this->DtlColumnCount += 1;
		if ($this->first_engagement_date->Visible) $this->DtlColumnCount += 1;
		if ($this->client_turnover->Visible) $this->DtlColumnCount += 1;
		if ($this->accounting_framework->Visible) $this->DtlColumnCount += 1;
		if ($this->when_next_irba->Visible) $this->DtlColumnCount += 1;
		if ($this->year_of_afs->Visible) $this->DtlColumnCount += 1;
		if ($this->jse_listed->Visible) $this->DtlColumnCount += 1;
		if ($this->amount_billed->Visible) $this->DtlColumnCount += 1;
		if ($this->isqc_2->Visible) $this->DtlColumnCount += 1;
		if ($this->isqc_1->Visible) $this->DtlColumnCount += 1;
		if ($this->irba_code->Visible) $this->DtlColumnCount += 1;
		if ($this->companies_act->Visible) $this->DtlColumnCount += 1;
		if ($this->group_structure->Visible) $this->DtlColumnCount += 1;
		if ($this->anticipated_rotation_partner->Visible) $this->DtlColumnCount += 1;
		if ($this->rotation_year->Visible) $this->DtlColumnCount += 1;
		if ($this->rotation_period->Visible) $this->DtlColumnCount += 1;
		if ($this->city->Visible) $this->DtlColumnCount += 1;
		if ($this->engagement_id->Visible) $this->DtlColumnCount += 1;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $ReportBreadcrumb;
		$ReportBreadcrumb = new crBreadcrumb();
		$url = substr(ewr_CurrentUrl(), strrpos(ewr_CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$ReportBreadcrumb->Add("rpt", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	function SetupExportOptionsExt() {
		global $ReportLanguage, $ReportOptions;
		$ReportTypes = $ReportOptions["ReportTypes"];
		$item =& $this->ExportOptions->GetItem("pdf");
		$item->Visible = TRUE;
		if ($item->Visible)
			$ReportTypes["pdf"] = $ReportLanguage->Phrase("ReportFormPdf");
		$exportid = session_id();
		$url = $this->ExportPdfUrl;
		$item->Body = "<a class=\"ewrExportLink ewPdf\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToPDF", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ewr_ExportCharts(this, '" . $url . "', '" . $exportid . "');\">" . $ReportLanguage->Phrase("ExportToPDF") . "</a>";
		$ReportOptions["ReportTypes"] = $ReportTypes;
	}

	// Return extended filter
	function GetExtendedFilter() {
		global $grFormError;
		$sFilter = "";
		if ($this->DrillDown)
			return "";
		$bPostBack = ewr_IsHttpPost();
		$bRestoreSession = TRUE;
		$bSetupFilter = FALSE;

		// Reset extended filter if filter changed
		if ($bPostBack) {

			// Set/clear dropdown for field company_name
			if ($this->PopupName == 'Engaged_Clients_company_name' && $this->PopupValue <> "") {
				if ($this->PopupValue == EWR_INIT_VALUE)
					$this->company_name->DropDownValue = EWR_ALL_VALUE;
				else
					$this->company_name->DropDownValue = $this->PopupValue;
				$bRestoreSession = FALSE; // Do not restore
			} elseif ($this->ClearExtFilter == 'Engaged_Clients_company_name') {
				$this->SetSessionDropDownValue(EWR_INIT_VALUE, '', 'company_name');
			}

		// Reset search command
		} elseif (@$_GET["cmd"] == "reset") {

			// Load default values
			$this->SetSessionDropDownValue($this->company_name->DropDownValue, $this->company_name->SearchOperator, 'company_name'); // Field company_name

			//$bSetupFilter = TRUE; // No need to set up, just use default
		} else {
			$bRestoreSession = !$this->SearchCommand;

			// Field company_name
			if ($this->GetDropDownValue($this->company_name)) {
				$bSetupFilter = TRUE;
			} elseif ($this->company_name->DropDownValue <> EWR_INIT_VALUE && !isset($_SESSION['sv_Engaged_Clients_company_name'])) {
				$bSetupFilter = TRUE;
			}
			if (!$this->ValidateForm()) {
				$this->setFailureMessage($grFormError);
				return $sFilter;
			}
		}

		// Restore session
		if ($bRestoreSession) {
			$this->GetSessionDropDownValue($this->company_name); // Field company_name
		}

		// Call page filter validated event
		$this->Page_FilterValidated();

		// Build SQL
		$this->BuildDropDownFilter($this->company_name, $sFilter, $this->company_name->SearchOperator, FALSE, TRUE); // Field company_name

		// Save parms to session
		$this->SetSessionDropDownValue($this->company_name->DropDownValue, $this->company_name->SearchOperator, 'company_name'); // Field company_name

		// Setup filter
		if ($bSetupFilter) {

			// Field company_name
			$sWrk = "";
			$this->BuildDropDownFilter($this->company_name, $sWrk, $this->company_name->SearchOperator);
			ewr_LoadSelectionFromFilter($this->company_name, $sWrk, $this->company_name->SelectionList, $this->company_name->DropDownValue);
			$_SESSION['sel_Engaged_Clients_company_name'] = ($this->company_name->SelectionList == "") ? EWR_INIT_VALUE : $this->company_name->SelectionList;
		}

		// Field company_name
		ewr_LoadDropDownList($this->company_name->DropDownList, $this->company_name->DropDownValue);
		return $sFilter;
	}

	// Build dropdown filter
	function BuildDropDownFilter(&$fld, &$FilterClause, $FldOpr, $Default = FALSE, $SaveFilter = FALSE) {
		$FldVal = ($Default) ? $fld->DefaultDropDownValue : $fld->DropDownValue;
		$sSql = "";
		if (is_array($FldVal)) {
			foreach ($FldVal as $val) {
				$sWrk = $this->GetDropDownFilter($fld, $val, $FldOpr);

				// Call Page Filtering event
				if (substr($val, 0, 2) <> "@@")
					$this->Page_Filtering($fld, $sWrk, "dropdown", $FldOpr, $val);
				if ($sWrk <> "") {
					if ($sSql <> "")
						$sSql .= " OR " . $sWrk;
					else
						$sSql = $sWrk;
				}
			}
		} else {
			$sSql = $this->GetDropDownFilter($fld, $FldVal, $FldOpr);

			// Call Page Filtering event
			if (substr($FldVal, 0, 2) <> "@@")
				$this->Page_Filtering($fld, $sSql, "dropdown", $FldOpr, $FldVal);
		}
		if ($sSql <> "") {
			ewr_AddFilter($FilterClause, $sSql);
			if ($SaveFilter) $fld->CurrentFilter = $sSql;
		}
	}

	function GetDropDownFilter(&$fld, $FldVal, $FldOpr) {
		$FldName = $fld->FldName;
		$FldExpression = $fld->FldExpression;
		$FldDataType = $fld->FldDataType;
		$FldDelimiter = $fld->FldDelimiter;
		$FldVal = strval($FldVal);
		if ($FldOpr == "") $FldOpr = "=";
		$sWrk = "";
		if (ewr_SameStr($FldVal, EWR_NULL_VALUE)) {
			$sWrk = $FldExpression . " IS NULL";
		} elseif (ewr_SameStr($FldVal, EWR_NOT_NULL_VALUE)) {
			$sWrk = $FldExpression . " IS NOT NULL";
		} elseif (ewr_SameStr($FldVal, EWR_EMPTY_VALUE)) {
			$sWrk = $FldExpression . " = ''";
		} elseif (ewr_SameStr($FldVal, EWR_ALL_VALUE)) {
			$sWrk = "1 = 1";
		} else {
			if (substr($FldVal, 0, 2) == "@@") {
				$sWrk = $this->GetCustomFilter($fld, $FldVal, $this->DBID);
			} elseif ($FldDelimiter <> "" && trim($FldVal) <> "" && ($FldDataType == EWR_DATATYPE_STRING || $FldDataType == EWR_DATATYPE_MEMO)) {
				$sWrk = ewr_GetMultiSearchSql($FldExpression, trim($FldVal), $this->DBID);
			} else {
				if ($FldVal <> "" && $FldVal <> EWR_INIT_VALUE) {
					if ($FldDataType == EWR_DATATYPE_DATE && $FldOpr <> "") {
						$sWrk = ewr_DateFilterString($FldExpression, $FldOpr, $FldVal, $FldDataType, $this->DBID);
					} else {
						$sWrk = ewr_FilterString($FldOpr, $FldVal, $FldDataType, $this->DBID);
						if ($sWrk <> "") $sWrk = $FldExpression . $sWrk;
					}
				}
			}
		}
		return $sWrk;
	}

	// Get custom filter
	function GetCustomFilter(&$fld, $FldVal, $dbid = 0) {
		$sWrk = "";
		if (is_array($fld->AdvancedFilters)) {
			foreach ($fld->AdvancedFilters as $filter) {
				if ($filter->ID == $FldVal && $filter->Enabled) {
					$sFld = $fld->FldExpression;
					$sFn = $filter->FunctionName;
					$wrkid = (substr($filter->ID, 0, 2) == "@@") ? substr($filter->ID,2) : $filter->ID;
					if ($sFn <> "")
						$sWrk = $sFn($sFld, $dbid);
					else
						$sWrk = "";
					$this->Page_Filtering($fld, $sWrk, "custom", $wrkid);
					break;
				}
			}
		}
		return $sWrk;
	}

	// Build extended filter
	function BuildExtendedFilter(&$fld, &$FilterClause, $Default = FALSE, $SaveFilter = FALSE) {
		$sWrk = ewr_GetExtendedFilter($fld, $Default, $this->DBID);
		if (!$Default)
			$this->Page_Filtering($fld, $sWrk, "extended", $fld->SearchOperator, $fld->SearchValue, $fld->SearchCondition, $fld->SearchOperator2, $fld->SearchValue2);
		if ($sWrk <> "") {
			ewr_AddFilter($FilterClause, $sWrk);
			if ($SaveFilter) $fld->CurrentFilter = $sWrk;
		}
	}

	// Get drop down value from querystring
	function GetDropDownValue(&$fld) {
		$parm = substr($fld->FldVar, 2);
		if (ewr_IsHttpPost())
			return FALSE; // Skip post back
		if (isset($_GET["so_$parm"]))
			$fld->SearchOperator = @$_GET["so_$parm"];
		if (isset($_GET["sv_$parm"])) {
			$fld->DropDownValue = @$_GET["sv_$parm"];
			return TRUE;
		}
		return FALSE;
	}

	// Get filter values from querystring
	function GetFilterValues(&$fld) {
		$parm = substr($fld->FldVar, 2);
		if (ewr_IsHttpPost())
			return; // Skip post back
		$got = FALSE;
		if (isset($_GET["sv_$parm"])) {
			$fld->SearchValue = @$_GET["sv_$parm"];
			$got = TRUE;
		}
		if (isset($_GET["so_$parm"])) {
			$fld->SearchOperator = @$_GET["so_$parm"];
			$got = TRUE;
		}
		if (isset($_GET["sc_$parm"])) {
			$fld->SearchCondition = @$_GET["sc_$parm"];
			$got = TRUE;
		}
		if (isset($_GET["sv2_$parm"])) {
			$fld->SearchValue2 = @$_GET["sv2_$parm"];
			$got = TRUE;
		}
		if (isset($_GET["so2_$parm"])) {
			$fld->SearchOperator2 = $_GET["so2_$parm"];
			$got = TRUE;
		}
		return $got;
	}

	// Set default ext filter
	function SetDefaultExtFilter(&$fld, $so1, $sv1, $sc, $so2, $sv2) {
		$fld->DefaultSearchValue = $sv1; // Default ext filter value 1
		$fld->DefaultSearchValue2 = $sv2; // Default ext filter value 2 (if operator 2 is enabled)
		$fld->DefaultSearchOperator = $so1; // Default search operator 1
		$fld->DefaultSearchOperator2 = $so2; // Default search operator 2 (if operator 2 is enabled)
		$fld->DefaultSearchCondition = $sc; // Default search condition (if operator 2 is enabled)
	}

	// Apply default ext filter
	function ApplyDefaultExtFilter(&$fld) {
		$fld->SearchValue = $fld->DefaultSearchValue;
		$fld->SearchValue2 = $fld->DefaultSearchValue2;
		$fld->SearchOperator = $fld->DefaultSearchOperator;
		$fld->SearchOperator2 = $fld->DefaultSearchOperator2;
		$fld->SearchCondition = $fld->DefaultSearchCondition;
	}

	// Check if Text Filter applied
	function TextFilterApplied(&$fld) {
		return (strval($fld->SearchValue) <> strval($fld->DefaultSearchValue) ||
			strval($fld->SearchValue2) <> strval($fld->DefaultSearchValue2) ||
			(strval($fld->SearchValue) <> "" &&
				strval($fld->SearchOperator) <> strval($fld->DefaultSearchOperator)) ||
			(strval($fld->SearchValue2) <> "" &&
				strval($fld->SearchOperator2) <> strval($fld->DefaultSearchOperator2)) ||
			strval($fld->SearchCondition) <> strval($fld->DefaultSearchCondition));
	}

	// Check if Non-Text Filter applied
	function NonTextFilterApplied(&$fld) {
		if (is_array($fld->DropDownValue)) {
			if (is_array($fld->DefaultDropDownValue)) {
				if (count($fld->DefaultDropDownValue) <> count($fld->DropDownValue))
					return TRUE;
				else
					return (count(array_diff($fld->DefaultDropDownValue, $fld->DropDownValue)) <> 0);
			} else {
				return TRUE;
			}
		} else {
			if (is_array($fld->DefaultDropDownValue))
				return TRUE;
			else
				$v1 = strval($fld->DefaultDropDownValue);
			if ($v1 == EWR_INIT_VALUE)
				$v1 = "";
			$v2 = strval($fld->DropDownValue);
			if ($v2 == EWR_INIT_VALUE || $v2 == EWR_ALL_VALUE)
				$v2 = "";
			return ($v1 <> $v2);
		}
	}

	// Get dropdown value from session
	function GetSessionDropDownValue(&$fld) {
		$parm = substr($fld->FldVar, 2);
		$this->GetSessionValue($fld->DropDownValue, 'sv_Engaged_Clients_' . $parm);
		$this->GetSessionValue($fld->SearchOperator, 'so_Engaged_Clients_' . $parm);
	}

	// Get filter values from session
	function GetSessionFilterValues(&$fld) {
		$parm = substr($fld->FldVar, 2);
		$this->GetSessionValue($fld->SearchValue, 'sv_Engaged_Clients_' . $parm);
		$this->GetSessionValue($fld->SearchOperator, 'so_Engaged_Clients_' . $parm);
		$this->GetSessionValue($fld->SearchCondition, 'sc_Engaged_Clients_' . $parm);
		$this->GetSessionValue($fld->SearchValue2, 'sv2_Engaged_Clients_' . $parm);
		$this->GetSessionValue($fld->SearchOperator2, 'so2_Engaged_Clients_' . $parm);
	}

	// Get value from session
	function GetSessionValue(&$sv, $sn) {
		if (array_key_exists($sn, $_SESSION))
			$sv = $_SESSION[$sn];
	}

	// Set dropdown value to session
	function SetSessionDropDownValue($sv, $so, $parm) {
		$_SESSION['sv_Engaged_Clients_' . $parm] = $sv;
		$_SESSION['so_Engaged_Clients_' . $parm] = $so;
	}

	// Set filter values to session
	function SetSessionFilterValues($sv1, $so1, $sc, $sv2, $so2, $parm) {
		$_SESSION['sv_Engaged_Clients_' . $parm] = $sv1;
		$_SESSION['so_Engaged_Clients_' . $parm] = $so1;
		$_SESSION['sc_Engaged_Clients_' . $parm] = $sc;
		$_SESSION['sv2_Engaged_Clients_' . $parm] = $sv2;
		$_SESSION['so2_Engaged_Clients_' . $parm] = $so2;
	}

	// Check if has Session filter values
	function HasSessionFilterValues($parm) {
		return ((@$_SESSION['sv_' . $parm] <> "" && @$_SESSION['sv_' . $parm] <> EWR_INIT_VALUE) ||
			(@$_SESSION['sv_' . $parm] <> "" && @$_SESSION['sv_' . $parm] <> EWR_INIT_VALUE) ||
			(@$_SESSION['sv2_' . $parm] <> "" && @$_SESSION['sv2_' . $parm] <> EWR_INIT_VALUE));
	}

	// Dropdown filter exist
	function DropDownFilterExist(&$fld, $FldOpr) {
		$sWrk = "";
		$this->BuildDropDownFilter($fld, $sWrk, $FldOpr);
		return ($sWrk <> "");
	}

	// Extended filter exist
	function ExtendedFilterExist(&$fld) {
		$sExtWrk = "";
		$this->BuildExtendedFilter($fld, $sExtWrk);
		return ($sExtWrk <> "");
	}

	// Validate form
	function ValidateForm() {
		global $ReportLanguage, $grFormError;

		// Initialize form error message
		$grFormError = "";

		// Check if validation required
		if (!EWR_SERVER_VALIDATE)
			return ($grFormError == "");

		// Return validate result
		$ValidateForm = ($grFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$grFormError .= ($grFormError <> "") ? "<p>&nbsp;</p>" : "";
			$grFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Clear selection stored in session
	function ClearSessionSelection($parm) {
		$_SESSION["sel_Engaged_Clients_$parm"] = "";
		$_SESSION["rf_Engaged_Clients_$parm"] = "";
		$_SESSION["rt_Engaged_Clients_$parm"] = "";
	}

	// Load selection from session
	function LoadSelectionFromSession($parm) {
		$fld = &$this->FieldByParm($parm);
		$fld->SelectionList = @$_SESSION["sel_Engaged_Clients_$parm"];
		$fld->RangeFrom = @$_SESSION["rf_Engaged_Clients_$parm"];
		$fld->RangeTo = @$_SESSION["rt_Engaged_Clients_$parm"];
	}

	// Load default value for filters
	function LoadDefaultFilters() {
		/**
		* Set up default values for non Text filters
		*/

		// Field company_name
		$this->company_name->DefaultDropDownValue = EWR_INIT_VALUE;
		if (!$this->SearchCommand) $this->company_name->DropDownValue = $this->company_name->DefaultDropDownValue;
		$sWrk = "";
		$this->BuildDropDownFilter($this->company_name, $sWrk, $this->company_name->SearchOperator, TRUE);
		ewr_LoadSelectionFromFilter($this->company_name, $sWrk, $this->company_name->DefaultSelectionList);
		if (!$this->SearchCommand) $this->company_name->SelectionList = $this->company_name->DefaultSelectionList;
		/**
		* Set up default values for extended filters
		* function SetDefaultExtFilter(&$fld, $so1, $sv1, $sc, $so2, $sv2)
		* Parameters:
		* $fld - Field object
		* $so1 - Default search operator 1
		* $sv1 - Default ext filter value 1
		* $sc - Default search condition (if operator 2 is enabled)
		* $so2 - Default search operator 2 (if operator 2 is enabled)
		* $sv2 - Default ext filter value 2 (if operator 2 is enabled)
		*/
		/**
		* Set up default values for popup filters
		*/

		// Field company_name
		// $this->company_name->DefaultSelectionList = array("val1", "val2");

	}

	// Check if filter applied
	function CheckFilter() {

		// Check company_name extended filter
		if ($this->NonTextFilterApplied($this->company_name))
			return TRUE;

		// Check company_name popup filter
		if (!ewr_MatchedArray($this->company_name->DefaultSelectionList, $this->company_name->SelectionList))
			return TRUE;
		return FALSE;
	}

	// Show list of filters
	function ShowFilterList($showDate = FALSE) {
		global $ReportLanguage;

		// Initialize
		$sFilterList = "";

		// Field company_name
		$sExtWrk = "";
		$sWrk = "";
		$this->BuildDropDownFilter($this->company_name, $sExtWrk, $this->company_name->SearchOperator);
		if (is_array($this->company_name->SelectionList))
			$sWrk = ewr_JoinArray($this->company_name->SelectionList, ", ", EWR_DATATYPE_STRING, 0, $this->DBID);
		$sFilter = "";
		if ($sExtWrk <> "")
			$sFilter .= "<span class=\"ewFilterValue\">$sExtWrk</span>";
		elseif ($sWrk <> "")
			$sFilter .= "<span class=\"ewFilterValue\">$sWrk</span>";
		if ($sFilter <> "")
			$sFilterList .= "<div><span class=\"ewFilterCaption\">" . $this->company_name->FldCaption() . "</span>" . $sFilter . "</div>";
		$divstyle = "";
		$divdataclass = "";

		// Show Filters
		if ($sFilterList <> "" || $showDate) {
			$sMessage = "<div" . $divstyle . $divdataclass . "><div id=\"ewrFilterList\" class=\"alert alert-info\">";
			if ($showDate)
				$sMessage .= "<div id=\"ewrCurrentDate\">" . $ReportLanguage->Phrase("ReportGeneratedDate") . ewr_FormatDateTime(date("Y-m-d H:i:s"), 1) . "</div>";
			if ($sFilterList <> "")
				$sMessage .= "<div id=\"ewrCurrentFilters\">" . $ReportLanguage->Phrase("CurrentFilters") . "</div>" . $sFilterList;
			$sMessage .= "</div></div>";
			$this->Message_Showing($sMessage, "");
			echo $sMessage;
		}
	}

	// Get list of filters
	function GetFilterList() {

		// Initialize
		$sFilterList = "";

		// Field company_name
		$sWrk = "";
		$sWrk = ($this->company_name->DropDownValue <> EWR_INIT_VALUE) ? $this->company_name->DropDownValue : "";
		if (is_array($sWrk))
			$sWrk = implode("||", $sWrk);
		if ($sWrk <> "")
			$sWrk = "\"sv_company_name\":\"" . ewr_JsEncode2($sWrk) . "\"";
		if ($sWrk == "") {
			$sWrk = ($this->company_name->SelectionList <> EWR_INIT_VALUE) ? $this->company_name->SelectionList : "";
			if (is_array($sWrk))
				$sWrk = implode("||", $sWrk);
			if ($sWrk <> "")
				$sWrk = "\"sel_company_name\":\"" . ewr_JsEncode2($sWrk) . "\"";
		}
		if ($sWrk <> "") {
			if ($sFilterList <> "") $sFilterList .= ",";
			$sFilterList .= $sWrk;
		}

		// Return filter list in json
		if ($sFilterList <> "")
			return "{" . $sFilterList . "}";
		else
			return "null";
	}

	// Restore list of filters
	function RestoreFilterList() {

		// Return if not reset filter
		if (@$_POST["cmd"] <> "resetfilter")
			return FALSE;
		$filter = json_decode(@$_POST["filter"], TRUE);
		return $this->SetupFilterList($filter);
	}

	// Setup list of filters
	function SetupFilterList($filter) {
		if (!is_array($filter))
			return FALSE;

		// Field company_name
		$bRestoreFilter = FALSE;
		if (array_key_exists("sv_company_name", $filter)) {
			$sWrk = $filter["sv_company_name"];
			if (strpos($sWrk, "||") !== FALSE)
				$sWrk = explode("||", $sWrk);
			$this->SetSessionDropDownValue($sWrk, @$filter["so_company_name"], "company_name");
			$bRestoreFilter = TRUE;
		}
		if (array_key_exists("sel_company_name", $filter)) {
			$sWrk = $filter["sel_company_name"];
			$sWrk = explode("||", $sWrk);
			$this->company_name->SelectionList = $sWrk;
			$_SESSION["sel_Engaged_Clients_company_name"] = $sWrk;
			$this->SetSessionDropDownValue(EWR_INIT_VALUE, "", "company_name"); // Clear drop down
			$bRestoreFilter = TRUE;
		}
		if (!$bRestoreFilter) { // Clear filter
			$this->SetSessionDropDownValue(EWR_INIT_VALUE, "", "company_name");
			$this->company_name->SelectionList = "";
			$_SESSION["sel_Engaged_Clients_company_name"] = "";
		}
		return TRUE;
	}

	// Return popup filter
	function GetPopupFilter() {
		$sWrk = "";
		if ($this->DrillDown)
			return "";
		if (!$this->DropDownFilterExist($this->company_name, $this->company_name->SearchOperator)) {
			if (is_array($this->company_name->SelectionList)) {
				$sFilter = ewr_FilterSql($this->company_name, "clients.company_name", EWR_DATATYPE_STRING, $this->DBID);

				// Call Page Filtering event
				$this->Page_Filtering($this->company_name, $sFilter, "popup");
				$this->company_name->CurrentFilter = $sFilter;
				ewr_AddFilter($sWrk, $sFilter);
			}
		}
		return $sWrk;
	}

	// Get sort parameters based on sort links clicked
	function GetSort($options = array()) {
		if ($this->DrillDown)
			return "";
		$bResetSort = @$options["resetsort"] == "1" || @$_GET["cmd"] == "resetsort";
		$orderBy = (@$options["order"] <> "") ? @$options["order"] : @$_GET["order"];
		$orderType = (@$options["ordertype"] <> "") ? @$options["ordertype"] : @$_GET["ordertype"];

		// Check for a resetsort command
		if ($bResetSort) {
			$this->setOrderBy("");
			$this->setStartGroup(1);
			$this->company_name->setSort("");
			$this->company_reg_number->setSort("");
			$this->date_resigned->setSort("");
			$this->engagement_date->setSort("");
			$this->service_type->setSort("");
			$this->first_engagement_date->setSort("");
			$this->client_turnover->setSort("");
			$this->accounting_framework->setSort("");
			$this->when_next_irba->setSort("");
			$this->year_of_afs->setSort("");
			$this->jse_listed->setSort("");
			$this->amount_billed->setSort("");
			$this->isqc_2->setSort("");
			$this->isqc_1->setSort("");
			$this->irba_code->setSort("");
			$this->companies_act->setSort("");
			$this->group_structure->setSort("");
			$this->anticipated_rotation_partner->setSort("");
			$this->rotation_year->setSort("");
			$this->rotation_period->setSort("");
			$this->city->setSort("");
			$this->engagement_id->setSort("");

		// Check for an Order parameter
		} elseif ($orderBy <> "") {
			$this->CurrentOrder = $orderBy;
			$this->CurrentOrderType = $orderType;
			$sSortSql = $this->SortSql();
			$this->setOrderBy($sSortSql);
			$this->setStartGroup(1);
		}
		return $this->getOrderBy();
	}

	// Export email
	function ExportEmail($EmailContent, $options = array()) {
		global $grTmpImages, $ReportLanguage;
		$bGenRequest = @$options["reporttype"] == "email";
		$sFailRespPfx = $bGenRequest ? "" : "<p class=\"text-error\">";
		$sSuccessRespPfx = $bGenRequest ? "" : "<p class=\"text-success\">";
		$sRespPfx = $bGenRequest ? "" : "</p>";
		$sContentType = (@$options["contenttype"] <> "") ? $options["contenttype"] : @$_POST["contenttype"];
		$sSender = (@$options["sender"] <> "") ? $options["sender"] : @$_POST["sender"];
		$sRecipient = (@$options["recipient"] <> "") ? $options["recipient"] : @$_POST["recipient"];
		$sCc = (@$options["cc"] <> "") ? $options["cc"] : @$_POST["cc"];
		$sBcc = (@$options["bcc"] <> "") ? $options["bcc"] : @$_POST["bcc"];

		// Subject
		$sEmailSubject = (@$options["subject"] <> "") ? $options["subject"] : @$_POST["subject"];

		// Message
		$sEmailMessage = (@$options["message"] <> "") ? $options["message"] : @$_POST["message"];

		// Check sender
		if ($sSender == "")
			return $sFailRespPfx . $ReportLanguage->Phrase("EnterSenderEmail") . $sRespPfx;
		if (!ewr_CheckEmail($sSender))
			return $sFailRespPfx . $ReportLanguage->Phrase("EnterProperSenderEmail") . $sRespPfx;

		// Check recipient
		if (!ewr_CheckEmailList($sRecipient, EWR_MAX_EMAIL_RECIPIENT))
			return $sFailRespPfx . $ReportLanguage->Phrase("EnterProperRecipientEmail") . $sRespPfx;

		// Check cc
		if (!ewr_CheckEmailList($sCc, EWR_MAX_EMAIL_RECIPIENT))
			return $sFailRespPfx . $ReportLanguage->Phrase("EnterProperCcEmail") . $sRespPfx;

		// Check bcc
		if (!ewr_CheckEmailList($sBcc, EWR_MAX_EMAIL_RECIPIENT))
			return $sFailRespPfx . $ReportLanguage->Phrase("EnterProperBccEmail") . $sRespPfx;

		// Check email sent count
		$emailcount = $bGenRequest ? 0 : ewr_LoadEmailCount();
		if (intval($emailcount) >= EWR_MAX_EMAIL_SENT_COUNT)
			return $sFailRespPfx . $ReportLanguage->Phrase("ExceedMaxEmailExport") . $sRespPfx;
		if ($sEmailMessage <> "") {
			if (EWR_REMOVE_XSS) $sEmailMessage = ewr_RemoveXSS($sEmailMessage);
			$sEmailMessage .= ($sContentType == "url") ? "\r\n\r\n" : "<br><br>";
		}
		$sAttachmentContent = ewr_AdjustEmailContent($EmailContent);
		$sAppPath = ewr_FullUrl();
		$sAppPath = substr($sAppPath, 0, strrpos($sAppPath, "/")+1);
		if (strpos($sAttachmentContent, "<head>") !== FALSE)
			$sAttachmentContent = str_replace("<head>", "<head><base href=\"" . $sAppPath . "\">", $sAttachmentContent); // Add <base href> statement inside the header
		else
			$sAttachmentContent = "<base href=\"" . $sAppPath . "\">" . $sAttachmentContent; // Add <base href> statement as the first statement

		//$sAttachmentFile = $this->TableVar . "_" . Date("YmdHis") . ".html";
		$sAttachmentFile = $this->TableVar . "_" . Date("YmdHis") . "_" . ewr_Random() . ".html";
		if ($sContentType == "url") {
			ewr_SaveFile(EWR_UPLOAD_DEST_PATH, $sAttachmentFile, $sAttachmentContent);
			$sAttachmentFile = EWR_UPLOAD_DEST_PATH . $sAttachmentFile;
			$sUrl = $sAppPath . $sAttachmentFile;
			$sEmailMessage .= $sUrl; // Send URL only
			$sAttachmentFile = "";
			$sAttachmentContent = "";
		} else {
			$sEmailMessage .= $sAttachmentContent;
			$sAttachmentFile = "";
			$sAttachmentContent = "";
		}

		// Send email
		$Email = new crEmail();
		$Email->Sender = $sSender; // Sender
		$Email->Recipient = $sRecipient; // Recipient
		$Email->Cc = $sCc; // Cc
		$Email->Bcc = $sBcc; // Bcc
		$Email->Subject = $sEmailSubject; // Subject
		$Email->Content = $sEmailMessage; // Content
		if ($sAttachmentFile <> "")
			$Email->AddAttachment($sAttachmentFile, $sAttachmentContent);
		if ($sContentType <> "url") {
			foreach ($grTmpImages as $tmpimage)
				$Email->AddEmbeddedImage($tmpimage);
		}
		$Email->Format = ($sContentType == "url") ? "text" : "html";
		$Email->Charset = EWR_EMAIL_CHARSET;
		$EventArgs = array();
		$bEmailSent = FALSE;
		if ($this->Email_Sending($Email, $EventArgs))
			$bEmailSent = $Email->Send();
		ewr_DeleteTmpImages($EmailContent);

		// Check email sent status
		if ($bEmailSent) {

			// Update email sent count and write log
			ewr_AddEmailLog($sSender, $sRecipient, $sEmailSubject, $sEmailMessage);

			// Sent email success
			return $sSuccessRespPfx . $ReportLanguage->Phrase("SendEmailSuccess") . $sRespPfx; // Set up success message
		} else {

			// Sent email failure
			return $sFailRespPfx . $Email->SendErrDescription . $sRespPfx;
		}
	}

	// Export to EXCEL
	function ExportExcel($html, $options = array()) {
		global $gsExportFile;
		$folder = @$options["folder"];
		$fileName = @$options["filename"];
		$responseType = @$options["responsetype"];
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && EWR_REPORT_SAVE_OUTPUT_ON_SERVER)) {
		 	ewr_SaveFile(ewr_PathCombine(ewr_AppRoot(), $folder, TRUE), $fileName, $html);
			$saveToFile = ewr_UploadPathEx(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			header('Set-Cookie: fileDownload=true; path=/');
			header('Content-Type: application/vnd.ms-excel' . (EWR_CHARSET <> '' ? ';charset=' . EWR_CHARSET : ''));
			header('Content-Disposition: attachment; filename=' . $gsExportFile . '.xls');
			echo $html;
		}
		return $saveToFile;
	}

	// Export PDF
	function ExportPdf($html, $options = array()) {
		global $gsExportFile;
		@ini_set("memory_limit", EWR_PDF_MEMORY_LIMIT);
		set_time_limit(EWR_PDF_TIME_LIMIT);
		if (EWR_DEBUG_ENABLED) // Add debug message
			$html = str_replace("</body>", ewr_DebugMsg() . "</body>", $html);
		$dompdf = new \Dompdf\Dompdf(array("pdf_backend" => "Cpdf"));
		$doc = new DOMDocument();
		@$doc->loadHTML('<?xml encoding="uft-8">' . ewr_ConvertToUtf8($html)); // Convert to utf-8
		$spans = $doc->getElementsByTagName("span");
		foreach ($spans as $span) {
			if ($span->getAttribute("class") == "ewFilterCaption")
				$span->parentNode->insertBefore($doc->createElement("span", ":&nbsp;"), $span->nextSibling);
		}
		$images = $doc->getElementsByTagName("img");
		$pageSize = "a4";
		$pageOrientation = "portrait";
		foreach ($images as $image) {
			$imagefn = $image->getAttribute("src");
			if (file_exists($imagefn)) {
				$imagefn = realpath($imagefn);
				$size = getimagesize($imagefn); // Get image size
				if ($size[0] <> 0) {
					if (ewr_SameText($pageSize, "letter")) { // Letter paper (8.5 in. by 11 in.)
						$w = ewr_SameText($pageOrientation, "portrait") ? 216 : 279;
					} elseif (ewr_SameText($pageSize, "legal")) { // Legal paper (8.5 in. by 14 in.)
						$w = ewr_SameText($pageOrientation, "portrait") ? 216 : 356;
					} else {
						$w = ewr_SameText($pageOrientation, "portrait") ? 210 : 297; // A4 paper (210 mm by 297 mm)
					}
					$w = min($size[0], ($w - 20 * 2) / 25.4 * 72); // Resize image, adjust the multiplying factor if necessary
					$h = $w / $size[0] * $size[1];
					$image->setAttribute("width", $w);
					$image->setAttribute("height", $h);
				}
			}
		}
		$html = $doc->saveHTML();
		$html = ewr_ConvertFromUtf8($html);
		$dompdf->load_html($html);
		$dompdf->set_paper($pageSize, $pageOrientation);
		$dompdf->render();
		$folder = @$options["folder"];
		$fileName = @$options["filename"];
		$responseType = @$options["responsetype"];
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && EWR_REPORT_SAVE_OUTPUT_ON_SERVER)) {
			ewr_SaveFile(ewr_PathCombine(ewr_AppRoot(), $folder, TRUE), $fileName, $dompdf->output());
			$saveToFile = ewr_UploadPathEx(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			header('Set-Cookie: fileDownload=true; path=/');
			$sExportFile = strtolower(substr($gsExportFile, -4)) == ".pdf" ? $gsExportFile : $gsExportFile . ".pdf";
			$dompdf->stream($sExportFile, array("Attachment" => 1)); // 0 to open in browser, 1 to download
		}
		ewr_DeleteTmpImages($html);
		return $saveToFile;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
<?php

// Create page object
if (!isset($Engaged_Clients_rpt)) $Engaged_Clients_rpt = new crEngaged_Clients_rpt();
if (isset($Page)) $OldPage = $Page;
$Page = &$Engaged_Clients_rpt;

// Page init
$Page->Page_Init();

// Page main
$Page->Page_Main();
if (!$Page->ShowReportInDashboard)
	ewr_Header(FALSE);

// Global Page Rendering event (in ewrusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$Page->ShowReportInDashboard) { ?>
<?php include_once "phprptinc/header.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print" || $Page->Export == "email" && @$gsEmailContentType == "url") { ?>
<script type="text/javascript">

// Create page object
var Engaged_Clients_rpt = new ewr_Page("Engaged_Clients_rpt");

// Page properties
Engaged_Clients_rpt.PageID = "rpt"; // Page ID
var EWR_PAGE_ID = Engaged_Clients_rpt.PageID;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$Page->ShowReportInDashboard) { ?>
<script type="text/javascript">

// Form object
var CurrentForm = fEngaged_Clientsrpt = new ewr_Form("fEngaged_Clientsrpt");

// Validate method
fEngaged_Clientsrpt.Validate = function() {
	if (!this.ValidateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.GetForm(), $fobj = $(fobj);

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fEngaged_Clientsrpt.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
<?php if (EWR_CLIENT_VALIDATE) { ?>
fEngaged_Clientsrpt.ValidateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fEngaged_Clientsrpt.ValidateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fEngaged_Clientsrpt.Lists["sv_company_name"] = {"LinkField":"sv_company_name","Ajax":true,"DisplayFields":["sv_company_name","","",""],"ParentFields":[],"FilterFields":[],"Options":[],"Template":""};
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$Page->ShowReportInDashboard) { ?>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$Page->ShowReportInDashboard) { ?>
<!-- Content Container -->
<div id="ewContainer" class="container-fluid ewContainer">
<?php } ?>
<?php if (@$Page->GenOptions["showfilter"] == "1") { ?>
<?php $Page->ShowFilterList(TRUE) ?>
<?php } ?>
<div class="ewToolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->Render("body");
	$Page->SearchOptions->Render("body");
	$Page->FilterOptions->Render("body");
	$Page->GenerateOptions->Render("body");
}
?>
</div>
<?php $Page->ShowPageHeader(); ?>
<?php $Page->ShowMessage(); ?>
<?php if ($Page->Export == "" && !$Page->ShowReportInDashboard) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->ShowReportInDashboard) { ?>
<!-- Center Container - Report -->
<div id="ewCenter" class="col-sm-12 ewCenter">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$Page->ShowReportInDashboard) { ?>
<!-- Search form (begin) -->
<form name="fEngaged_Clientsrpt" id="fEngaged_Clientsrpt" class="form-inline ewForm ewExtFilterForm" action="<?php echo ewr_CurrentPage() ?>">
<?php $SearchPanelClass = ($Page->Filter <> "") ? " in" : " in"; ?>
<div id="fEngaged_Clientsrpt_SearchPanel" class="ewSearchPanel collapse<?php echo $SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ewRow">
<div id="c_company_name" class="ewCell form-group">
	<label for="sv_company_name" class="ewSearchCaption ewLabel"><?php echo $Page->company_name->FldCaption() ?></label>
	<span class="ewSearchField">
<?php $Page->company_name->EditAttrs["onchange"] = "ewrForms(this).Submit(); " . @$Page->company_name->EditAttrs["onchange"]; ?>
<?php ewr_PrependClass($Page->company_name->EditAttrs["class"], "form-control"); ?>
<select data-table="Engaged_Clients" data-field="x_company_name" data-value-separator="<?php echo ewr_HtmlEncode(is_array($Page->company_name->DisplayValueSeparator) ? json_encode($Page->company_name->DisplayValueSeparator) : $Page->company_name->DisplayValueSeparator) ?>" id="sv_company_name" name="sv_company_name"<?php echo $Page->company_name->EditAttributes() ?>>
<option value=""><?php echo $ReportLanguage->Phrase("PleaseSelect") ?></option>
<?php
	$cntf = is_array($Page->company_name->AdvancedFilters) ? count($Page->company_name->AdvancedFilters) : 0;
	$cntd = is_array($Page->company_name->DropDownList) ? count($Page->company_name->DropDownList) : 0;
	$totcnt = $cntf + $cntd;
	$wrkcnt = 0;
	if ($cntf > 0) {
		foreach ($Page->company_name->AdvancedFilters as $filter) {
			if ($filter->Enabled) {
				$selwrk = ewr_MatchedFilterValue($Page->company_name->DropDownValue, $filter->ID) ? " selected" : "";
?>
<option value="<?php echo $filter->ID ?>"<?php echo $selwrk ?>><?php echo $filter->Name ?></option>
<?php
				$wrkcnt += 1;
			}
		}
	}
	for ($i = 0; $i < $cntd; $i++) {
		$selwrk = " selected";
?>
<option value="<?php echo $Page->company_name->DropDownList[$i] ?>"<?php echo $selwrk ?>><?php echo ewr_DropDownDisplayValue($Page->company_name->DropDownList[$i], "", 0) ?></option>
<?php
		$wrkcnt += 1;
	}
?>
</select>
<input type="hidden" name="s_sv_company_name" id="s_sv_company_name" value="<?php echo $Page->company_name->LookupFilterQuery() ?>">
<script type="text/javascript">
fEngaged_Clientsrpt.Lists["sv_company_name"].Options = <?php echo ewr_ArrayToJson($Page->company_name->LookupFilterOptions) ?>;
</script>
</span>
</div>
</div>
</div>
</form>
<script type="text/javascript">
fEngaged_Clientsrpt.Init();
fEngaged_Clientsrpt.FilterList = <?php echo $Page->GetFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->ShowFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGrp = $Page->TotalGrps;
} else {
	$Page->StopGrp = $Page->StartGrp + $Page->DisplayGrps - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGrp) > intval($Page->TotalGrps))
	$Page->StopGrp = $Page->TotalGrps;
$Page->RecCount = 0;
$Page->RecIndex = 0;

// Get first row
if ($Page->TotalGrps > 0) {
	$Page->GetRow(1);
	$Page->GrpCount = 1;
}
$Page->GrpIdx = ewr_InitArray(2, -1);
$Page->GrpIdx[0] = -1;
$Page->GrpIdx[1] = $Page->StopGrp - $Page->StartGrp + 1;
while ($rs && !$rs->EOF && $Page->GrpCount <= $Page->DisplayGrps || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ewGrid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="box ewBox ewGrid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_Engaged_Clients" class="<?php if (ewr_IsResponsiveLayout()) { echo "table-responsive "; } ?>ewGridMiddlePanel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($Page->company_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="company_name"><div class="Engaged_Clients_company_name"><span class="ewTableHeaderCaption"><?php echo $Page->company_name->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="company_name">
<?php if ($Page->SortUrl($Page->company_name) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_company_name">
			<span class="ewTableHeaderCaption"><?php echo $Page->company_name->FldCaption() ?></span>
	<?php if (!$Page->ShowReportInDashboard) { ?>
			<a class="ewTableHeaderPopup" title="<?php echo $ReportLanguage->Phrase("Filter"); ?>" onclick="ewr_ShowPopup.call(this, event, { name: 'Engaged_Clients_company_name', range: false, from: '<?php echo $Page->company_name->RangeFrom; ?>', to: '<?php echo $Page->company_name->RangeTo; ?>', url: 'Engaged_Clientsrpt.php' });" id="x_company_name<?php echo $Page->Cnt[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_company_name" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->company_name) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->company_name->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->company_name->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->company_name->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
	<?php if (!$Page->ShowReportInDashboard) { ?>
			<a class="ewTableHeaderPopup" title="<?php echo $ReportLanguage->Phrase("Filter"); ?>" onclick="ewr_ShowPopup.call(this, event, { name: 'Engaged_Clients_company_name', range: false, from: '<?php echo $Page->company_name->RangeFrom; ?>', to: '<?php echo $Page->company_name->RangeTo; ?>', url: 'Engaged_Clientsrpt.php' });" id="x_company_name<?php echo $Page->Cnt[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->company_reg_number->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="company_reg_number"><div class="Engaged_Clients_company_reg_number"><span class="ewTableHeaderCaption"><?php echo $Page->company_reg_number->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="company_reg_number">
<?php if ($Page->SortUrl($Page->company_reg_number) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_company_reg_number">
			<span class="ewTableHeaderCaption"><?php echo $Page->company_reg_number->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_company_reg_number" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->company_reg_number) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->company_reg_number->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->company_reg_number->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->company_reg_number->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->date_resigned->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="date_resigned"><div class="Engaged_Clients_date_resigned"><span class="ewTableHeaderCaption"><?php echo $Page->date_resigned->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="date_resigned">
<?php if ($Page->SortUrl($Page->date_resigned) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_date_resigned">
			<span class="ewTableHeaderCaption"><?php echo $Page->date_resigned->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_date_resigned" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->date_resigned) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->date_resigned->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->date_resigned->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->date_resigned->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->engagement_date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="engagement_date"><div class="Engaged_Clients_engagement_date"><span class="ewTableHeaderCaption"><?php echo $Page->engagement_date->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="engagement_date">
<?php if ($Page->SortUrl($Page->engagement_date) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_engagement_date">
			<span class="ewTableHeaderCaption"><?php echo $Page->engagement_date->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_engagement_date" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->engagement_date) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->engagement_date->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->engagement_date->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->engagement_date->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->service_type->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="service_type"><div class="Engaged_Clients_service_type"><span class="ewTableHeaderCaption"><?php echo $Page->service_type->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="service_type">
<?php if ($Page->SortUrl($Page->service_type) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_service_type">
			<span class="ewTableHeaderCaption"><?php echo $Page->service_type->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_service_type" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->service_type) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->service_type->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->service_type->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->service_type->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->first_engagement_date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="first_engagement_date"><div class="Engaged_Clients_first_engagement_date"><span class="ewTableHeaderCaption"><?php echo $Page->first_engagement_date->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="first_engagement_date">
<?php if ($Page->SortUrl($Page->first_engagement_date) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_first_engagement_date">
			<span class="ewTableHeaderCaption"><?php echo $Page->first_engagement_date->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_first_engagement_date" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->first_engagement_date) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->first_engagement_date->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->first_engagement_date->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->first_engagement_date->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->client_turnover->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="client_turnover"><div class="Engaged_Clients_client_turnover"><span class="ewTableHeaderCaption"><?php echo $Page->client_turnover->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="client_turnover">
<?php if ($Page->SortUrl($Page->client_turnover) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_client_turnover">
			<span class="ewTableHeaderCaption"><?php echo $Page->client_turnover->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_client_turnover" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->client_turnover) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->client_turnover->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->client_turnover->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->client_turnover->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->accounting_framework->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="accounting_framework"><div class="Engaged_Clients_accounting_framework"><span class="ewTableHeaderCaption"><?php echo $Page->accounting_framework->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="accounting_framework">
<?php if ($Page->SortUrl($Page->accounting_framework) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_accounting_framework">
			<span class="ewTableHeaderCaption"><?php echo $Page->accounting_framework->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_accounting_framework" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->accounting_framework) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->accounting_framework->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->accounting_framework->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->accounting_framework->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->when_next_irba->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="when_next_irba"><div class="Engaged_Clients_when_next_irba"><span class="ewTableHeaderCaption"><?php echo $Page->when_next_irba->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="when_next_irba">
<?php if ($Page->SortUrl($Page->when_next_irba) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_when_next_irba">
			<span class="ewTableHeaderCaption"><?php echo $Page->when_next_irba->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_when_next_irba" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->when_next_irba) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->when_next_irba->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->when_next_irba->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->when_next_irba->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->year_of_afs->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="year_of_afs"><div class="Engaged_Clients_year_of_afs"><span class="ewTableHeaderCaption"><?php echo $Page->year_of_afs->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="year_of_afs">
<?php if ($Page->SortUrl($Page->year_of_afs) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_year_of_afs">
			<span class="ewTableHeaderCaption"><?php echo $Page->year_of_afs->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_year_of_afs" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->year_of_afs) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->year_of_afs->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->year_of_afs->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->year_of_afs->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->jse_listed->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="jse_listed"><div class="Engaged_Clients_jse_listed"><span class="ewTableHeaderCaption"><?php echo $Page->jse_listed->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="jse_listed">
<?php if ($Page->SortUrl($Page->jse_listed) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_jse_listed">
			<span class="ewTableHeaderCaption"><?php echo $Page->jse_listed->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_jse_listed" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->jse_listed) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->jse_listed->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->jse_listed->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->jse_listed->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->amount_billed->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="amount_billed"><div class="Engaged_Clients_amount_billed"><span class="ewTableHeaderCaption"><?php echo $Page->amount_billed->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="amount_billed">
<?php if ($Page->SortUrl($Page->amount_billed) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_amount_billed">
			<span class="ewTableHeaderCaption"><?php echo $Page->amount_billed->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_amount_billed" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->amount_billed) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->amount_billed->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->amount_billed->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->amount_billed->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->isqc_2->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="isqc_2"><div class="Engaged_Clients_isqc_2"><span class="ewTableHeaderCaption"><?php echo $Page->isqc_2->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="isqc_2">
<?php if ($Page->SortUrl($Page->isqc_2) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_isqc_2">
			<span class="ewTableHeaderCaption"><?php echo $Page->isqc_2->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_isqc_2" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->isqc_2) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->isqc_2->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->isqc_2->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->isqc_2->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->isqc_1->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="isqc_1"><div class="Engaged_Clients_isqc_1"><span class="ewTableHeaderCaption"><?php echo $Page->isqc_1->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="isqc_1">
<?php if ($Page->SortUrl($Page->isqc_1) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_isqc_1">
			<span class="ewTableHeaderCaption"><?php echo $Page->isqc_1->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_isqc_1" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->isqc_1) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->isqc_1->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->isqc_1->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->isqc_1->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->irba_code->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="irba_code"><div class="Engaged_Clients_irba_code"><span class="ewTableHeaderCaption"><?php echo $Page->irba_code->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="irba_code">
<?php if ($Page->SortUrl($Page->irba_code) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_irba_code">
			<span class="ewTableHeaderCaption"><?php echo $Page->irba_code->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_irba_code" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->irba_code) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->irba_code->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->irba_code->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->irba_code->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->companies_act->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="companies_act"><div class="Engaged_Clients_companies_act"><span class="ewTableHeaderCaption"><?php echo $Page->companies_act->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="companies_act">
<?php if ($Page->SortUrl($Page->companies_act) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_companies_act">
			<span class="ewTableHeaderCaption"><?php echo $Page->companies_act->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_companies_act" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->companies_act) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->companies_act->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->companies_act->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->companies_act->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->group_structure->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="group_structure"><div class="Engaged_Clients_group_structure"><span class="ewTableHeaderCaption"><?php echo $Page->group_structure->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="group_structure">
<?php if ($Page->SortUrl($Page->group_structure) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_group_structure">
			<span class="ewTableHeaderCaption"><?php echo $Page->group_structure->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_group_structure" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->group_structure) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->group_structure->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->group_structure->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->group_structure->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->anticipated_rotation_partner->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="anticipated_rotation_partner"><div class="Engaged_Clients_anticipated_rotation_partner"><span class="ewTableHeaderCaption"><?php echo $Page->anticipated_rotation_partner->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="anticipated_rotation_partner">
<?php if ($Page->SortUrl($Page->anticipated_rotation_partner) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_anticipated_rotation_partner">
			<span class="ewTableHeaderCaption"><?php echo $Page->anticipated_rotation_partner->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_anticipated_rotation_partner" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->anticipated_rotation_partner) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->anticipated_rotation_partner->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->anticipated_rotation_partner->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->anticipated_rotation_partner->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->rotation_year->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="rotation_year"><div class="Engaged_Clients_rotation_year"><span class="ewTableHeaderCaption"><?php echo $Page->rotation_year->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="rotation_year">
<?php if ($Page->SortUrl($Page->rotation_year) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_rotation_year">
			<span class="ewTableHeaderCaption"><?php echo $Page->rotation_year->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_rotation_year" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->rotation_year) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->rotation_year->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->rotation_year->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->rotation_year->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->rotation_period->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="rotation_period"><div class="Engaged_Clients_rotation_period"><span class="ewTableHeaderCaption"><?php echo $Page->rotation_period->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="rotation_period">
<?php if ($Page->SortUrl($Page->rotation_period) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_rotation_period">
			<span class="ewTableHeaderCaption"><?php echo $Page->rotation_period->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_rotation_period" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->rotation_period) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->rotation_period->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->rotation_period->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->rotation_period->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->city->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="city"><div class="Engaged_Clients_city"><span class="ewTableHeaderCaption"><?php echo $Page->city->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="city">
<?php if ($Page->SortUrl($Page->city) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_city">
			<span class="ewTableHeaderCaption"><?php echo $Page->city->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_city" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->city) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->city->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->city->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->city->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->engagement_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="engagement_id"><div class="Engaged_Clients_engagement_id"><span class="ewTableHeaderCaption"><?php echo $Page->engagement_id->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="engagement_id">
<?php if ($Page->SortUrl($Page->engagement_id) == "") { ?>
		<div class="ewTableHeaderBtn Engaged_Clients_engagement_id">
			<span class="ewTableHeaderCaption"><?php echo $Page->engagement_id->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer Engaged_Clients_engagement_id" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->engagement_id) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->engagement_id->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->engagement_id->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->engagement_id->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGrps == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecCount++;
	$Page->RecIndex++;
?>
<?php

		// Render detail row
		$Page->ResetAttrs();
		$Page->RowType = EWR_ROWTYPE_DETAIL;
		$Page->RenderRow();
?>
	<tr<?php echo $Page->RowAttributes(); ?>>
<?php if ($Page->company_name->Visible) { ?>
		<td data-field="company_name"<?php echo $Page->company_name->CellAttributes() ?>>
<span<?php echo $Page->company_name->ViewAttributes() ?>><?php echo $Page->company_name->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->company_reg_number->Visible) { ?>
		<td data-field="company_reg_number"<?php echo $Page->company_reg_number->CellAttributes() ?>>
<span<?php echo $Page->company_reg_number->ViewAttributes() ?>><?php echo $Page->company_reg_number->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->date_resigned->Visible) { ?>
		<td data-field="date_resigned"<?php echo $Page->date_resigned->CellAttributes() ?>>
<span<?php echo $Page->date_resigned->ViewAttributes() ?>><?php echo $Page->date_resigned->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->engagement_date->Visible) { ?>
		<td data-field="engagement_date"<?php echo $Page->engagement_date->CellAttributes() ?>>
<span<?php echo $Page->engagement_date->ViewAttributes() ?>><?php echo $Page->engagement_date->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->service_type->Visible) { ?>
		<td data-field="service_type"<?php echo $Page->service_type->CellAttributes() ?>>
<span<?php echo $Page->service_type->ViewAttributes() ?>><?php echo $Page->service_type->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->first_engagement_date->Visible) { ?>
		<td data-field="first_engagement_date"<?php echo $Page->first_engagement_date->CellAttributes() ?>>
<span<?php echo $Page->first_engagement_date->ViewAttributes() ?>><?php echo $Page->first_engagement_date->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->client_turnover->Visible) { ?>
		<td data-field="client_turnover"<?php echo $Page->client_turnover->CellAttributes() ?>>
<span<?php echo $Page->client_turnover->ViewAttributes() ?>><?php echo $Page->client_turnover->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->accounting_framework->Visible) { ?>
		<td data-field="accounting_framework"<?php echo $Page->accounting_framework->CellAttributes() ?>>
<span<?php echo $Page->accounting_framework->ViewAttributes() ?>><?php echo $Page->accounting_framework->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->when_next_irba->Visible) { ?>
		<td data-field="when_next_irba"<?php echo $Page->when_next_irba->CellAttributes() ?>>
<span<?php echo $Page->when_next_irba->ViewAttributes() ?>><?php echo $Page->when_next_irba->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->year_of_afs->Visible) { ?>
		<td data-field="year_of_afs"<?php echo $Page->year_of_afs->CellAttributes() ?>>
<span<?php echo $Page->year_of_afs->ViewAttributes() ?>><?php echo $Page->year_of_afs->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->jse_listed->Visible) { ?>
		<td data-field="jse_listed"<?php echo $Page->jse_listed->CellAttributes() ?>>
<span<?php echo $Page->jse_listed->ViewAttributes() ?>><?php echo $Page->jse_listed->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->amount_billed->Visible) { ?>
		<td data-field="amount_billed"<?php echo $Page->amount_billed->CellAttributes() ?>>
<span<?php echo $Page->amount_billed->ViewAttributes() ?>><?php echo $Page->amount_billed->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->isqc_2->Visible) { ?>
		<td data-field="isqc_2"<?php echo $Page->isqc_2->CellAttributes() ?>>
<span<?php echo $Page->isqc_2->ViewAttributes() ?>><?php echo $Page->isqc_2->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->isqc_1->Visible) { ?>
		<td data-field="isqc_1"<?php echo $Page->isqc_1->CellAttributes() ?>>
<span<?php echo $Page->isqc_1->ViewAttributes() ?>><?php echo $Page->isqc_1->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->irba_code->Visible) { ?>
		<td data-field="irba_code"<?php echo $Page->irba_code->CellAttributes() ?>>
<span<?php echo $Page->irba_code->ViewAttributes() ?>><?php echo $Page->irba_code->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->companies_act->Visible) { ?>
		<td data-field="companies_act"<?php echo $Page->companies_act->CellAttributes() ?>>
<span<?php echo $Page->companies_act->ViewAttributes() ?>><?php echo $Page->companies_act->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->group_structure->Visible) { ?>
		<td data-field="group_structure"<?php echo $Page->group_structure->CellAttributes() ?>>
<span<?php echo $Page->group_structure->ViewAttributes() ?>><?php echo $Page->group_structure->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->anticipated_rotation_partner->Visible) { ?>
		<td data-field="anticipated_rotation_partner"<?php echo $Page->anticipated_rotation_partner->CellAttributes() ?>>
<span<?php echo $Page->anticipated_rotation_partner->ViewAttributes() ?>><?php echo $Page->anticipated_rotation_partner->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->rotation_year->Visible) { ?>
		<td data-field="rotation_year"<?php echo $Page->rotation_year->CellAttributes() ?>>
<span<?php echo $Page->rotation_year->ViewAttributes() ?>><?php echo $Page->rotation_year->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->rotation_period->Visible) { ?>
		<td data-field="rotation_period"<?php echo $Page->rotation_period->CellAttributes() ?>>
<span<?php echo $Page->rotation_period->ViewAttributes() ?>><?php echo $Page->rotation_period->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->city->Visible) { ?>
		<td data-field="city"<?php echo $Page->city->CellAttributes() ?>>
<span<?php echo $Page->city->ViewAttributes() ?>><?php echo $Page->city->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->engagement_id->Visible) { ?>
		<td data-field="engagement_id"<?php echo $Page->engagement_id->CellAttributes() ?>>
<span<?php echo $Page->engagement_id->ViewAttributes() ?>><?php echo $Page->engagement_id->ListViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->AccumulateSummary();

		// Get next record
		$Page->GetRow(2);
	$Page->GrpCount++;
} // End while
?>
<?php if ($Page->TotalGrps > 0) { ?>
</tbody>
<tfoot>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && TRUE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ewGrid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="box ewBox ewGrid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_Engaged_Clients" class="<?php if (ewr_IsResponsiveLayout()) { echo "table-responsive "; } ?>ewGridMiddlePanel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGrps > 0 || TRUE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGrps > 0)) { ?>
<div class="box-footer ewGridLowerPanel">
<?php include "Engaged_Clientsrptpager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$Page->ShowReportInDashboard) { ?>
</div>
<!-- /#ewCenter -->
<?php } ?>
<?php if ($Page->Export == "" && !$Page->ShowReportInDashboard) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$Page->ShowReportInDashboard) { ?>
</div>
<!-- /.ewContainer -->
<?php } ?>
<?php
$Page->ShowPageFooter();
if (EWR_DEBUG_ENABLED)
	echo ewr_DebugMsg();
?>
<?php

// Close recordsets
if ($rsgrp) $rsgrp->Close();
if ($rs) $rs->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$Page->ShowReportInDashboard) { ?>
<script type="text/javascript">

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$Page->ShowReportInDashboard) { ?>
<?php include_once "phprptinc/footer.php" ?>
<?php } ?>
<?php
$Page->Page_Terminate();
if (isset($OldPage)) $Page = $OldPage;
?>
