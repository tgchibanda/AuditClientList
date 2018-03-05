<?php

// Global variable for table object
$IRBA_With_Search = NULL;

//
// Table class for IRBA With Search
//
class crIRBA_With_Search extends crTableBase {
	var $ShowGroupHeaderAsRow = FALSE;
	var $ShowCompactSummaryFooter = TRUE;
	var $Client_Name;
	var $Group_Structure;
	var $Client_CIPC;
	var $Companies_Act;
	var $IRBA_Code;
	var $ISQC_1;
	var $ISQC_2;
	var $Assurance_Work;
	var $Amount_Billed;
	var $JSE_Listed;
	var $Industry;
	var $Period_end_of_AFS;
	var $Date_Opinion_was_signed;
	var $Partner;
	var $IRBA;
	var $Next_IRBA;
	var $Accounting_Framework;
	var $Client_Turnover;
	var $Resigned;

	//
	// Table class constructor
	//
	function __construct() {
		global $ReportLanguage, $grLanguage;
		$this->TableVar = 'IRBA_With_Search';
		$this->TableName = 'IRBA With Search';
		$this->TableType = 'REPORT';
		$this->TableReportType = 'summary';
		$this->SourcTableIsCustomView = FALSE;
		$this->DBID = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// Client_Name
		$this->Client_Name = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Client_Name', 'Client_Name', '`Client_Name`', 201, EWR_DATATYPE_MEMO, -1);
		$this->Client_Name->Sortable = TRUE; // Allow sort
		$this->Client_Name->DateFilter = "";
		$this->Client_Name->SqlSelect = "";
		$this->Client_Name->SqlOrderBy = "";
		$this->fields['Client_Name'] = &$this->Client_Name;

		// Group_Structure
		$this->Group_Structure = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Group_Structure', 'Group_Structure', '`Group_Structure`', 200, EWR_DATATYPE_STRING, -1);
		$this->Group_Structure->Sortable = TRUE; // Allow sort
		$this->Group_Structure->DateFilter = "";
		$this->Group_Structure->SqlSelect = "";
		$this->Group_Structure->SqlOrderBy = "";
		$this->fields['Group_Structure'] = &$this->Group_Structure;

		// Client_CIPC
		$this->Client_CIPC = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Client_CIPC', 'Client_CIPC', '`Client_CIPC`', 200, EWR_DATATYPE_STRING, -1);
		$this->Client_CIPC->Sortable = TRUE; // Allow sort
		$this->Client_CIPC->DateFilter = "";
		$this->Client_CIPC->SqlSelect = "";
		$this->Client_CIPC->SqlOrderBy = "";
		$this->fields['Client_CIPC'] = &$this->Client_CIPC;

		// Companies_Act
		$this->Companies_Act = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Companies_Act', 'Companies_Act', '`Companies_Act`', 200, EWR_DATATYPE_STRING, -1);
		$this->Companies_Act->Sortable = TRUE; // Allow sort
		$this->Companies_Act->DateFilter = "";
		$this->Companies_Act->SqlSelect = "";
		$this->Companies_Act->SqlOrderBy = "";
		$this->fields['Companies_Act'] = &$this->Companies_Act;

		// IRBA_Code
		$this->IRBA_Code = new crField('IRBA_With_Search', 'IRBA With Search', 'x_IRBA_Code', 'IRBA_Code', '`IRBA_Code`', 200, EWR_DATATYPE_STRING, -1);
		$this->IRBA_Code->Sortable = TRUE; // Allow sort
		$this->IRBA_Code->DateFilter = "";
		$this->IRBA_Code->SqlSelect = "";
		$this->IRBA_Code->SqlOrderBy = "";
		$this->fields['IRBA_Code'] = &$this->IRBA_Code;

		// ISQC_1
		$this->ISQC_1 = new crField('IRBA_With_Search', 'IRBA With Search', 'x_ISQC_1', 'ISQC_1', '`ISQC_1`', 200, EWR_DATATYPE_STRING, -1);
		$this->ISQC_1->Sortable = TRUE; // Allow sort
		$this->ISQC_1->DateFilter = "";
		$this->ISQC_1->SqlSelect = "";
		$this->ISQC_1->SqlOrderBy = "";
		$this->fields['ISQC_1'] = &$this->ISQC_1;

		// ISQC_2
		$this->ISQC_2 = new crField('IRBA_With_Search', 'IRBA With Search', 'x_ISQC_2', 'ISQC_2', '`ISQC_2`', 200, EWR_DATATYPE_STRING, -1);
		$this->ISQC_2->Sortable = TRUE; // Allow sort
		$this->ISQC_2->DateFilter = "";
		$this->ISQC_2->SqlSelect = "";
		$this->ISQC_2->SqlOrderBy = "";
		$this->fields['ISQC_2'] = &$this->ISQC_2;

		// Assurance_Work
		$this->Assurance_Work = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Assurance_Work', 'Assurance_Work', '`Assurance_Work`', 200, EWR_DATATYPE_STRING, -1);
		$this->Assurance_Work->Sortable = TRUE; // Allow sort
		$this->Assurance_Work->DateFilter = "";
		$this->Assurance_Work->SqlSelect = "";
		$this->Assurance_Work->SqlOrderBy = "";
		$this->fields['Assurance_Work'] = &$this->Assurance_Work;

		// Amount_Billed
		$this->Amount_Billed = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Amount_Billed', 'Amount_Billed', '`Amount_Billed`', 200, EWR_DATATYPE_STRING, -1);
		$this->Amount_Billed->Sortable = TRUE; // Allow sort
		$this->Amount_Billed->DateFilter = "";
		$this->Amount_Billed->SqlSelect = "";
		$this->Amount_Billed->SqlOrderBy = "";
		$this->fields['Amount_Billed'] = &$this->Amount_Billed;

		// JSE_Listed
		$this->JSE_Listed = new crField('IRBA_With_Search', 'IRBA With Search', 'x_JSE_Listed', 'JSE_Listed', '`JSE_Listed`', 200, EWR_DATATYPE_STRING, -1);
		$this->JSE_Listed->Sortable = TRUE; // Allow sort
		$this->JSE_Listed->DateFilter = "";
		$this->JSE_Listed->SqlSelect = "";
		$this->JSE_Listed->SqlOrderBy = "";
		$this->fields['JSE_Listed'] = &$this->JSE_Listed;

		// Industry
		$this->Industry = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Industry', 'Industry', '`Industry`', 200, EWR_DATATYPE_STRING, -1);
		$this->Industry->Sortable = TRUE; // Allow sort
		$this->Industry->DateFilter = "";
		$this->Industry->SqlSelect = "";
		$this->Industry->SqlOrderBy = "";
		$this->fields['Industry'] = &$this->Industry;

		// Period_end_of_AFS
		$this->Period_end_of_AFS = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Period_end_of_AFS', 'Period_end_of_AFS', '`Period_end_of_AFS`', 200, EWR_DATATYPE_STRING, -1);
		$this->Period_end_of_AFS->Sortable = TRUE; // Allow sort
		$this->Period_end_of_AFS->DateFilter = "";
		$this->Period_end_of_AFS->SqlSelect = "";
		$this->Period_end_of_AFS->SqlOrderBy = "";
		$this->fields['Period_end_of_AFS'] = &$this->Period_end_of_AFS;

		// Date_Opinion_was_signed
		$this->Date_Opinion_was_signed = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Date_Opinion_was_signed', 'Date_Opinion_was_signed', '`Date_Opinion_was_signed`', 200, EWR_DATATYPE_STRING, -1);
		$this->Date_Opinion_was_signed->Sortable = TRUE; // Allow sort
		$this->Date_Opinion_was_signed->DateFilter = "";
		$this->Date_Opinion_was_signed->SqlSelect = "";
		$this->Date_Opinion_was_signed->SqlOrderBy = "";
		$this->fields['Date_Opinion_was_signed'] = &$this->Date_Opinion_was_signed;

		// Partner
		$this->Partner = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Partner', 'Partner', '`Partner`', 200, EWR_DATATYPE_STRING, -1);
		$this->Partner->Sortable = TRUE; // Allow sort
		$this->Partner->DateFilter = "";
		$this->Partner->SqlSelect = "";
		$this->Partner->SqlOrderBy = "";
		$this->fields['Partner'] = &$this->Partner;

		// IRBA
		$this->IRBA = new crField('IRBA_With_Search', 'IRBA With Search', 'x_IRBA', 'IRBA', '`IRBA`', 200, EWR_DATATYPE_STRING, -1);
		$this->IRBA->Sortable = TRUE; // Allow sort
		$this->IRBA->DateFilter = "";
		$this->IRBA->SqlSelect = "";
		$this->IRBA->SqlOrderBy = "";
		$this->fields['IRBA'] = &$this->IRBA;

		// Next_IRBA
		$this->Next_IRBA = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Next_IRBA', 'Next_IRBA', '`Next_IRBA`', 200, EWR_DATATYPE_STRING, -1);
		$this->Next_IRBA->Sortable = TRUE; // Allow sort
		$this->Next_IRBA->DateFilter = "";
		$this->Next_IRBA->SqlSelect = "";
		$this->Next_IRBA->SqlOrderBy = "";
		$this->fields['Next_IRBA'] = &$this->Next_IRBA;

		// Accounting_Framework
		$this->Accounting_Framework = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Accounting_Framework', 'Accounting_Framework', '`Accounting_Framework`', 200, EWR_DATATYPE_STRING, -1);
		$this->Accounting_Framework->Sortable = TRUE; // Allow sort
		$this->Accounting_Framework->DateFilter = "";
		$this->Accounting_Framework->SqlSelect = "";
		$this->Accounting_Framework->SqlOrderBy = "";
		$this->fields['Accounting_Framework'] = &$this->Accounting_Framework;

		// Client_Turnover
		$this->Client_Turnover = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Client_Turnover', 'Client_Turnover', '`Client_Turnover`', 200, EWR_DATATYPE_STRING, -1);
		$this->Client_Turnover->Sortable = TRUE; // Allow sort
		$this->Client_Turnover->DateFilter = "";
		$this->Client_Turnover->SqlSelect = "";
		$this->Client_Turnover->SqlOrderBy = "";
		$this->fields['Client_Turnover'] = &$this->Client_Turnover;

		// Resigned
		$this->Resigned = new crField('IRBA_With_Search', 'IRBA With Search', 'x_Resigned', 'Resigned', '`Resigned`', 200, EWR_DATATYPE_STRING, -1);
		$this->Resigned->Sortable = TRUE; // Allow sort
		$this->Resigned->DateFilter = "";
		$this->Resigned->SqlSelect = "";
		$this->Resigned->SqlOrderBy = "";
		$this->fields['Resigned'] = &$this->Resigned;
	}

	// Set Field Visibility
	function SetFieldVisibility($fldparm) {
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			if ($ofld->GroupingFieldId == 0)
				$this->setDetailOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			if ($ofld->GroupingFieldId == 0) $ofld->setSort("");
		}
	}

	// Get Sort SQL
	function SortSql() {
		$sDtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = array();
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->FldExpression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->FldGroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->FldGroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sSortSql = "";
		foreach ($argrps as $grp) {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $grp;
		}
		if ($sDtlSortSql <> "") {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $sDtlSortSql;
		}
		return $sSortSql;
	}

	// Table level SQL
	// From

	var $_SqlFrom = "";

	function getSqlFrom() {
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`search_irba`";
	}

	function SqlFrom() { // For backward compatibility
		return $this->getSqlFrom();
	}

	function setSqlFrom($v) {
		$this->_SqlFrom = $v;
	}

	// Select
	var $_SqlSelect = "";

	function getSqlSelect() {
		return ($this->_SqlSelect <> "") ? $this->_SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelect() { // For backward compatibility
		return $this->getSqlSelect();
	}

	function setSqlSelect($v) {
		$this->_SqlSelect = $v;
	}

	// Where
	var $_SqlWhere = "";

	function getSqlWhere() {
		$sWhere = ($this->_SqlWhere <> "") ? $this->_SqlWhere : "";
		return $sWhere;
	}

	function SqlWhere() { // For backward compatibility
		return $this->getSqlWhere();
	}

	function setSqlWhere($v) {
		$this->_SqlWhere = $v;
	}

	// Group By
	var $_SqlGroupBy = "";

	function getSqlGroupBy() {
		return ($this->_SqlGroupBy <> "") ? $this->_SqlGroupBy : "";
	}

	function SqlGroupBy() { // For backward compatibility
		return $this->getSqlGroupBy();
	}

	function setSqlGroupBy($v) {
		$this->_SqlGroupBy = $v;
	}

	// Having
	var $_SqlHaving = "";

	function getSqlHaving() {
		return ($this->_SqlHaving <> "") ? $this->_SqlHaving : "";
	}

	function SqlHaving() { // For backward compatibility
		return $this->getSqlHaving();
	}

	function setSqlHaving($v) {
		$this->_SqlHaving = $v;
	}

	// Order By
	var $_SqlOrderBy = "";

	function getSqlOrderBy() {
		return ($this->_SqlOrderBy <> "") ? $this->_SqlOrderBy : "";
	}

	function SqlOrderBy() { // For backward compatibility
		return $this->getSqlOrderBy();
	}

	function setSqlOrderBy($v) {
		$this->_SqlOrderBy = $v;
	}

	// Table Level Group SQL
	// First Group Field

	var $_SqlFirstGroupField = "";

	function getSqlFirstGroupField() {
		return ($this->_SqlFirstGroupField <> "") ? $this->_SqlFirstGroupField : "";
	}

	function SqlFirstGroupField() { // For backward compatibility
		return $this->getSqlFirstGroupField();
	}

	function setSqlFirstGroupField($v) {
		$this->_SqlFirstGroupField = $v;
	}

	// Select Group
	var $_SqlSelectGroup = "";

	function getSqlSelectGroup() {
		return ($this->_SqlSelectGroup <> "") ? $this->_SqlSelectGroup : "SELECT DISTINCT " . $this->getSqlFirstGroupField() . " FROM " . $this->getSqlFrom();
	}

	function SqlSelectGroup() { // For backward compatibility
		return $this->getSqlSelectGroup();
	}

	function setSqlSelectGroup($v) {
		$this->_SqlSelectGroup = $v;
	}

	// Order By Group
	var $_SqlOrderByGroup = "";

	function getSqlOrderByGroup() {
		return ($this->_SqlOrderByGroup <> "") ? $this->_SqlOrderByGroup : "";
	}

	function SqlOrderByGroup() { // For backward compatibility
		return $this->getSqlOrderByGroup();
	}

	function setSqlOrderByGroup($v) {
		$this->_SqlOrderByGroup = $v;
	}

	// Select Aggregate
	var $_SqlSelectAgg = "";

	function getSqlSelectAgg() {
		return ($this->_SqlSelectAgg <> "") ? $this->_SqlSelectAgg : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelectAgg() { // For backward compatibility
		return $this->getSqlSelectAgg();
	}

	function setSqlSelectAgg($v) {
		$this->_SqlSelectAgg = $v;
	}

	// Aggregate Prefix
	var $_SqlAggPfx = "";

	function getSqlAggPfx() {
		return ($this->_SqlAggPfx <> "") ? $this->_SqlAggPfx : "";
	}

	function SqlAggPfx() { // For backward compatibility
		return $this->getSqlAggPfx();
	}

	function setSqlAggPfx($v) {
		$this->_SqlAggPfx = $v;
	}

	// Aggregate Suffix
	var $_SqlAggSfx = "";

	function getSqlAggSfx() {
		return ($this->_SqlAggSfx <> "") ? $this->_SqlAggSfx : "";
	}

	function SqlAggSfx() { // For backward compatibility
		return $this->getSqlAggSfx();
	}

	function setSqlAggSfx($v) {
		$this->_SqlAggSfx = $v;
	}

	// Select Count
	var $_SqlSelectCount = "";

	function getSqlSelectCount() {
		return ($this->_SqlSelectCount <> "") ? $this->_SqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}

	function SqlSelectCount() { // For backward compatibility
		return $this->getSqlSelectCount();
	}

	function setSqlSelectCount($v) {
		$this->_SqlSelectCount = $v;
	}

	// Sort URL
	function SortUrl(&$fld) {
		global $grDashboardReport;
		return "";
	}

	// Setup lookup filters of a field
	function SetupLookupFilters($fld) {
		global $grLanguage;
		switch ($fld->FldVar) {
		case "x_Resigned":
			$fld->LookupFilters = array("d" => "DB", "f0" => '`Resigned` = {filter_value}', "t0" => "200", "fn0" => "", "dlm" => ewr_Encrypt($fld->FldDelimiter), "af" => json_encode($fld->AdvancedFilters));
		$sWhereWrk = "";
		$fld->LookupFilters += array(
			"select" => "SELECT DISTINCT `Resigned`, `Resigned` AS `DispFld`, '' AS `DispFld2`, '' AS `DispFld3`, '' AS `DispFld4` FROM `search_irba`",
			"where" => $sWhereWrk,
			"orderby" => "`Resigned` ASC"
		);
		$this->Lookup_Selecting($fld, $fld->LookupFilters["where"]); // Call Lookup selecting
		$fld->LookupFilters["s"] = ewr_BuildReportSql($fld->LookupFilters["select"], $fld->LookupFilters["where"], "", "", $fld->LookupFilters["orderby"], "", "");
			break;
		}
	}

	// Setup AutoSuggest filters of a field
	function SetupAutoSuggestFilters($fld) {
		global $grLanguage;
		switch ($fld->FldVar) {
		}
	}

	// Table level events
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["style"] = "xxx";

	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', 'GetStartsWithAFilter'); // With function, or
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//ewr_UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->FldName == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->FldName == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->FldName == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->FldName == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>
