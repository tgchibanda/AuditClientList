<?php
if (session_id() == "") session_start(); // Initialize Session data
ob_start();
?>
<?php include_once "rcfg11.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "phprptinc/ewmysql.php") ?>
<?php include_once "rphpfn11.php" ?>
<?php include_once "rusrfn11.php" ?>
<?php include_once "IRBA_2smryinfo.php" ?>
<?php

//
// Page class
//

$IRBA_2_summary = NULL; // Initialize page object first

class crIRBA_2_summary extends crIRBA_2 {

	// Page ID
	var $PageID = 'summary';

	// Project ID
	var $ProjectID = "{2A81346C-7FD8-48B9-8BFA-9FDF9B45A2E9}";

	// Page object name
	var $PageObjName = 'IRBA_2_summary';

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

		// Table object (IRBA_2)
		if (!isset($GLOBALS["IRBA_2"])) {
			$GLOBALS["IRBA_2"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["IRBA_2"];
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
			define("EWR_TABLE_NAME", 'IRBA 2', TRUE);

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
		$this->FilterOptions->TagClassName = "ewFilterOption fIRBA_2summary";

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
		$item->Visible = TRUE;
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
//		$item->Visible = FALSE;

		$ReportTypes["pdf"] = $item->Visible ? $ReportLanguage->Phrase("ReportFormPdf") : "";

		// Export to Email
		$item = &$this->ExportOptions->Add("email");
		$url = $this->PageUrl() . "export=email";
		$item->Body = "<a class=\"ewrExportLink ewEmail\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToEmail", TRUE)) . "\" id=\"emf_IRBA_2\" href=\"javascript:void(0);\" onclick=\"ewr_EmailDialogShow({lnk:'emf_IRBA_2',hdr:ewLanguage.Phrase('ExportToEmail'),url:'$url',exportid:'$exportid',el:this});\">" . $ReportLanguage->Phrase("ExportToEmail") . "</a>";
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
		$item->Body = "<a class=\"ewSaveFilter\" data-form=\"fIRBA_2summary\" href=\"#\">" . $ReportLanguage->Phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->Add("deletefilter");
		$item->Body = "<a class=\"ewDeleteFilter\" data-form=\"fIRBA_2summary\" href=\"#\">" . $ReportLanguage->Phrase("DeleteFilter") . "</a>";
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
		$item->Body = "<button type=\"button\" class=\"btn btn-default ewSearchToggle" . $SearchToggleClass . "\" title=\"" . $ReportLanguage->Phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->Phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"fIRBA_2summary\">" . $ReportLanguage->Phrase("SearchBtn") . "</button>";
		$item->Visible = FALSE;

		// Reset filter
		$item = &$this->SearchOptions->Add("resetfilter");
		$item->Body = "<button type=\"button\" class=\"btn btn-default\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ResetAllFilter", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ResetAllFilter", TRUE)) . "\" onclick=\"location='" . ewr_CurrentPage() . "?cmd=reset'\">" . $ReportLanguage->Phrase("ResetAllFilter") . "</button>";
		$item->Visible = FALSE && $this->FilterApplied;

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
		$this->Client_Name->SetVisibility();
		$this->Group_Structure->SetVisibility();
		$this->Client_CIPC->SetVisibility();
		$this->Companies_Act->SetVisibility();
		$this->IRBA_Code->SetVisibility();
		$this->ISQC_1->SetVisibility();
		$this->ISQC_2->SetVisibility();
		$this->Assurance_Work->SetVisibility();
		$this->Amount_Billed->SetVisibility();
		$this->JSE_Listed->SetVisibility();
		$this->Industry->SetVisibility();
		$this->Period_end_of_AFS->SetVisibility();
		$this->Date_Opinion_was_signed->SetVisibility();
		$this->Partner->SetVisibility();
		$this->Next_IRBA->SetVisibility();
		$this->Accounting_Framework->SetVisibility();
		$this->Client_Turnover->SetVisibility();
		$this->IRBA->SetVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$nDtls = 19;
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
		$this->Col = array(array(FALSE, FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE), array(FALSE,FALSE));

		// Set up groups per page dynamically
		$this->SetUpDisplayGrps();

		// Set up Breadcrumb
		if ($this->Export == "")
			$this->SetupBreadcrumb();

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

		// Build popup filter
		$sPopupFilter = $this->GetPopupFilter();

		//ewr_SetDebugMsg("popup filter: " . $sPopupFilter);
		ewr_AddFilter($this->Filter, $sPopupFilter);

		// No filter
		$this->FilterApplied = FALSE;
		$this->FilterOptions->GetItem("savecurrentfilter")->Visible = FALSE;
		$this->FilterOptions->GetItem("deletefilter")->Visible = FALSE;

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
		$this->ShowHeader = ($this->TotalGrps > 0);

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
				$this->FirstRowData['Group_Structure'] = ewr_Conv($rs->fields('Group_Structure'), 200);
				$this->FirstRowData['Client_CIPC'] = ewr_Conv($rs->fields('Client_CIPC'), 200);
				$this->FirstRowData['Companies_Act'] = ewr_Conv($rs->fields('Companies_Act'), 200);
				$this->FirstRowData['IRBA_Code'] = ewr_Conv($rs->fields('IRBA_Code'), 200);
				$this->FirstRowData['ISQC_1'] = ewr_Conv($rs->fields('ISQC_1'), 200);
				$this->FirstRowData['ISQC_2'] = ewr_Conv($rs->fields('ISQC_2'), 200);
				$this->FirstRowData['Assurance_Work'] = ewr_Conv($rs->fields('Assurance_Work'), 200);
				$this->FirstRowData['Amount_Billed'] = ewr_Conv($rs->fields('Amount_Billed'), 200);
				$this->FirstRowData['JSE_Listed'] = ewr_Conv($rs->fields('JSE_Listed'), 200);
				$this->FirstRowData['Industry'] = ewr_Conv($rs->fields('Industry'), 200);
				$this->FirstRowData['Period_end_of_AFS'] = ewr_Conv($rs->fields('Period_end_of_AFS'), 200);
				$this->FirstRowData['Date_Opinion_was_signed'] = ewr_Conv($rs->fields('Date_Opinion_was_signed'), 200);
				$this->FirstRowData['Partner'] = ewr_Conv($rs->fields('Partner'), 200);
				$this->FirstRowData['Next_IRBA'] = ewr_Conv($rs->fields('Next_IRBA'), 200);
				$this->FirstRowData['Accounting_Framework'] = ewr_Conv($rs->fields('Accounting_Framework'), 200);
				$this->FirstRowData['Client_Turnover'] = ewr_Conv($rs->fields('Client_Turnover'), 200);
				$this->FirstRowData['IRBA'] = ewr_Conv($rs->fields('IRBA'), 200);
		} else { // Get next row
			$rs->MoveNext();
		}
		if (!$rs->EOF) {
			$this->Client_Name->setDbValue($rs->fields('Client_Name'));
			$this->Group_Structure->setDbValue($rs->fields('Group_Structure'));
			$this->Client_CIPC->setDbValue($rs->fields('Client_CIPC'));
			$this->Companies_Act->setDbValue($rs->fields('Companies_Act'));
			$this->IRBA_Code->setDbValue($rs->fields('IRBA_Code'));
			$this->ISQC_1->setDbValue($rs->fields('ISQC_1'));
			$this->ISQC_2->setDbValue($rs->fields('ISQC_2'));
			$this->Assurance_Work->setDbValue($rs->fields('Assurance_Work'));
			$this->Amount_Billed->setDbValue($rs->fields('Amount_Billed'));
			$this->JSE_Listed->setDbValue($rs->fields('JSE_Listed'));
			$this->Industry->setDbValue($rs->fields('Industry'));
			$this->Period_end_of_AFS->setDbValue($rs->fields('Period_end_of_AFS'));
			$this->Date_Opinion_was_signed->setDbValue($rs->fields('Date_Opinion_was_signed'));
			$this->Partner->setDbValue($rs->fields('Partner'));
			$this->Next_IRBA->setDbValue($rs->fields('Next_IRBA'));
			$this->Accounting_Framework->setDbValue($rs->fields('Accounting_Framework'));
			$this->Client_Turnover->setDbValue($rs->fields('Client_Turnover'));
			$this->IRBA->setDbValue($rs->fields('IRBA'));
			$this->Val[1] = $this->Client_Name->CurrentValue;
			$this->Val[2] = $this->Group_Structure->CurrentValue;
			$this->Val[3] = $this->Client_CIPC->CurrentValue;
			$this->Val[4] = $this->Companies_Act->CurrentValue;
			$this->Val[5] = $this->IRBA_Code->CurrentValue;
			$this->Val[6] = $this->ISQC_1->CurrentValue;
			$this->Val[7] = $this->ISQC_2->CurrentValue;
			$this->Val[8] = $this->Assurance_Work->CurrentValue;
			$this->Val[9] = $this->Amount_Billed->CurrentValue;
			$this->Val[10] = $this->JSE_Listed->CurrentValue;
			$this->Val[11] = $this->Industry->CurrentValue;
			$this->Val[12] = $this->Period_end_of_AFS->CurrentValue;
			$this->Val[13] = $this->Date_Opinion_was_signed->CurrentValue;
			$this->Val[14] = $this->Partner->CurrentValue;
			$this->Val[15] = $this->Next_IRBA->CurrentValue;
			$this->Val[16] = $this->Accounting_Framework->CurrentValue;
			$this->Val[17] = $this->Client_Turnover->CurrentValue;
			$this->Val[18] = $this->IRBA->CurrentValue;
		} else {
			$this->Client_Name->setDbValue("");
			$this->Group_Structure->setDbValue("");
			$this->Client_CIPC->setDbValue("");
			$this->Companies_Act->setDbValue("");
			$this->IRBA_Code->setDbValue("");
			$this->ISQC_1->setDbValue("");
			$this->ISQC_2->setDbValue("");
			$this->Assurance_Work->setDbValue("");
			$this->Amount_Billed->setDbValue("");
			$this->JSE_Listed->setDbValue("");
			$this->Industry->setDbValue("");
			$this->Period_end_of_AFS->setDbValue("");
			$this->Date_Opinion_was_signed->setDbValue("");
			$this->Partner->setDbValue("");
			$this->Next_IRBA->setDbValue("");
			$this->Accounting_Framework->setDbValue("");
			$this->Client_Turnover->setDbValue("");
			$this->IRBA->setDbValue("");
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
				$this->ResetPager();
			}
		}

		// Load selection criteria to array
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

			// Client_Name
			$this->Client_Name->HrefValue = "";

			// Group_Structure
			$this->Group_Structure->HrefValue = "";

			// Client_CIPC
			$this->Client_CIPC->HrefValue = "";

			// Companies_Act
			$this->Companies_Act->HrefValue = "";

			// IRBA_Code
			$this->IRBA_Code->HrefValue = "";

			// ISQC_1
			$this->ISQC_1->HrefValue = "";

			// ISQC_2
			$this->ISQC_2->HrefValue = "";

			// Assurance_Work
			$this->Assurance_Work->HrefValue = "";

			// Amount_Billed
			$this->Amount_Billed->HrefValue = "";

			// JSE_Listed
			$this->JSE_Listed->HrefValue = "";

			// Industry
			$this->Industry->HrefValue = "";

			// Period_end_of_AFS
			$this->Period_end_of_AFS->HrefValue = "";

			// Date_Opinion_was_signed
			$this->Date_Opinion_was_signed->HrefValue = "";

			// Partner
			$this->Partner->HrefValue = "";

			// Next_IRBA
			$this->Next_IRBA->HrefValue = "";

			// Accounting_Framework
			$this->Accounting_Framework->HrefValue = "";

			// Client_Turnover
			$this->Client_Turnover->HrefValue = "";

			// IRBA
			$this->IRBA->HrefValue = "";
		} else {
			if ($this->RowTotalType == EWR_ROWTOTAL_GROUP && $this->RowTotalSubType == EWR_ROWTOTAL_HEADER) {
			} else {
			}

			// Client_Name
			$this->Client_Name->ViewValue = $this->Client_Name->CurrentValue;
			$this->Client_Name->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Group_Structure
			$this->Group_Structure->ViewValue = $this->Group_Structure->CurrentValue;
			$this->Group_Structure->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Client_CIPC
			$this->Client_CIPC->ViewValue = $this->Client_CIPC->CurrentValue;
			$this->Client_CIPC->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Companies_Act
			$this->Companies_Act->ViewValue = $this->Companies_Act->CurrentValue;
			$this->Companies_Act->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// IRBA_Code
			$this->IRBA_Code->ViewValue = $this->IRBA_Code->CurrentValue;
			$this->IRBA_Code->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// ISQC_1
			$this->ISQC_1->ViewValue = $this->ISQC_1->CurrentValue;
			$this->ISQC_1->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// ISQC_2
			$this->ISQC_2->ViewValue = $this->ISQC_2->CurrentValue;
			$this->ISQC_2->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Assurance_Work
			$this->Assurance_Work->ViewValue = $this->Assurance_Work->CurrentValue;
			$this->Assurance_Work->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Amount_Billed
			$this->Amount_Billed->ViewValue = $this->Amount_Billed->CurrentValue;
			$this->Amount_Billed->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// JSE_Listed
			$this->JSE_Listed->ViewValue = $this->JSE_Listed->CurrentValue;
			$this->JSE_Listed->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Industry
			$this->Industry->ViewValue = $this->Industry->CurrentValue;
			$this->Industry->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Period_end_of_AFS
			$this->Period_end_of_AFS->ViewValue = $this->Period_end_of_AFS->CurrentValue;
			$this->Period_end_of_AFS->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Date_Opinion_was_signed
			$this->Date_Opinion_was_signed->ViewValue = $this->Date_Opinion_was_signed->CurrentValue;
			$this->Date_Opinion_was_signed->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Partner
			$this->Partner->ViewValue = $this->Partner->CurrentValue;
			$this->Partner->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Next_IRBA
			$this->Next_IRBA->ViewValue = $this->Next_IRBA->CurrentValue;
			$this->Next_IRBA->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Accounting_Framework
			$this->Accounting_Framework->ViewValue = $this->Accounting_Framework->CurrentValue;
			$this->Accounting_Framework->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Client_Turnover
			$this->Client_Turnover->ViewValue = $this->Client_Turnover->CurrentValue;
			$this->Client_Turnover->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// IRBA
			$this->IRBA->ViewValue = $this->IRBA->CurrentValue;
			$this->IRBA->CellAttrs["class"] = ($this->RecCount % 2 <> 1) ? "ewTableAltRow" : "ewTableRow";

			// Client_Name
			$this->Client_Name->HrefValue = "";

			// Group_Structure
			$this->Group_Structure->HrefValue = "";

			// Client_CIPC
			$this->Client_CIPC->HrefValue = "";

			// Companies_Act
			$this->Companies_Act->HrefValue = "";

			// IRBA_Code
			$this->IRBA_Code->HrefValue = "";

			// ISQC_1
			$this->ISQC_1->HrefValue = "";

			// ISQC_2
			$this->ISQC_2->HrefValue = "";

			// Assurance_Work
			$this->Assurance_Work->HrefValue = "";

			// Amount_Billed
			$this->Amount_Billed->HrefValue = "";

			// JSE_Listed
			$this->JSE_Listed->HrefValue = "";

			// Industry
			$this->Industry->HrefValue = "";

			// Period_end_of_AFS
			$this->Period_end_of_AFS->HrefValue = "";

			// Date_Opinion_was_signed
			$this->Date_Opinion_was_signed->HrefValue = "";

			// Partner
			$this->Partner->HrefValue = "";

			// Next_IRBA
			$this->Next_IRBA->HrefValue = "";

			// Accounting_Framework
			$this->Accounting_Framework->HrefValue = "";

			// Client_Turnover
			$this->Client_Turnover->HrefValue = "";

			// IRBA
			$this->IRBA->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == EWR_ROWTYPE_TOTAL) { // Summary row
		} else {

			// Client_Name
			$CurrentValue = $this->Client_Name->CurrentValue;
			$ViewValue = &$this->Client_Name->ViewValue;
			$ViewAttrs = &$this->Client_Name->ViewAttrs;
			$CellAttrs = &$this->Client_Name->CellAttrs;
			$HrefValue = &$this->Client_Name->HrefValue;
			$LinkAttrs = &$this->Client_Name->LinkAttrs;
			$this->Cell_Rendered($this->Client_Name, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Group_Structure
			$CurrentValue = $this->Group_Structure->CurrentValue;
			$ViewValue = &$this->Group_Structure->ViewValue;
			$ViewAttrs = &$this->Group_Structure->ViewAttrs;
			$CellAttrs = &$this->Group_Structure->CellAttrs;
			$HrefValue = &$this->Group_Structure->HrefValue;
			$LinkAttrs = &$this->Group_Structure->LinkAttrs;
			$this->Cell_Rendered($this->Group_Structure, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Client_CIPC
			$CurrentValue = $this->Client_CIPC->CurrentValue;
			$ViewValue = &$this->Client_CIPC->ViewValue;
			$ViewAttrs = &$this->Client_CIPC->ViewAttrs;
			$CellAttrs = &$this->Client_CIPC->CellAttrs;
			$HrefValue = &$this->Client_CIPC->HrefValue;
			$LinkAttrs = &$this->Client_CIPC->LinkAttrs;
			$this->Cell_Rendered($this->Client_CIPC, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Companies_Act
			$CurrentValue = $this->Companies_Act->CurrentValue;
			$ViewValue = &$this->Companies_Act->ViewValue;
			$ViewAttrs = &$this->Companies_Act->ViewAttrs;
			$CellAttrs = &$this->Companies_Act->CellAttrs;
			$HrefValue = &$this->Companies_Act->HrefValue;
			$LinkAttrs = &$this->Companies_Act->LinkAttrs;
			$this->Cell_Rendered($this->Companies_Act, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// IRBA_Code
			$CurrentValue = $this->IRBA_Code->CurrentValue;
			$ViewValue = &$this->IRBA_Code->ViewValue;
			$ViewAttrs = &$this->IRBA_Code->ViewAttrs;
			$CellAttrs = &$this->IRBA_Code->CellAttrs;
			$HrefValue = &$this->IRBA_Code->HrefValue;
			$LinkAttrs = &$this->IRBA_Code->LinkAttrs;
			$this->Cell_Rendered($this->IRBA_Code, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// ISQC_1
			$CurrentValue = $this->ISQC_1->CurrentValue;
			$ViewValue = &$this->ISQC_1->ViewValue;
			$ViewAttrs = &$this->ISQC_1->ViewAttrs;
			$CellAttrs = &$this->ISQC_1->CellAttrs;
			$HrefValue = &$this->ISQC_1->HrefValue;
			$LinkAttrs = &$this->ISQC_1->LinkAttrs;
			$this->Cell_Rendered($this->ISQC_1, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// ISQC_2
			$CurrentValue = $this->ISQC_2->CurrentValue;
			$ViewValue = &$this->ISQC_2->ViewValue;
			$ViewAttrs = &$this->ISQC_2->ViewAttrs;
			$CellAttrs = &$this->ISQC_2->CellAttrs;
			$HrefValue = &$this->ISQC_2->HrefValue;
			$LinkAttrs = &$this->ISQC_2->LinkAttrs;
			$this->Cell_Rendered($this->ISQC_2, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Assurance_Work
			$CurrentValue = $this->Assurance_Work->CurrentValue;
			$ViewValue = &$this->Assurance_Work->ViewValue;
			$ViewAttrs = &$this->Assurance_Work->ViewAttrs;
			$CellAttrs = &$this->Assurance_Work->CellAttrs;
			$HrefValue = &$this->Assurance_Work->HrefValue;
			$LinkAttrs = &$this->Assurance_Work->LinkAttrs;
			$this->Cell_Rendered($this->Assurance_Work, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Amount_Billed
			$CurrentValue = $this->Amount_Billed->CurrentValue;
			$ViewValue = &$this->Amount_Billed->ViewValue;
			$ViewAttrs = &$this->Amount_Billed->ViewAttrs;
			$CellAttrs = &$this->Amount_Billed->CellAttrs;
			$HrefValue = &$this->Amount_Billed->HrefValue;
			$LinkAttrs = &$this->Amount_Billed->LinkAttrs;
			$this->Cell_Rendered($this->Amount_Billed, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// JSE_Listed
			$CurrentValue = $this->JSE_Listed->CurrentValue;
			$ViewValue = &$this->JSE_Listed->ViewValue;
			$ViewAttrs = &$this->JSE_Listed->ViewAttrs;
			$CellAttrs = &$this->JSE_Listed->CellAttrs;
			$HrefValue = &$this->JSE_Listed->HrefValue;
			$LinkAttrs = &$this->JSE_Listed->LinkAttrs;
			$this->Cell_Rendered($this->JSE_Listed, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Industry
			$CurrentValue = $this->Industry->CurrentValue;
			$ViewValue = &$this->Industry->ViewValue;
			$ViewAttrs = &$this->Industry->ViewAttrs;
			$CellAttrs = &$this->Industry->CellAttrs;
			$HrefValue = &$this->Industry->HrefValue;
			$LinkAttrs = &$this->Industry->LinkAttrs;
			$this->Cell_Rendered($this->Industry, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

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

			// Partner
			$CurrentValue = $this->Partner->CurrentValue;
			$ViewValue = &$this->Partner->ViewValue;
			$ViewAttrs = &$this->Partner->ViewAttrs;
			$CellAttrs = &$this->Partner->CellAttrs;
			$HrefValue = &$this->Partner->HrefValue;
			$LinkAttrs = &$this->Partner->LinkAttrs;
			$this->Cell_Rendered($this->Partner, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Next_IRBA
			$CurrentValue = $this->Next_IRBA->CurrentValue;
			$ViewValue = &$this->Next_IRBA->ViewValue;
			$ViewAttrs = &$this->Next_IRBA->ViewAttrs;
			$CellAttrs = &$this->Next_IRBA->CellAttrs;
			$HrefValue = &$this->Next_IRBA->HrefValue;
			$LinkAttrs = &$this->Next_IRBA->LinkAttrs;
			$this->Cell_Rendered($this->Next_IRBA, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Accounting_Framework
			$CurrentValue = $this->Accounting_Framework->CurrentValue;
			$ViewValue = &$this->Accounting_Framework->ViewValue;
			$ViewAttrs = &$this->Accounting_Framework->ViewAttrs;
			$CellAttrs = &$this->Accounting_Framework->CellAttrs;
			$HrefValue = &$this->Accounting_Framework->HrefValue;
			$LinkAttrs = &$this->Accounting_Framework->LinkAttrs;
			$this->Cell_Rendered($this->Accounting_Framework, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// Client_Turnover
			$CurrentValue = $this->Client_Turnover->CurrentValue;
			$ViewValue = &$this->Client_Turnover->ViewValue;
			$ViewAttrs = &$this->Client_Turnover->ViewAttrs;
			$CellAttrs = &$this->Client_Turnover->CellAttrs;
			$HrefValue = &$this->Client_Turnover->HrefValue;
			$LinkAttrs = &$this->Client_Turnover->LinkAttrs;
			$this->Cell_Rendered($this->Client_Turnover, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);

			// IRBA
			$CurrentValue = $this->IRBA->CurrentValue;
			$ViewValue = &$this->IRBA->ViewValue;
			$ViewAttrs = &$this->IRBA->ViewAttrs;
			$CellAttrs = &$this->IRBA->CellAttrs;
			$HrefValue = &$this->IRBA->HrefValue;
			$LinkAttrs = &$this->IRBA->LinkAttrs;
			$this->Cell_Rendered($this->IRBA, $CurrentValue, $ViewValue, $ViewAttrs, $CellAttrs, $HrefValue, $LinkAttrs);
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
		if ($this->Client_Name->Visible) $this->DtlColumnCount += 1;
		if ($this->Group_Structure->Visible) $this->DtlColumnCount += 1;
		if ($this->Client_CIPC->Visible) $this->DtlColumnCount += 1;
		if ($this->Companies_Act->Visible) $this->DtlColumnCount += 1;
		if ($this->IRBA_Code->Visible) $this->DtlColumnCount += 1;
		if ($this->ISQC_1->Visible) $this->DtlColumnCount += 1;
		if ($this->ISQC_2->Visible) $this->DtlColumnCount += 1;
		if ($this->Assurance_Work->Visible) $this->DtlColumnCount += 1;
		if ($this->Amount_Billed->Visible) $this->DtlColumnCount += 1;
		if ($this->JSE_Listed->Visible) $this->DtlColumnCount += 1;
		if ($this->Industry->Visible) $this->DtlColumnCount += 1;
		if ($this->Period_end_of_AFS->Visible) $this->DtlColumnCount += 1;
		if ($this->Date_Opinion_was_signed->Visible) $this->DtlColumnCount += 1;
		if ($this->Partner->Visible) $this->DtlColumnCount += 1;
		if ($this->Next_IRBA->Visible) $this->DtlColumnCount += 1;
		if ($this->Accounting_Framework->Visible) $this->DtlColumnCount += 1;
		if ($this->Client_Turnover->Visible) $this->DtlColumnCount += 1;
		if ($this->IRBA->Visible) $this->DtlColumnCount += 1;
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
		$item->Visible = FALSE;
		if ($item->Visible)
			$ReportTypes["pdf"] = $ReportLanguage->Phrase("ReportFormPdf");
		$exportid = session_id();
		$url = $this->ExportPdfUrl;
		$item->Body = "<a class=\"ewrExportLink ewPdf\" title=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . ewr_HtmlEncode($ReportLanguage->Phrase("ExportToPDF", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ewr_ExportCharts(this, '" . $url . "', '" . $exportid . "');\">" . $ReportLanguage->Phrase("ExportToPDF") . "</a>";
		$ReportOptions["ReportTypes"] = $ReportTypes;
	}

	// Return popup filter
	function GetPopupFilter() {
		$sWrk = "";
		if ($this->DrillDown)
			return "";
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
			$this->Client_Name->setSort("");
			$this->Group_Structure->setSort("");
			$this->Client_CIPC->setSort("");
			$this->Companies_Act->setSort("");
			$this->IRBA_Code->setSort("");
			$this->ISQC_1->setSort("");
			$this->ISQC_2->setSort("");
			$this->Assurance_Work->setSort("");
			$this->Amount_Billed->setSort("");
			$this->JSE_Listed->setSort("");
			$this->Industry->setSort("");
			$this->Period_end_of_AFS->setSort("");
			$this->Date_Opinion_was_signed->setSort("");
			$this->Partner->setSort("");
			$this->Next_IRBA->setSort("");
			$this->Accounting_Framework->setSort("");
			$this->Client_Turnover->setSort("");
			$this->IRBA->setSort("");

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

	// Export to HTML
	function ExportHtml($html, $options = array()) {

		//global $gsExportFile;
		//header('Content-Type: text/html' . (EWR_CHARSET <> '' ? ';charset=' . EWR_CHARSET : ''));
		//header('Content-Disposition: attachment; filename=' . $gsExportFile . '.html');

		$folder = @$this->GenOptions["folder"];
		$fileName = @$this->GenOptions["filename"];
		$responseType = @$options["responsetype"];
		$saveToFile = "";

		// Save generate file for print
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && EWR_REPORT_SAVE_OUTPUT_ON_SERVER)) {
			$baseTag = "<base href=\"" . ewr_BaseUrl() . "\">";
			$html = preg_replace('/<head>/', '<head>' . $baseTag, $html);
			ewr_SaveFile($folder, $fileName, $html);
			$saveToFile = ewr_UploadPathEx(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file")
			echo $html;
		return $saveToFile;
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
if (!isset($IRBA_2_summary)) $IRBA_2_summary = new crIRBA_2_summary();
if (isset($Page)) $OldPage = $Page;
$Page = &$IRBA_2_summary;

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
var IRBA_2_summary = new ewr_Page("IRBA_2_summary");

// Page properties
IRBA_2_summary.PageID = "summary"; // Page ID
var EWR_PAGE_ID = IRBA_2_summary.PageID;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$Page->ShowReportInDashboard) { ?>
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
<div id="report_summary">
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
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ewGrid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="box ewBox ewGrid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_IRBA_2" class="<?php if (ewr_IsResponsiveLayout()) { echo "table-responsive "; } ?>ewGridMiddlePanel">
<table class="<?php echo $Page->ReportTableClass ?>" style="width: 3500px;">
<thead>
	<!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($Page->Client_Name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Client_Name"><div class="IRBA_2_Client_Name"><span class="ewTableHeaderCaption"><?php echo $Page->Client_Name->FldCaption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Client_Name">
<?php if ($Page->SortUrl($Page->Client_Name) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Client_Name">
			<span class="ewTableHeaderCaption"><?php echo $Page->Client_Name->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Client_Name" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Client_Name) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Client_Name->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Client_Name->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Client_Name->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Group_Structure->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Group_Structure"><div class="IRBA_2_Group_Structure"><span class="ewTableHeaderCaption"><?php echo $Page->Group_Structure->FldCaption() ?></span></div>
	<hr>Highest level SA parent entity, audited by the SA firm</td>
<?php } else { ?>
	<td data-field="Group_Structure">
<?php if ($Page->SortUrl($Page->Group_Structure) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Group_Structure">
			<span class="ewTableHeaderCaption"><?php echo $Page->Group_Structure->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Group_Structure" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Group_Structure) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Group_Structure->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Group_Structure->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Group_Structure->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	<hr>Highest level SA parent entity, audited by the SA firm</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Client_CIPC->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Client_CIPC"><div class="IRBA_2_Client_CIPC"><span class="ewTableHeaderCaption"><?php echo $Page->Client_CIPC->FldCaption() ?></span></div>
	<hr>
	Registration No
	
	</td>
<?php } else { ?>
	<td data-field="Client_CIPC">
<?php if ($Page->SortUrl($Page->Client_CIPC) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Client_CIPC">
			<span class="ewTableHeaderCaption"><?php echo $Page->Client_CIPC->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Client_CIPC" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Client_CIPC) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Client_CIPC->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Client_CIPC->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Client_CIPC->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
Registration No


</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Companies_Act->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Companies_Act"><div class="IRBA_2_Companies_Act"><span class="ewTableHeaderCaption"><?php echo $Page->Companies_Act->FldCaption() ?></span></div>
	<hr>
	Public Interest Score (PIS)
	
	</td>
<?php } else { ?>
	<td data-field="Companies_Act">
<?php if ($Page->SortUrl($Page->Companies_Act) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Companies_Act">
			<span class="ewTableHeaderCaption"><?php echo $Page->Companies_Act->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Companies_Act" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Companies_Act) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Companies_Act->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Companies_Act->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Companies_Act->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
Public Interest Score (PIS)

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->IRBA_Code->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="IRBA_Code"><div class="IRBA_2_IRBA_Code"><span class="ewTableHeaderCaption"><?php echo $Page->IRBA_Code->FldCaption() ?></span></div>
	<hr>
	Public Interest Entoty (PIE) Yes/No
	
	</td>
<?php } else { ?>
	<td data-field="IRBA_Code">
<?php if ($Page->SortUrl($Page->IRBA_Code) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_IRBA_Code">
			<span class="ewTableHeaderCaption"><?php echo $Page->IRBA_Code->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_IRBA_Code" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->IRBA_Code) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->IRBA_Code->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->IRBA_Code->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->IRBA_Code->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
Public Interest Entoty (PIE) Yes/No

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ISQC_1->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ISQC_1"><div class="IRBA_2_ISQC_1"><span class="ewTableHeaderCaption"><?php echo $Page->ISQC_1->FldCaption() ?></span></div>
	<hr>
	Was an Engagement Quality Control Review (EQCR) performed?
	
	</td>
<?php } else { ?>
	<td data-field="ISQC_1">
<?php if ($Page->SortUrl($Page->ISQC_1) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_ISQC_1">
			<span class="ewTableHeaderCaption"><?php echo $Page->ISQC_1->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_ISQC_1" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->ISQC_1) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->ISQC_1->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->ISQC_1->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->ISQC_1->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
Was an Engagement Quality Control Review (EQCR) performed?

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->ISQC_2->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="ISQC_2"><div class="IRBA_2_ISQC_2"><span class="ewTableHeaderCaption"><?php echo $Page->ISQC_2->FldCaption() ?></span></div>
	<hr>
	Was a Monitoring review performed?
	
	</td>
<?php } else { ?>
	<td data-field="ISQC_2">
<?php if ($Page->SortUrl($Page->ISQC_2) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_ISQC_2">
			<span class="ewTableHeaderCaption"><?php echo $Page->ISQC_2->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_ISQC_2" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->ISQC_2) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->ISQC_2->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->ISQC_2->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->ISQC_2->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
Was a Monitoring review performed?

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Assurance_Work->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Assurance_Work"><div class="IRBA_2_Assurance_Work"><span class="ewTableHeaderCaption"><?php echo $Page->Assurance_Work->FldCaption() ?></span></div>
	<hr>
	Refer to Note 2 C
	
	</td>
<?php } else { ?>
	<td data-field="Assurance_Work">
<?php if ($Page->SortUrl($Page->Assurance_Work) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Assurance_Work">
			<span class="ewTableHeaderCaption"><?php echo $Page->Assurance_Work->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Assurance_Work" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Assurance_Work) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Assurance_Work->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Assurance_Work->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Assurance_Work->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
Refer to Note 2 C

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Amount_Billed->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Amount_Billed"><div class="IRBA_2_Amount_Billed"><span class="ewTableHeaderCaption"><?php echo $Page->Amount_Billed->FldCaption() ?></span></div>
	<hr>
	
	
	</td>
<?php } else { ?>
	<td data-field="Amount_Billed">
<?php if ($Page->SortUrl($Page->Amount_Billed) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Amount_Billed">
			<span class="ewTableHeaderCaption"><?php echo $Page->Amount_Billed->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Amount_Billed" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Amount_Billed) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Amount_Billed->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Amount_Billed->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Amount_Billed->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>


</td>
<?php } ?>
<?php } ?>
<?php if ($Page->JSE_Listed->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="JSE_Listed"><div class="IRBA_2_JSE_Listed"><span class="ewTableHeaderCaption"><?php echo $Page->JSE_Listed->FldCaption() ?></span></div>
	<hr>
	(L / SL)
	
	</td>
<?php } else { ?>
	<td data-field="JSE_Listed">
<?php if ($Page->SortUrl($Page->JSE_Listed) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_JSE_Listed">
			<span class="ewTableHeaderCaption"><?php echo $Page->JSE_Listed->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_JSE_Listed" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->JSE_Listed) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->JSE_Listed->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->JSE_Listed->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->JSE_Listed->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
(L / SL)

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Industry->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Industry"><div class="IRBA_2_Industry"><span class="ewTableHeaderCaption"><?php echo $Page->Industry->FldCaption() ?></span></div>
	<hr>
	Refer to Note 2 F
	
	</td>
<?php } else { ?>
	<td data-field="Industry">
<?php if ($Page->SortUrl($Page->Industry) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Industry">
			<span class="ewTableHeaderCaption"><?php echo $Page->Industry->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Industry" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Industry) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Industry->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Industry->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Industry->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
Refer to Note 2 F

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Period_end_of_AFS->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Period_end_of_AFS"><div class="IRBA_2_Period_end_of_AFS"><span class="ewTableHeaderCaption"><?php echo $Page->Period_end_of_AFS->FldCaption() ?></span></div>
	<hr>
	(DD/MM/CCYY)
	
	</td>
<?php } else { ?>
	<td data-field="Period_end_of_AFS">
<?php if ($Page->SortUrl($Page->Period_end_of_AFS) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Period_end_of_AFS">
			<span class="ewTableHeaderCaption"><?php echo $Page->Period_end_of_AFS->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Period_end_of_AFS" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Period_end_of_AFS) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Period_end_of_AFS->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Period_end_of_AFS->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Period_end_of_AFS->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
(DD/MM/CCYY)

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Date_Opinion_was_signed->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Date_Opinion_was_signed"><div class="IRBA_2_Date_Opinion_was_signed"><span class="ewTableHeaderCaption"><?php echo $Page->Date_Opinion_was_signed->FldCaption() ?></span></div>
	<hr>
	(DD/MM/CCYY)
	
	</td>
<?php } else { ?>
	<td data-field="Date_Opinion_was_signed">
<?php if ($Page->SortUrl($Page->Date_Opinion_was_signed) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Date_Opinion_was_signed">
			<span class="ewTableHeaderCaption"><?php echo $Page->Date_Opinion_was_signed->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Date_Opinion_was_signed" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Date_Opinion_was_signed) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Date_Opinion_was_signed->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Date_Opinion_was_signed->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Date_Opinion_was_signed->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>
(DD/MM/CCYY)

</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Partner->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Partner"><div class="IRBA_2_Partner"><span class="ewTableHeaderCaption"><?php echo $Page->Partner->FldCaption() ?></span></div>
	<hr>
	
	
	</td>
<?php } else { ?>
	<td data-field="Partner">
<?php if ($Page->SortUrl($Page->Partner) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Partner">
			<span class="ewTableHeaderCaption"><?php echo $Page->Partner->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Partner" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Partner) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Partner->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Partner->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Partner->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>


</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Next_IRBA->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Next_IRBA"><div class="IRBA_2_Next_IRBA"><span class="ewTableHeaderCaption"><?php echo $Page->Next_IRBA->FldCaption() ?></span></div>
	<hr>
	
	
	</td>
<?php } else { ?>
	<td data-field="Next_IRBA">
<?php if ($Page->SortUrl($Page->Next_IRBA) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Next_IRBA">
			<span class="ewTableHeaderCaption"><?php echo $Page->Next_IRBA->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Next_IRBA" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Next_IRBA) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Next_IRBA->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Next_IRBA->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Next_IRBA->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>


</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Accounting_Framework->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Accounting_Framework"><div class="IRBA_2_Accounting_Framework"><span class="ewTableHeaderCaption"><?php echo $Page->Accounting_Framework->FldCaption() ?></span></div>
	<hr>
	
	
	</td>
<?php } else { ?>
	<td data-field="Accounting_Framework">
<?php if ($Page->SortUrl($Page->Accounting_Framework) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Accounting_Framework">
			<span class="ewTableHeaderCaption"><?php echo $Page->Accounting_Framework->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Accounting_Framework" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Accounting_Framework) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Accounting_Framework->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Accounting_Framework->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Accounting_Framework->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>


</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Client_Turnover->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Client_Turnover"><div class="IRBA_2_Client_Turnover"><span class="ewTableHeaderCaption"><?php echo $Page->Client_Turnover->FldCaption() ?></span></div>
	<hr>
	
	
	</td>
<?php } else { ?>
	<td data-field="Client_Turnover">
<?php if ($Page->SortUrl($Page->Client_Turnover) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_Client_Turnover">
			<span class="ewTableHeaderCaption"><?php echo $Page->Client_Turnover->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_Client_Turnover" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->Client_Turnover) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->Client_Turnover->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->Client_Turnover->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->Client_Turnover->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
<hr>


</td>
<?php } ?>
<?php } ?>
<?php if ($Page->IRBA->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="IRBA"><div class="IRBA_2_IRBA"><span class="ewTableHeaderCaption"><?php echo $Page->IRBA->FldCaption() ?></span></div>
	<hr>
	
	
	
	</td>
<?php } else { ?>
	<td data-field="IRBA">
<?php if ($Page->SortUrl($Page->IRBA) == "") { ?>
		<div class="ewTableHeaderBtn IRBA_2_IRBA">
			<span class="ewTableHeaderCaption"><?php echo $Page->IRBA->FldCaption() ?></span>
		</div>
<?php } else { ?>
		<div class="ewTableHeaderBtn ewPointer IRBA_2_IRBA" onclick="ewr_Sort(event,'<?php echo $Page->SortUrl($Page->IRBA) ?>',0);">
			<span class="ewTableHeaderCaption"><?php echo $Page->IRBA->FldCaption() ?></span>
			<span class="ewTableHeaderSort"><?php if ($Page->IRBA->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($Page->IRBA->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span>
		</div>
<?php } ?>
	<hr>
	
	
	
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
<?php if ($Page->Client_Name->Visible) { ?>
		<td data-field="Client_Name"<?php echo $Page->Client_Name->CellAttributes() ?>>
<span<?php echo $Page->Client_Name->ViewAttributes() ?>><?php echo $Page->Client_Name->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Group_Structure->Visible) { ?>
		<td data-field="Group_Structure"<?php echo $Page->Group_Structure->CellAttributes() ?>>
<span<?php echo $Page->Group_Structure->ViewAttributes() ?>><?php echo $Page->Group_Structure->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Client_CIPC->Visible) { ?>
		<td data-field="Client_CIPC"<?php echo $Page->Client_CIPC->CellAttributes() ?>>
<span<?php echo $Page->Client_CIPC->ViewAttributes() ?>><?php echo $Page->Client_CIPC->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Companies_Act->Visible) { ?>
		<td data-field="Companies_Act"<?php echo $Page->Companies_Act->CellAttributes() ?>>
<span<?php echo $Page->Companies_Act->ViewAttributes() ?>><?php echo $Page->Companies_Act->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->IRBA_Code->Visible) { ?>
		<td data-field="IRBA_Code"<?php echo $Page->IRBA_Code->CellAttributes() ?>>
<span<?php echo $Page->IRBA_Code->ViewAttributes() ?>><?php echo $Page->IRBA_Code->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->ISQC_1->Visible) { ?>
		<td data-field="ISQC_1"<?php echo $Page->ISQC_1->CellAttributes() ?>>
<span<?php echo $Page->ISQC_1->ViewAttributes() ?>><?php echo $Page->ISQC_1->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->ISQC_2->Visible) { ?>
		<td data-field="ISQC_2"<?php echo $Page->ISQC_2->CellAttributes() ?>>
<span<?php echo $Page->ISQC_2->ViewAttributes() ?>><?php echo $Page->ISQC_2->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Assurance_Work->Visible) { ?>
		<td data-field="Assurance_Work"<?php echo $Page->Assurance_Work->CellAttributes() ?>>
<span<?php echo $Page->Assurance_Work->ViewAttributes() ?>><?php echo $Page->Assurance_Work->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Amount_Billed->Visible) { ?>
		<td data-field="Amount_Billed"<?php echo $Page->Amount_Billed->CellAttributes() ?>>
<span<?php echo $Page->Amount_Billed->ViewAttributes() ?>><?php echo $Page->Amount_Billed->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->JSE_Listed->Visible) { ?>
		<td data-field="JSE_Listed"<?php echo $Page->JSE_Listed->CellAttributes() ?>>
<span<?php echo $Page->JSE_Listed->ViewAttributes() ?>><?php echo $Page->JSE_Listed->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Industry->Visible) { ?>
		<td data-field="Industry"<?php echo $Page->Industry->CellAttributes() ?>>
<span<?php echo $Page->Industry->ViewAttributes() ?>><?php echo $Page->Industry->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Period_end_of_AFS->Visible) { ?>
		<td data-field="Period_end_of_AFS"<?php echo $Page->Period_end_of_AFS->CellAttributes() ?>>
<span<?php echo $Page->Period_end_of_AFS->ViewAttributes() ?>><?php echo $Page->Period_end_of_AFS->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Date_Opinion_was_signed->Visible) { ?>
		<td data-field="Date_Opinion_was_signed"<?php echo $Page->Date_Opinion_was_signed->CellAttributes() ?>>
<span<?php echo $Page->Date_Opinion_was_signed->ViewAttributes() ?>><?php echo $Page->Date_Opinion_was_signed->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Partner->Visible) { ?>
		<td data-field="Partner"<?php echo $Page->Partner->CellAttributes() ?>>
<span<?php echo $Page->Partner->ViewAttributes() ?>><?php echo $Page->Partner->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Next_IRBA->Visible) { ?>
		<td data-field="Next_IRBA"<?php echo $Page->Next_IRBA->CellAttributes() ?>>
<span<?php echo $Page->Next_IRBA->ViewAttributes() ?>><?php echo $Page->Next_IRBA->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Accounting_Framework->Visible) { ?>
		<td data-field="Accounting_Framework"<?php echo $Page->Accounting_Framework->CellAttributes() ?>>
<span<?php echo $Page->Accounting_Framework->ViewAttributes() ?>><?php echo $Page->Accounting_Framework->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Client_Turnover->Visible) { ?>
		<td data-field="Client_Turnover"<?php echo $Page->Client_Turnover->CellAttributes() ?>>
<span<?php echo $Page->Client_Turnover->ViewAttributes() ?>><?php echo $Page->Client_Turnover->ListViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->IRBA->Visible) { ?>
		<td data-field="IRBA"<?php echo $Page->IRBA->CellAttributes() ?>>
<span<?php echo $Page->IRBA->ViewAttributes() ?>><?php echo $Page->IRBA->ListViewValue() ?></span></td>
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
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ewGrid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="box ewBox ewGrid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<!-- Report grid (begin) -->
<div id="gmp_IRBA_2" class="<?php if (ewr_IsResponsiveLayout()) { echo "table-responsive "; } ?>ewGridMiddlePanel">
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGrps > 0 || FALSE) { // Show footer ?>
</table>
</div>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGrps > 0)) { ?>
<div class="box-footer ewGridLowerPanel">
<?php include "IRBA_2smrypager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<?php } ?>
</div>
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
