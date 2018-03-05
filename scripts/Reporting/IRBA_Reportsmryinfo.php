<?php

// Global variable for table object
$IRBA_Report = NULL;

//
// Table class for IRBA Report
//
class crIRBA_Report extends crTableBase {
	var $ShowGroupHeaderAsRow = FALSE;
	var $ShowCompactSummaryFooter = TRUE;
	var $No;
	var $Client_Name;
	var $Audit_Fee;
	var $Period_end_of_AFS;
	var $Date_Opinion_was_signed;
	var $PI_Score;
	var $Partner;
	var $Risk;
	var $City;

	//
	// Table class constructor
	//
	function __construct() {
		global $ReportLanguage, $grLanguage;
		$this->TableVar = 'IRBA_Report';
		$this->TableName = 'IRBA Report';
		$this->TableType = 'REPORT';
		$this->TableReportType = 'summary';
		$this->SourcTableIsCustomView = FALSE;
		$this->DBID = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0;

		// No
		$this->No = new crField('IRBA_Report', 'IRBA Report', 'x_No', 'No', '`No`', 200, EWR_DATATYPE_STRING, -1);
		$this->No->Sortable = TRUE; // Allow sort
		$this->No->DateFilter = "";
		$this->No->SqlSelect = "";
		$this->No->SqlOrderBy = "";
		$this->fields['No'] = &$this->No;

		// Client_Name
		$this->Client_Name = new crField('IRBA_Report', 'IRBA Report', 'x_Client_Name', 'Client_Name', '`Client_Name`', 201, EWR_DATATYPE_MEMO, -1);
		$this->Client_Name->Sortable = TRUE; // Allow sort
		$this->Client_Name->DateFilter = "";
		$this->Client_Name->SqlSelect = "";
		$this->Client_Name->SqlOrderBy = "";
		$this->fields['Client_Name'] = &$this->Client_Name;

		// Audit_Fee
		$this->Audit_Fee = new crField('IRBA_Report', 'IRBA Report', 'x_Audit_Fee', 'Audit_Fee', '`Audit_Fee`', 200, EWR_DATATYPE_STRING, -1);
		$this->Audit_Fee->Sortable = TRUE; // Allow sort
		$this->Audit_Fee->DateFilter = "";
		$this->Audit_Fee->SqlSelect = "";
		$this->Audit_Fee->SqlOrderBy = "";
		$this->fields['Audit_Fee'] = &$this->Audit_Fee;

		// Period_end_of_AFS
		$this->Period_end_of_AFS = new crField('IRBA_Report', 'IRBA Report', 'x_Period_end_of_AFS', 'Period_end_of_AFS', '`Period_end_of_AFS`', 200, EWR_DATATYPE_STRING, -1);
		$this->Period_end_of_AFS->Sortable = TRUE; // Allow sort
		$this->Period_end_of_AFS->DateFilter = "";
		$this->Period_end_of_AFS->SqlSelect = "";
		$this->Period_end_of_AFS->SqlOrderBy = "";
		$this->fields['Period_end_of_AFS'] = &$this->Period_end_of_AFS;

		// Date_Opinion_was_signed
		$this->Date_Opinion_was_signed = new crField('IRBA_Report', 'IRBA Report', 'x_Date_Opinion_was_signed', 'Date_Opinion_was_signed', '`Date_Opinion_was_signed`', 200, EWR_DATATYPE_STRING, -1);
		$this->Date_Opinion_was_signed->Sortable = TRUE; // Allow sort
		$this->Date_Opinion_was_signed->DateFilter = "";
		$this->Date_Opinion_was_signed->SqlSelect = "";
		$this->Date_Opinion_was_signed->SqlOrderBy = "";
		$this->fields['Date_Opinion_was_signed'] = &$this->Date_Opinion_was_signed;

		// PI_Score
		$this->PI_Score = new crField('IRBA_Report', 'IRBA Report', 'x_PI_Score', 'PI_Score', '`PI_Score`', 200, EWR_DATATYPE_STRING, -1);
		$this->PI_Score->Sortable = TRUE; // Allow sort
		$this->PI_Score->DateFilter = "";
		$this->PI_Score->SqlSelect = "";
		$this->PI_Score->SqlOrderBy = "";
		$this->fields['PI_Score'] = &$this->PI_Score;

		// Partner
		$this->Partner = new crField('IRBA_Report', 'IRBA Report', 'x_Partner', 'Partner', '`Partner`', 200, EWR_DATATYPE_STRING, -1);
		$this->Partner->Sortable = TRUE; // Allow sort
		$this->Partner->DateFilter = "";
		$this->Partner->SqlSelect = "";
		$this->Partner->SqlOrderBy = "";
		$this->fields['Partner'] = &$this->Partner;

		// Risk
		$this->Risk = new crField('IRBA_Report', 'IRBA Report', 'x_Risk', 'Risk', '`Risk`', 200, EWR_DATATYPE_STRING, -1);
		$this->Risk->Sortable = TRUE; // Allow sort
		$this->Risk->DateFilter = "";
		$this->Risk->SqlSelect = "SELECT DISTINCT `Risk`, `Risk` AS `DispFld` FROM " . $this->getSqlFrom();
		$this->Risk->SqlOrderBy = "`Risk`";
		$this->fields['Risk'] = &$this->Risk;

		// City
		$this->City = new crField('IRBA_Report', 'IRBA Report', 'x_City', 'City', '`City`', 200, EWR_DATATYPE_STRING, -1);
		$this->City->Sortable = TRUE; // Allow sort
		$this->City->DateFilter = "";
		$this->City->SqlSelect = "SELECT DISTINCT `City`, `City` AS `DispFld` FROM " . $this->getSqlFrom();
		$this->City->SqlOrderBy = "`City`";
		$this->fields['City'] = &$this->City;
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
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`irba`";
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
		case "x_Risk":
			$fld->LookupFilters = array("d" => "DB", "f0" => '`Risk` = {filter_value}', "t0" => "200", "fn0" => "", "dlm" => ewr_Encrypt($fld->FldDelimiter), "af" => json_encode($fld->AdvancedFilters));
		$sWhereWrk = "";
		$fld->LookupFilters += array(
			"select" => "SELECT DISTINCT `Risk`, `Risk` AS `DispFld`, '' AS `DispFld2`, '' AS `DispFld3`, '' AS `DispFld4` FROM `irba`",
			"where" => $sWhereWrk,
			"orderby" => "`Risk` ASC"
		);
		$this->Lookup_Selecting($fld, $fld->LookupFilters["where"]); // Call Lookup selecting
		$fld->LookupFilters["s"] = ewr_BuildReportSql($fld->LookupFilters["select"], $fld->LookupFilters["where"], "", "", $fld->LookupFilters["orderby"], "", "");
			break;
		case "x_City":
			$fld->LookupFilters = array("d" => "DB", "f0" => '`City` = {filter_value}', "t0" => "200", "fn0" => "", "dlm" => ewr_Encrypt($fld->FldDelimiter), "af" => json_encode($fld->AdvancedFilters));
		$sWhereWrk = "";
		$fld->LookupFilters += array(
			"select" => "SELECT DISTINCT `City`, `City` AS `DispFld`, '' AS `DispFld2`, '' AS `DispFld3`, '' AS `DispFld4` FROM `irba`",
			"where" => $sWhereWrk,
			"orderby" => "`City` ASC"
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