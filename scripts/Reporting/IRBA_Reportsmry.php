<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start();
?>
<?php include_once "rcfg11.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "phprptinc/ewmysql.php") ?>
<?php include_once "rphpfn11.php" ?>
<?php include_once "rusrfn11.php" ?>
<?php include_once "IRBA_Reportsmryinfo.php" ?>
<?php

//
// Page class
//

$IRBA_Report_summary = NULL; // Initialize page object first

class crIRBA_Report_summary extends crIRBA_Report {

	// Page ID
	var $PageID = 'summary';

	// Project ID
	var $ProjectID = "{2A81346C-7FD8-48B9-8BFA-9FDF9B45A2E9}";

	// Page object name
	var $PageObjName = 'IRBA_Report_summary';

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

		// Table object (IRBA_Report)
		if (!isset($GLOBALS["IRBA_Report"])) {
			$GLOBALS["IRBA_Report"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["IRBA_Report"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";

		// Page ID
		if (!defined("EWR_PAGE_ID"))
			define("EWR_PAGE_ID", 'summary', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EWR_TABLE_NAME"))
			define("EWR_TABLE_NAME", 'IRBA Report', TRUE);

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
		$this->FilterOptions->TagClassName = "ewFilterOption fIRBA_Reportsummary";

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
		$item->Body = "<a class=\"ewrExportLink ewEmail\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToEmail", TRUE)) . "\" id=\"emf_IRBA_Report\" href=\"javascript:void(0);\" onclick=\"ewr_EmailDialogShow({lnk:'emf_IRBA_Report',hdr:ewLanguage.Phrase('ExportToEmail'),url:'$url',exportid:'$exportid',el:this});\">" . $ReportLanguage->Phrase("ExportToEmail") . "</a>";
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
		$item->Body = "<a class=\"ewSaveFilter\" data-form=\"fIRBA_Reportsummary\" href=\"#\">" . $ReportLanguage->Phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->Add("deletefilter");
		$item->Body = "<a class=\"ewDeleteFilter\" data-form=\"fIRBA_Reportsummary\" href=\"#\">" . $ReportLanguage->Phrase("DeleteFilter") . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ewSearchToggle" . $SearchToggleClass . "\" title=\"" . $ReportLanguage->Phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->Phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"fIRBA_Reportsummary\">" . $ReportLanguage->Phrase("SearchBtn") . "</button>";
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
	var $DisplayGrps = 20; // Groups per page
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
		$this->No->SetVisibility();
		$this->Client_Name->SetVisibility();
		$this->Audit_Fee->SetVisibility();
		$this->Period_end_of_AFS->SetVisibility();
		$this->Date_Opinion_was_signed->SetVisibility();
		$this->PI_Score->SetVisibility();
		$this->Partner->SetVisibility();
		$this->Risk->SetVisibility();
		$this->City->SetVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$nDtls = 10;
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
		$this->Col = array(array(FALSE, FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE));

		// Set up groups per page dynamically
		$this->SetUpDisplayGrps();

		// Set up Breadcrumb
		if ($this->Export == "")
			$this->SetupBreadcrumb();
		$this->Risk->SelectionList = "";
		$this->Risk->DefaultSelectionList = "";
		$this->Risk->ValueList = "";
		$this->City->SelectionList = "";
		$this->City->DefaultSelectionList = "";
		$this->City->ValueList = "";

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
				$this->FirstRowData['No'] = ewr_Conv($rs->fields('No'), 200);
				$this->FirstRowData['Audit_Fee'] = ewr_Conv($rs->fields('Audit_Fee'), 200);
				$this->FirstRowData['Period_end_of_AFS'] = ewr_Conv($rs->fields('Period_end_of_AFS'), 200);
				$this->FirstRowData['Date_Opinion_was_signed'] = ewr_Conv($rs->fields('Date_Opinion_was_signed'), 200);
				$this->FirstRowData['PI_Score'] = ewr_Conv($rs->fields('PI_Score'), 200);
				$this->FirstRowData['Partner'] = ewr_Conv($rs->fields('Partner'), 200);
				$this->FirstRowData['Risk'] = ewr_Conv($rs->fields('Risk'), 200);
				$this->FirstRowData['City'] = ewr_Conv($rs->fields('City'), 200);
		} else { // Get next row
			$rs->MoveNext();
		}
		if (!$rs->EOF) {
			$this->No->setDbValue($rs->fields('No'));
			$this->Client_Name->setDbValue($rs->fields('Client_Name'));
			$this->Audit_Fee->setDbValue($rs->fields('Audit_Fee'));
			$this->Period_end_of_AFS->setDbValue($rs->fields('Period_end_of_AFS'));
			$this->Date_Opinion_was_signed->setDbValue($rs->fields('Date_Opinion_was_signed'));
			$this->PI_Score->setDbValue($rs->fields('PI_Score'));
			$this->Partner->setDbValue($rs->fields('Partner'));
			$this->Risk->setDbValue($rs->fields('Risk'));
			$this->City->setDbValue($rs->fields('City'));
			$this->Val[1] = $this->No->CurrentValue;
			$this->Val[2] = $this->Client_Name->CurrentValue;
			$this->Val[3] = $this->Audit_Fee->CurrentValue;
			$this->Val[4] = $this->Period_end_of_AFS->CurrentValue;
			$this->Val[5] = $this->Date_Opinion_was_signed->CurrentValue;
			$this->Val[6] = $this->PI_Score->CurrentValue;
			$this->Val[7] = $this->Partner->CurrentValue;
			$this->Val[8] = $this->Risk->CurrentValue;
			$this->Val[9] = $this->City->CurrentValue;
		} else {
			$this->No->setDbValue("");
			$this->Client_Name->setDbValue("");
			$this->Audit_Fee->setDbValue("");
			$this->Period_end_of_AFS->setDbValue("");
			$this->Date_Opinion_was_signed->setDbValue("");
			$this->PI_Score->setDbValue("");
			$this->Partner->setDbValue("");
			$this->Risk->setDbValue("");
			$this->City->setDbValue("");
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
			// Build distinct values for Risk

			if ($popupname == 'IRBA_Report_Risk') {
				$bNullValue = FALSE;
				$bEmptyValue = FALSE;
				$sFilter = $this->Filter;

				// Call Page Filtering event
				$this->Page_Filtering($this->Risk, $sFilter, "popup");
				$sSql = ewr_BuildReportSql($this->Risk->SqlSelect, $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), $this->Risk->SqlOrderBy, $sFilter, "");
				$rswrk = $conn->Execute($sSql);
				while ($rswrk && !$rswrk->EOF) {
					$this->Risk->setDbValue($rswrk->fields[0]);
					$this->Risk->ViewValue = @$rswrk->fields[1];
					if (is_null($this->Risk->CurrentValue)) {
						$bNullValue = TRUE;
					} elseif ($this->Risk->CurrentValue == "") {
						$bEmptyValue = TRUE;
					} else {
						ewr_SetupDistinctValues($this->Risk->ValueList, $this->Risk->CurrentValue, $this->Risk->ViewValue, FALSE, $this->Risk->FldDelimiter);
					}
					$rswrk->MoveNext();
				}
				if ($rswrk)
					$rswrk->Close();
				if ($bEmptyValue)
					ewr_SetupDistinctValues($this->Risk->ValueList, EWR_EMPTY_VALUE, $ReportLanguage->Phrase("EmptyLabel"), FALSE);
				if ($bNullValue)
					ewr_SetupDistinctValues($this->Risk->ValueList, EWR_NULL_VALUE, $ReportLanguage->Phrase("NullLabel"), FALSE);
				$fld = &$this->Risk;
			}

			// Build distinct values for City
			if ($popupname == 'IRBA_Report_City') {
				$bNullValue = FALSE;
				$bEmptyValue = FALSE;
				$sFilter = $this->Filter;

				// Call Page Filtering event
				$this->Page_Filtering($this->City, $sFilter, "popup");
				$sSql = ewr_BuildReportSql($this->City->SqlSelect, $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), $this->City->SqlOrderBy, $sFilter, "");
				$rswrk = $conn->Execute($sSql);
				while ($rswrk && !$rswrk->EOF) {
					$this->City->setDbValue($rswrk->fields[0]);
					$this->City->ViewValue = @$rswrk->fields[1];
					if (is_null($this->City->CurrentValue)) {
						$bNullValue = TRUE;
					} elseif ($this->City->CurrentValue == "") {
						$bEmptyValue = TRUE;
					} else {
						ewr_SetupDistinctValues($this->City->ValueList, $this->City->CurrentValue, $this->City->ViewValue, FALSE, $this->City->FldDelimiter);
					}
					$rswrk->MoveNext();
				}
				if ($rswrk)
					$rswrk->Close();
				if ($bEmptyValue)
					ewr_SetupDistinctValues($this->City->ValueList, EWR_EMPTY_VALUE, $ReportLanguage->Phrase("EmptyLabel"), FALSE);
				if ($bNullValue)
					ewr_SetupDistinctValues($this->City->ValueList, EWR_NULL_VALUE, $ReportLanguage->Phrase("NullLabel"), FALSE);
				$fld = &$this->City;
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
				$this->ClearSessionSelection('Risk');
				$this->ClearSessionSelection('City');
				$this->ResetPager();
			}
		}

		// Load selection criteria to array
		// Get Risk selected values

		if (is_array(@$_SESSION["sel_IRBA_Report_Risk"])) {
			$this->LoadSelectionFromSession('Risk');
		} elseif (@$_SESSION["sel_IRBA_Report_Risk"] == EWR_INIT_VALUE) { // Select all
			$this->Risk->SelectionList = "";
		}

		// Get City selected values
		if (is_array(@$_SESSION["sel_IRBA_Report_City"])) {
			$this->LoadSelectionFromSession('City');
		} elseif (@$_SESSION["sel_IRBA_Report_City"] == EWR_INIT_VALUE) { // Select all
			$this->City->SelectionList = "";
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
					$this->DisplayGrps = 20; // Non-numeric, load default
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
				$this->DisplayGrps = 20; // Load default
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

			// No
			$this->No->HrefValue = "";

			// Client_Name
			$this->Client_Name->HrefValue = "";

			// Audit_Fee
			$this->Audit_Fee->HrefValue = "";

			// Period_end_of_AFS
			$this->Period_end_of_AFS->HrefValue = "";

			// Date_Opinion_was_signed
			$this->Date_Opinion_was_signed->HrefValue = "";

			// PI_Score
			$this->PI_Score->HrefValue = "";

			// Partner
			$this->Partner->HrefValue = "";

			// Risk
			$this->Risk->HrefValue = "";

			// City
			$this->City->HrefValue = "";
		} else {
			if ($this->RowTotalType == EWR_ROWTOTAL_GROUP && $this->RowTotalSubType == EWR_ROWTOTAL_HEADER) {
			} else {
			}

			// No
			$this->No->ViewValue = $this->No->CurrentValue;
			$this->No->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Client_Name
			$this->Client_Name->ViewValue = $this->Client_Name->CurrentValue;
			$this->Client_Name->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Audit_Fee
			$this->Audit_Fee->ViewValue = $this->Audit_Fee->CurrentValue;
			$this->Audit_Fee->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Period_end_of_AFS
			$this->Period_end_of_AFS->ViewValue = $this->Period_end_of_AFS->CurrentValue;
			$this->Period_end_of_AFS->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";
			$this->Period_end_of_AFS->CellAttrs["style"] = "white-space: nowrap;";

			// Date_Opinion_was_signed
			$this->Date_Opinion_was_signed->ViewValue = $this->Date_Opinion_was_signed->CurrentValue;
			$this->Date_Opinion_was_signed->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";
			$this->Date_Opinion_was_signed->CellAttrs["style"] = "white-space: nowrap;";

			// PI_Score
			$this->PI_Score->ViewValue = $this->PI_Score->CurrentValue;
			$this->PI_Score->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Partner
			$this->Partner->ViewValue = $this->Partner->CurrentValue;
			$this->Partner->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Risk
			$this->Risk->ViewValue = $this->Risk->CurrentValue;
			$this->Risk->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// City
			$this->City->ViewValue = $this->City->CurrentValue;
			$this->City->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// No
			$this->No->HrefValue = "";

			// Client_Name
			$this->Client_Name->HrefValue = "";

			// Audit_Fee
			$this->Audit_Fee->HrefValue = "";

			// Period_end_of_AFS
			$this->Period_end_of_AFS->HrefValue = "";

			// Date_Opinion_was_signed
			$this->Date_Opinion_was_signed->HrefValue = "";

			// PI_Score
			$this->PI_Score->HrefValue = "";

			// Partner
			$this->Partner->HrefValue = "";

			// Risk
			$this->Risk->HrefValue = "";

			// City
			$this->City->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == EWR_ROWTYPE_TOTAL) { // Summary row
		} else {

			// No
			$CurrentValue = $this->No->CurrentValue;
			$ViewValue = &$this->No->ViewValue;
			$ViewAttrs = &$this->No->ViewAttrs;
			$CellAttrs = &$this->No->CellAttrs;
			$HrefValue = &$this->No->HrefValue;
			$LinkAttrs = &$this->No->LinkAttrs;
			$this->Cell_Rendered($this->No, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Client_Name
			$CurrentValue = $this->Client_Name->CurrentValue;
			$ViewValue = &$this->Client_Name->ViewValue;
			$ViewAttrs = &$this->Client_Name->ViewAttrs;
			$CellAttrs = &$this->Client_Name->CellAttrs;
			$HrefValue = &$this->Client_Name->HrefValue;
			$LinkAttrs = &$this->Client_Name->LinkAttrs;
			$this->Cell_Rendered($this->Client_Name, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Audit_Fee
			$CurrentValue = $this->Audit_Fee->CurrentValue;
			$ViewValue = &$this->Audit_Fee->ViewValue;
			$ViewAttrs = &$this->Audit_Fee->ViewAttrs;
			$CellAttrs = &$this->Audit_Fee->CellAttrs;
			$HrefValue = &$this->Audit_Fee->HrefValue;
			$LinkAttrs = &$this->Audit_Fee->LinkAttrs;
			$this->Cell_Rendered($this->Audit_Fee, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Period_end_of_AFS
			$CurrentValue = $this->Period_end_of_AFS->CurrentValue;
			$ViewValue = &$this->Period_end_of_AFS->ViewValue;
			$ViewAttrs = &$this->Period_end_of_AFS->ViewAttrs;
			$CellAttrs = &$this->Period_end_of_AFS->CellAttrs;
			$HrefValue = &$this->Period_end_of_AFS->HrefValue;
			$LinkAttrs = &$this->Period_end_of_AFS->LinkAttrs;
			$this->Cell_Rendered($this->Period_end_of_AFS, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Date_Opinion_was_signed
			$CurrentValue = $this->Date_Opinion_was_signed->CurrentValue;
			$ViewValue = &$this->Date_Opinion_was_signed->ViewValue;
			$ViewAttrs = &$this->Date_Opinion_was_signed->ViewAttrs;
			$CellAttrs = &$this->Date_Opinion_was_signed->CellAttrs;
			$HrefValue = &$this->Date_Opinion_was_signed->HrefValue;
			$LinkAttrs = &$this->Date_Opinion_was_signed->LinkAttrs;
			$this->Cell_Rendered($this->Date_Opinion_was_signed, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// PI_Score
			$CurrentValue = $this->PI_Score->CurrentValue;
			$ViewValue = &$this->PI_Score->ViewValue;
			$ViewAttrs = &$this->PI_Score->ViewAttrs;
			$CellAttrs = &$this->PI_Score->CellAttrs;
			$HrefValue = &$this->PI_Score->HrefValue;
			$LinkAttrs = &$this->PI_Score->LinkAttrs;
			$this->Cell_Rendered($this->PI_Score, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Partner
			$CurrentValue = $this->Partner->CurrentValue;
			$ViewValue = &$this->Partner->ViewValue;
			$ViewAttrs = &$this->Partner->ViewAttrs;
			$CellAttrs = &$this->Partner->CellAttrs;
			$HrefValue = &$this->Partner->HrefValue;
			$LinkAttrs = &$this->Partner->LinkAttrs;
			$this->Cell_Rendered($this->Partner, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Risk
			$CurrentValue = $this->Risk->CurrentValue;
			$ViewValue = &$this->Risk->ViewValue;
			$ViewAttrs = &$this->Risk->ViewAttrs;
			$CellAttrs = &$this->Risk->CellAttrs;
			$HrefValue = &$this->Risk->HrefValue;
			$LinkAttrs = &$this->Risk->LinkAttrs;
			$this->Cell_Rendered($this->Risk, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// City
			$CurrentValue = $this->City->CurrentValue;
			$ViewValue = &$this->City->ViewValue;
			$ViewAttrs = &$this->City->ViewAttrs;
			$CellAttrs = &$this->City->CellAttrs;
			$HrefValue = &$this->City->HrefValue;
			$LinkAttrs = &$this->City->LinkAttrs;
			$this->Cell_Rendered($this->City, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);
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
		if ($this->No->Visible) $this->DtlColumnCount += 1;
		if ($this->Client_Name->Visible) $this->DtlColumnCount += 1;
		if ($this->Audit_Fee->Visible) $this->DtlColumnCount += 1;
		if ($this->Period_end_of_AFS->Visible) $this->DtlColumnCount += 1;
		if ($this->Date_Opinion_was_signed->Visible) $this->DtlColumnCount += 1;
		if ($this->PI_Score->Visible) $this->DtlColumnCount += 1;
		if ($this->Partner->Visible) $this->DtlColumnCount += 1;
		if ($this->Risk->Visible) $this->DtlColumnCount += 1;
		if ($this->City->Visible) $this->DtlColumnCount += 1;
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $ReportBreadcrumb;
		$ReportBreadcrumb = new crBreadcrumb();
		$url = substr(ewr_CurrentUrl(), strrpos(ewr_CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$ReportBreadcrumb->Add("summary", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

			// Set/clear dropdown for field Risk
			if ($this->PopupName == 'IRBA_Report_Risk' && $this->PopupValue <> "") {
				if ($this->PopupValue == EWR_INIT_VALUE)
					$this->Risk->DropDownValue = EWR_ALL_VALUE;
				else
					$this->Risk->DropDownValue = $this->PopupValue;
				$bRestoreSession = FALSE; // Do not restore
			} elseif ($this->ClearExtFilter == 'IRBA_Report_Risk') {
				$this->SetSessionDropDownValue(EWR_INIT_VALUE, '', 'Risk');
			}

			// Set/clear dropdown for field City
			if ($this->PopupName == 'IRBA_Report_City' && $this->PopupValue <> "") {
				if ($this->PopupValue == EWR_INIT_VALUE)
					$this->City->DropDownValue = EWR_ALL_VALUE;
				else
					$this->City->DropDownValue = $this->PopupValue;
				$bRestoreSession = FALSE; // Do not restore
			} elseif ($this->ClearExtFilter == 'IRBA_Report_City') {
				$this->SetSessionDropDownValue(EWR_INIT_VALUE, '', 'City');
			}

		// Reset search command
		} elseif (@$_GET["cmd"] == "reset") {

			// Load default values
			$this->SetSessionDropDownValue($this->Risk->DropDownValue, $this->Risk->SearchOperator, 'Risk'); // Field Risk
			$this->SetSessionDropDownValue($this->City->DropDownValue, $this->City->SearchOperator, 'City'); // Field City

			//$bSetupFilter = TRUE; // No need to set up, just use default
		} else {
			$bRestoreSession = !$this->SearchCommand;

			// Field Risk
			if ($this->GetDropDownValue($this->Risk)) {
				$bSetupFilter = TRUE;
			} elseif ($this->Risk->DropDownValue <> EWR_INIT_VALUE && !isset($_SESSION['sv_IRBA_Report_Risk'])) {
				$bSetupFilter = TRUE;
			}

			// Field City
			if ($this->GetDropDownValue($this->City)) {
				$bSetupFilter = TRUE;
			} elseif ($this->City->DropDownValue <> EWR_INIT_VALUE && !isset($_SESSION['sv_IRBA_Report_City'])) {
				$bSetupFilter = TRUE;
			}
			if (!$this->ValidateForm()) {
				$this->setFailureMessage($grFormError);
				return $sFilter;
			}
		}

		// Restore session
		if ($bRestoreSession) {
			$this->GetSessionDropDownValue($this->Risk); // Field Risk
			$this->GetSessionDropDownValue($this->City); // Field City
		}

		// Call page filter validated event
		$this->Page_FilterValidated();

		// Build SQL
		$this->BuildDropDownFilter($this->Risk, $sFilter, $this->Risk->SearchOperator, FALSE, TRUE); // Field Risk
		$this->BuildDropDownFilter($this->City, $sFilter, $this->City->SearchOperator, FALSE, TRUE); // Field City

		// Save parms to session
		$this->SetSessionDropDownValue($this->Risk->DropDownValue, $this->Risk->SearchOperator, 'Risk'); // Field Risk
		$this->SetSessionDropDownValue($this->City->DropDownValue, $this->City->SearchOperator, 'City'); // Field City

		// Setup filter
		if ($bSetupFilter) {

			// Field Risk
			$sWrk = "";
			$this->BuildDropDownFilter($this->Risk, $sWrk, $this->Risk->SearchOperator);
			ewr_LoadSelectionFromFilter($this->Risk, $sWrk, $this->Risk->SelectionList, $this->Risk->DropDownValue);
			$_SESSION['sel_IRBA_Report_Risk'] = ($this->Risk->SelectionList == "") ? EWR_INIT_VALUE : $this->Risk->SelectionList;

			// Field City
			$sWrk = "";
			$this->BuildDropDownFilter($this->City, $sWrk, $this->City->SearchOperator);
			ewr_LoadSelectionFromFilter($this->City, $sWrk, $this->City->SelectionList, $this->City->DropDownValue);
			$_SESSION['sel_IRBA_Report_City'] = ($this->City->SelectionList == "") ? EWR_INIT_VALUE : $this->City->SelectionList;
		}

		// Field Risk
		ewr_LoadDropDownList($this->Risk->DropDownList, $this->Risk->DropDownValue);

		// Field City
		ewr_LoadDropDownList($this->City->DropDownList, $this->City->DropDownValue);
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
		$this->GetSessionValue($fld->DropDownValue, 'sv_IRBA_Report_' . $parm);
		$this->GetSessionValue($fld->SearchOperator, 'so_IRBA_Report_' . $parm);
	}

	// Get filter values from session
	function GetSessionFilterValues(&$fld) {
		$parm = substr($fld->FldVar, 2);
		$this->GetSessionValue($fld->SearchValue, 'sv_IRBA_Report_' . $parm);
		$this->GetSessionValue($fld->SearchOperator, 'so_IRBA_Report_' . $parm);
		$this->GetSessionValue($fld->SearchCondition, 'sc_IRBA_Report_' . $parm);
		$this->GetSessionValue($fld->SearchValue2, 'sv2_IRBA_Report_' . $parm);
		$this->GetSessionValue($fld->SearchOperator2, 'so2_IRBA_Report_' . $parm);
	}

	// Get value from session
	function GetSessionValue(&$sv, $sn) {
		if (array_key_exists($sn, $_SESSION))
			$sv = $_SESSION[$sn];
	}

	// Set dropdown value to session
	function SetSessionDropDownValue($sv, $so, $parm) {
		$_SESSION['sv_IRBA_Report_' . $parm] = $sv;
		$_SESSION['so_IRBA_Report_' . $parm] = $so;
	}

	// Set filter values to session
	function SetSessionFilterValues($sv1, $so1, $sc, $sv2, $so2, $parm) {
		$_SESSION['sv_IRBA_Report_' . $parm] = $sv1;
		$_SESSION['so_IRBA_Report_' . $parm] = $so1;
		$_SESSION['sc_IRBA_Report_' . $parm] = $sc;
		$_SESSION['sv2_IRBA_Report_' . $parm] = $sv2;
		$_SESSION['so2_IRBA_Report_' . $parm] = $so2;
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
		$_SESSION["sel_IRBA_Report_$parm"] = "";
		$_SESSION["rf_IRBA_Report_$parm"] = "";
		$_SESSION["rt_IRBA_Report_$parm"] = "";
	}

	// Load selection from session
	function LoadSelectionFromSession($parm) {
		$fld = &$this->FieldByParm($parm);
		$fld->SelectionList = @$_SESSION["sel_IRBA_Report_$parm"];
		$fld->RangeFrom = @$_SESSION["rf_IRBA_Report_$parm"];
		$fld->RangeTo = @$_SESSION["rt_IRBA_Report_$parm"];
	}

	// Load default value for filters
	function LoadDefaultFilters() {
		/**
		* Set up default values for non Text filters
		*/

		// Field Risk
		$this->Risk->DefaultDropDownValue = EWR_INIT_VALUE;
		if (!$this->SearchCommand) $this->Risk->DropDownValue = $this->Risk->DefaultDropDownValue;
		$sWrk = "";
		$this->BuildDropDownFilter($this->Risk, $sWrk, $this->Risk->SearchOperator, TRUE);
		ewr_LoadSelectionFromFilter($this->Risk, $sWrk, $this->Risk->DefaultSelectionList);
		if (!$this->SearchCommand) $this->Risk->SelectionList = $this->Risk->DefaultSelectionList;

		// Field City
		$this->City->DefaultDropDownValue = EWR_INIT_VALUE;
		if (!$this->SearchCommand) $this->City->DropDownValue = $this->City->DefaultDropDownValue;
		$sWrk = "";
		$this->BuildDropDownFilter($this->City, $sWrk, $this->City->SearchOperator, TRUE);
		ewr_LoadSelectionFromFilter($this->City, $sWrk, $this->City->DefaultSelectionList);
		if (!$this->SearchCommand) $this->City->SelectionList = $this->City->DefaultSelectionList;
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

		// Field Risk
		// $this->Risk->DefaultSelectionList = array("val1", "val2");
		// Field City
		// $this->City->DefaultSelectionList = array("val1", "val2");

	}

	// Check if filter applied
	function CheckFilter() {

		// Check Risk extended filter
		if ($this->NonTextFilterApplied($this->Risk))
			return TRUE;

		// Check Risk popup filter
		if (!ewr_MatchedArray($this->Risk->DefaultSelectionList, $this->Risk->SelectionList))
			return TRUE;

		// Check City extended filter
		if ($this->NonTextFilterApplied($this->City))
			return TRUE;

		// Check City popup filter
		if (!ewr_MatchedArray($this->City->DefaultSelectionList, $this->City->SelectionList))
			return TRUE;
		return FALSE;
	}

	// Show list of filters
	function ShowFilterList($showDate = FALSE) {
		global $ReportLanguage;

		// Initialize
		$sFilterList = "";

		// Field Risk
		$sExtWrk = "";
		$sWrk = "";
		$this->BuildDropDownFilter($this->Risk, $sExtWrk, $this->Risk->SearchOperator);
		if (is_array($this->Risk->SelectionList))
			$sWrk = ewr_JoinArray($this->Risk->SelectionList, ", ", EWR_DATATYPE_STRING, 0, $this->DBID);
		$sFilter = "";
		if ($sExtWrk <> "")
			$sFilter .= "<span class=\"ewFilterValue\">$sExtWrk</span>";
		elseif ($sWrk <> "")
			$sFilter .= "<span class=\"ewFilterValue\">$sWrk</span>";
		if ($sFilter <> "")
			$sFilterList .= "<div><span class=\"ewFilterCaption\">" . $this->Risk->FldCaption() . "</span>" . $sFilter . "</div>";

		// Field City
		$sExtWrk = "";
		$sWrk = "";
		$this->BuildDropDownFilter($this->City, $sExtWrk, $this->City->SearchOperator);
		if (is_array($this->City->SelectionList))
			$sWrk = ewr_JoinArray($this->City->SelectionList, ", ", EWR_DATATYPE_STRING, 0, $this->DBID);
		$sFilter = "";
		if ($sExtWrk <> "")
			$sFilter .= "<span class=\"ewFilterValue\">$sExtWrk</span>";
		elseif ($sWrk <> "")
			$sFilter .= "<span class=\"ewFilterValue\">$sWrk</span>";
		if ($sFilter <> "")
			$sFilterList .= "<div><span class=\"ewFilterCaption\">" . $this->City->FldCaption() . "</span>" . $sFilter . "</div>";
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

		// Field Risk
		$sWrk = "";
		$sWrk = ($this->Risk->DropDownValue <> EWR_INIT_VALUE) ? $this->Risk->DropDownValue : "";
		if (is_array($sWrk))
			$sWrk = implode("||", $sWrk);
		if ($sWrk <> "")
			$sWrk = "\"sv_Risk\":\"" . ewr_JsEncode2($sWrk) . "\"";
		if ($sWrk == "") {
			$sWrk = ($this->Risk->SelectionList <> EWR_INIT_VALUE) ? $this->Risk->SelectionList : "";
			if (is_array($sWrk))
				$sWrk = implode("||", $sWrk);
			if ($sWrk <> "")
				$sWrk = "\"sel_Risk\":\"" . ewr_JsEncode2($sWrk) . "\"";
		}
		if ($sWrk <> "") {
			if ($sFilterList <> "") $sFilterList .= ",";
			$sFilterList .= $sWrk;
		}

		// Field City
		$sWrk = "";
		$sWrk = ($this->City->DropDownValue <> EWR_INIT_VALUE) ? $this->City->DropDownValue : "";
		if (is_array($sWrk))
			$sWrk = implode("||", $sWrk);
		if ($sWrk <> "")
			$sWrk = "\"sv_City\":\"" . ewr_JsEncode2($sWrk) . "\"";
		if ($sWrk == "") {
			$sWrk = ($this->City->SelectionList <> EWR_INIT_VALUE) ? $this->City->SelectionList : "";
			if (is_array($sWrk))
				$sWrk = implode("||", $sWrk);
			if ($sWrk <> "")
				$sWrk = "\"sel_City\":\"" . ewr_JsEncode2($sWrk) . "\"";
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

		// Field Risk
		$bRestoreFilter = FALSE;
		if (array_key_exists("sv_Risk", $filter)) {
			$sWrk = $filter["sv_Risk"];
			if (strpos($sWrk, "||") !== FALSE)
				$sWrk = explode("||", $sWrk);
			$this->SetSessionDropDownValue($sWrk, @$filter["so_Risk"], "Risk");
			$bRestoreFilter = TRUE;
		}
		if (array_key_exists("sel_Risk", $filter)) {
			$sWrk = $filter["sel_Risk"];
			$sWrk = explode("||", $sWrk);
			$this->Risk->SelectionList = $sWrk;
			$_SESSION["sel_IRBA_Report_Risk"] = $sWrk;
			$this->SetSessionDropDownValue(EWR_INIT_VALUE, "", "Risk"); // Clear drop down
			$bRestoreFilter = TRUE;
		}
		if (!$bRestoreFilter) { // Clear filter
			$this->SetSessionDropDownValue(EWR_INIT_VALUE, "", "Risk");
			$this->Risk->SelectionList = "";
			$_SESSION["sel_IRBA_Report_Risk"] = "";
		}

		// Field City
		$bRestoreFilter = FALSE;
		if (array_key_exists("sv_City", $filter)) {
			$sWrk = $filter["sv_City"];
			if (strpos($sWrk, "||") !== FALSE)
				$sWrk = explode("||", $sWrk);
			$this->SetSessionDropDownValue($sWrk, @$filter["so_City"], "City");
			$bRestoreFilter = TRUE;
		}
		if (array_key_exists("sel_City", $filter)) {
			$sWrk = $filter["sel_City"];
			$sWrk = explode("||", $sWrk);
			$this->City->SelectionList = $sWrk;
			$_SESSION["sel_IRBA_Report_City"] = $sWrk;
			$this->SetSessionDropDownValue(EWR_INIT_VALUE, "", "City"); // Clear drop down
			$bRestoreFilter = TRUE;
		}
		if (!$bRestoreFilter) { // Clear filter
			$this->SetSessionDropDownValue(EWR_INIT_VALUE, "", "City");
			$this->City->SelectionList = "";
			$_SESSION["sel_IRBA_Report_City"] = "";
		}
		return TRUE;
	}

	// Return popup filter
	function GetPopupFilter() {
		$sWrk = "";
		if ($this->DrillDown)
			return "";
		if (!$this->DropDownFilterExist($this->Risk, $this->Risk->SearchOperator)) {
			if (is_array($this->Risk->SelectionList)) {
				$sFilter = ewr_FilterSql($this->Risk, "`Risk`", EWR_DATATYPE_STRING, $this->DBID);

				// Call Page Filtering event
				$this->Page_Filtering($this->Risk, $sFilter, "popup");
				$this->Risk->CurrentFilter = $sFilter;
				ewr_AddFilter($sWrk, $sFilter);
			}
		}
		if (!$this->DropDownFilterExist($this->City, $this->City->SearchOperator)) {
			if (is_array($this->City->SelectionList)) {
				$sFilter = ewr_FilterSql($this->City, "`City`", EWR_DATATYPE_STRING, $this->DBID);

				// Call Page Filtering event
				$this->Page_Filtering($this->City, $sFilter, "popup");
				$this->City->CurrentFilter = $sFilter;
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
			$this->No->setSort("");
			$this->Client_Name->setSort("");
			$this->Audit_Fee->setSort("");
			$this->Period_end_of_AFS->setSort("");
			$this->Date_Opinion_was_signed->setSort("");
			$this->PI_Score->setSort("");
			$this->Partner->setSort("");
			$this->Risk->setSort("");
			$this->City->setSort("");

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
if (!isset($IRBA_Report_summary)) $IRBA_Report_summary = new crIRBA_Report_summary();
if (isset($Page)) $OldPage = $Page;
$Page = &$IRBA_Report_summary;

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
var IRBA_Report_summary = new ewr_Page("IRBA_Report_summary");

// Page properties
IRBA_Report_summary.PageID = "summary"; // Page ID
var EWR_PAGE_ID = IRBA_Report_summary.PageID;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$Page->ShowReportInDashboard) { ?>
<script type="text/javascript">

// Form object
var CurrentForm = fIRBA_Reportsummary = new ewr_Form("fIRBA_Reportsummary");

// Validate method
fIRBA_Reportsummary.Validate = function() {
	if (!this.ValidateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.GetForm(), $fobj = $(fobj);

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fIRBA_Reportsummary.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
<?php if (EWR_CLIENT_VALIDATE) { ?>
fIRBA_Reportsummary.ValidateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fIRBA_Reportsummary.ValidateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fIRBA_Reportsummary.Lists["sv_Risk"] = {"LinkField":"sv_Risk","Ajax":true,"DisplayFields":["sv_Risk","","",""],"ParentFields":[],"FilterFields":[],"Options":[],"Template":""};
fIRBA_Reportsummary.Lists["sv_City"] = {"LinkField":"sv_City","Ajax":true,"DisplayFields":["sv_City","","",""],"ParentFields":[],"FilterFields":[],"Options":[],"Template":""};
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
<form name="fIRBA_Reportsummary" id="fIRBA_Reportsummary" class="form-inline ewForm ewExtFilterForm" action="<?php echo ewr_CurrentPage() ?>">
<?php $SearchPanelClass = ($Page->Filter <> "") ? " in" : " in"; ?>
<div id="fIRBA_Reportsummary_SearchPanel" class="ewSearchPanel collapse<?php echo $SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ewRow">
<div id="c_Risk" class="ewCell form-group">
	<label for="sv_Risk" class="ewSearchCaption ewLabel"><?php echo $Page->Risk->FldCaption() ?></label>
	<span class="ewSearchField">
<?php ewr_PrependClass($Page->Risk->EditAttrs["class"], "form-control"); ?>
<select data-table="IRBA_Report" data-field="x_Risk" data-value-separator="<?php echo ewr_HtmlEncode(is_array($Page->Risk->DisplayValueSeparator) ? json_encode($Page->Risk->DisplayValueSeparator) : $Page->Risk->DisplayValueSeparator) ?>" id="sv_Risk" name="sv_Risk"<?php echo $Page->Risk->EditAttributes() ?>>
<option value=""><?php echo $ReportLanguage->Phrase("PleaseSelect") ?></option>
<?php
	$cntf = is_array($Page->Risk->AdvancedFilters) ? count($Page->Risk->AdvancedFilters) : 0;
	$cntd = is_array($Page->Risk->DropDownList) ? count($Page->Risk->DropDownList) : 0;
	$totcnt = $cntf + $cntd;
	$wrkcnt = 0;
	if ($cntf > 0) {
		foreach ($Page->Risk->AdvancedFilters as $filter) {
			if ($filter->Enabled) {
				$selwrk = ewr_MatchedFilterValue($Page->Risk->DropDownValue, $filter->ID) ? " selected" : "";
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
<option value="<?php echo $Page->Risk->DropDownList[$i] ?>"<?php echo $selwrk ?>><?php echo ewr_DropDownDisplayValue($Page->Risk->DropDownList[$i], "", 0) ?></option>
<?php
		$wrkcnt += 1;
	}
?>
</select>
<input type="hidden" name="s_sv_Risk" id="s_sv_Risk" value="<?php echo $Page->Risk->LookupFilterQuery() ?>">
<script type="text/javascript">
fIRBA_Reportsummary.Lists["sv_Risk"].Options = <?php echo ewr_ArrayToJson($Page->Risk->LookupFilterOptions) ?>;
</script>
</span>
</div>
</div>
<div id="r_2" class="ewRow">
<div id="c_City" class="ewCell form-group">
	<label for="sv_City" class="ewSearchCaption ewLabel"><?php echo $Page->City->FldCaption() ?></label>
	<span class="ewSearchField">
<?php ewr_PrependClass($Page->City->EditAttrs["class"], "form-control"); ?>
<select data-table="IRBA_Report" data-field="x_City" data-value-separator="<?php echo ewr_HtmlEncode(is_array($Page->City->DisplayValueSeparator) ? json_encode($Page->City->DisplayValueSeparator) : $Page->City->DisplayValueSeparator) ?>" id="sv_City" name="sv_City"<?php echo $Page->City->EditAttributes() ?>>
<option value=""><?php echo $ReportLanguage->Phrase("PleaseSelect") ?></option>
<?php
	$cntf = is_array($Page->City->AdvancedFilters) ? count($Page->City->AdvancedFilters) : 0;
	$cntd = is_array($Page->City->DropDownList) ? count($Page->City->DropDownList) : 0;
	$totcnt = $cntf + $cntd;
	$wrkcnt = 0;
	if ($cntf > 0) {
		foreach ($Page->City->AdvancedFilters as $filter) {
			if ($filter->Enabled) {
				$selwrk = ewr_MatchedFilterValue($Page->City->DropDownValue, $filter->ID) ? " selected" : "";
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
<option value="<?php echo $Page->City->DropDownList[$i] ?>"<?php echo $selwrk ?>><?php echo ewr_DropDownDisplayValue($Page->City->DropDownList[$i], "", 0) ?></option>
<?php
		$wrkcnt += 1;
	}
?>
</select>
<input type="hidden" name="s_sv_City" id="s_sv_City" value="<?php echo $Page->City->LookupFilterQuery() ?>">
<script type="text/javascript">
fIRBA_Reportsummary.Lists["sv_City"].Options = <?php echo ewr_ArrayToJson($Page->City->LookupFilterOptions) ?>;
</script>
</span>
</div>
</div>
<div class="ewRow"><input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-primary" value="<?php echo $ReportLanguage->Phrase("Search") ?>">
<input type="reset" name="btnreset" id="btnreset" class="btn hide" value="<?php echo $ReportLanguage->Phrase("Reset") ?>"></div>
</div>
</form>
<script type="text/javascript">
fIRBA_Reportsummary.Init();
fIRBA_Reportsummary.FilterList = <?php echo $Page->GetFilterList() ?>;
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
<div id="gmp_IRBA_Report" class="<?php if (ewr_IsResponsiveLayout()) { echo "table-responsive "; } ?>ewGridMiddlePanel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>" style="width: 1500px;">
<thead>
	<!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($Page->No->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="No"><div class="IRBA_Report_No"><span class="ewTableHeaderCaption"><?php echo $Page->No->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="No">
<?php if ($Page->SortUrl($Page->No) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_No">
			<span class="ewTableHeaderCaption"><?php echo $Page->No->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_No" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->No) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->No->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->No->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->No->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Client_Name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Client_Name">sdfa<div class="IRBA_Report_Client_Name"><span class="ewTableHeaderCaption"><?php echo $Page->Client_Name->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Client_Name">
<?php if ($Page->SortUrl($Page->Client_Name) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_Client_Name">
			<span class="ewTableHeaderCaption"><?php echo $Page->Client_Name->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_Client_Name" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Client_Name) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Client_Name->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Client_Name->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Client_Name->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Audit_Fee->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Audit_Fee"><div class="IRBA_Report_Audit_Fee"><span class="ewTableHeaderCaption"><?php echo $Page->Audit_Fee->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Audit_Fee">
<?php if ($Page->SortUrl($Page->Audit_Fee) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_Audit_Fee">
			<span class="ewTableHeaderCaption"><?php echo $Page->Audit_Fee->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_Audit_Fee" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Audit_Fee) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Audit_Fee->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Audit_Fee->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Audit_Fee->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Period_end_of_AFS->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Period_end_of_AFS"><div class="IRBA_Report_Period_end_of_AFS" style="white-space: nowrap;"><span class="ewTableHeaderCaption"><?php echo $Page->Period_end_of_AFS->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Period_end_of_AFS">
<?php if ($Page->SortUrl($Page->Period_end_of_AFS) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_Period_end_of_AFS" style="white-space: nowrap;">
			<span class="ewTableHeaderCaption"><?php echo $Page->Period_end_of_AFS->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_Period_end_of_AFS" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Period_end_of_AFS) ?>',0);" style="white-space: nowrap;">
			<span class="ewTableHeaderCaption"><?php echo $Page->Period_end_of_AFS->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Period_end_of_AFS->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Period_end_of_AFS->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Date_Opinion_was_signed->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Date_Opinion_was_signed"><div class="IRBA_Report_Date_Opinion_was_signed" style="white-space: nowrap;"><span class="ewTableHeaderCaption"><?php echo $Page->Date_Opinion_was_signed->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Date_Opinion_was_signed">
<?php if ($Page->SortUrl($Page->Date_Opinion_was_signed) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_Date_Opinion_was_signed" style="white-space: nowrap;">
			<span class="ewTableHeaderCaption"><?php echo $Page->Date_Opinion_was_signed->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_Date_Opinion_was_signed" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Date_Opinion_was_signed) ?>',0);" style="white-space: nowrap;">
			<span class="ewTableHeaderCaption"><?php echo $Page->Date_Opinion_was_signed->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Date_Opinion_was_signed->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Date_Opinion_was_signed->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->PI_Score->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="PI_Score"><div class="IRBA_Report_PI_Score"><span class="ewTableHeaderCaption"><?php echo $Page->PI_Score->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="PI_Score">
<?php if ($Page->SortUrl($Page->PI_Score) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_PI_Score">
			<span class="ewTableHeaderCaption"><?php echo $Page->PI_Score->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_PI_Score" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->PI_Score) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->PI_Score->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->PI_Score->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->PI_Score->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Partner->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Partner"><div class="IRBA_Report_Partner"><span class="ewTableHeaderCaption"><?php echo $Page->Partner->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Partner">
<?php if ($Page->SortUrl($Page->Partner) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_Partner">
			<span class="ewTableHeaderCaption"><?php echo $Page->Partner->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_Partner" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Partner) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Partner->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Partner->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Partner->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Risk->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Risk"><div class="IRBA_Report_Risk"><span class="ewTableHeaderCaption"><?php echo $Page->Risk->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Risk">
<?php if ($Page->SortUrl($Page->Risk) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_Risk">
			<span class="ewTableHeaderCaption"><?php echo $Page->Risk->FldCaption() ?></span>
	<?php if (!$Page->ShowReportInDashboard) { ?>
			<a class="ewTableHeaderPopup" title="<?php echo $ReportLanguage->Phrase("Filter"); ?>" onclick="ewr_ShowPopup.call(this, event, { name: 'IRBA_Report_Risk', range: false, from: '<?php echo $Page->Risk->RangeFrom; ?>', to: '<?php echo $Page->Risk->RangeTo; ?>', url: 'IRBA_Reportsmry.php' });" id="x_Risk<?php echo $Page->Cnt[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_Risk" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Risk) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Risk->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Risk->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Risk->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
	<?php if (!$Page->ShowReportInDashboard) { ?>
			<a class="ewTableHeaderPopup" title="<?php echo $ReportLanguage->Phrase("Filter"); ?>" onclick="ewr_ShowPopup.call(this, event, { name: 'IRBA_Report_Risk', range: false, from: '<?php echo $Page->Risk->RangeFrom; ?>', to: '<?php echo $Page->Risk->RangeTo; ?>', url: 'IRBA_Reportsmry.php' });" id="x_Risk<?php echo $Page->Cnt[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->City->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="City"><div class="IRBA_Report_City"><span class="ewTableHeaderCaption"><?php echo $Page->City->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="City">
<?php if ($Page->SortUrl($Page->City) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_Report_City">
			<span class="ewTableHeaderCaption"><?php echo $Page->City->FldCaption() ?></span>
	<?php if (!$Page->ShowReportInDashboard) { ?>
			<a class="ewTableHeaderPopup" title="<?php echo $ReportLanguage->Phrase("Filter"); ?>" onclick="ewr_ShowPopup.call(this, event, { name: 'IRBA_Report_City', range: false, from: '<?php echo $Page->City->RangeFrom; ?>', to: '<?php echo $Page->City->RangeTo; ?>', url: 'IRBA_Reportsmry.php' });" id="x_City<?php echo $Page->Cnt[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_Report_City" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->City) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->City->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->City->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->City->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
	<?php if (!$Page->ShowReportInDashboard) { ?>
			<a class="ewTableHeaderPopup" title="<?php echo $ReportLanguage->Phrase("Filter"); ?>" onclick="ewr_ShowPopup.call(this, event, { name: 'IRBA_Report_City', range: false, from: '<?php echo $Page->City->RangeFrom; ?>', to: '<?php echo $Page->City->RangeTo; ?>', url: 'IRBA_Reportsmry.php' });" id="x_City<?php echo $Page->Cnt[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
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
<?php if ($Page->No->Visible) { ?>
		<td data-field="No"<?php echo $Page->No->CellAttributes() ?>>
<span<?php echo $Page->No->ViewAttributes() ?>><?php echo $Page->No->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Client_Name->Visible) { ?>
		<td data-field="Client_Name"<?php echo $Page->Client_Name->CellAttributes() ?>>
<span<?php echo $Page->Client_Name->ViewAttributes() ?>><?php echo $Page->Client_Name->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Audit_Fee->Visible) { ?>
		<td data-field="Audit_Fee"<?php echo $Page->Audit_Fee->CellAttributes() ?>>
<span<?php echo $Page->Audit_Fee->ViewAttributes() ?>><?php echo $Page->Audit_Fee->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Period_end_of_AFS->Visible) { ?>
		<td data-field="Period_end_of_AFS"<?php echo $Page->Period_end_of_AFS->CellAttributes() ?>>
<span<?php echo $Page->Period_end_of_AFS->ViewAttributes() ?>><?php echo $Page->Period_end_of_AFS->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Date_Opinion_was_signed->Visible) { ?>
		<td data-field="Date_Opinion_was_signed"<?php echo $Page->Date_Opinion_was_signed->CellAttributes() ?>>
<span<?php echo $Page->Date_Opinion_was_signed->ViewAttributes() ?>><?php echo $Page->Date_Opinion_was_signed->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->PI_Score->Visible) { ?>
		<td data-field="PI_Score"<?php echo $Page->PI_Score->CellAttributes() ?>>
<span<?php echo $Page->PI_Score->ViewAttributes() ?>><?php echo $Page->PI_Score->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Partner->Visible) { ?>
		<td data-field="Partner"<?php echo $Page->Partner->CellAttributes() ?>>
<span<?php echo $Page->Partner->ViewAttributes() ?>><?php echo $Page->Partner->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Risk->Visible) { ?>
		<td data-field="Risk"<?php echo $Page->Risk->CellAttributes() ?>>
<span<?php echo $Page->Risk->ViewAttributes() ?>><?php echo $Page->Risk->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->City->Visible) { ?>
		<td data-field="City"<?php echo $Page->City->CellAttributes() ?>>
<span<?php echo $Page->City->ViewAttributes() ?>><?php echo $Page->City->ListViewValue() ?></span></td>
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
<?php
	$Page->ResetAttrs();
	$Page->RowType = EWR_ROWTYPE_TOTAL;
	$Page->RowTotalType = EWR_ROWTOTAL_GRAND;
	$Page->RowTotalSubType = EWR_ROWTOTAL_FOOTER;
	$Page->RowAttrs["class"] = "ewRptGrandSummary";
	$Page->RenderRow();
?>
	<tr<?php echo $Page->RowAttributes() ?>><td colspan="<?php echo ($Page->GrpColumnCount + $Page->DtlColumnCount) ?>"><?php echo $ReportLanguage->Phrase("RptGrandSummary") ?> <span class="ewDirLtr">(<?php echo ewr_FormatNumber($Page->TotCount,0,-2,-2,-2); ?><?php echo $ReportLanguage->Phrase("RptDtlRec") ?>)</span></td></tr>
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
<div id="gmp_IRBA_Report" class="<?php if (ewr_IsResponsiveLayout()) { echo "table-responsive "; } ?>ewGridMiddlePanel">
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
<?php include "IRBA_Reportsmrypager.php" ?>
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
