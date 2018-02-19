<?php

// Global variable for table object
$Engaged_Clients = NULL;

//
// Table class for Engaged Clients
//
class crEngaged_Clients extends crTableBase {
	var $ShowGroupHeaderAsRow = FALSE;
	var $ShowCompactSummaryFooter = TRUE;
	var $company_name;
	var $company_reg_number;
	var $date_resigned;
	var $engagement_date;
	var $service_name;
	var $service_type;
	var $first_engagement_date;
	var $client_turnover;
	var $accounting_framework;
	var $when_next_irba;
	var $year_of_afs;
	var $jse_listed;
	var $amount_billed;
	var $isqc_2;
	var $isqc_1;
	var $irba_code;
	var $companies_act;
	var $group_structure;
	var $anticipated_rotation_partner;
	var $rotation_year;
	var $rotation_period;
	var $city;
	var $engagement_id;
	var $start_notes;

	//
	// Table class constructor
	//
	function __construct() {
		global $ReportLanguage, $grLanguage;
		$this->TableVar = 'Engaged_Clients';
		$this->TableName = 'Engaged Clients';
		$this->TableType = 'CUSTOMVIEW';
		$this->TableReportType = 'rpt';
		$this->SourcTableIsCustomView = TRUE;
		$this->DBID = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// company_name
		$this->company_name = new crField('Engaged_Clients', 'Engaged Clients', 'x_company_name', 'company_name', 'clients.company_name', 200, EWR_DATATYPE_STRING, -1);
		$this->company_name->Sortable = TRUE; // Allow sort
		$this->company_name->DateFilter = "";
		$this->company_name->SqlSelect = "SELECT DISTINCT clients.company_name, clients.company_name AS `DispFld` FROM " . $this->getSqlFrom();
		$this->company_name->SqlOrderBy = "clients.company_name";
		$this->fields['company_name'] = &$this->company_name;

		// company_reg_number
		$this->company_reg_number = new crField('Engaged_Clients', 'Engaged Clients', 'x_company_reg_number', 'company_reg_number', 'clients.company_reg_number', 200, EWR_DATATYPE_STRING, -1);
		$this->company_reg_number->Sortable = TRUE; // Allow sort
		$this->company_reg_number->DateFilter = "";
		$this->company_reg_number->SqlSelect = "";
		$this->company_reg_number->SqlOrderBy = "";
		$this->fields['company_reg_number'] = &$this->company_reg_number;

		// date_resigned
		$this->date_resigned = new crField('Engaged_Clients', 'Engaged Clients', 'x_date_resigned', 'date_resigned', 'engagements.date_resigned', 200, EWR_DATATYPE_STRING, -1);
		$this->date_resigned->Sortable = TRUE; // Allow sort
		$this->date_resigned->DateFilter = "";
		$this->date_resigned->SqlSelect = "";
		$this->date_resigned->SqlOrderBy = "";
		$this->fields['date_resigned'] = &$this->date_resigned;

		// engagement_date
		$this->engagement_date = new crField('Engaged_Clients', 'Engaged Clients', 'x_engagement_date', 'engagement_date', 'engagements.engagement_date', 200, EWR_DATATYPE_STRING, -1);
		$this->engagement_date->Sortable = TRUE; // Allow sort
		$this->engagement_date->DateFilter = "";
		$this->engagement_date->SqlSelect = "";
		$this->engagement_date->SqlOrderBy = "";
		$this->fields['engagement_date'] = &$this->engagement_date;

		// service_name
		$this->service_name = new crField('Engaged_Clients', 'Engaged Clients', 'x_service_name', 'service_name', 'services.name', 201, EWR_DATATYPE_MEMO, -1);
		$this->service_name->Sortable = TRUE; // Allow sort
		$this->service_name->DateFilter = "";
		$this->service_name->SqlSelect = "";
		$this->service_name->SqlOrderBy = "";
		$this->fields['service_name'] = &$this->service_name;

		// service_type
		$this->service_type = new crField('Engaged_Clients', 'Engaged Clients', 'x_service_type', 'service_type', 'services.type', 200, EWR_DATATYPE_STRING, -1);
		$this->service_type->Sortable = TRUE; // Allow sort
		$this->service_type->DateFilter = "";
		$this->service_type->SqlSelect = "";
		$this->service_type->SqlOrderBy = "";
		$this->fields['service_type'] = &$this->service_type;

		// first_engagement_date
		$this->first_engagement_date = new crField('Engaged_Clients', 'Engaged Clients', 'x_first_engagement_date', 'first_engagement_date', 'engagements.first_engagement_date', 200, EWR_DATATYPE_STRING, -1);
		$this->first_engagement_date->Sortable = TRUE; // Allow sort
		$this->first_engagement_date->DateFilter = "";
		$this->first_engagement_date->SqlSelect = "";
		$this->first_engagement_date->SqlOrderBy = "";
		$this->fields['first_engagement_date'] = &$this->first_engagement_date;

		// client_turnover
		$this->client_turnover = new crField('Engaged_Clients', 'Engaged Clients', 'x_client_turnover', 'client_turnover', 'engagements.client_turnover', 200, EWR_DATATYPE_STRING, -1);
		$this->client_turnover->Sortable = TRUE; // Allow sort
		$this->client_turnover->DateFilter = "";
		$this->client_turnover->SqlSelect = "";
		$this->client_turnover->SqlOrderBy = "";
		$this->fields['client_turnover'] = &$this->client_turnover;

		// accounting_framework
		$this->accounting_framework = new crField('Engaged_Clients', 'Engaged Clients', 'x_accounting_framework', 'accounting_framework', 'engagements.accounting_framework', 200, EWR_DATATYPE_STRING, -1);
		$this->accounting_framework->Sortable = TRUE; // Allow sort
		$this->accounting_framework->DateFilter = "";
		$this->accounting_framework->SqlSelect = "";
		$this->accounting_framework->SqlOrderBy = "";
		$this->fields['accounting_framework'] = &$this->accounting_framework;

		// when_next_irba
		$this->when_next_irba = new crField('Engaged_Clients', 'Engaged Clients', 'x_when_next_irba', 'when_next_irba', 'engagements.when_next_irba', 200, EWR_DATATYPE_STRING, -1);
		$this->when_next_irba->Sortable = TRUE; // Allow sort
		$this->when_next_irba->DateFilter = "";
		$this->when_next_irba->SqlSelect = "";
		$this->when_next_irba->SqlOrderBy = "";
		$this->fields['when_next_irba'] = &$this->when_next_irba;

		// year_of_afs
		$this->year_of_afs = new crField('Engaged_Clients', 'Engaged Clients', 'x_year_of_afs', 'year_of_afs', 'engagements.year_of_afs', 200, EWR_DATATYPE_STRING, -1);
		$this->year_of_afs->Sortable = TRUE; // Allow sort
		$this->year_of_afs->DateFilter = "";
		$this->year_of_afs->SqlSelect = "";
		$this->year_of_afs->SqlOrderBy = "";
		$this->fields['year_of_afs'] = &$this->year_of_afs;

		// jse_listed
		$this->jse_listed = new crField('Engaged_Clients', 'Engaged Clients', 'x_jse_listed', 'jse_listed', 'engagements.jse_listed', 200, EWR_DATATYPE_STRING, -1);
		$this->jse_listed->Sortable = TRUE; // Allow sort
		$this->jse_listed->DateFilter = "";
		$this->jse_listed->SqlSelect = "";
		$this->jse_listed->SqlOrderBy = "";
		$this->fields['jse_listed'] = &$this->jse_listed;

		// amount_billed
		$this->amount_billed = new crField('Engaged_Clients', 'Engaged Clients', 'x_amount_billed', 'amount_billed', 'engagements.amount_billed', 200, EWR_DATATYPE_STRING, -1);
		$this->amount_billed->Sortable = TRUE; // Allow sort
		$this->amount_billed->DateFilter = "";
		$this->amount_billed->SqlSelect = "";
		$this->amount_billed->SqlOrderBy = "";
		$this->fields['amount_billed'] = &$this->amount_billed;

		// isqc_2
		$this->isqc_2 = new crField('Engaged_Clients', 'Engaged Clients', 'x_isqc_2', 'isqc_2', 'engagements.isqc_2', 200, EWR_DATATYPE_STRING, -1);
		$this->isqc_2->Sortable = TRUE; // Allow sort
		$this->isqc_2->DateFilter = "";
		$this->isqc_2->SqlSelect = "";
		$this->isqc_2->SqlOrderBy = "";
		$this->fields['isqc_2'] = &$this->isqc_2;

		// isqc_1
		$this->isqc_1 = new crField('Engaged_Clients', 'Engaged Clients', 'x_isqc_1', 'isqc_1', 'engagements.isqc_1', 200, EWR_DATATYPE_STRING, -1);
		$this->isqc_1->Sortable = TRUE; // Allow sort
		$this->isqc_1->DateFilter = "";
		$this->isqc_1->SqlSelect = "";
		$this->isqc_1->SqlOrderBy = "";
		$this->fields['isqc_1'] = &$this->isqc_1;

		// irba_code
		$this->irba_code = new crField('Engaged_Clients', 'Engaged Clients', 'x_irba_code', 'irba_code', 'engagements.irba_code', 200, EWR_DATATYPE_STRING, -1);
		$this->irba_code->Sortable = TRUE; // Allow sort
		$this->irba_code->DateFilter = "";
		$this->irba_code->SqlSelect = "";
		$this->irba_code->SqlOrderBy = "";
		$this->fields['irba_code'] = &$this->irba_code;

		// companies_act
		$this->companies_act = new crField('Engaged_Clients', 'Engaged Clients', 'x_companies_act', 'companies_act', 'engagements.companies_act', 200, EWR_DATATYPE_STRING, -1);
		$this->companies_act->Sortable = TRUE; // Allow sort
		$this->companies_act->DateFilter = "";
		$this->companies_act->SqlSelect = "";
		$this->companies_act->SqlOrderBy = "";
		$this->fields['companies_act'] = &$this->companies_act;

		// group_structure
		$this->group_structure = new crField('Engaged_Clients', 'Engaged Clients', 'x_group_structure', 'group_structure', 'engagements.group_structure', 200, EWR_DATATYPE_STRING, -1);
		$this->group_structure->Sortable = TRUE; // Allow sort
		$this->group_structure->DateFilter = "";
		$this->group_structure->SqlSelect = "";
		$this->group_structure->SqlOrderBy = "";
		$this->fields['group_structure'] = &$this->group_structure;

		// anticipated_rotation_partner
		$this->anticipated_rotation_partner = new crField('Engaged_Clients', 'Engaged Clients', 'x_anticipated_rotation_partner', 'anticipated_rotation_partner', 'engagements.anticipated_rotation_partner', 200, EWR_DATATYPE_STRING, -1);
		$this->anticipated_rotation_partner->Sortable = TRUE; // Allow sort
		$this->anticipated_rotation_partner->DateFilter = "";
		$this->anticipated_rotation_partner->SqlSelect = "";
		$this->anticipated_rotation_partner->SqlOrderBy = "";
		$this->fields['anticipated_rotation_partner'] = &$this->anticipated_rotation_partner;

		// rotation_year
		$this->rotation_year = new crField('Engaged_Clients', 'Engaged Clients', 'x_rotation_year', 'rotation_year', 'engagements.rotation_year', 200, EWR_DATATYPE_STRING, -1);
		$this->rotation_year->Sortable = TRUE; // Allow sort
		$this->rotation_year->DateFilter = "";
		$this->rotation_year->SqlSelect = "";
		$this->rotation_year->SqlOrderBy = "";
		$this->fields['rotation_year'] = &$this->rotation_year;

		// rotation_period
		$this->rotation_period = new crField('Engaged_Clients', 'Engaged Clients', 'x_rotation_period', 'rotation_period', 'engagements.rotation_period', 200, EWR_DATATYPE_STRING, -1);
		$this->rotation_period->Sortable = TRUE; // Allow sort
		$this->rotation_period->DateFilter = "";
		$this->rotation_period->SqlSelect = "";
		$this->rotation_period->SqlOrderBy = "";
		$this->fields['rotation_period'] = &$this->rotation_period;

		// city
		$this->city = new crField('Engaged_Clients', 'Engaged Clients', 'x_city', 'city', 'engagements.city', 200, EWR_DATATYPE_STRING, -1);
		$this->city->Sortable = TRUE; // Allow sort
		$this->city->DateFilter = "";
		$this->city->SqlSelect = "";
		$this->city->SqlOrderBy = "";
		$this->fields['city'] = &$this->city;

		// engagement_id
		$this->engagement_id = new crField('Engaged_Clients', 'Engaged Clients', 'x_engagement_id', 'engagement_id', 'engagements.engagement_id', 200, EWR_DATATYPE_STRING, -1);
		$this->engagement_id->Sortable = TRUE; // Allow sort
		$this->engagement_id->DateFilter = "";
		$this->engagement_id->SqlSelect = "";
		$this->engagement_id->SqlOrderBy = "";
		$this->fields['engagement_id'] = &$this->engagement_id;

		// start_notes
		$this->start_notes = new crField('Engaged_Clients', 'Engaged Clients', 'x_start_notes', 'start_notes', 'engagements.start_notes', 201, EWR_DATATYPE_MEMO, -1);
		$this->start_notes->Sortable = TRUE; // Allow sort
		$this->start_notes->DateFilter = "";
		$this->start_notes->SqlSelect = "";
		$this->start_notes->SqlOrderBy = "";
		$this->fields['start_notes'] = &$this->start_notes;
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
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "clients, engagements, services";
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
		return ($this->_SqlSelect <> "") ? $this->_SqlSelect : "SELECT clients.company_name, clients.company_reg_number, engagements.date_resigned, engagements.engagement_date, services.name As service_name, services.type As service_type, engagements.first_engagement_date, engagements.client_turnover, engagements.accounting_framework, engagements.when_next_irba, engagements.year_of_afs, engagements.jse_listed, engagements.amount_billed, engagements.isqc_2, engagements.isqc_1, engagements.irba_code, engagements.companies_act, engagements.group_structure, engagements.anticipated_rotation_partner, engagements.rotation_year, engagements.rotation_period, engagements.city, engagements.engagement_id, engagements.start_notes FROM " . $this->getSqlFrom();
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
		$sWhere = ($this->_SqlWhere <> "") ? $this->_SqlWhere : "clients.id = engagements.client And engagements.engagement_type = services.id And (clients.engagement_status = '1' Or clients.engagement_status = '2') And clients.active_status = '1'";
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
		case "x_company_name":
			$fld->LookupFilters = array("d" => "DB", "f0" => 'clients.company_name = {filter_value}', "t0" => "200", "fn0" => "", "dlm" => ewr_Encrypt($fld->FldDelimiter), "af" => json_encode($fld->AdvancedFilters));
		$sWhereWrk = "(clients.id = engagements.client And engagements.engagement_type = services.id And (clients.engagement_status = '1' Or clients.engagement_status = '2') And clients.active_status = '1')";
		$fld->LookupFilters += array(
			"select" => "SELECT DISTINCT company_name, company_name AS `DispFld`, '' AS `DispFld2`, '' AS `DispFld3`, '' AS `DispFld4` FROM clients, engagements, services",
			"where" => $sWhereWrk,
			"orderby" => ""
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
