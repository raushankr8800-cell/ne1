<?php
/**
 * Property Tax Calculator (UST) — V6 content engine.
 * 16 variations/section x 13 sections, real per-state property-tax example,
 * varied headings, pooled lists, unique FAQs.
 * Tokens: {state_name} {prop_rate} {city1} {city2} {region}
 *
 * @package USA_State_All_Calculators
 */

if (!defined('ABSPATH')) exit;

if (!function_exists('usc_pv6_h')) {
    function usc_pv6_h($slug, $key, $variants) {
        return $variants[usc_get_variation_index($slug, 'head_' . $key, count($variants))];
    }
}
if (!function_exists('usc_pv6_list')) {
    function usc_pv6_list($slug, $key, $items, $count, $tag = 'ul') {
        usort($items, function($a, $b) use ($slug, $key) {
            return strcmp(md5($slug . '|' . $key . '|' . $a), md5($slug . '|' . $key . '|' . $b));
        });
        $items = array_slice($items, 0, $count);
        $li = '';
        foreach ($items as $it) { $li .= '<li>' . $it . '</li>'; }
        return '<' . $tag . '>' . $li . '</' . $tag . '>';
    }
}

/** Returns the Property Tax text variations (16 per section). */
function usc_pt_variations_v6() {
    return array_merge(usc_ptv6_a(), usc_ptv6_b(), usc_ptv6_c());
}

/** Variation set A: intro, whatis */
function usc_ptv6_a() {
    return [
        'intro' => [
            "Property tax is the cost of homeownership people forget to budget for, until the bill arrives. In {state_name}, your annual tax depends on your home's assessed value and local rates that vary by county. This calculator estimates your bill so there are no surprises in your escrow or mailbox.",
            "Owning a home in {state_name} means more than a mortgage, property taxes fund your schools, roads, and emergency services, and they recur every year. This calculator turns your home value into a clear annual and monthly estimate so you can plan with confidence.",
            "Whether you are buying in {city1} or already own across {state_name}, property tax is a recurring cost worth understanding. This tool applies {state_name}'s rates to your home value, showing your estimated bill and how exemptions could lower it.",
            "The sticker price of a {state_name} home is not your only cost, property tax follows you every year you own it. This calculator estimates that bill from your assessed value and local rate, so you can budget realistically before and after you buy.",
            "Property taxes quietly shape the true cost of living in {state_name}, and they differ sharply by county. This calculator helps you estimate your annual and monthly bill, compare jurisdictions, and see how relief programs reduce what you owe.",
            "For homeowners in {city1} and across {state_name}, property tax is one of the largest ongoing expenses after the mortgage. This tool makes it predictable, applying local rates to your home value for a clear, plannable estimate.",
            "Few homeownership costs surprise buyers like property tax. In {state_name}, it is set locally on your home's assessed value, and this calculator turns those rules into a straightforward annual and monthly figure.",
            "Before you buy in {state_name}, or appeal an assessment, you should know your property-tax bill. This calculator estimates it from your home value and {state_name}'s rates, and shows how exemptions can bring it down.",
            "Property tax can feel opaque until you see it broken down. This {state_name} calculator separates assessed value, exemptions, and local rate, so the number on your bill finally makes sense.",
            "Budgeting for a home in {state_name} works best when property tax is part of the math from day one. This calculator gives you that figure instantly, factoring in {state_name}'s rate and your home's value.",
            "From {city1} to {city2}, {state_name} homeowners use tools like this to plan for property tax. Enter your home value and see the estimated annual bill, the monthly escrow impact, and potential exemption savings.",
            "Your effective property-tax rate in {state_name} may be higher or lower than you think. This calculator computes your estimated bill so you can compare counties, plan escrow, and decide where your housing budget stretches furthest.",
            "A clear view of property tax is essential for any {state_name} homeowner. This tool converts your home's value into an annual and monthly estimate, helping you budget and plan years ahead.",
            "Whether you are comparing neighborhoods or planning next year's budget, knowing your {state_name} property tax matters. This calculator applies local rates to your home value to estimate the bill in moments.",
            "The journey from home value to tax bill passes through assessment ratios, exemptions, and local rates in {state_name}. This calculator maps that journey so you understand exactly what you will owe.",
            "Property tax should not be a once-a-year shock. This {state_name} calculator shows your estimated bill year-round, helping you budget escrow, plan for appreciation, and claim every exemption you qualify for."
        ],
        'whatis' => [
            "A <strong>{state_name} Property Tax Calculator</strong> estimates your annual and monthly property tax by applying {state_name}'s assessment rules and local rates to your home's value, minus any exemptions you qualify for.",
            "The <strong>{state_name} Property Tax Calculator</strong> is a tool that turns home value into a tax estimate. It applies the assessment ratio, subtracts exemptions, and multiplies by your local rate to project your bill.",
            "Think of the <strong>{state_name} Property Tax Calculator</strong> as a planning tool for homeowners. Enter your home value and county, and it estimates your annual tax, monthly escrow impact, and a multi-year projection.",
            "At its core, a <strong>{state_name} Property Tax Calculator</strong> answers what you will owe each year. It applies {state_name}'s effective rate to your assessed value to produce a clear annual and monthly figure.",
            "A <strong>{state_name} Property Tax Calculator</strong> is a simulator for your tax bill. Before you buy or budget, it estimates the property tax on a {state_name} home using local rates and exemptions.",
            "Put simply, the <strong>{state_name} Property Tax Calculator</strong> converts a home value into a recurring cost. It handles the assessment math and applies {state_name}'s rate so nothing is left out of your budget.",
            "The <strong>{state_name} Property Tax Calculator</strong> is a planning tool that decodes your bill. Accounting for assessed value and exemptions, it shows how {state_name} arrives at your annual property tax.",
            "A <strong>{state_name} Property Tax Calculator</strong> is a free, instant estimator of homeownership costs. Provide your home value and county, and it applies {state_name}'s rates to estimate your tax.",
            "Consider the <strong>{state_name} Property Tax Calculator</strong> a translation layer between your home's value and your annual bill. It applies {state_name}'s assessment rules and local rate to show what you owe.",
            "The <strong>{state_name} Property Tax Calculator</strong> is built for {state_name} homeowners. Rather than generic math, it factors in the state's effective rate and exemption options for an accurate estimate.",
            "In practical terms, a <strong>{state_name} Property Tax Calculator</strong> is your what-if machine for homeownership. Change the home value or exemptions and it instantly re-estimates your {state_name} bill.",
            "A <strong>{state_name} Property Tax Calculator</strong> takes the guesswork out of escrow. It breaks your bill into assessed value, exemptions, and local rate, leaving a clear annual and monthly figure.",
            "The <strong>{state_name} Property Tax Calculator</strong> is a self-service tool for owners in {city1} and across the state. It converts home value into an estimated property tax using {state_name} rates.",
            "Think of the <strong>{state_name} Property Tax Calculator</strong> as a financial mirror: it reflects what a home will really cost in tax each year in {state_name}, so you can budget and compare with confidence.",
            "A <strong>{state_name} Property Tax Calculator</strong> replicates how counties bill owners. It applies the assessment ratio, exemptions, and local rate to estimate your annual {state_name} property tax.",
            "The <strong>{state_name} Property Tax Calculator</strong> is a quick way to see a home's tax cost. Enter your value and it applies {state_name}'s effective rate and exemptions to reveal your estimated bill."
        ]
    ];
}


/** Variation set B: why, how, inputs, formula */
function usc_ptv6_b() {
    return [
        'why' => [
            "Estimating property tax ahead of time pays off. It helps you budget escrow accurately, compare counties before buying in {state_name}, model exemption savings, and plan for how rising home values raise future bills.",
            "Running the numbers prevents escrow surprises. You can see your monthly tax impact, test homestead or senior exemptions, and compare {state_name} jurisdictions to find a lower-tax area before you buy.",
            "Whether you are a first-time buyer or a long-time owner in {state_name}, this tool brings clarity. Model different home values and exemptions to see exactly how your annual bill changes.",
            "Knowing your property tax early is the difference between planning and a year-end shock. It lets you budget escrow in {city1}, plan for appreciation, and claim every {state_name} exemption you qualify for.",
            "A quick estimate now avoids escrow shortfalls later. By seeing your {state_name} property tax up front, you prevent the mid-year payment adjustments that catch many homeowners off guard.",
            "There is real value in the breakdown. Once you see how assessed value, exemptions, and {state_name}'s rate combine, you can decide whether to appeal an assessment or apply for relief.",
            "This calculator is your home-buying sandbox. Compare a {city1} home with one in {city2}, test a higher value, or model an exemption, and see the {state_name} bill respond instantly.",
            "Most property-tax surprises come from not running the math first. Use this tool to confirm your escrow is funded correctly and to see how a reassessment would change your {state_name} bill.",
            "For anyone budgeting in {state_name}, property tax is a major recurring cost. This calculator hands it to you in seconds, then lets you flex value and exemptions to plan realistically.",
            "Thinking about a purchase? The list price hides the ongoing tax in {state_name}. Run it here to reveal the annual and monthly property tax, then compare homes on total cost, not just price.",
            "Using it regularly keeps you ahead of change. A reassessment, a new exemption, or a move within {region} all shift your {state_name} property tax, and seeing that early means no surprises.",
            "It removes fear from a big decision. Want to know if a {state_name} home fits your budget after tax? Start from the real property-tax estimate here, and the answer stops being a guess.",
            "Smart escrow planning starts with visibility. This tool shows how your {state_name} home value and exemptions set your bill, helping you fund escrow accurately and avoid shortfalls.",
            "Every exemption has a dollar impact. With this calculator you can see exactly how a homestead, senior, or veteran exemption lowers your {state_name} property tax before you apply.",
            "The biggest reason to use it is peace of mind. When you know your real {state_name} property tax, decisions about buying, budgeting, and appealing an assessment all get easier.",
            "Plain and simple, it puts you in control. Instead of dreading the {state_name} tax bill, you can predict it, plan for it, and adjust, exemptions, appeals, escrow, until the number works."
        ],
        'how' => [
            "The calculator works step by step: it applies {state_name}'s assessment ratio to your home's market value, subtracts any exemptions you select, then multiplies the taxable value by your local rate to estimate the annual bill.",
            "Behind the scenes it mirrors how counties bill owners. It converts market value to assessed value, removes homestead or senior relief, and applies {state_name}'s local rate for an annual and monthly estimate.",
            "Step by step, the tool finds assessed value from market value, subtracts exemptions, applies the {state_name} rate, and divides by twelve to show your monthly escrow impact.",
            "It follows {state_name}'s method: assessed value first, then exemption relief, then the local millage or rate, ending with a clear annual property-tax figure and a multi-year projection.",
            "The engine layers your costs: assessed value, minus exemptions, times the {state_name} rate. The result is your estimated annual bill, which it also breaks into a monthly escrow amount.",
            "To estimate your tax, the calculator applies the assessment ratio, deducts exemptions, multiplies by the {state_name} local rate, and projects how appreciation will raise the bill over five years.",
            "Functionally, it computes taxable assessed value, applies {state_name}'s rate, and totals the annual tax, then shows the monthly figure most owners pay through escrow.",
            "Think of it as a funnel: market value narrows to assessed value, exemptions trim it further, and the {state_name} rate turns the taxable amount into your bill.",
            "The math follows a fixed order: assessed value, exemptions, then the {state_name} local rate. The calculator handles each step so your estimate reflects how the county actually bills.",
            "It replicates county logic for {state_name}: assess the property, apply relief, and levy the local rate. The output is your annual tax plus a monthly escrow estimate.",
            "Under the hood, the tool derives assessed value from your market value, subtracts {state_name} exemptions, and applies the combined local rate to produce your property-tax estimate.",
            "The process is methodical: establish assessed value, apply exemptions, multiply by the {state_name} rate, and present the annual and monthly tax with a five-year projection.",
            "First assessed value, then exemptions, then the rate. The calculator nails that order because {state_name} exemptions reduce the taxable base before the local rate applies.",
            "It treats your bill like a recipe: market value sets assessed value, exemptions season it down, and the {state_name} rate finishes the annual property-tax total.",
            "The system computes taxable value after {state_name} exemptions and applies the local rate, reporting both your annual tax and the monthly amount that flows into escrow.",
            "The calculator processes your home the way {state_name} counties do: assessed value, minus relief, times the local rate, to reach your true annual property tax."
        ],
        'inputs' => [
            "For an accurate estimate, enter your home's market value, select your {state_name} county, and choose any exemptions you qualify for, such as homestead or senior relief.",
            "The calculator needs a few inputs: home market value, county or local jurisdiction, and exemption selections. Those drive your {state_name} property-tax estimate.",
            "Provide your home value, your {state_name} county, and applicable exemptions. The more accurately you enter them, the closer the property-tax estimate lands.",
            "Have these ready: the property's market value, your local {state_name} jurisdiction, and any relief programs you qualify for. With those, the tool estimates your bill.",
            "You will enter home value, county, and exemptions. Each shapes the result, exemptions in {state_name} lower the taxable base before the rate applies.",
            "Start with your home's market value, then choose your {state_name} county and any exemptions. Those inputs let the calculator apply local rates accurately.",
            "The required inputs are straightforward: home value, jurisdiction, and exemptions. Adding an appreciation rate lets you see how your {state_name} bill grows over time.",
            "Enter the figures that drive your bill: market value, {state_name} county, and exemptions. Accurate values matter, since the rate applies to the taxable assessed amount.",
            "To run the numbers, you need your home value, your {state_name} location, and exemption details. With those, the calculator estimates your annual and monthly tax.",
            "Gather your market value, county, and any relief programs. These inputs let the tool mirror your {state_name} county's billing and show where the money goes.",
            "The tool asks for home value, jurisdiction, and exemptions. Including a homestead or senior exemption matters, because in {state_name} it reduces your taxable value.",
            "All it needs is market value, {state_name} county, and exemptions. Add an appreciation assumption to project how your bill changes over the next several years.",
            "Provide your home value, location, and exemption details. Accurate inputs here separate a rough guess from a reliable {state_name} property-tax estimate.",
            "You will need the property's market value, your {state_name} county, and applicable exemptions. These capture the full picture for an accurate estimate.",
            "The essentials are simple: home value, jurisdiction, and exemptions. Enter relief programs so the calculator applies your {state_name} taxable value correctly.",
            "Feed it your market value, {state_name} county, and exemption details. With those, the calculator applies local rates to estimate your annual property tax."
        ],
        'formula' => [
            "The basic calculation is: Annual Tax = (Assessed Value - Exemptions) x Local Rate. Assessed value is your market value times {state_name}'s assessment ratio.",
            "Your property tax is computed as: Taxable Value x Rate, where Taxable Value = Assessed Value minus exemptions, and Assessed Value reflects {state_name}'s assessment ratio of market value.",
            "The core formula: Property Tax = (Market Value x Assessment Ratio - Exemptions) x Local Rate. The calculator applies {state_name}'s ratio and rate automatically.",
            "In equation form: Annual Tax = Taxable Assessed Value x {state_name} Rate, where the taxable value is your assessed value after homestead or other exemptions.",
            "The math is straightforward: assessed value (market value adjusted by {state_name}'s ratio), minus exemptions, multiplied by the local rate, equals your annual bill.",
            "Property tax in {state_name} follows: (Assessed Value - Exemptions) x Rate. Rates are often expressed as mills, where one mill equals $1 per $1,000 of taxable value.",
            "Expressed simply: Tax = Taxable Value x Local Rate. Taxable value is your {state_name} assessed value minus any exemptions you qualify for.",
            "The formula chains together: market value to assessed value via {state_name}'s ratio, minus exemptions, times the combined local rate, equals your property tax.",
            "Mathematically, your bill is the taxable assessed value times {state_name}'s effective rate, after exemptions reduce the base the rate applies to.",
            "The calculation: Annual Property Tax = (Assessed Value - Exemptions) x Millage Rate, where {state_name}'s assessment ratio sets the assessed value from market value.",
            "Put as one line: Tax = (Market Value x {state_name} Assessment Ratio - Exemptions) x Local Rate. The calculator handles each factor for you.",
            "Your tax follows: Taxable Value x Rate. In {state_name}, exemptions like the homestead reduce taxable value before the local rate is applied.",
            "The underlying formula is: Property Tax = (Assessed Value - Exemptions) x Local Rate, with assessed value derived from market value and {state_name}'s ratio.",
            "Stated as a process: convert market value to assessed value using {state_name}'s ratio, subtract exemptions, apply the local rate, and the result is your annual tax.",
            "The property-tax formula is: (Assessed Value - Exemptions) x Rate. Many {state_name} jurisdictions express the rate in mills, $1 of tax per $1,000 of taxable value.",
            "Formally: Annual Tax = Taxable Assessed Value x {state_name} Local Rate, the same method counties use, with exemptions lowering the taxable base first."
        ]
    ];
}


/** Variation set C: howtouse, example, factors, benefits, mistakes, usecases, conclusion */
function usc_ptv6_c() {
    return [
        'howtouse' => [
            "Using the tool is simple: enter your home's market value, select your {state_name} county, choose any exemptions, and click calculate to see your estimated annual and monthly property tax.",
            "To estimate your bill, type in your home value, pick your {state_name} jurisdiction, add exemptions like homestead or senior relief, and run the calculation for a clear breakdown.",
            "Just follow the flow: fill in the home value, choose your county, select exemptions, and press calculate. The tool instantly maps out your {state_name} property tax.",
            "Start by entering your home value and {state_name} county, then add exemptions. One click later you will have a clear annual and monthly property-tax estimate.",
            "It takes under a minute: input your home value, select your county, add exemptions, and calculate. The {state_name} result shows the annual bill and monthly escrow impact.",
            "Enter your home value, choose your {state_name} county, and add relief programs, then calculate. The tool handles the assessment math and presents the numbers clearly.",
            "Type your home value, pick your jurisdiction, select exemptions, and hit calculate. The {state_name} property tax calculator does the rest, instantly and privately.",
            "Working it is intuitive: provide your home value and county, add exemptions, and run it. Within seconds you will see your {state_name} bill broken down.",
            "Add your home value, choose your {state_name} county, and key in exemptions. Hit calculate to reveal your annual property tax with a monthly escrow figure.",
            "The steps are quick: enter value, set county, add exemptions, and calculate. Whether you own in {city1} or elsewhere in {state_name}, the tool adapts to your inputs.",
            "Pop in your home value, choose your county and exemptions, then calculate. The {state_name} results appear immediately, so you can tweak inputs and watch them update.",
            "Simply enter your home value, select your county, add exemptions, and click calculate. The calculator returns a tidy {state_name} summary of your annual and monthly tax.",
            "To run it, fill in home value, county, and exemptions. One calculation later, your {state_name} property tax is broken into clear, labelled figures.",
            "Begin with your home value and county, add exemptions, and press calculate. The tool shows your {state_name} annual tax plus the monthly escrow amount.",
            "It is a three-part process: enter value and county, add exemptions, and calculate. The {state_name} breakdown that follows is detailed enough to plan escrow around.",
            "Enter your numbers, choose the county and exemptions, and calculate, that is it. The {state_name} property tax calculator instantly turns a home value into your annual bill."
        ],
        'example' => [
            "Let's look at a {state_name} example: a home valued at $300,000 with {state_name}'s effective rate of {prop_rate}. The table below shows the estimated annual and monthly property tax.",
            "To see it in practice, picture a $300,000 home in {city1}. Applying {state_name}'s {prop_rate} effective rate, the breakdown shows your annual bill and monthly escrow.",
            "Consider a {state_name} homeowner with a $300,000 property. At {state_name}'s {prop_rate} rate, the figures below trace the annual tax and the monthly amount.",
            "Here is a worked {state_name} example: a $300,000 home and {state_name}'s {prop_rate} effective rate. The table converts that into a clear annual and monthly property-tax estimate.",
            "Imagine owning a $300,000 home in {state_name}. With an effective rate near {prop_rate}, the example shows roughly what you would pay each year and month.",
            "Take a typical {state_name} case: a $300,000 home taxed at about {prop_rate}. The table lays out the annual bill and the monthly escrow it implies.",
            "Suppose a {state_name} owner has a $300,000 property. At {prop_rate}, the breakdown below shows the estimated yearly tax and the monthly figure.",
            "Let's model a real scenario: a $300,000 home in {state_name} at {prop_rate}. The result demonstrates how the state's rate shapes the annual property tax.",
            "Picture a $300,000 home in {city2}. Applying {state_name}'s {prop_rate} rate, the table shows the annual property tax and what it adds to monthly escrow.",
            "For illustration, a {state_name} home worth $300,000 at {prop_rate} produces the annual and monthly bill shown, before any exemptions you may qualify for.",
            "Here is how it plays out: a $300,000 {state_name} home at {prop_rate}. The table turns that into an annual property tax and a monthly escrow estimate.",
            "Consider a practical {state_name} example, a $300,000 home, {prop_rate} effective rate, and follow the math to the annual and monthly tax figures.",
            "Let's run the math for a {city1} home: $300,000 value, {state_name}'s {prop_rate} rate. The result reflects the annual property tax and its monthly impact.",
            "Take a $300,000 home in {state_name} at {prop_rate}. The example walks through the assessed value and rate to the final annual property-tax figure.",
            "As a sample, picture a {state_name} home valued at $300,000 with a {prop_rate} effective rate. The breakdown shows the yearly tax and the monthly escrow it requires.",
            "Here's a down-to-earth example: a $300,000 home in {city2} at {state_name}'s {prop_rate} rate. Follow the table to see the annual and monthly property tax."
        ],
        'factors' => [
            "Your property tax hinges on several factors: your home's assessed value, {state_name}'s assessment ratio, the local rate (which varies by county), and any exemptions you qualify for ({prop_rate} statewide average).",
            "A handful of variables decide your bill. Assessed value drives the base, exemptions reduce it, and the local {state_name} rate, around {prop_rate} on average, sets the multiplier.",
            "Several things shift your tax: rising home values raise the assessed amount, exemptions lower it, and local rates differ across {state_name} (the statewide effective rate is about {prop_rate}).",
            "Property tax is sensitive to value and location. In {state_name}, the assessed value, local rate (near {prop_rate} on average), and exemptions all combine to set your bill.",
            "Watch these factors: assessed value, exemptions, and the local rate. Because {state_name} rates vary by county (averaging {prop_rate}), two similar homes can owe different amounts.",
            "The result depends on more than home price. Your assessed value, {state_name}'s rate (about {prop_rate}), and exemptions all combine, which is why local rates matter so much.",
            "Key drivers include assessed value, the {state_name} assessment ratio, exemptions, and the local rate (statewide average {prop_rate}). A reassessment can change the bill significantly.",
            "Your tax moves with home value and rate. In {state_name}, appreciation raises assessed value, while exemptions and the local rate (near {prop_rate}) shape the final figure.",
            "Several elements shape the outcome: assessed value, exemptions, and county rates. {state_name}'s effective rate averages around {prop_rate}, but your county may differ.",
            "Factors that matter most are assessed value, exemptions, and the local rate ({prop_rate} on average in {state_name}). Adjust any and your bill changes, sometimes notably.",
            "Your bill reflects {state_name}'s rules and your home's value. Assessed value sets the base, exemptions trim it, and the local rate (about {prop_rate}) multiplies the rest.",
            "The big levers are assessed value, exemptions, and the local rate. In {state_name}, the effective rate is roughly {prop_rate}, but reassessments and county levies move it.",
            "Tax depends on what your home is worth and where it sits. In {state_name}, the local rate (near {prop_rate}) joins assessed value and exemptions to set your bill.",
            "Among the factors: assessed value, the {state_name} assessment ratio, exemptions, and the county rate (statewide average {prop_rate}), all combining into your annual tax.",
            "Several inputs steer the figure: assessed value, exemptions, and {state_name}'s local rate ({prop_rate} on average). Home appreciation gradually raises the assessed base.",
            "Your results respond to value, exemptions, and rate. Because {state_name}'s effective rate (around {prop_rate}) varies by county, the same home can cost different amounts to hold."
        ],
        'benefits' => [
            "This calculator gives precise estimates, lets you model exemption savings, projects multi-year bills as values rise, and protects your privacy by running every calculation locally in {state_name}.",
            "Why use it? It details your full {state_name} property tax, helps you fund escrow accurately, models homestead and senior relief, and never stores your information.",
            "Built for accuracy and transparency, the tool estimates your bill, tests exemptions, and compares counties, all without sharing personal records.",
            "The benefits are practical: reliable estimates, exemption modeling, and multi-year projections. Test a different value, county, or relief program in {state_name} and see the impact at once.",
            "Among its advantages: it uses {state_name}'s effective rates, recalculates instantly, and keeps your data private, your figures stay on your device.",
            "You get accuracy you can trust, the freedom to compare scenarios, and privacy. For {state_name} owners, that means smarter escrow planning and home-buying decisions.",
            "The tool's strengths are precision, flexibility, and discretion. Run unlimited {state_name} scenarios, compare counties, and never worry about your data being saved.",
            "Key benefits include accurate estimates, easy exemption testing, and a privacy-first design. Whether you own in {city1} or anywhere in {state_name}, you can plan confidently.",
            "It pays off in three ways: dependable estimates, scenario comparison, and complete privacy. Adjust your {state_name} inputs freely and the math stays on your device.",
            "Expect precise figures, instant recalculation, and zero data collection, a safe, practical tool for {state_name} homeowners and buyers alike.",
            "The advantages add up: accurate tax math, exemption modeling, and a privacy model that keeps your {state_name} home details to yourself.",
            "Using it, you gain clarity and control. See the exact effect of an exemption or a higher value in {state_name}, privately, since the tool saves nothing.",
            "This calculator is precise, flexible, and private by design. It applies {state_name}'s rates, compares scenarios in seconds, and never stores your figures.",
            "The payoff is better decisions with less hassle. Reliable {state_name} estimates, exemption testing, and projections let you plan escrow and purchases with confidence.",
            "Benefits include precision from real rate data, the flexibility to model exemptions and counties, and a strict privacy stance, a dependable foundation for {state_name} homeownership.",
            "You get a tool that is accurate, flexible enough for any what-if, and private enough to trust, which makes estimating {state_name} property tax both easy and safe."
        ],
        'mistakes' => [
            "A common mistake is confusing market value with assessed value. In {state_name}, tax applies to the assessed value after the assessment ratio, not the full market price.",
            "Watch for forgetting exemptions. Many {state_name} owners qualify for homestead, senior, or veteran relief that meaningfully lowers the bill, leaving it out overstates your tax.",
            "To stay accurate, remember county rates vary across {state_name}. Using a statewide average instead of your local rate can throw off the estimate.",
            "The biggest error is ignoring appreciation. As your {state_name} home value rises, so does the assessed value and the tax, plan for gradual increases.",
            "People often forget to budget escrow for taxes. In {state_name}, property tax is usually collected monthly through your mortgage, so underestimating it causes escrow shortfalls.",
            "A frequent slip is not appealing an over-assessment. If comparable {state_name} homes are valued lower, you may be overpaying and should consider an appeal.",
            "Don't assume the rate is fixed. {state_name} local levies and reassessments change over time, so revisit your estimate periodically.",
            "Be careful not to overlook special district taxes. Some {state_name} areas add school or municipal levies that raise the combined rate.",
            "Common pitfalls: using market value instead of assessed value, skipping exemptions, and ignoring county differences. Each distorts your {state_name} estimate.",
            "A typical error is forgetting that exemptions must be applied for. In {state_name}, relief like the homestead exemption is not automatic in every county.",
            "Don't budget with last year's bill if your {state_name} home was reassessed. A new valuation can change the tax noticeably.",
            "Be careful to use your specific {state_name} county rate, not a neighboring one. Even adjacent counties can differ significantly.",
            "The mistakes that hurt most are simple: ignoring exemptions, using the wrong rate, and forgetting appreciation. Account for all three for a realistic {state_name} estimate.",
            "Users sometimes miss the assessment ratio. In {state_name}, only a portion of market value may be taxable, so applying the full value overstates the bill.",
            "A classic oversight is entering value but skipping exemptions. In {state_name}, that makes the estimate higher than what you would actually owe.",
            "To avoid surprises, verify three things: assessed (not market) value, your {state_name} county rate, and any exemptions. Those drive the property-tax estimate."
        ],
        'usecases' => [
            "This tool is ideal if you are buying a home in {state_name} and comparing counties, budgeting escrow, or checking how an exemption would lower your bill.",
            "Real-world uses include estimating taxes before buying in {city1}, modeling homestead or senior relief, and projecting how appreciation raises your {state_name} bill.",
            "Reach for it when relocating to {state_name} to compare property-tax burdens, planning escrow for a new home, or deciding whether to appeal an assessment.",
            "Use cases range from everyday budgeting to big decisions: comparing homes in {city1} and {city2}, planning escrow, or weighing a {state_name} purchase's true cost.",
            "It shines when comparing counties, planning a {state_name} escrow budget, or seeing how a reassessment changes your bill, so you plan with real numbers.",
            "Common scenarios: checking tax before touring homes in {city1}, modeling exemptions, and comparing how property tax differs across {state_name} jurisdictions.",
            "Whether you are a first-time buyer or a long-time owner, the tool helps, estimate the bill, test exemptions, and see how {state_name} appreciation affects it.",
            "Put it to work when budgeting escrow, planning an appeal, or deciding between two {state_name} homes with different values and county rates.",
            "Use it to plan a move within {region}, compare a county's tax burden, or set a realistic escrow budget. For {state_name} owners, it turns value into a real cost.",
            "Typical uses: confirming escrow is funded, modeling exemption savings, and comparing how the same home is taxed in {state_name} versus a neighboring state.",
            "It is handy for budget checks in {city1}, for testing how a homestead exemption changes your bill, and for sanity-checking a tax estimate before you buy in {state_name}.",
            "Lean on it when life changes, a purchase, a reassessment, or a move to {state_name}, since each can change your property tax, and seeing it early keeps your budget honest.",
            "Practical applications include comparing {state_name} counties, planning escrow, modeling exemptions, and projecting taxes as your home appreciates.",
            "Use the calculator to decide if a home in {city2} is affordable after property tax, or to plan an assessment appeal that lowers your {state_name} bill.",
            "From first homes to long-term ownership, it answers the questions that matter in {state_name}: what will I owe, and how do exemptions and value changes affect it?",
            "Whether budgeting in {city1}, comparing counties across {state_name}, or planning an appeal, this calculator gives the real property-tax figure those decisions need."
        ],
        'conclusion' => [
            "Property tax is a permanent part of homeownership, so the clearer you understand it, the better you budget. Use this {state_name} calculator to estimate your bill, test exemptions, and plan escrow with confidence.",
            "The smartest owners plan for property tax, not around it. With your {state_name} estimate in hand, you can fund escrow accurately, compare counties, and claim every exemption you qualify for.",
            "Homeownership costs do not end at the mortgage. This {state_name} property tax calculator helps you budget the annual bill, model relief programs, and plan for rising values. Come back whenever your assessment changes.",
            "Knowing your real property tax is the difference between a funded escrow and a year-end shortfall. Lean on this {state_name} calculator to estimate your bill and plan ahead.",
            "Your {state_name} home comes with a recurring tax, so plan for it from the start. Bookmark this calculator, test scenarios, and let the estimate guide your escrow budget.",
            "When you understand assessed value, exemptions, and rates, property tax stops being a mystery. Use this {state_name} calculator before you buy and whenever your assessment shifts.",
            "Whether you own in {city1} or anywhere across {state_name}, the lesson is the same: budget for property tax every year. Run this calculator often and plan with clear eyes.",
            "A clear tax picture is powerful. With your {state_name} bill mapped out, you can fund escrow, weigh an appeal, and compare counties before you commit to a home.",
            "Home decisions get easier when they start from reality. Use this {state_name} calculator to anchor your escrow budget, test exemptions, and avoid the shock of a higher-than-expected bill.",
            "Come back to this tool any time things change, a reassessment, a new exemption, a move within {region}. Each shifts your {state_name} property tax, and a quick recalculation keeps your plan intact.",
            "The bottom line: property tax is a yearly cost worth planning for. Now that you can estimate it clearly for {state_name}, build your home budget on that solid number.",
            "Understanding your {state_name} property tax is a skill with a real payoff. Keep this calculator bookmarked, run it before you buy, and turn uncertainty into a confident budget.",
            "You started wondering what a home really costs to hold; now you know. Use this {state_name} tool to plan escrow, claim exemptions, and budget with the clarity real numbers bring.",
            "There is real value in seeing your true tax. For owners in {city1}, {city2}, and beyond, this {state_name} calculator replaces guesswork with facts, so every decision rests on solid ground.",
            "Treat property tax as the ongoing cost it is. Bookmark this {state_name} calculator, revisit it after reassessments, and you will never be surprised by your annual bill.",
            "In the end, the goal is simple: own a home you can comfortably afford to keep, taxes included. This {state_name} property tax calculator hands you that figure in seconds."
        ]
    ];
}


/**
 * Builds the full V6 Property Tax article for a given state (~1,150 words),
 * with a real per-state property-tax example on a $300,000 home.
 */
function usc_pt_article_v6($state) {
    $name = $state['name'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $city1 = $x['cities'][0];
    $city2 = isset($x['cities'][1]) ? $x['cities'][1] : $x['cities'][0];
    $rate  = usc_state_property_tax_rate($state_slug); // % per year
    $prop_rate = number_format($rate, 2) . '%';

    // Worked example: $300,000 home at the state's effective rate.
    $home = 300000;
    $annual = $home * ($rate / 100);
    $monthly = $annual / 12;

    $replacements = [
        'state_name' => $name,
        'prop_rate'  => $prop_rate,
        'city1'      => $city1,
        'city2'      => $city2,
        'region'     => $x['region'],
    ];

    $pool = usc_pt_variations_v6();
    $sec = function($key) use ($state_slug, $pool, $replacements) {
        return usc_get_section_content($state_slug, $key, $pool, $replacements);
    };

    $region_comp = function_exists('ust_get_state_region_comparison') ? ust_get_state_region_comparison($state_slug, 'property-tax') : '';

    $html = '<!-- ust-v3-article -->
<h2>' . usc_pv6_h($state_slug, 'ptintro', ['Understanding Property Tax in ' . $name, $name . ' Property Tax, Explained', 'Your ' . $name . ' Property Tax Bill', 'Property Tax in ' . $name . ': An Overview']) . '</h2>
<p>' . $sec('intro') . '</p>
<p>Property taxes are a primary source of local revenue in ' . esc_html($name) . ', funding public schools, road maintenance, police and fire services, and parks. Unlike federal or state income taxes, they are paid locally and set by the assessed value of your home and local levies, which is why understanding rates, exemptions, and appreciation matters for every owner.</p>

<h2>' . usc_pv6_h($state_slug, 'ptwhatis', ['What is the ' . $name . ' Property Tax Calculator?', 'What This ' . $name . ' Calculator Does', 'Meet the ' . $name . ' Property Tax Calculator', 'What Exactly Is This Tool?']) . '</h2>
<p>' . $sec('whatis') . '</p>
<p>It works by applying ' . esc_html($name) . '\'s assessment ratio to your home\'s market value, subtracting exemptions you select, and multiplying the taxable value by your local rate. The result is a clear breakdown of your estimated annual and monthly property tax, often with a multi-year projection based on your appreciation assumptions.</p>

<h2>' . usc_pv6_h($state_slug, 'ptwhy', ['Why Estimate Your Property Tax?', 'Why Use This Calculator?', 'Why Run Your Numbers First?', 'Why Knowing Your Bill Matters']) . '</h2>
<p>' . $sec('why') . '</p>
' . usc_pv6_list($state_slug, 'ptwhy', [
    '<strong>Accurate Escrow Budgeting:</strong> Estimate the monthly escrow you will pay through your ' . esc_html($name) . ' mortgage.',
    '<strong>Model Exemption Savings:</strong> See how homestead, senior, or veteran relief lowers your bill.',
    '<strong>Compare Counties:</strong> Rates vary across ' . esc_html($name) . '; find lower-tax jurisdictions before you buy.',
    '<strong>Plan for Appreciation:</strong> Project how rising home values raise your tax over the next few years.',
    '<strong>Prepare an Appeal:</strong> Check whether your assessment looks high versus comparable homes.',
    '<strong>Budget With Confidence:</strong> Know the full cost of owning a ' . esc_html($name) . ' home, taxes included.',
], 5) . '

<h2>' . usc_pv6_h($state_slug, 'pthow', ['How the Calculator Works', 'How Your Tax Is Calculated', 'What Happens Behind the Scenes', 'How the Bill Is Built']) . '</h2>
<p>' . $sec('how') . '</p>

<h2>' . usc_pv6_h($state_slug, 'ptinputs', ['What You Will Need', 'Inputs Required', 'Information to Have Ready', 'What to Enter']) . '</h2>
<p>' . $sec('inputs') . '</p>
' . usc_pv6_list($state_slug, 'ptinputs', [
    '<strong>Home Market Value:</strong> the current value of your ' . esc_html($name) . ' property.',
    '<strong>County / Jurisdiction:</strong> local rates vary, so select your specific ' . esc_html($name) . ' county.',
    '<strong>Exemptions:</strong> homestead, senior, disability, or veteran relief you qualify for.',
    '<strong>Assessment Ratio:</strong> the share of market value that is taxable, where ' . esc_html($name) . ' uses one.',
    '<strong>Appreciation Rate:</strong> optional, to project your bill over future years.',
    '<strong>Special Levies:</strong> any school or municipal district taxes that apply locally.',
], 5) . '

<h2>' . usc_pv6_h($state_slug, 'ptformula', ['The Property Tax Formula', 'The Math Behind Your Bill', 'How the Numbers Add Up', 'The Tax Equation']) . '</h2>
<p>' . $sec('formula') . '</p>
<pre style="background:#f4f4f5; padding:15px; border-radius:5px; overflow-x:auto;">Annual Tax = (Assessed Value - Exemptions) x Local Rate</pre>
<p>Assessed value is your home\'s market value adjusted by ' . esc_html($name) . '\'s assessment ratio, and exemptions such as a homestead credit are subtracted before the local rate applies. Many jurisdictions express that rate in mills, where one mill equals $1 of tax per $1,000 of taxable value, so the calculator converts everything into a clear annual and monthly figure for you.</p>

<h2>' . usc_pv6_h($state_slug, 'pthowtouse', ['How to Use the Calculator', 'Step-by-Step Instructions', 'Using the Tool in 60 Seconds', 'How to Run Your Estimate']) . '</h2>
<p>' . $sec('howtouse') . '</p>

<h2>' . usc_pv6_h($state_slug, 'ptexample', ['A Real ' . $name . ' Example', 'A Worked ' . $name . ' Example', 'See It in Action: ' . $name, $name . ' Property Tax: A Sample']) . '</h2>
<p>' . $sec('example') . '</p>
<table style="width:100%; border-collapse: collapse; margin-bottom: 25px; font-size:14px; border: 1px solid #e5e7eb;">
  <thead><tr style="background-color:#f9fafb;border-bottom:2px solid #e5e7eb;"><th style="padding:12px;text-align:left;font-weight:600;color:#374151;">Component (on a $300,000 ' . esc_html($name) . ' home)</th><th style="padding:12px;text-align:right;font-weight:600;color:#374151;">Amount</th></tr></thead>
  <tbody>
    <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">Home Market Value</td><td style="padding:12px;text-align:right;color:#111827;">' . usc_money($home) . '</td></tr>
    <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">' . esc_html($name) . ' Effective Rate</td><td style="padding:12px;text-align:right;color:#111827;">' . $prop_rate . '</td></tr>
    <tr style="border-bottom:1px solid #e5e7eb;background-color:#f0fdf4;"><td style="padding:12px;font-weight:bold;color:#15803d;">Estimated Annual Property Tax</td><td style="padding:12px;text-align:right;font-weight:bold;color:#166534;">' . usc_money($annual) . '</td></tr>
    <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">Approx. Monthly (Escrow)</td><td style="padding:12px;text-align:right;color:#4b5563;">' . usc_money($monthly) . '</td></tr>
  </tbody>
</table>
<p><em>At ' . esc_html($name) . '\'s effective rate of about ' . $prop_rate . ', a $300,000 home runs roughly ' . usc_money($annual) . ' a year (about ' . usc_money($monthly) . ' a month in escrow) before any exemptions. Your actual bill depends on your county, assessment, and relief programs, adjust the calculator above for your exact figure.</em></p>

<h2>' . usc_pv6_h($state_slug, 'ptassess', ['Market Value vs. Assessed Value', 'Understanding Assessments', 'How Your Home Is Valued', 'Assessed Value Explained']) . '</h2>
<p>Understanding property tax means knowing the difference between market value and assessed value. Market value is what your home would sell for; assessed value is what the county assigns for tax purposes, often a percentage of market value. Exemptions are then subtracted from the assessed value to reach the taxable amount the local rate applies to.</p>
<p>This distinction matters: a rising market value can increase your assessed value, and therefore your tax, even if local rates stay flat. Reviewing your annual ' . esc_html($name) . ' assessment notice, and appealing if comparable homes are valued lower, is one of the most effective ways to keep your bill in check.</p>
' . usc_pv6_list($state_slug, 'ptlevies', [
    '<strong>School District Tax:</strong> usually the largest part of your ' . esc_html($name) . ' bill, funding local public schools.',
    '<strong>County Tax:</strong> pays for county-wide services, public health, and administration.',
    '<strong>Municipal Tax:</strong> funds city services like roads, trash collection, and emergency response.',
    '<strong>Special District Levies:</strong> occasional voter-approved taxes for transit, parks, or bonds.',
], 4) . '

<h2>' . usc_pv6_h($state_slug, 'ptfactors', ['Factors Affecting Your Bill', 'What Changes Your Tax', 'Variables That Move the Number', 'What Influences the Cost']) . '</h2>
<p>' . $sec('factors') . '</p>

<h2>' . usc_pv6_h($state_slug, 'ptbenefits', ['Benefits of Using This Calculator', 'Why This Tool Helps', 'What You Gain From It', 'The Advantages at a Glance']) . '</h2>
<p>' . $sec('benefits') . '</p>

<h2>' . usc_pv6_h($state_slug, 'ptmistakes', ['Common Mistakes to Avoid', 'Pitfalls That Skew Your Estimate', 'Errors People Often Make', 'What Throws Off the Numbers']) . '</h2>
<p>' . $sec('mistakes') . '</p>

<h2>' . usc_pv6_h($state_slug, 'ptusecases', ['Practical Use Cases', 'Real-World Scenarios', 'When to Reach for This Tool', 'Everyday Uses']) . '</h2>
<p>' . $sec('usecases') . '</p>
' . ($region_comp ? '
<h2>' . usc_pv6_h($state_slug, 'ptregion', [$name . ' vs. Neighboring States', 'How ' . $name . ' Compares Regionally', 'Regional Property Tax Comparison', $name . ' in Its Region']) . '</h2>
<p>' . $region_comp . '</p>' : '') . '

<h2>' . usc_pv6_h($state_slug, 'ptconclusion', ['Final Thoughts', 'The Bottom Line', 'Taking Control of Your Property Tax', 'Key Takeaways']) . '</h2>
<p>' . $sec('conclusion') . '</p>

<h2>Related ' . esc_html($name) . ' Calculators</h2>
<p>Planning a home purchase or budget? These free ' . esc_html($name) . ' tools pair well with your property-tax math:</p>
' . usc_get_related_links_html($state_slug, $name, 'property-tax') . '

<h2>Property Tax Calculators in Nearby States</h2>
<p>Rates differ across ' . esc_html($x['region']) . '. See how property tax changes just over the ' . esc_html($name) . ' border:</p>
' . (function() use ($state_slug) { $h = usc_neighbour_links_html($state_slug, 'property-tax', 'Property Tax Calculator'); return $h ?: '<p>Explore property tax calculators for every U.S. state from the menu above.</p>'; })() . '

<h2>Helpful Official Resources</h2>
<ul>
  <li><a href="' . esc_url($x['rev_url']) . '" target="_blank" rel="nofollow noopener">' . esc_html($x['rev_name']) . '</a> &mdash; official ' . esc_html($name) . ' tax and assessment information.</li>
  <li><a href="https://www.usa.gov/state-taxes" target="_blank" rel="nofollow noopener">USA.gov state taxes</a> &mdash; links to every state\'s tax and assessment offices.</li>
  <li><a href="https://www.irs.gov/taxtopics/tc503" target="_blank" rel="nofollow noopener">IRS Topic 503 (Deductible Taxes)</a> &mdash; how property tax fits the federal SALT deduction.</li>
</ul>
<!-- ust-property-v6 -->';

    return $html;
}

/** V6 FAQ pool for Property Tax (state aware). Selects 12. */
function usc_pt_faqs_v6($state) {
    $name = $state['name'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $rate = usc_state_property_tax_rate($state_slug);
    $prop_rate = number_format($rate, 2) . '%';

    $pick = function($qkey, $arr) use ($state_slug) {
        return $arr[usc_get_variation_index($state_slug, 'ptfaqa_' . $qkey, count($arr))];
    };

    $faq_pool = [
        ['q' => 'What is the property tax rate in ' . $name . '?', 'a' => $pick('rate', [
            $name . '\'s effective property-tax rate averages about ' . $prop_rate . ' of home value per year, though your exact rate depends on your county and local levies.',
            'On average, ' . $name . ' property taxes run near ' . $prop_rate . ' annually, so a $300,000 home is roughly ' . usc_money(300000 * $rate / 100) . ' a year.',
            'The effective rate in ' . $name . ' is around ' . $prop_rate . ', but local rates vary, so select your county for an accurate estimate.',
        ])],
        ['q' => 'Is this ' . $name . ' property tax calculator free?', 'a' => $pick('free', [
            'Yes, it is completely free, run unlimited estimates with no fee and no sign-up.',
            'It is 100% free and private. Estimate as many ' . $name . ' scenarios as you like.',
            'Absolutely free, no account, no paywall, and no limit on calculations.',
        ])],
        ['q' => 'How is property tax calculated in ' . $name . '?', 'a' => $pick('calc', [
            'Your county assesses your home (often a percentage of market value), subtracts exemptions, and multiplies the taxable value by the local rate to set your ' . $name . ' bill.',
            'It is assessed value minus exemptions, times the local rate. ' . $name . ' uses an assessment ratio to convert market value to assessed value.',
            'In ' . $name . ', tax equals taxable assessed value times the local rate, after exemptions reduce the base.',
        ])],
        ['q' => 'What is the difference between market value and assessed value?', 'a' => $pick('assess', [
            'Market value is what your home would sell for; assessed value is what the county assigns for tax, often a percentage of market value. ' . $name . ' tax applies to the assessed value.',
            'Assessed value, not market value, is taxed in ' . $name . '. It is usually a set portion of market value, minus exemptions.',
            'Market value is the sale price; assessed value is the taxable figure the ' . $name . ' assessor uses after applying the assessment ratio.',
        ])],
        ['q' => 'What property tax exemptions are available in ' . $name . '?', 'a' => $pick('exempt', [
            'Many ' . $name . ' owners qualify for a homestead exemption, with additional relief for seniors, disabled residents, and veterans, each lowers your taxable value.',
            'Common ' . $name . ' exemptions include homestead, senior, disability, and veteran relief; you usually must apply through your county.',
            'Relief programs in ' . $name . ' often include homestead and age- or service-based exemptions that reduce the taxable value of your home.',
        ])],
        ['q' => 'How can I lower my ' . $name . ' property tax?', 'a' => $pick('lower', [
            'Apply for every exemption you qualify for, and appeal your assessment if comparable ' . $name . ' homes are valued lower than yours.',
            'Claim homestead or senior relief, and consider an appeal if your assessment looks high, both can reduce your ' . $name . ' bill.',
            'The two best levers in ' . $name . ' are exemptions and a well-supported assessment appeal.',
        ])],
        ['q' => 'Can I appeal my property assessment in ' . $name . '?', 'a' => $pick('appeal', [
            'Yes. If you believe your home is over-assessed, you can appeal, typically within 30 to 60 days of your ' . $name . ' assessment notice, using comparable sales as evidence.',
            'You can appeal an over-assessment in ' . $name . ' by filing with the local board and presenting comparable home values.',
            'Appeals are allowed in ' . $name . '; gather comparable sales and file before your county\'s deadline.',
        ])],
        ['q' => 'When are property taxes due in ' . $name . '?', 'a' => $pick('due', [
            'Due dates vary by county in ' . $name . ', many bill annually or semi-annually. If you have a mortgage, taxes are usually paid monthly through escrow.',
            'It depends on your ' . $name . ' county; most owners pay through monthly mortgage escrow rather than a single lump sum.',
            'Schedules differ across ' . $name . ', but escrowed payments through your mortgage are the most common arrangement.',
        ])],
        ['q' => 'Does the calculator include exemptions for ' . $name . '?', 'a' => $pick('incl', [
            'Yes, you can apply homestead, senior, and other ' . $name . ' exemptions to see how they lower your taxable value and bill.',
            'It does, select the relief programs you qualify for and the ' . $name . ' estimate updates accordingly.',
            'Exemptions are built in, so you can model how each one reduces your ' . $name . ' property tax.',
        ])],
        ['q' => 'How does home appreciation affect my ' . $name . ' tax?', 'a' => $pick('appr', [
            'As your home value rises, so does the assessed value and the tax. The calculator can project how appreciation raises your ' . $name . ' bill over several years.',
            'Higher values mean higher taxes in ' . $name . '. Use the appreciation control to see your bill grow over time.',
            'Appreciation gradually increases your ' . $name . ' assessed value and therefore your annual property tax.',
        ])],
        ['q' => 'What do property taxes pay for in ' . $name . '?', 'a' => $pick('fund', [
            'They fund local services, public schools (usually the largest share), roads, police and fire, libraries, and parks across ' . $name . '.',
            'In ' . $name . ', property taxes support schools, county services, and municipal needs like roads and emergency response.',
            'Your ' . $name . ' property tax pays for the local services closest to home, schools, safety, and infrastructure.',
        ])],
        ['q' => 'Is the estimate from this ' . $name . ' calculator exact?', 'a' => $pick('exact', [
            'It is a high-accuracy estimate. Your real ' . $name . ' bill depends on your exact county rate, assessment, and exemptions.',
            'Treat it as a close estimate, the final figure comes from your county\'s actual ' . $name . ' assessment and levies.',
            'It is for planning. Adjust the value, county, and exemptions for the most accurate ' . $name . ' figure.',
        ])],
        ['q' => 'Are property taxes deductible on federal returns?', 'a' => $pick('deduct', [
            'They can be, as part of the SALT deduction, currently capped at $10,000 combined for state and local taxes, if you itemize.',
            'Yes, within the federal SALT cap of $10,000 (combined with state income taxes) for itemizers, which applies to ' . $name . ' owners too.',
            'Property taxes are deductible federally up to the SALT limit if you itemize rather than take the standard deduction.',
        ])],
    ];

    return usc_get_deterministic_faqs($state_slug, $faq_pool, 12);
}
