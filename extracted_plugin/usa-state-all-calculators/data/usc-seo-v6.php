<?php
/**
 * V6 SEO titles & descriptions.
 *
 * Produces per-state varied <title> and meta description text (5 patterns each,
 * selected deterministically by state slug) so the 350+ pages no longer share
 * near-identical SERP snippets. Patterns deliberately avoid a 4-digit year and
 * the legacy trigger substrings ("| Take-Home Pay", "| Estimates") so they do
 * not cause perpetual regeneration in the existing templates.
 *
 * @package USA_State_All_Calculators
 */

if (!defined('ABSPATH')) exit;

/** Deterministic picker for SEO variations. */
function usc_seo_pick($slug, $key, $arr) {
    $fn = function_exists('usc_get_variation_index') ? 'usc_get_variation_index' : 'ust_get_variation_index';
    return $arr[$fn($slug, 'seo_' . $key, count($arr))];
}

/** Returns a varied SEO title for a calc type + state. */
function usc_seo_title_v6($calc_type, $name) {
    $slug = strtolower(str_replace(' ', '-', $name));
    $titles = [
        'paycheck' => [
            $name . ' Paycheck Calculator: Estimate Take-Home Pay',
            $name . ' Paycheck Calculator - Net Pay After Taxes',
            'Take-Home Pay Calculator for ' . $name . ' Workers',
            $name . ' Salary and Paycheck Tax Calculator',
            'How Much Is Your ' . $name . ' Paycheck After Taxes?',
        ],
        'child-support' => [
            $name . ' Child Support Calculator: Estimate Payments',
            $name . ' Child Support Calculator - Monthly Estimate',
            'Estimate ' . $name . ' Child Support Payments',
            $name . ' Child Support Guidelines Calculator',
            'How Much Child Support in ' . $name . '?',
        ],
        'alimony' => [
            $name . ' Alimony Calculator: Estimate Spousal Support',
            $name . ' Spousal Support and Alimony Calculator',
            'Estimate ' . $name . ' Alimony and Duration',
            $name . ' Alimony Calculator - Amount and Term',
            'How Much Alimony in ' . $name . '?',
        ],
        'mortgage' => [
            $name . ' Mortgage Calculator: Monthly PITI Payment',
            $name . ' Mortgage Payment Calculator with Taxes',
            'Estimate Your ' . $name . ' Monthly Mortgage Payment',
            $name . ' Home Loan and Mortgage Calculator',
            'What Will a ' . $name . ' Mortgage Cost Per Month?',
        ],
        'income-tax' => [
            $name . ' Income Tax Calculator: Take-Home Pay',
            $name . ' Income Tax and Net Pay Calculator',
            'Estimate ' . $name . ' Income Tax and Take-Home Pay',
            $name . ' State Income Tax Calculator',
            'How Much Income Tax Do You Pay in ' . $name . '?',
        ],
        'property-tax' => [
            $name . ' Property Tax Calculator: Annual Estimate',
            $name . ' Property Tax and Escrow Calculator',
            'Estimate Your ' . $name . ' Property Tax Bill',
            $name . ' Home Property Tax Calculator',
            'How Much Is Property Tax in ' . $name . '?',
        ],
        'sales-tax' => [
            $name . ' Sales Tax Calculator: State and Local Rates',
            $name . ' Sales Tax and Total Cost Calculator',
            'Calculate ' . $name . ' Sales Tax on Any Purchase',
            $name . ' Combined Sales Tax Rate Calculator',
            'What Is the Sales Tax in ' . $name . '?',
        ],
    ];
    $set = isset($titles[$calc_type]) ? $titles[$calc_type] : [$name . ' Calculator'];
    return usc_seo_pick($slug, $calc_type . '_title', $set);
}

/** Returns a varied SEO description for a calc type + state array. */
function usc_seo_desc_v6($calc_type, $state) {
    $name = $state['name'];
    $slug = strtolower(str_replace(' ', '-', $name));
    $tax_desc = isset($state['tax_desc']) ? $state['tax_desc'] : '';
    $sales_rate = isset($state['sales_rate']) ? $state['sales_rate'] : '';
    $prop_rate = isset($state['prop_rate']) ? $state['prop_rate'] : '';
    $cs_model = isset($state['cs_model']) ? $state['cs_model'] : 'state guidelines';

    $sets = [
        'paycheck' => [
            'Free ' . $name . ' paycheck calculator. See your real take-home pay after federal tax, FICA, and ' . $name . ' state tax, supports salary, hourly, and W-4 settings.',
            'Work out your net pay in ' . $name . ' in seconds. This free calculator breaks down federal, FICA, and state withholding so you know exactly what you keep.',
            'Estimate take-home pay for any ' . $name . ' salary. Adjust filing status, pre-tax deductions, and pay frequency to see your true net paycheck.',
            'How much is your ' . $name . ' paycheck after taxes? Get an instant, accurate net-pay breakdown with federal, FICA, and state deductions.',
            'Turn your ' . $name . ' gross salary into real take-home pay. Free, private calculator with a full federal, FICA, and state-tax breakdown.',
        ],
        'child-support' => [
            'Estimate monthly child support in ' . $name . ' under the ' . $cs_model . '. Factor in both incomes, parenting time, and health costs, free and private.',
            'Free ' . $name . ' child support calculator. Get a realistic monthly estimate based on incomes, custody overnights, and the ' . $cs_model . '.',
            'How much child support in ' . $name . '? Run both parents\' incomes and parenting time through the ' . $cs_model . ' for a guideline estimate.',
            'Plan ahead with a ' . $name . ' child support estimate. Test custody schedules and incomes to see fair, guideline-based monthly payments.',
            'Calculate guideline child support for ' . $name . '. Objective, judgment-free estimates for mediation, court prep, or budgeting two households.',
        ],
        'alimony' => [
            'Estimate spousal support in ' . $name . ' with our free alimony calculator. Factor in both incomes, marriage length, and state guidelines for amount and duration.',
            'Free ' . $name . ' alimony calculator. See a realistic monthly spousal-support estimate and likely term based on incomes and marriage length.',
            'How much alimony in ' . $name . '? Get a guideline-based estimate of spousal support and how long it may last, free and private.',
            'Plan your finances with a ' . $name . ' spousal-support estimate. Test incomes and marriage length to prepare for mediation or settlement.',
            'Calculate ' . $name . ' alimony in seconds. Estimate the monthly amount and duration using the income gap and length of the marriage.',
        ],
        'mortgage' => [
            'Free ' . $name . ' mortgage calculator. Estimate your full monthly PITI payment, principal, interest, taxes, and insurance, plus amortization and payoff.',
            'Calculate your ' . $name . ' monthly mortgage payment with local property taxes and insurance. Compare 15- vs 30-year terms and extra-payment savings.',
            'What will a ' . $name . ' home cost per month? Get an accurate PITI estimate including ' . $name . ' property taxes, insurance, and PMI.',
            'Estimate your ' . $name . ' mortgage payment and total interest. Test down payments, rates, and terms to find a payment you can afford.',
            'Plan your ' . $name . ' home purchase with a full mortgage breakdown, principal, interest, taxes, insurance, and closing-cost estimates.',
        ],
        'income-tax' => [
            'Free ' . $name . ' income tax calculator. Estimate your take-home pay after federal tax, FICA, and ' . $name . ' state tax (' . $tax_desc . ').',
            'Work out your ' . $name . ' income tax and net pay. See federal brackets, FICA, and ' . $name . ' state tax in one clear breakdown.',
            'How much income tax do you pay in ' . $name . '? Estimate your effective rate and take-home pay with this free, private calculator.',
            'Estimate ' . $name . ' take-home pay in seconds. Adjust filing status and deductions to see your federal and state tax and net income.',
            'Turn your ' . $name . ' salary into real net income. Free calculator with federal, FICA, and ' . $name . ' state-tax detail.',
        ],
        'property-tax' => [
            'Free ' . $name . ' property tax calculator. Estimate your annual and monthly bill (effective rate near ' . $prop_rate . '), with exemptions and projections.',
            'Calculate your ' . $name . ' property tax by home value and county. Model homestead and senior exemptions and see your monthly escrow.',
            'How much is property tax in ' . $name . '? Estimate your annual bill from your home value and ' . $name . '\'s rates, free and private.',
            'Plan your ' . $name . ' escrow with an accurate property-tax estimate. Compare counties and test exemptions to lower your bill.',
            'Estimate ' . $name . ' property taxes on any home value. See annual and monthly figures plus a multi-year projection as values rise.',
        ],
        'sales-tax' => [
            'Free ' . $name . ' sales tax calculator. Add the state rate (' . $sales_rate . ') and local taxes to any purchase for the real total cost.',
            'Calculate the combined ' . $name . ' sales tax on any purchase. Apply local rates and exemptions for groceries or medicine, instant totals.',
            'What is the sales tax in ' . $name . '? Get the combined state and local rate and the final total on any purchase price.',
            'Estimate ' . $name . ' sales tax before you buy. Compare city rates and model exemptions to know your exact checkout total.',
            'Work out ' . $name . ' sales tax fast. Combine the ' . $sales_rate . ' state rate with local add-ons for an accurate purchase total.',
        ],
    ];
    $set = isset($sets[$calc_type]) ? $sets[$calc_type] : ['Free ' . $name . ' calculator with an instant, accurate estimate.'];
    return usc_seo_pick($slug, $calc_type . '_desc', $set);
}
