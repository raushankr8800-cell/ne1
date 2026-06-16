<?php
/**
 * Per-state enrichment data + helpers.
 *
 * This is the main "uniqueness engine" upgrade. Instead of relying only on a
 * handful of reworded paragraphs, every page now weaves in REAL, state-specific
 * facts: major cities, region, neighbouring states (for internal linking), the
 * state's official Department of Revenue (.gov external link), and a live,
 * state-aware take-home example. Because these facts differ for every state,
 * even shared sentence templates render genuinely different, useful content.
 *
 * @package USA_State_All_Calculators
 */

if (!defined('ABSPATH')) exit;

/**
 * Returns enrichment data for all 50 states.
 *
 * Keys:
 *  - cities      : array of 3 major cities (human/local touch)
 *  - region      : Census-style region label
 *  - neighbors   : array of neighbouring state slugs (internal linking)
 *  - rev_name    : official state tax/revenue agency name
 *  - rev_url     : official agency homepage (.gov)
 *  - eff_state   : approximate EFFECTIVE state income-tax rate (%) for a
 *                  single filer earning ~$85k; used only for the worked
 *                  example and clearly labelled as an estimate. 0 = no tax.
 */
function usc_get_state_extra() {
    static $data = null;
    if ($data !== null) return $data;

    $data = [
        'alabama'        => ['cities' => ['Birmingham', 'Montgomery', 'Huntsville'], 'region' => 'the Deep South', 'neighbors' => ['mississippi', 'tennessee', 'georgia', 'florida'], 'rev_name' => 'Alabama Department of Revenue', 'rev_url' => 'https://www.revenue.alabama.gov/', 'eff_state' => 4.2],
        'alaska'         => ['cities' => ['Anchorage', 'Fairbanks', 'Juneau'], 'region' => 'the Pacific Northwest frontier', 'neighbors' => ['washington', 'oregon'], 'rev_name' => 'Alaska Department of Revenue', 'rev_url' => 'https://tax.alaska.gov/', 'eff_state' => 0],
        'arizona'        => ['cities' => ['Phoenix', 'Tucson', 'Mesa'], 'region' => 'the Southwest', 'neighbors' => ['california', 'nevada', 'utah', 'new-mexico'], 'rev_name' => 'Arizona Department of Revenue', 'rev_url' => 'https://azdor.gov/', 'eff_state' => 2.5],
        'arkansas'       => ['cities' => ['Little Rock', 'Fayetteville', 'Fort Smith'], 'region' => 'the South Central US', 'neighbors' => ['texas', 'louisiana', 'mississippi', 'tennessee', 'missouri', 'oklahoma'], 'rev_name' => 'Arkansas Department of Finance and Administration', 'rev_url' => 'https://www.dfa.arkansas.gov/', 'eff_state' => 3.6],
        'california'     => ['cities' => ['Los Angeles', 'San Diego', 'San Jose'], 'region' => 'the West Coast', 'neighbors' => ['oregon', 'nevada', 'arizona'], 'rev_name' => 'California Franchise Tax Board', 'rev_url' => 'https://www.ftb.ca.gov/', 'eff_state' => 4.6],
        'colorado'       => ['cities' => ['Denver', 'Colorado Springs', 'Aurora'], 'region' => 'the Mountain West', 'neighbors' => ['wyoming', 'nebraska', 'kansas', 'oklahoma', 'new-mexico', 'utah'], 'rev_name' => 'Colorado Department of Revenue', 'rev_url' => 'https://tax.colorado.gov/', 'eff_state' => 4.4],
        'connecticut'    => ['cities' => ['Bridgeport', 'New Haven', 'Hartford'], 'region' => 'New England', 'neighbors' => ['new-york', 'massachusetts', 'rhode-island'], 'rev_name' => 'Connecticut Department of Revenue Services', 'rev_url' => 'https://portal.ct.gov/DRS', 'eff_state' => 5.2],
        'delaware'       => ['cities' => ['Wilmington', 'Dover', 'Newark'], 'region' => 'the Mid-Atlantic', 'neighbors' => ['maryland', 'pennsylvania', 'new-jersey'], 'rev_name' => 'Delaware Division of Revenue', 'rev_url' => 'https://revenue.delaware.gov/', 'eff_state' => 5.0],
        'florida'        => ['cities' => ['Jacksonville', 'Miami', 'Tampa'], 'region' => 'the Southeast', 'neighbors' => ['georgia', 'alabama'], 'rev_name' => 'Florida Department of Revenue', 'rev_url' => 'https://floridarevenue.com/', 'eff_state' => 0],
        'georgia'        => ['cities' => ['Atlanta', 'Augusta', 'Savannah'], 'region' => 'the Southeast', 'neighbors' => ['florida', 'alabama', 'tennessee', 'north-carolina', 'south-carolina'], 'rev_name' => 'Georgia Department of Revenue', 'rev_url' => 'https://dor.georgia.gov/', 'eff_state' => 4.8],
        'hawaii'         => ['cities' => ['Honolulu', 'Hilo', 'Kailua'], 'region' => 'the Pacific', 'neighbors' => ['california'], 'rev_name' => 'Hawaii Department of Taxation', 'rev_url' => 'https://tax.hawaii.gov/', 'eff_state' => 7.2],
        'idaho'          => ['cities' => ['Boise', 'Meridian', 'Nampa'], 'region' => 'the Pacific Northwest', 'neighbors' => ['washington', 'oregon', 'nevada', 'utah', 'wyoming', 'montana'], 'rev_name' => 'Idaho State Tax Commission', 'rev_url' => 'https://tax.idaho.gov/', 'eff_state' => 5.3],
        'illinois'       => ['cities' => ['Chicago', 'Aurora', 'Naperville'], 'region' => 'the Midwest', 'neighbors' => ['wisconsin', 'iowa', 'missouri', 'kentucky', 'indiana'], 'rev_name' => 'Illinois Department of Revenue', 'rev_url' => 'https://tax.illinois.gov/', 'eff_state' => 4.95],
        'indiana'        => ['cities' => ['Indianapolis', 'Fort Wayne', 'Evansville'], 'region' => 'the Midwest', 'neighbors' => ['illinois', 'michigan', 'ohio', 'kentucky'], 'rev_name' => 'Indiana Department of Revenue', 'rev_url' => 'https://www.in.gov/dor/', 'eff_state' => 3.05],
        'iowa'           => ['cities' => ['Des Moines', 'Cedar Rapids', 'Davenport'], 'region' => 'the Midwest', 'neighbors' => ['minnesota', 'wisconsin', 'illinois', 'missouri', 'nebraska', 'south-dakota'], 'rev_name' => 'Iowa Department of Revenue', 'rev_url' => 'https://tax.iowa.gov/', 'eff_state' => 4.8],
        'kansas'         => ['cities' => ['Wichita', 'Overland Park', 'Kansas City'], 'region' => 'the Great Plains', 'neighbors' => ['nebraska', 'missouri', 'oklahoma', 'colorado'], 'rev_name' => 'Kansas Department of Revenue', 'rev_url' => 'https://www.ksrevenue.gov/', 'eff_state' => 4.9],
        'kentucky'       => ['cities' => ['Louisville', 'Lexington', 'Bowling Green'], 'region' => 'the Upper South', 'neighbors' => ['indiana', 'ohio', 'west-virginia', 'virginia', 'tennessee', 'missouri', 'illinois'], 'rev_name' => 'Kentucky Department of Revenue', 'rev_url' => 'https://revenue.ky.gov/', 'eff_state' => 4.0],
        'louisiana'      => ['cities' => ['New Orleans', 'Baton Rouge', 'Shreveport'], 'region' => 'the Gulf South', 'neighbors' => ['texas', 'arkansas', 'mississippi'], 'rev_name' => 'Louisiana Department of Revenue', 'rev_url' => 'https://revenue.louisiana.gov/', 'eff_state' => 3.4],
        'maine'          => ['cities' => ['Portland', 'Lewiston', 'Bangor'], 'region' => 'New England', 'neighbors' => ['new-hampshire'], 'rev_name' => 'Maine Revenue Services', 'rev_url' => 'https://www.maine.gov/revenue/', 'eff_state' => 6.1],
        'maryland'       => ['cities' => ['Baltimore', 'Columbia', 'Germantown'], 'region' => 'the Mid-Atlantic', 'neighbors' => ['virginia', 'west-virginia', 'pennsylvania', 'delaware'], 'rev_name' => 'Comptroller of Maryland', 'rev_url' => 'https://www.marylandtaxes.gov/', 'eff_state' => 4.9],
        'massachusetts'  => ['cities' => ['Boston', 'Worcester', 'Springfield'], 'region' => 'New England', 'neighbors' => ['new-hampshire', 'vermont', 'new-york', 'connecticut', 'rhode-island'], 'rev_name' => 'Massachusetts Department of Revenue', 'rev_url' => 'https://www.mass.gov/orgs/massachusetts-department-of-revenue', 'eff_state' => 5.0],
        'michigan'       => ['cities' => ['Detroit', 'Grand Rapids', 'Warren'], 'region' => 'the Great Lakes', 'neighbors' => ['ohio', 'indiana', 'wisconsin'], 'rev_name' => 'Michigan Department of Treasury', 'rev_url' => 'https://www.michigan.gov/taxes', 'eff_state' => 4.25],
        'minnesota'      => ['cities' => ['Minneapolis', 'Saint Paul', 'Rochester'], 'region' => 'the Upper Midwest', 'neighbors' => ['wisconsin', 'iowa', 'south-dakota', 'north-dakota'], 'rev_name' => 'Minnesota Department of Revenue', 'rev_url' => 'https://www.revenue.state.mn.us/', 'eff_state' => 6.3],
        'mississippi'    => ['cities' => ['Jackson', 'Gulfport', 'Southaven'], 'region' => 'the Deep South', 'neighbors' => ['louisiana', 'arkansas', 'tennessee', 'alabama'], 'rev_name' => 'Mississippi Department of Revenue', 'rev_url' => 'https://www.dor.ms.gov/', 'eff_state' => 4.4],
        'missouri'       => ['cities' => ['Kansas City', 'Saint Louis', 'Springfield'], 'region' => 'the Midwest', 'neighbors' => ['iowa', 'illinois', 'kentucky', 'tennessee', 'arkansas', 'oklahoma', 'kansas', 'nebraska'], 'rev_name' => 'Missouri Department of Revenue', 'rev_url' => 'https://dor.mo.gov/', 'eff_state' => 4.0],
        'montana'        => ['cities' => ['Billings', 'Missoula', 'Great Falls'], 'region' => 'the Mountain West', 'neighbors' => ['idaho', 'wyoming', 'south-dakota', 'north-dakota'], 'rev_name' => 'Montana Department of Revenue', 'rev_url' => 'https://mtrevenue.gov/', 'eff_state' => 5.4],
        'nebraska'       => ['cities' => ['Omaha', 'Lincoln', 'Bellevue'], 'region' => 'the Great Plains', 'neighbors' => ['south-dakota', 'iowa', 'missouri', 'kansas', 'colorado', 'wyoming'], 'rev_name' => 'Nebraska Department of Revenue', 'rev_url' => 'https://revenue.nebraska.gov/', 'eff_state' => 5.0],
        'nevada'         => ['cities' => ['Las Vegas', 'Henderson', 'Reno'], 'region' => 'the Southwest', 'neighbors' => ['california', 'oregon', 'idaho', 'utah', 'arizona'], 'rev_name' => 'Nevada Department of Taxation', 'rev_url' => 'https://tax.nv.gov/', 'eff_state' => 0],
        'new-hampshire'  => ['cities' => ['Manchester', 'Nashua', 'Concord'], 'region' => 'New England', 'neighbors' => ['maine', 'vermont', 'massachusetts'], 'rev_name' => 'New Hampshire Department of Revenue Administration', 'rev_url' => 'https://www.revenue.nh.gov/', 'eff_state' => 0],
        'new-jersey'     => ['cities' => ['Newark', 'Jersey City', 'Paterson'], 'region' => 'the Mid-Atlantic', 'neighbors' => ['new-york', 'pennsylvania', 'delaware'], 'rev_name' => 'New Jersey Division of Taxation', 'rev_url' => 'https://www.nj.gov/treasury/taxation/', 'eff_state' => 4.0],
        'new-mexico'     => ['cities' => ['Albuquerque', 'Las Cruces', 'Rio Rancho'], 'region' => 'the Southwest', 'neighbors' => ['arizona', 'colorado', 'oklahoma', 'texas', 'utah'], 'rev_name' => 'New Mexico Taxation and Revenue Department', 'rev_url' => 'https://www.tax.newmexico.gov/', 'eff_state' => 4.0],
        'new-york'       => ['cities' => ['New York City', 'Buffalo', 'Rochester'], 'region' => 'the Mid-Atlantic', 'neighbors' => ['new-jersey', 'pennsylvania', 'connecticut', 'massachusetts', 'vermont'], 'rev_name' => 'New York State Department of Taxation and Finance', 'rev_url' => 'https://www.tax.ny.gov/', 'eff_state' => 5.5],
        'north-carolina' => ['cities' => ['Charlotte', 'Raleigh', 'Greensboro'], 'region' => 'the Southeast', 'neighbors' => ['virginia', 'south-carolina', 'georgia', 'tennessee'], 'rev_name' => 'North Carolina Department of Revenue', 'rev_url' => 'https://www.ncdor.gov/', 'eff_state' => 4.5],
        'north-dakota'   => ['cities' => ['Fargo', 'Bismarck', 'Grand Forks'], 'region' => 'the Great Plains', 'neighbors' => ['minnesota', 'south-dakota', 'montana'], 'rev_name' => 'North Dakota Office of State Tax Commissioner', 'rev_url' => 'https://www.tax.nd.gov/', 'eff_state' => 1.6],
        'ohio'           => ['cities' => ['Columbus', 'Cleveland', 'Cincinnati'], 'region' => 'the Great Lakes', 'neighbors' => ['michigan', 'indiana', 'kentucky', 'west-virginia', 'pennsylvania'], 'rev_name' => 'Ohio Department of Taxation', 'rev_url' => 'https://tax.ohio.gov/', 'eff_state' => 2.9],
        'oklahoma'       => ['cities' => ['Oklahoma City', 'Tulsa', 'Norman'], 'region' => 'the South Central US', 'neighbors' => ['kansas', 'missouri', 'arkansas', 'texas', 'new-mexico', 'colorado'], 'rev_name' => 'Oklahoma Tax Commission', 'rev_url' => 'https://oklahoma.gov/tax.html', 'eff_state' => 3.8],
        'oregon'         => ['cities' => ['Portland', 'Salem', 'Eugene'], 'region' => 'the Pacific Northwest', 'neighbors' => ['washington', 'idaho', 'nevada', 'california'], 'rev_name' => 'Oregon Department of Revenue', 'rev_url' => 'https://www.oregon.gov/dor/', 'eff_state' => 8.2],
        'pennsylvania'   => ['cities' => ['Philadelphia', 'Pittsburgh', 'Allentown'], 'region' => 'the Mid-Atlantic', 'neighbors' => ['new-york', 'new-jersey', 'delaware', 'maryland', 'west-virginia', 'ohio'], 'rev_name' => 'Pennsylvania Department of Revenue', 'rev_url' => 'https://www.revenue.pa.gov/', 'eff_state' => 3.07],
        'rhode-island'   => ['cities' => ['Providence', 'Warwick', 'Cranston'], 'region' => 'New England', 'neighbors' => ['connecticut', 'massachusetts'], 'rev_name' => 'Rhode Island Division of Taxation', 'rev_url' => 'https://tax.ri.gov/', 'eff_state' => 4.3],
        'south-carolina' => ['cities' => ['Charleston', 'Columbia', 'North Charleston'], 'region' => 'the Southeast', 'neighbors' => ['north-carolina', 'georgia'], 'rev_name' => 'South Carolina Department of Revenue', 'rev_url' => 'https://dor.sc.gov/', 'eff_state' => 4.5],
        'south-dakota'   => ['cities' => ['Sioux Falls', 'Rapid City', 'Aberdeen'], 'region' => 'the Great Plains', 'neighbors' => ['north-dakota', 'minnesota', 'iowa', 'nebraska', 'wyoming', 'montana'], 'rev_name' => 'South Dakota Department of Revenue', 'rev_url' => 'https://dor.sd.gov/', 'eff_state' => 0],
        'tennessee'      => ['cities' => ['Nashville', 'Memphis', 'Knoxville'], 'region' => 'the Upper South', 'neighbors' => ['kentucky', 'virginia', 'north-carolina', 'georgia', 'alabama', 'mississippi', 'arkansas', 'missouri'], 'rev_name' => 'Tennessee Department of Revenue', 'rev_url' => 'https://www.tn.gov/revenue.html', 'eff_state' => 0],
        'texas'          => ['cities' => ['Houston', 'San Antonio', 'Dallas'], 'region' => 'the South Central US', 'neighbors' => ['new-mexico', 'oklahoma', 'arkansas', 'louisiana'], 'rev_name' => 'Texas Comptroller of Public Accounts', 'rev_url' => 'https://comptroller.texas.gov/', 'eff_state' => 0],
        'utah'           => ['cities' => ['Salt Lake City', 'West Valley City', 'Provo'], 'region' => 'the Mountain West', 'neighbors' => ['idaho', 'wyoming', 'colorado', 'new-mexico', 'arizona', 'nevada'], 'rev_name' => 'Utah State Tax Commission', 'rev_url' => 'https://tax.utah.gov/', 'eff_state' => 4.55],
        'vermont'        => ['cities' => ['Burlington', 'South Burlington', 'Rutland'], 'region' => 'New England', 'neighbors' => ['new-hampshire', 'massachusetts', 'new-york'], 'rev_name' => 'Vermont Department of Taxes', 'rev_url' => 'https://tax.vermont.gov/', 'eff_state' => 5.1],
        'virginia'       => ['cities' => ['Virginia Beach', 'Chesapeake', 'Norfolk'], 'region' => 'the Mid-Atlantic', 'neighbors' => ['maryland', 'north-carolina', 'tennessee', 'kentucky', 'west-virginia'], 'rev_name' => 'Virginia Department of Taxation', 'rev_url' => 'https://www.tax.virginia.gov/', 'eff_state' => 5.0],
        'washington'     => ['cities' => ['Seattle', 'Spokane', 'Tacoma'], 'region' => 'the Pacific Northwest', 'neighbors' => ['oregon', 'idaho'], 'rev_name' => 'Washington Department of Revenue', 'rev_url' => 'https://dor.wa.gov/', 'eff_state' => 0],
        'west-virginia'  => ['cities' => ['Charleston', 'Huntington', 'Morgantown'], 'region' => 'the Appalachian region', 'neighbors' => ['virginia', 'maryland', 'pennsylvania', 'ohio', 'kentucky'], 'rev_name' => 'West Virginia Tax Division', 'rev_url' => 'https://tax.wv.gov/', 'eff_state' => 4.2],
        'wisconsin'      => ['cities' => ['Milwaukee', 'Madison', 'Green Bay'], 'region' => 'the Upper Midwest', 'neighbors' => ['minnesota', 'iowa', 'illinois', 'michigan'], 'rev_name' => 'Wisconsin Department of Revenue', 'rev_url' => 'https://www.revenue.wi.gov/', 'eff_state' => 5.3],
        'wyoming'        => ['cities' => ['Cheyenne', 'Casper', 'Laramie'], 'region' => 'the Mountain West', 'neighbors' => ['montana', 'south-dakota', 'nebraska', 'colorado', 'utah', 'idaho'], 'rev_name' => 'Wyoming Department of Revenue', 'rev_url' => 'https://revenue.wyo.gov/', 'eff_state' => 0],
    ];
    return $data;
}

/**
 * Convenience accessor for a single state's extra data with safe fallback.
 */
function usc_state_extra($state_slug) {
    $all = usc_get_state_extra();
    if (isset($all[$state_slug])) return $all[$state_slug];
    return [
        'cities' => ['the state capital', 'major metros', 'smaller towns'],
        'region' => 'the United States',
        'neighbors' => ['california', 'texas', 'new-york'],
        'rev_name' => 'your state tax agency',
        'rev_url' => 'https://www.usa.gov/state-taxes',
        'eff_state' => 0,
    ];
}

/**
 * Builds a per-state external authority-links block for the Paycheck pages.
 * Mixes the federal sources (IRS, SSA, DOL) with the state's OWN revenue
 * agency so every page links to a different, relevant .gov destination.
 */
function usc_paycheck_authority_links_html($name, $state_slug) {
    $x = usc_state_extra($state_slug);
    return '<ul>'
        . '<li><a href="' . esc_url($x['rev_url']) . '" target="_blank" rel="nofollow noopener">' . esc_html($x['rev_name']) . '</a> &mdash; the official source for ' . esc_html($name) . ' withholding tables, forms, and filing deadlines.</li>'
        . '<li><a href="https://www.irs.gov/individuals/tax-withholding-estimator" target="_blank" rel="nofollow noopener">IRS Tax Withholding Estimator</a> &mdash; the federal tool to check that your W-4 is set correctly.</li>'
        . '<li><a href="https://www.ssa.gov/oact/cola/cbb.html" target="_blank" rel="nofollow noopener">Social Security wage base</a> &mdash; the yearly earnings cap for the 6.2% Social Security tax.</li>'
        . '<li><a href="https://www.dol.gov/agencies/whd/minimum-wage/state" target="_blank" rel="nofollow noopener">U.S. Department of Labor minimum-wage table</a> &mdash; current rates, including ' . esc_html($name) . '.</li>'
        . '</ul>';
}

/**
 * Builds an internal-linking block to the SAME calculator in neighbouring
 * states. This is contextual, geography-based interlinking that differs for
 * every state and helps both users and crawlers.
 */
function usc_neighbour_links_html($state_slug, $current_type, $label) {
    $x = usc_state_extra($state_slug);
    $states = function_exists('usc_get_states_data') ? usc_get_states_data() : [];
    $home = function_exists('home_url') ? home_url('/') : '/';
    $items = '';
    $added = 0;
    foreach ($x['neighbors'] as $ns) {
        if ($ns === $state_slug) continue;
        $nname = isset($states[$ns]['name']) ? $states[$ns]['name'] : ucwords(str_replace('-', ' ', $ns));
        $items .= '<li><a href="' . esc_url($home . $ns . '-' . $current_type . '-calculator/') . '">' . esc_html($nname . ' ' . $label) . '</a></li>';
        if (++$added >= 4) break;
    }
    if ($items === '') return '';
    return '<ul>' . $items . '</ul>';
}

/**
 * Estimates federal income tax for a single filer (2026 brackets, approximate).
 * Used only for the worked example, which is clearly labelled as an estimate.
 */
function usc_estimate_federal_tax_single($taxable) {
    if ($taxable <= 0) return 0;
    $brackets = [
        [0,        11925,   0.10],
        [11925,    48475,   0.12],
        [48475,    103350,  0.22],
        [103350,   197300,  0.24],
        [197300,   250525,  0.32],
        [250525,   626350,  0.35],
        [626350,   PHP_INT_MAX, 0.37],
    ];
    $tax = 0;
    foreach ($brackets as $b) {
        if ($taxable > $b[0]) {
            $tax += (min($taxable, $b[1]) - $b[0]) * $b[2];
        }
    }
    return $tax;
}

/**
 * Builds a state-aware worked example for the Paycheck article.
 * Returns an associative array of dollar figures for an $85,000 single filer,
 * paid bi-weekly, contributing 6% to a traditional 401(k). The state-tax line
 * uses the state's approximate effective rate, so the net differs per state.
 */
function usc_paycheck_example($state, $gross = 85000) {
    $state_slug = strtolower(str_replace(' ', '-', $state['name']));
    $x = usc_state_extra($state_slug);

    $pretax_401k = $gross * 0.06;
    $std_ded     = 16100; // 2026 single standard deduction (approx)
    $fed_taxable = max(0, $gross - $pretax_401k - $std_ded);

    $federal = usc_estimate_federal_tax_single($fed_taxable);
    $ss       = min($gross, 184500) * 0.062;
    $medicare = $gross * 0.0145;

    // State income tax: effective-rate estimate on (gross - pretax 401k).
    $state_base = max(0, $gross - $pretax_401k);
    $state_tax  = $state_base * ((float)$x['eff_state'] / 100);

    $annual_net = $gross - $pretax_401k - $federal - $ss - $medicare - $state_tax;

    $periods = 26; // bi-weekly
    return [
        'gross_year'     => $gross,
        'gross_period'   => $gross / $periods,
        'pretax_period'  => $pretax_401k / $periods,
        'federal_period' => $federal / $periods,
        'ss_period'      => $ss / $periods,
        'medicare_period'=> $medicare / $periods,
        'state_period'   => $state_tax / $periods,
        'net_period'     => $annual_net / $periods,
        'net_year'       => $annual_net,
        'eff_state'      => (float)$x['eff_state'],
        'has_state_tax'  => ((float)$x['eff_state'] > 0),
    ];
}

/**
 * Formats a number as a USD string, e.g. 1234.5 => "$1,234.50".
 */
function usc_money($n) {
    return '$' . number_format((float)$n, 2);
}


/**
 * Approximate effective property-tax rate (% of home value per year) by state.
 * Used to make the Mortgage worked example state-specific (the tax line, and
 * therefore the total PITI, differs realistically per state). Clearly labelled
 * as an estimate in the article.
 */
function usc_state_property_tax_rate($state_slug) {
    static $r = null;
    if ($r === null) {
        $r = [
            'alabama' => 0.41, 'alaska' => 1.19, 'arizona' => 0.63, 'arkansas' => 0.64, 'california' => 0.75,
            'colorado' => 0.51, 'connecticut' => 1.96, 'delaware' => 0.58, 'florida' => 0.91, 'georgia' => 0.92,
            'hawaii' => 0.29, 'idaho' => 0.67, 'illinois' => 2.08, 'indiana' => 0.84, 'iowa' => 1.52,
            'kansas' => 1.41, 'kentucky' => 0.86, 'louisiana' => 0.56, 'maine' => 1.24, 'maryland' => 1.07,
            'massachusetts' => 1.14, 'michigan' => 1.38, 'minnesota' => 1.11, 'mississippi' => 0.79, 'missouri' => 0.97,
            'montana' => 0.83, 'nebraska' => 1.63, 'nevada' => 0.55, 'new-hampshire' => 1.93, 'new-jersey' => 2.23,
            'new-mexico' => 0.80, 'new-york' => 1.40, 'north-carolina' => 0.82, 'north-dakota' => 0.98, 'ohio' => 1.59,
            'oklahoma' => 0.90, 'oregon' => 0.93, 'pennsylvania' => 1.49, 'rhode-island' => 1.40, 'south-carolina' => 0.57,
            'south-dakota' => 1.17, 'tennessee' => 0.67, 'texas' => 1.68, 'utah' => 0.57, 'vermont' => 1.83,
            'virginia' => 0.82, 'washington' => 0.94, 'west-virginia' => 0.59, 'wisconsin' => 1.61, 'wyoming' => 0.61,
        ];
    }
    return isset($r[$state_slug]) ? $r[$state_slug] : 1.0;
}
