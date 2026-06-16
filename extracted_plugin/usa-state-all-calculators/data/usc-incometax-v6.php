<?php
/**
 * Income Tax Calculator (UST) — V6 content engine.
 * 16 variations/section x 13 sections, real per-state take-home example
 * (via ust_calculate_income_tax), varied headings, pooled lists, unique FAQs.
 * Tokens: {state_name} {state_tax_para} {city1} {city2} {region}
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

/** Returns the Income Tax text variations (16 per section). */
function usc_it_variations_v6() {
    return array_merge(usc_itv6_a(), usc_itv6_b(), usc_itv6_c());
}

/** Variation set A: intro, whatis */
function usc_itv6_a() {
    return [
        'intro' => [
            "That number on your {state_name} job offer is not the number that hits your bank account, and the gap can be a shock. Federal tax, FICA, and {state_name}'s own rules all take a slice before payday. This income tax calculator shows your real take-home pay so you can budget from facts, not hope.",
            "Understanding your income tax in {state_name} is the difference between guessing and planning. Between federal brackets, Social Security, Medicare, and state rules, a meaningful share of your salary disappears before you see it. This tool lays out exactly where it goes.",
            "Your gross salary and your spendable income are two very different things in {state_name}. This income tax calculator bridges the gap, applying current federal and {state_name} rules to show your true net pay in seconds.",
            "Whether you just got a raise, started a new job, or are weighing a move to {state_name}, the real question is simple: what do I actually keep? This calculator answers it, breaking your salary into federal tax, FICA, {state_name} tax, and take-home pay.",
            "Income tax in {state_name} is layered, federal first, then FICA, then state, and it is easy to underestimate the total. This calculator runs the full stack of rules on your salary so the number you plan around is the number you keep.",
            "For workers in {city1} and across {state_name}, the income tax question shapes every budget. This tool turns your gross salary into an accurate take-home figure, factoring in federal brackets and {state_name}'s specific approach.",
            "Few things affect your finances as much as income tax, and few are as misunderstood. This {state_name} calculator demystifies it, showing how federal, FICA, and state taxes combine to set your real net income.",
            "Before you sign a lease or accept an offer in {state_name}, you should know your after-tax income. This calculator applies the latest federal and {state_name} rules to reveal what actually lands in your account each year.",
            "Taxes feel complicated until you see them broken down. This {state_name} income tax calculator separates federal tax, Social Security, Medicare, and state tax, so the deductions on your paycheck finally make sense.",
            "Planning a budget in {state_name} works far better from your net income than your gross salary. This calculator gives you that real number instantly, applying current federal brackets and {state_name}'s tax rules.",
            "From {city1} to {city2}, {state_name} workers use income tax calculators to avoid surprises at tax time. Enter your salary and see your federal tax, FICA, state tax, and take-home pay laid out clearly.",
            "Your effective tax rate in {state_name} is rarely what you expect. This calculator computes it for you, showing how much of your income goes to federal tax, FICA, and the state, and how much you keep.",
            "A clear view of your income tax is the foundation of smart money decisions in {state_name}. This tool converts your gross salary into a detailed take-home breakdown so you can plan with confidence.",
            "Whether you are comparing job offers or planning for next April, knowing your {state_name} income tax matters. This calculator applies federal and state rules to estimate your net pay and effective rate in moments.",
            "The journey from salary to spendable income passes through several taxes in {state_name}. This calculator maps that journey, federal brackets, FICA, and {state_name} tax, so you understand exactly what you take home.",
            "Income tax should not be a mystery you only confront in April. This {state_name} calculator shows your federal, FICA, and state taxes year-round, helping you budget, adjust withholding, and keep more of what you earn."
        ],
        'whatis' => [
            "A <strong>{state_name} Income Tax Calculator</strong> estimates your take-home pay by applying current federal and {state_name} tax rules to your salary. It subtracts federal income tax, FICA, and state tax to show your real net income.",
            "The <strong>{state_name} Income Tax Calculator</strong> is a tool that turns gross salary into net pay. By processing your income, filing status, and deductions, it computes federal tax, FICA, and {state_name} tax for an accurate take-home figure.",
            "Think of the <strong>{state_name} Income Tax Calculator</strong> as a digital tax assistant. Enter your salary and filing status, and it applies the IRS brackets, FICA rates, and {state_name}'s rules to estimate your annual and monthly take-home pay.",
            "At its core, a <strong>{state_name} Income Tax Calculator</strong> answers what you actually keep after taxes. It layers federal income tax, Social Security, Medicare, and {state_name} tax to produce a clear net-income estimate.",
            "A <strong>{state_name} Income Tax Calculator</strong> is a simulator for your tax bill. Before you file, it estimates federal and {state_name} taxes on your income, so you can plan withholding and avoid surprises.",
            "Put simply, the <strong>{state_name} Income Tax Calculator</strong> converts a salary into spendable income. It handles the multi-layer math, federal, FICA, and {state_name} tax, and presents the result in plain numbers.",
            "The <strong>{state_name} Income Tax Calculator</strong> is a planning tool that decodes your tax burden. Accounting for filing status and pre-tax deductions, it shows how gross income becomes net income in {state_name}.",
            "A <strong>{state_name} Income Tax Calculator</strong> is a free, instant estimator of after-tax income. Provide your salary and filing details, and it applies federal brackets, FICA, and {state_name} tax to estimate net pay.",
            "Consider the <strong>{state_name} Income Tax Calculator</strong> a translation layer between your salary and your real income. It applies the same rules the IRS and {state_name} use to show your true take-home pay.",
            "The <strong>{state_name} Income Tax Calculator</strong> is an online tool built for {state_name} taxpayers. Rather than generic math, it factors in the state's exact tax treatment alongside federal and FICA withholding.",
            "In practical terms, a <strong>{state_name} Income Tax Calculator</strong> is your what-if machine for income. Change your salary, filing status, or deductions and it instantly re-estimates your {state_name} take-home pay.",
            "A <strong>{state_name} Income Tax Calculator</strong> takes the guesswork out of tax season. It breaks your salary into federal tax, FICA, and {state_name} tax, leaving a clear net figure to plan around.",
            "The <strong>{state_name} Income Tax Calculator</strong> is a self-service estimator for residents of {city1} and across the state. It applies federal and {state_name} rules to turn salary into take-home pay.",
            "Think of the <strong>{state_name} Income Tax Calculator</strong> as a financial mirror: it reflects what your salary is really worth after federal and {state_name} taxes, so you can plan and compare with confidence.",
            "A <strong>{state_name} Income Tax Calculator</strong> replicates professional tax math. It applies federal brackets, FICA, and {state_name} rules in the right order to estimate how much of your salary survives to net income.",
            "The <strong>{state_name} Income Tax Calculator</strong> is a quick way to see your true earnings. Enter your salary and it applies {state_name}'s tax rules plus federal and FICA to reveal your take-home pay and effective rate."
        ]
    ];
}


/** Variation set B: why, how, inputs, formula */
function usc_itv6_b() {
    return [
        'why' => [
            "Estimating your income tax ahead of time pays off. It helps you avoid a surprise bill in April, lets you adjust your W-4, makes job offers easy to compare, and turns budgeting in {state_name} into something you control.",
            "Running your numbers is a smart money habit. You can see how a bigger pre-tax retirement contribution cuts your tax, optimize your withholding, and build a {state_name} budget around real net income.",
            "Whether you are starting a job, negotiating a raise, or planning a move to {state_name}, this tool brings clarity. Test filing statuses and deductions to see the immediate effect on your take-home pay.",
            "Knowing your after-tax income early is the difference between planning and hoping. It lets you size rent in {city1}, schedule savings, and decide how much to contribute to retirement, all from a number you trust.",
            "A quick estimate today prevents headaches later. By seeing your {state_name} federal, FICA, and state taxes now, you can fix under-withholding before it becomes an April surprise.",
            "There is power in the breakdown. Once you know how much {state_name} tax, FICA, and federal tax take, you can decide whether to boost your 401(k) or HSA, each with a visible impact on net pay.",
            "This calculator is your tax sandbox. Model a move from {city1} to {city2}, a higher salary, or a different filing status, and see the net result instantly, no waiting until you file.",
            "Most tax surprises come from not running the math first. Use this tool to confirm your withholding is on track and to see whether extra income pushes you into a higher {state_name} bracket.",
            "For anyone budgeting in {state_name}, net income is the number that matters. This calculator hands it to you in seconds, then lets you flex salary, filing status, and deductions to plan realistically.",
            "Thinking about a job offer? The gross figure rarely tells the real story in {state_name}. Run it here to reveal after-tax income, then compare offers fairly instead of by headline salary.",
            "Using it regularly keeps you ahead of change. A raise, a new deduction, or a move within {region} all shift your {state_name} tax, and seeing that early means no scrambling at filing time.",
            "It removes fear from money decisions. Want to know if you can afford a bigger rent in {state_name}? Start from your real after-tax income here, and the answer stops being a guess.",
            "Smart withholding starts with visibility. This tool shows how filing status and deductions change your {state_name} tax, helping you aim for a small refund instead of a painful balance due.",
            "Every deduction choice has a tax consequence. With this calculator you can see exactly how a traditional 401(k) or HSA reshapes your taxable income and your {state_name} take-home pay.",
            "The biggest reason to use it is peace of mind. When you know your real {state_name} net income, decisions about savings, spending, and side income all get easier.",
            "Plain and simple, it puts you in charge. Instead of accepting whatever lands in your {state_name} account, you can predict it, question it, and adjust withholding and deductions until it works."
        ],
        'how' => [
            "The calculator works step by step: it starts with gross income, subtracts pre-tax deductions, applies federal brackets, adds FICA, factors in {state_name} state tax, and arrives at your net take-home pay.",
            "Behind the scenes it mirrors a real tax computation. First it finds taxable income after pre-tax deductions and the standard deduction, then applies federal brackets, FICA, and {state_name}'s rate to reach net income.",
            "Step by step, the tool determines gross income, subtracts retirement or health contributions, computes federal, FICA, and {state_name} taxes by filing status, and reports your take-home pay.",
            "The math follows a fixed order: gross income first, then pre-tax deductions and the standard deduction, then progressive federal brackets, FICA, and {state_name} tax, ending with net income.",
            "To estimate take-home pay, the calculator applies the federal standard deduction and brackets, removes Social Security and Medicare, layers on {state_name} state tax, and returns your annual and monthly net.",
            "It processes income the way tax software does: identify gross, subtract pre-tax items, apply federal brackets, take FICA, apply {state_name} tax, and arrive at the final after-tax figure.",
            "The engine separates your income into taxed and untaxed parts. Pre-tax deductions reduce the base, federal and {state_name} taxes apply to the rest, and FICA applies to gross, leaving your net.",
            "Under the hood, the calculator reduces gross by pre-tax contributions and the standard deduction, taxes that at federal and {state_name} rates, applies flat FICA percentages, and totals your take-home.",
            "Think of it as a waterfall: income flows from gross, over pre-tax deductions, through federal and FICA withholding, across {state_name}'s tax step, and what pools at the bottom is your net pay.",
            "The calculator applies each rule in the correct sequence. Pre-tax deductions lower taxable income, federal and state taxes compute on that base, FICA applies to gross, and the remainder is your net.",
            "It replicates how the IRS and {state_name} calculate your bill: taxable income after deductions, progressive federal brackets, FICA, and the state's rate, summed and subtracted from gross.",
            "Functionally, the tool builds your tax from the top down, gross income, then federal tax, Social Security, Medicare, and {state_name} tax, until the net figure reflects your real take-home pay.",
            "The process is methodical: establish gross income, subtract pre-tax and standard deductions, calculate progressive federal tax, add FICA, apply {state_name} tax, and report net income.",
            "First gross, then deductions, then taxes. The calculator nails that order because pre-tax deductions in {state_name} reduce what the federal and state governments can tax.",
            "It treats your income like a recipe with fixed steps: gross income, minus deductions, minus federal and FICA, minus {state_name} tax, equals the take-home pay you actually keep.",
            "The system computes taxable income, applies bracketed federal tax and flat FICA, adds the {state_name} portion, and reports both your annual net and your effective tax rate."
        ],
        'inputs' => [
            "For the most accurate result, enter your gross annual salary, choose your filing status, and add any pre-tax deductions like a 401(k) or HSA. Adding {state_name} specifics sharpens the estimate.",
            "The calculator needs a few basics: gross income, filing status (Single, Married, Head of Household), and pre-tax deductions. Those drive your federal, FICA, and {state_name} tax estimate.",
            "Provide your salary, filing status, and any retirement or health contributions. The more accurately you enter your {state_name} deductions, the closer the take-home estimate lands.",
            "Have these ready: annual gross income, your filing status, and pre-tax deduction amounts. With those, the tool applies federal and {state_name} rules to estimate your net income.",
            "You will enter gross salary, filing status, and pre-tax items (401(k), HSA, health premiums). Each one shapes the result, deductions lower what {state_name} and the IRS can tax.",
            "Start with your salary and filing status, then add deductions and any other income. These inputs let the calculator replicate your {state_name} tax computation accurately.",
            "The required inputs are straightforward: gross income, filing status, and deductions. If you have additional income or credits, include them so the {state_name} estimate reflects them.",
            "Enter the figures that drive your tax: gross salary, filing status, and pre-tax contributions. Accurate deductions matter, since in {state_name} they meaningfully change taxable income.",
            "To run the numbers, you need your salary, filing status, and deduction details. With those, the calculator can apply {state_name} and federal rules and return a net-income breakdown.",
            "Gather your gross income, filing status, and any retirement or health contributions. These inputs let the tool mirror your {state_name} tax calculation and show where the money goes.",
            "The tool asks for salary, filing status, and deductions. Including a 401(k) percentage or HSA deposit matters, because those pre-tax dollars reduce your {state_name} and federal tax.",
            "All it needs is gross income, filing status, and your deduction lines. Enter other income or credits separately so the calculator handles your {state_name} tax correctly.",
            "Provide your salary, filing status, and deduction details. Accurate inputs here separate a rough guess from a reliable {state_name} take-home estimate you can budget against.",
            "You will need your gross annual income, filing status, and pre-tax deductions. Adding {state_name}-specific details, like local considerations, captures the full picture.",
            "The essentials are simple: income, filing status, and deductions. Enter pre-tax benefits (which cut taxable income) so the calculator applies your {state_name} tax correctly.",
            "Feed it your gross salary, filing status, and deduction details. With those, the calculator applies current federal brackets, FICA, and {state_name} tax to estimate your net income."
        ],
        'formula' => [
            "The baseline is simple: Net Income = Gross Income minus Pre-Tax Deductions, minus Federal Tax, minus FICA, minus {state_name} State Tax. FICA is 6.2% Social Security plus 1.45% Medicare.",
            "Here is the core equation: Net = Gross - Pre-Tax Deductions - Federal Income Tax - FICA - {state_name} Tax. Federal and state taxes apply after deductions; FICA applies to gross.",
            "Your take-home is computed as: Net Income = Gross - Pre-Tax Deductions - Federal Withholding - FICA (6.2% + 1.45%) - {state_name} State Tax. The order matters because deductions lower the taxable base.",
            "The formula reads from gross to net: start with Gross Income, remove Pre-Tax Deductions and the standard deduction to get taxable income, subtract Federal Tax and FICA, apply {state_name} tax.",
            "In equation form: Take-Home = Gross - Pre-Tax - Federal Tax - (6.2% + 1.45% FICA) - {state_name} Tax. Each term is calculated on the correct base, which is why sequence matters.",
            "The standard computation applies: Net = Gross - Pre-Tax - Federal - FICA - State. Note that federal and {state_name} taxes are computed on income after deductions, while FICA is on gross.",
            "Mathematically, your net income equals gross minus federal income tax, FICA, and {state_name} tax, after pre-tax deductions and the standard deduction reduce the taxable base.",
            "The calculation chains together: Gross - Pre-Tax - Standard Deduction = Taxable Income; that drives Federal and {state_name} Tax; FICA is 7.65% of gross; Net = Gross - all taxes - deductions.",
            "Put as a single line: Net Income = Gross - Pre-Tax Deductions - Federal Tax - Social Security (6.2%) - Medicare (1.45%) - {state_name} Tax. That is the journey from salary to spendable income.",
            "The formula the tool uses is: Net = Gross - Pre-Tax Contributions - Federal Withholding - FICA - {state_name} Income Tax, with FICA fixed at 6.2% Social Security and 1.45% Medicare.",
            "Expressed cleanly: Take-Home = Gross - Pre-Tax Deductions - Federal Income Tax - FICA - {state_name} Tax. The pre-tax and standard-deduction steps lower your taxable base first.",
            "Your net figure follows: Gross Income, less Pre-Tax Deductions, less Federal Tax, less the FICA taxes, less {state_name} state tax. What remains is your real after-tax income.",
            "The underlying formula is: Net Income = Gross - Pre-Tax Benefits - Federal Tax - FICA - {state_name} Income Tax. FICA combines a 6.2% Social Security tax and a 1.45% Medicare tax.",
            "Stated as subtractions: begin with gross income, deduct pre-tax benefits and the standard deduction, then federal tax, then FICA, then {state_name} tax, and the result is your net income.",
            "The net-income formula is: Gross - Pre-Tax Deductions - Federal Tax - FICA (6.2% + 1.45%) - {state_name} Tax. Each tax sits on its own base, which the calculator handles automatically.",
            "Formally: Net Income equals Gross minus Pre-Tax Deductions, minus Federal Income Tax, minus Social Security and Medicare, minus {state_name} income tax, the same chain tax software runs."
        ]
    ];
}


/** Variation set C: howtouse, example, factors, benefits, mistakes, usecases, conclusion */
function usc_itv6_c() {
    return [
        'howtouse' => [
            "Using the tool is simple: enter your gross salary, choose your filing status, add any pre-tax deductions, and click calculate to see your federal tax, FICA, {state_name} tax, and take-home pay.",
            "To estimate your taxes, type in your annual income, select your filing status, add deductions like a 401(k) or HSA, and run the calculation for a detailed {state_name} breakdown.",
            "Just follow the flow: fill in your salary, choose your filing status, enter deductions, and press calculate. The tool instantly maps out your {state_name} taxes and net income.",
            "Start by entering your gross income and filing status, then add any pre-tax contributions. One click later you will have a clear {state_name} take-home breakdown to budget against.",
            "It takes under a minute: input your salary, select Single or Married, add deductions, and calculate. The {state_name} result shows federal, FICA, and state tax alongside your net pay.",
            "Enter your gross income, choose your filing status, and add deductions, then calculate. The tool handles the {state_name} and federal math and presents the numbers clearly.",
            "Type your salary into the income field, pick your filing status, include any pre-tax items, and hit calculate. The {state_name} income tax calculator does the rest, instantly and privately.",
            "Working it is intuitive: provide your income and filing status, enter deductions, and run it. Within seconds you will see how your {state_name} salary becomes net income.",
            "Add your gross salary, choose your filing status, and key in deductions. Hit calculate to reveal your {state_name} take-home pay with a breakdown of every tax.",
            "The steps are quick: enter income, set filing status, add deductions, and calculate. Whether you earn in {city1} or elsewhere in {state_name}, the tool adapts to your inputs.",
            "Pop in your salary, choose your filing status, and add pre-tax deductions, then calculate. The {state_name} results appear immediately, so you can tweak inputs and watch them update.",
            "Simply enter your income, select your filing status, add deductions, and click calculate. The calculator returns a tidy {state_name} summary of taxes and your final take-home.",
            "To run it, fill in gross income, filing status, and deductions. One calculation later, your {state_name} income tax is broken into clear, labelled line items.",
            "Begin with your salary and filing status, add deductions, and press calculate. The tool shows your {state_name} net income plus every federal, FICA, and state tax behind it.",
            "It is a three-part process: enter income and filing status, add deductions, and calculate. The {state_name} breakdown that follows is detailed enough to plan a real budget around.",
            "Enter your numbers, choose your filing status, add deductions, and calculate, that is it. The {state_name} income tax calculator instantly turns your salary into take-home pay."
        ],
        'example' => [
            "Let's look at a {state_name} example: a single filer earning $85,000 a year with no extra deductions. The table below shows federal tax, FICA, {state_name} tax, and the resulting take-home pay.",
            "To see it in practice, picture someone in {city1} earning $85,000, filing Single. The breakdown shows how federal brackets, FICA, and {state_name}'s tax combine to set their net income.",
            "Consider a {state_name} resident earning $85,000 a year as a single filer. Watch how the state-tax line, set by {state_name}'s rules, shapes the final take-home figure.",
            "Here is a worked {state_name} example: an $85,000 salary, Single filing status. The figures below trace federal tax, FICA, and {state_name} tax down to net income and an effective rate.",
            "Imagine earning $85,000 in {state_name} as a single filer. The example shows the federal tax, the 6.2% and 1.45% FICA pieces, {state_name} tax, and what actually reaches your account.",
            "Take a typical {state_name} case: $85,000 gross, filing Single. The table lays out each tax so you can see how much {state_name} keeps and how much you take home.",
            "Suppose a single filer in {state_name} earns $85,000. The breakdown below shows how federal, FICA, and {state_name} taxes reduce that salary to net income.",
            "Let's model a real scenario: an $85,000 earner in {state_name}, filing Single. The result demonstrates how {state_name}'s tax treatment, low or high, changes the take-home figure.",
            "Picture someone in {city2} earning $85,000, single. Their {state_name} income breaks down into federal tax, FICA, and state tax as the table shows, leaving their net pay.",
            "For illustration, a {state_name} single filer on $85,000 sees federal tax, FICA, and {state_name} tax applied. The figures reveal the gap between gross salary and take-home pay.",
            "Here is how it plays out: an $85,000 salary in {state_name}, Single. The table converts that into net income using current federal brackets and {state_name}'s tax rules.",
            "Consider a practical {state_name} example, $85,000 income, single filer, and follow the math through federal tax, FICA, and {state_name} tax to the take-home figure.",
            "Let's run the math for a {city1} resident: $85,000 salary, filing Single. The result reflects how {state_name} taxes (or does not tax) that income, and the net it leaves.",
            "Take an $85,000 earner in {state_name}, filing Single. The example walks through federal tax, FICA, and {state_name} tax to the final net income and effective rate.",
            "As a sample, picture a {state_name} single filer making $85,000. The breakdown shows the combined effect of federal tax, FICA, and {state_name}'s treatment on take-home pay.",
            "Here's a down-to-earth example: someone in {city2} earning $85,000, single. Follow the table to see how {state_name} shapes their final take-home income."
        ],
        'factors' => [
            "Your net income hinges on several factors: pre-tax benefits lower taxable income, your filing status sets your bracket thresholds, {state_name}'s rules apply ({state_tax_para}), and FICA caps at its annual limit.",
            "A handful of variables decide your take-home. Pre-tax deductions reduce taxable income, your filing status controls rates, {state_name} adds its layer ({state_tax_para}), and Social Security stops at the wage cap.",
            "Several things shift your after-tax income: 401(k) or HSA contributions (which cut taxable income), filing status (Single vs. Married), {state_name}'s tax treatment ({state_tax_para}), and the FICA wage base.",
            "Net income is sensitive to your choices and location. Benefit elections trim taxable income, filing status moves your brackets, and {state_name} applies its rules ({state_tax_para}), on top of fixed FICA.",
            "Watch these factors: pre-tax contributions, filing status, and {state_name}'s rate ({state_tax_para}). Each nudges the final figure, which is why two people on the same salary can net different amounts.",
            "The result depends on more than salary. Your pre-tax benefits, your filing status, and {state_name}'s income-tax stance ({state_tax_para}) all combine with federal and FICA to set your net.",
            "Key drivers include pre-tax deductions that shrink taxable income, the filing status that sets your rates, {state_name}'s rules ({state_tax_para}), and the Social Security cap.",
            "Your take-home moves with several inputs: how much you defer pre-tax, whether you file Single or jointly, and {state_name}'s tax approach ({state_tax_para}), layered over federal and FICA.",
            "Several elements shape the outcome: contributions reduce what is taxed, filing status sets thresholds, {state_name} applies its treatment ({state_tax_para}), and high earners clear the FICA wage base.",
            "Factors that matter most are pre-tax benefits, filing status, and {state_name}'s rate ({state_tax_para}). Adjust any of them and your net income changes, sometimes more than expected.",
            "Your income reflects a mix of federal, FICA, and {state_name} rules ({state_tax_para}), plus your choices, filing status and deductions, each of which raises or lowers the final number.",
            "The big levers are pre-tax deductions (lower taxable income), filing status (sets your bracket), and {state_name}'s tax treatment ({state_tax_para}). FICA stays constant until the wage cap.",
            "Take-home depends on what you defer, how you file, and where you work. In {state_name}, the state rule ({state_tax_para}) joins federal brackets and FICA to set how much you keep.",
            "Among the factors: pre-tax retirement and health contributions, your filing status, and the {state_name} income-tax rule ({state_tax_para}), all stacked with federal withholding.",
            "Several inputs steer your net: benefits that reduce taxable income, the filing status that fixes rates, the FICA cap, and {state_name}'s specific treatment ({state_tax_para}) of income.",
            "Your results respond to pre-tax deductions, filing status, and {state_name}'s rate ({state_tax_para}), working alongside federal income tax and the flat 7.65% FICA on your gross."
        ],
        'benefits' => [
            "This calculator gives precise estimates from current tax tables, lets you compare retirement-contribution scenarios, and protects your privacy by running every calculation locally, no {state_name} data leaves your device.",
            "Why use it? It delivers accurate tax math from the latest guidelines, lets you trial filing-status and deduction changes, and keeps your information private, with no storage of your {state_name} figures.",
            "Built for accuracy, flexibility, and privacy, the tool lets you model deduction tweaks, estimate benefit changes, and pin down your exact {state_name} take-home, without sharing personal details.",
            "The benefits are practical: reliable estimates, instant what-if scenarios, and total privacy. Test a higher 401(k), a new filing status, or a move within {state_name}, and see the impact at once.",
            "Among its advantages: it uses current federal and {state_name} rules, recalculates instantly as you change inputs, and never asks for identifying information, your numbers stay on screen.",
            "You get accuracy you can trust, the freedom to compare scenarios, and privacy. For {state_name} taxpayers, that means smarter decisions about income, deductions, and withholding.",
            "The tool's strengths are speed, precision, and discretion. Run unlimited {state_name} calculations, compare pre-tax versus Roth, and never worry about your data being saved.",
            "Key benefits include current-year accuracy, flexible scenario testing, and a privacy-first design. Whether you are in {city1} or anywhere in {state_name}, you can plan confidently.",
            "It pays off in three ways: dependable estimates, easy comparisons, and complete privacy. Adjust your {state_name} inputs as often as you like and the math stays on your device.",
            "Expect precise results, instant recalculation, and zero data collection, a safe, practical tool for {state_name} budgeting and tax planning alike.",
            "The advantages add up: accurate tax math, the ability to test deduction and filing changes, and a privacy model that keeps your {state_name} income details to yourself.",
            "Using it, you gain clarity and control. See the exact effect of a raise or a deduction change in {state_name}, privately, since the calculator processes your numbers without saving them.",
            "This calculator is fast, accurate, and private by design. It applies the latest {state_name} and federal rules, compares scenarios in seconds, and never stores your figures.",
            "The payoff is better decisions with less hassle. Reliable {state_name} estimates, unlimited scenario testing, and strong privacy let you plan your finances with confidence.",
            "Benefits include precision from current tax data, the flexibility to model many situations, and a strict privacy stance, a dependable foundation for {state_name} tax planning.",
            "You get a tool that is accurate to the current year, flexible enough for any what-if, and private enough to trust, which makes estimating your {state_name} income tax both easy and safe."
        ],
        'mistakes' => [
            "A common slip is mixing up pre-tax and post-tax deductions. Logging a Roth contribution as pre-tax understates your tax, so double-check, and confirm your filing status and {state_name} specifics.",
            "Watch for the usual traps: choosing the wrong filing status or misplacing deductions. Either skews your taxable income and throws off your {state_name} take-home estimate.",
            "To stay accurate, don't misclassify deductions (a Roth is post-tax, not pre-tax) and don't forget {state_name} deductions or credits that may apply to you.",
            "The biggest errors are using gross instead of taxable income and forgetting the standard deduction. Both distort your {state_name} estimate, so let the tool apply them correctly.",
            "People often overlook how pre-tax benefits lower taxable income. In {state_name}, entering them wrong changes your tax, so map each deduction to the right field.",
            "A frequent mistake is ignoring additional Medicare tax on high incomes. Above $200,000 (single) or $250,000 (married), an extra 0.9% applies, which matters for high earners in {state_name}.",
            "Avoid assuming a no-income-tax state means no tax. Even where {state_name} levies no income tax, federal tax and FICA still apply, so plan for those.",
            "Many users forget credits. Unlike deductions, credits cut your {state_name} or federal tax dollar-for-dollar, leaving them out overstates your bill.",
            "Common pitfalls include the wrong filing status, misclassified deductions, and ignoring the standard deduction. Each shifts your {state_name} result, so review them before relying on it.",
            "Don't confuse marginal and effective rates. Your top bracket is not what you pay on all income; the {state_name} calculator shows your true effective rate.",
            "A typical error is forgetting that {state_name} deductions may differ from federal ones. Use the tool's state handling rather than assuming the federal deduction applies.",
            "Be careful not to overstate deductions or pick a filing status that doesn't match your situation. Both distort your {state_name} net-income estimate.",
            "The mistakes that bite hardest are simple: wrong filing status, misplaced deductions, and skipping the standard deduction. Get those right and your {state_name} estimate tracks reality.",
            "Users sometimes forget the FICA wage cap. Social Security stops at the annual limit, which slightly raises take-home for high earners in {state_name} late in the year.",
            "A classic oversight is entering gross income but skipping pre-tax benefits. Those lower your {state_name} and federal taxable income, so omitting them overstates your tax.",
            "To avoid surprises, verify three things: your filing status, whether deductions are pre- or post-tax, and any {state_name}-specific rules. Those drive the income tax estimate."
        ],
        'usecases' => [
            "This tool is ideal if you are relocating to {state_name} and comparing cost of living, starting a new job and planning a budget, or checking whether your withholding needs a tweak.",
            "Real-world uses include sizing up a job offer in {city1}, testing deduction changes to right-size your refund, and estimating how a retirement-contribution change reshapes your {state_name} take-home.",
            "Reach for it when planning a move to {state_name}, weighing a new salary, adjusting withholding to avoid owing in April, or figuring out the tax impact of a bonus.",
            "Use cases range from everyday budgeting to big decisions: comparing offers in {city1} and {city2}, planning for a raise, or deciding whether a {state_name} move leaves you better off after tax.",
            "It shines when negotiating pay, planning a {state_name} budget, or modelling how a raise translates to real take-home, so you celebrate what you actually keep.",
            "Common scenarios include checking take-home before signing a lease in {city1}, fine-tuning withholding mid-year, and comparing the after-tax value of two {state_name} jobs.",
            "Whether you are a new hire, a job switcher, or just budget-conscious, the calculator helps, estimate net income, test deduction changes, and see how {state_name} taxes affect each scenario.",
            "Put it to work when evaluating a bonus, planning savings goals, or deciding between traditional and Roth contributions, each with a different effect on your {state_name} take-home.",
            "Use it to plan a move within {region}, compare a promotion's real value, or set a realistic budget. For {state_name} workers, it turns salary figures into spendable income.",
            "Typical uses: confirming withholding is on track, modelling a side-gig's tax impact, and comparing how the same salary nets out in {state_name} versus a neighbouring state.",
            "It is handy for lease and budget planning in {city1}, for testing how a bigger HSA or 401(k) changes your tax, and for sanity-checking an offer before you accept a {state_name} role.",
            "Lean on it when life changes, new job, raise, marriage, or a move to {state_name}, since each shifts your tax, and seeing the new number early keeps your budget honest.",
            "Practical applications include comparing {state_name} offers, planning around a bonus, adjusting withholding for a target refund, and estimating the impact of a new deduction.",
            "Use the calculator to decide if a higher-paying job in {city2} is truly better after tax, to plan contributions before year-end, or to budget around your real {state_name} net income.",
            "From first jobs to career moves, it answers the money questions that matter in {state_name}: what will I net, and how does this change affect my tax?",
            "Whether budgeting in {city1}, comparing offers across {state_name}, or planning a major purchase, this calculator gives the after-tax figure those decisions should rest on."
        ],
        'conclusion' => [
            "At the end of the day, your after-tax income is the number your real life runs on, not the salary on your offer letter. Bookmark this {state_name} income tax calculator and revisit it whenever your pay, deductions, or filing status change.",
            "Knowing your real {state_name} take-home turns money stress into a plan. Run the numbers before you sign a lease in {city1}, accept a raise, or bump your 401(k), and you will always know what you can afford.",
            "Income tax shouldn't feel like a black box. Now that you can see every layer of your {state_name} tax, you are back in control, adjust withholding, test a higher contribution, or simply budget with confidence.",
            "The smartest money move is also the simplest: know your real number. Use this {state_name} calculator whenever life shifts, share it with a friend who just got hired, and lean on the breakdown to plan ahead.",
            "Your {state_name} salary and your spending money were never the same thing, and now you can prove it to the dollar. Keep this tool handy and re-run it after any change.",
            "When you understand where every tax dollar goes, tax season stops being scary. Use this {state_name} income tax calculator as your go-to before big decisions, and budget around what you keep.",
            "Whether you live in {city1} or anywhere across {state_name}, the lesson is the same: plan from take-home, not gross. Bookmark this calculator and let real numbers shape your finances.",
            "A clear tax picture is powerful. With your {state_name} taxes laid bare, you can right-size your withholding, weigh deduction changes, and know exactly what an offer is worth after tax.",
            "Money decisions get easier when they start from reality. Use this {state_name} calculator to anchor your budget, test changes before they happen, and avoid the shock of a tax-time surprise.",
            "Come back to this tool any time your situation shifts, a raise, a move within {region}, a new deduction. Each changes your {state_name} tax, and a quick recalculation keeps your plan intact.",
            "The bottom line: your after-tax income is the foundation everything else sits on. Now that you can see it clearly for {state_name}, build your budget and goals on that solid number.",
            "Understanding your {state_name} income tax is a small skill with a big payoff. Keep this calculator bookmarked, run it when money decisions loom, and turn uncertainty into a confident plan.",
            "You started wondering where your money goes; now you know. Use this {state_name} tool to stay ahead of every change, fine-tune your withholding, and spend with the clarity real numbers bring.",
            "There is real freedom in seeing your true take-home. For workers in {city1}, {city2}, and beyond, this {state_name} calculator replaces guesswork with facts, so every choice rests on solid ground.",
            "Treat your after-tax income as the headline number it deserves to be. Bookmark this {state_name} calculator, revisit it after raises and deduction changes, and never be surprised at tax time.",
            "In the end, the goal is simple: spend and save from what you keep, not what you earn on paper. This {state_name} income tax calculator hands you that honest figure in seconds."
        ]
    ];
}


/**
 * Builds the full V6 Income Tax article for a given state (~1,250 words),
 * with a real per-state take-home example via ust_calculate_income_tax().
 */
function usc_it_article_v6($state) {
    $name = $state['name'];
    $desc = $state['tax_desc'];
    $type = $state['tax_type'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $city1 = $x['cities'][0];
    $city2 = isset($x['cities'][1]) ? $x['cities'][1] : $x['cities'][0];

    // Short, parenthetical-friendly state-tax clause for "factors".
    if ($type === 'none') {
        $stp = [$name . ' levies no state income tax on wages', 'there is no ' . $name . ' state income tax to withhold'];
    } elseif ($type === 'flat') {
        $stp = [$name . ' uses a ' . $desc, $name . '\'s ' . $desc . ' applies to all taxable income'];
    } else {
        $stp = [$name . ' uses ' . $desc, $name . ' applies ' . $desc . ' across its brackets'];
    }
    $state_tax_para = $stp[usc_get_variation_index($state_slug, 'itstp', count($stp))];

    $replacements = [
        'state_name'     => $name,
        'state_tax_desc' => $desc,
        'state_tax_para' => $state_tax_para,
        'city1'          => $city1,
        'city2'          => $city2,
        'region'         => $x['region'],
    ];

    $pool = usc_it_variations_v6();
    $sec = function($key) use ($state_slug, $pool, $replacements) {
        return usc_get_section_content($state_slug, $key, $pool, $replacements);
    };

    // Real per-state example: $85,000 single filer, no pre-tax deductions.
    $ex_rows = '';
    $net_line = '';
    if (function_exists('ust_calculate_income_tax')) {
        $r = ust_calculate_income_tax(85000, 'single', $state_slug, 0);
        $eff = isset($r['effective_rate']) ? $r['effective_rate'] : 0;
        $state_tax_cell = ($r['state_tax'] > 0)
            ? '-' . usc_money($r['state_tax'])
            : '$0.00';
        $ex_rows = '
      <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">Gross Income</td><td style="padding:12px;text-align:right;color:#111827;">' . usc_money($r['gross_income']) . '</td></tr>
      <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">Federal Income Tax</td><td style="padding:12px;text-align:right;color:#b91c1c;">-' . usc_money($r['fed_tax']) . '</td></tr>
      <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">FICA (Social Security + Medicare)</td><td style="padding:12px;text-align:right;color:#b91c1c;">-' . usc_money($r['fica_tax']) . '</td></tr>
      <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">' . esc_html($name) . ' State Income Tax</td><td style="padding:12px;text-align:right;color:' . ($r['state_tax'] > 0 ? '#b91c1c' : '#15803d') . ';">' . $state_tax_cell . '</td></tr>
      <tr style="border-bottom:1px solid #e5e7eb;background-color:#f0fdf4;"><td style="padding:12px;font-weight:bold;color:#15803d;">Estimated Annual Take-Home Pay</td><td style="padding:12px;text-align:right;font-weight:bold;color:#166534;">' . usc_money($r['net_income']) . '</td></tr>';
        $net_line = '<p><em>On an $85,000 salary in ' . esc_html($name) . ', a single filer keeps roughly ' . usc_money($r['net_income']) . ' a year, an effective tax rate of about ' . number_format($eff, 1) . '%. Your real figure depends on your exact deductions, credits, and filing status; adjust the calculator above for a personalized number.</em></p>';
    }

    $region_comp = function_exists('ust_get_state_region_comparison') ? ust_get_state_region_comparison($state_slug, 'income-tax') : '';

    $html = '<!-- ust-v3-article -->
<h2>' . usc_pv6_h($state_slug, 'itintro', ['Understanding Income Tax in ' . $name, $name . ' Income Tax, Explained', 'Your ' . $name . ' Take-Home Pay', 'Income Tax in ' . $name . ': An Overview']) . '</h2>
<p>' . $sec('intro') . '</p>
<p>The figure on your contract or offer letter is gross pay, never the amount that lands in your account. Deductions happen at several levels, federal, FICA, and ' . esc_html($name) . ' state, so seeing the full breakdown helps you budget, plan large purchases, and judge job offers or a relocation with clear numbers rather than rough guesses.</p>

<h2>' . usc_pv6_h($state_slug, 'itwhatis', ['What is the ' . $name . ' Income Tax Calculator?', 'What This ' . $name . ' Calculator Does', 'Meet the ' . $name . ' Income Tax Calculator', 'What Exactly Is This Tool?']) . '</h2>
<p>' . $sec('whatis') . '</p>
<p>It works by taking your inputs, gross salary, filing status, pre-tax deductions, and credits, and routing them through current tax rules. It subtracts pre-tax items to find taxable income, applies the progressive federal brackets, calculates FICA, and computes ' . esc_html($name) . ' state tax, returning an accurate estimate of your net pay on a yearly, monthly, or per-paycheck basis.</p>

<h2>' . usc_pv6_h($state_slug, 'itwhy', ['Why Estimate Your Income Tax?', 'Why Use This Calculator?', 'Why Run Your Numbers First?', 'Why Knowing Your Net Pay Matters']) . '</h2>
<p>' . $sec('why') . '</p>
' . usc_pv6_list($state_slug, 'itwhy', [
    '<strong>Budget Accurately:</strong> Plan rent, savings, and spending from your real ' . esc_html($name) . ' take-home pay.',
    '<strong>Optimize Withholding:</strong> See how filing status and deductions change your tax, and adjust your W-4.',
    '<strong>Compare Job Offers:</strong> Judge offers in ' . esc_html($city1) . ' by net pay, not just the headline salary.',
    '<strong>Test Pre-Tax Savings:</strong> Watch how a 401(k) or HSA contribution lowers your taxable income.',
    '<strong>Avoid April Surprises:</strong> Confirm your withholding is on track before tax season arrives.',
    '<strong>Plan a Move:</strong> Compare after-tax income across ' . esc_html($x['region']) . ' before relocating.',
], 5) . '

<h2>' . usc_pv6_h($state_slug, 'ithow', ['How the Calculator Works', 'How Your Tax Is Calculated', 'What Happens Behind the Scenes', 'How Gross Becomes Net']) . '</h2>
<p>' . $sec('how') . '</p>

<h2>' . usc_pv6_h($state_slug, 'itinputs', ['What You Will Need', 'Inputs Required', 'Information to Have Ready', 'What to Enter']) . '</h2>
<p>' . $sec('inputs') . '</p>
' . usc_pv6_list($state_slug, 'itinputs', [
    '<strong>Gross Annual Income:</strong> your salary before any taxes or deductions.',
    '<strong>Filing Status:</strong> Single, Married Filing Jointly, or Head of Household.',
    '<strong>Pre-Tax Deductions:</strong> traditional 401(k), HSA, or health premiums that lower taxable income.',
    '<strong>Other Income:</strong> freelance, rental, or investment income you want reflected.',
    '<strong>Credits:</strong> federal or ' . esc_html($name) . ' tax credits you expect to claim.',
    '<strong>Local Considerations:</strong> any ' . esc_html($name) . ' local income tax where it applies.',
], 5) . '

<h2>' . usc_pv6_h($state_slug, 'itformula', ['The Tax Calculation Formula', 'The Math Behind Your Net Pay', 'How the Numbers Add Up', 'The Take-Home Equation']) . '</h2>
<p>' . $sec('formula') . '</p>
<pre style="background:#f4f4f5; padding:15px; border-radius:5px; overflow-x:auto;">Net Income = Gross - Pre-Tax Deductions - Federal Tax - FICA - ' . esc_html($name) . ' State Tax</pre>
<p>Federal tax and ' . esc_html($name) . ' state tax are calculated on your income after pre-tax deductions and the standard deduction, while FICA (6.2% Social Security plus 1.45% Medicare) applies to your gross wages. The calculator handles each base automatically so the take-home figure reflects how payroll and tax filing actually work.</p>

<h2>' . usc_pv6_h($state_slug, 'ithowtouse', ['How to Use the Calculator', 'Step-by-Step Instructions', 'Using the Tool in 60 Seconds', 'How to Run Your Estimate']) . '</h2>
<p>' . $sec('howtouse') . '</p>

<h2>' . usc_pv6_h($state_slug, 'itexample', ['A Real ' . $name . ' Example', 'A Worked ' . $name . ' Example', 'See It in Action: ' . $name, $name . ' Take-Home: A Sample Run']) . '</h2>
<p>' . $sec('example') . '</p>
<table style="width:100%; border-collapse: collapse; margin-bottom: 25px; font-size:14px; border: 1px solid #e5e7eb;">
  <thead><tr style="background-color:#f9fafb;border-bottom:2px solid #e5e7eb;"><th style="padding:12px;text-align:left;font-weight:600;color:#374151;">Category (single filer, $85,000)</th><th style="padding:12px;text-align:right;font-weight:600;color:#374151;">Amount</th></tr></thead>
  <tbody>' . $ex_rows . '</tbody>
</table>
' . $net_line . '

<h2>' . usc_pv6_h($state_slug, 'itdeductions', ['Key Deductions From Your Paycheck', 'What Comes Out of Your Pay', 'The Deductions That Shape Net Pay', 'Where Your Money Goes']) . '</h2>
<p>Before your paycheck reaches your bank, several withholdings come out of gross earnings. Understanding them helps you read your pay stub accurately:</p>
' . usc_pv6_list($state_slug, 'itded', [
    '<strong>Federal Income Tax:</strong> progressive rates from 10% to 37%, based on your W-4 and standard deduction.',
    '<strong>FICA:</strong> 6.2% Social Security (up to the {tax_year} wage base of $184,500) and 1.45% Medicare on all wages.',
    '<strong>' . esc_html($name) . ' State Income Tax:</strong> applied under ' . esc_html($name) . '\'s own rules.',
    '<strong>Pre-Tax Deductions:</strong> 401(k), HSA/FSA, and some insurance premiums, deducted before taxes.',
    '<strong>Additional Medicare:</strong> an extra 0.9% on wages above $200,000 (single) or $250,000 (married).',
], 4) . '

<h2>' . usc_pv6_h($state_slug, 'itfactors', ['Factors Affecting Your Tax', 'What Changes Your Net Pay', 'Variables That Move the Number', 'What Influences Your Take-Home']) . '</h2>
<p>' . $sec('factors') . '</p>

<h2>' . usc_pv6_h($state_slug, 'itstrategies', ['Tax-Saving Strategies in ' . $name, 'Ways to Lower Your ' . $name . ' Tax', 'Smart Moves to Keep More', 'Reducing Your Tax Bill']) . '</h2>
<p>To legally keep more of what you earn in ' . esc_html($name) . ', consider these strategies:</p>
' . usc_pv6_list($state_slug, 'itstrat', [
    '<strong>Maximize Retirement Contributions:</strong> traditional 401(k) and IRA contributions lower your taxable income now.',
    '<strong>Use an HSA:</strong> a triple tax advantage, deductible contributions, tax-free growth, and tax-free medical withdrawals.',
    '<strong>Claim Eligible Credits:</strong> credits like the Child Tax Credit cut your bill dollar-for-dollar.',
    '<strong>Bunch Deductions:</strong> time large deductible expenses to maximize the years you itemize.',
    '<strong>Adjust Your W-4:</strong> fine-tune withholding so you neither owe a lot nor over-lend the IRS.',
], 4) . '

<h2>' . usc_pv6_h($state_slug, 'itmistakes', ['Common Mistakes to Avoid', 'Pitfalls That Skew Your Estimate', 'Errors People Often Make', 'What Throws Off the Numbers']) . '</h2>
<p>' . $sec('mistakes') . '</p>

<h2>' . usc_pv6_h($state_slug, 'itusecases', ['Practical Use Cases', 'Real-World Scenarios', 'When to Reach for This Tool', 'Everyday Uses']) . '</h2>
<p>' . $sec('usecases') . '</p>
' . ($region_comp ? '
<h2>' . usc_pv6_h($state_slug, 'itregion', [$name . ' vs. Neighboring States', 'How ' . $name . ' Compares Regionally', 'Regional Tax Comparison', $name . ' in Its Region']) . '</h2>
<p>' . $region_comp . '</p>' : '') . '

<h2>' . usc_pv6_h($state_slug, 'itconclusion', ['Final Thoughts', 'The Bottom Line', 'Taking Control of Your Taxes', 'Key Takeaways']) . '</h2>
<p>' . $sec('conclusion') . '</p>

<h2>Related ' . esc_html($name) . ' Calculators</h2>
<p>Planning a budget or a move? These free ' . esc_html($name) . ' tools pair well with your income-tax math:</p>
' . usc_get_related_links_html($state_slug, $name, 'income-tax') . '

<h2>Income Tax Calculators in Nearby States</h2>
<p>Tax rules differ across ' . esc_html($x['region']) . '. See how take-home pay changes just over the ' . esc_html($name) . ' border:</p>
' . (function() use ($state_slug) { $h = usc_neighbour_links_html($state_slug, 'income-tax', 'Income Tax Calculator'); return $h ?: '<p>Explore income tax calculators for every U.S. state from the menu above.</p>'; })() . '

<h2>Helpful Official Resources</h2>
<ul>
  <li><a href="' . esc_url($x['rev_url']) . '" target="_blank" rel="nofollow noopener">' . esc_html($x['rev_name']) . '</a> &mdash; official ' . esc_html($name) . ' tax forms, rates, and deadlines.</li>
  <li><a href="https://www.irs.gov/individuals/tax-withholding-estimator" target="_blank" rel="nofollow noopener">IRS Tax Withholding Estimator</a> &mdash; check your federal withholding.</li>
  <li><a href="https://www.irs.gov/forms-instructions" target="_blank" rel="nofollow noopener">IRS forms and instructions</a> &mdash; the federal rules behind your return.</li>
</ul>
<!-- ust-income-v6 -->';

    $html = str_replace('{tax_year}', (function_exists('usac_get_active_tax_year') ? usac_get_active_tax_year() : '2026'), $html);
    return $html;
}

/** V6 FAQ pool for Income Tax (state aware). Selects 12. */
function usc_it_faqs_v6($state) {
    $name = $state['name'];
    $desc = $state['tax_desc'];
    $type = $state['tax_type'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);

    $pick = function($qkey, $arr) use ($state_slug) {
        return $arr[usc_get_variation_index($state_slug, 'itfaqa_' . $qkey, count($arr))];
    };

    if ($type === 'none') {
        $stax = [
            'No, ' . $name . ' does not tax wage income at the state level. Only federal tax and FICA come out of your paycheck, which is why take-home pay tends to run higher here.',
            'There is no ' . $name . ' state income tax on wages, so your main deductions are federal tax and FICA.',
            $name . ' is a no-income-tax state, so nothing is withheld for state income tax, though it may rely on sales or property taxes instead.',
        ];
    } elseif ($type === 'flat') {
        $stax = [
            'Yes. ' . $name . ' applies a ' . $desc . ' to taxable income, the same rate regardless of how much you earn.',
            'Yes, ' . $name . ' uses a single flat rate (' . $desc . '), which makes the state portion easy to predict.',
            'It does. ' . $name . ' charges a flat ' . $desc . ' on taxable income, so everyone pays the same percentage to the state.',
        ];
    } else {
        $stax = [
            'Yes. ' . $name . ' uses a progressive income tax (' . $desc . '), so higher slices of income are taxed at higher rates.',
            'Yes, ' . $name . ' has graduated brackets (' . $desc . '); only the income in each bracket is taxed at that rate.',
            $name . ' taxes income on a progressive scale (' . $desc . '), so your effective rate rises gradually as you earn more.',
        ];
    }

    $faq_pool = [
        ['q' => 'Does ' . $name . ' have a state income tax?', 'a' => $stax[usc_get_variation_index($state_slug, 'itfaqa_stax', count($stax))]],
        ['q' => 'Is this ' . $name . ' income tax calculator free?', 'a' => $pick('free', [
            'Yes, it is completely free, run unlimited estimates with no fee and no sign-up.',
            'It is 100% free and private. Calculate as many ' . $name . ' scenarios as you like.',
            'Absolutely free, no account, no paywall, and no limit on calculations.',
        ])],
        ['q' => 'How is take-home pay calculated in ' . $name . '?', 'a' => $pick('calc', [
            'Start with gross income, subtract pre-tax deductions and the standard deduction, apply federal brackets and FICA, then apply ' . $name . ' state tax, what remains is your take-home pay.',
            'The tool removes federal tax, FICA, and ' . $name . ' state tax from your salary (after deductions) to find your net income.',
            'Gross minus pre-tax deductions, federal tax, FICA, and ' . $name . ' tax equals your take-home pay.',
        ])],
        ['q' => 'What is FICA and how much is it?', 'a' => $pick('fica', [
            'FICA is 6.2% Social Security (up to the {tax_year} wage base of $184,500) plus 1.45% Medicare on all wages, 7.65% total, matched by your employer.',
            'It is the Social Security and Medicare tax: 6.2% and 1.45%, with an extra 0.9% Medicare above $200,000 (single) or $250,000 (married).',
            'FICA combines Social Security (6.2%, capped) and Medicare (1.45%, uncapped) for 7.65% of your gross pay.',
        ])],
        ['q' => 'What is the {tax_year} federal standard deduction?', 'a' => $pick('stdded', [
            'For {tax_year} it is roughly $16,100 for single filers and $32,200 for married filing jointly, and it is built into your withholding.',
            'About $16,100 single and $32,200 joint in {tax_year}, the slice of income the IRS lets you earn tax-free.',
            'The {tax_year} standard deduction is approximately $16,100 (single) or $32,200 (married), which most filers take instead of itemizing.',
        ])],
        ['q' => 'How can I lower my ' . $name . ' income tax?', 'a' => $pick('lower', [
            'Contribute to a traditional 401(k) or IRA, use an HSA, and claim every credit you qualify for, each reduces your taxable income or tax bill.',
            'Pre-tax retirement and HSA contributions lower taxable income, while credits cut your ' . $name . ' or federal tax directly.',
            'Maximize pre-tax savings and claim eligible credits, both are effective ways to keep more of your ' . $name . ' income.',
        ])],
        ['q' => 'What is the difference between marginal and effective tax rate?', 'a' => $pick('marg', [
            'Your marginal rate is the rate on your last dollar; your effective rate is the average across all your income, which is lower. The calculator shows your effective rate.',
            'Marginal is your top bracket; effective is total tax divided by income. You pay the effective rate overall, not the marginal one on everything.',
            'The marginal rate applies only to income in your top bracket, while the effective rate reflects your true overall ' . $name . ' tax burden.',
        ])],
        ['q' => 'Does the calculator include federal and ' . $name . ' taxes?', 'a' => $pick('incl', [
            'Yes. It applies federal brackets, FICA, and ' . $name . '\'s state rules together to estimate your full take-home pay.',
            'It does, both federal income tax and FICA, plus ' . $name . ' state tax, are built into the result.',
            'Absolutely, the estimate combines federal tax, FICA, and ' . $name . ' state tax for a complete picture.',
        ])],
        ['q' => 'How do pre-tax deductions affect my ' . $name . ' tax?', 'a' => $pick('pretax', [
            'Pre-tax items like a traditional 401(k) or HSA come out before tax is figured, lowering both your federal and ' . $name . ' taxable income.',
            'They reduce your taxable income, so every pre-tax dollar trims your federal and ' . $name . ' tax.',
            'A pre-tax contribution lowers the base your taxes are calculated on, so you keep more today in ' . $name . '.',
        ])],
        ['q' => 'How does filing status change my ' . $name . ' tax?', 'a' => $pick('filing', [
            'Filing status sets your bracket thresholds and standard deduction. Married Filing Jointly often widens brackets compared with Single.',
            'It affects your rates and deduction, which is why comparing Single and Married can change your ' . $name . ' tax noticeably.',
            'Your status (Single, Married, Head of Household) determines the brackets and deduction applied to your ' . $name . ' income.',
        ])],
        ['q' => 'Where can I verify ' . $name . ' tax rules officially?', 'a' => $pick('verify', [
            'The ' . $x['rev_name'] . ' publishes the official ' . $name . ' rates, forms, and deadlines; the IRS handles federal rules.',
            'Go to the ' . $x['rev_name'] . ' for state details and the IRS for federal guidance, both are linked in the resources section.',
            'Official ' . $name . ' figures come from the ' . $x['rev_name'] . '; federal questions go to the IRS.',
        ])],
        ['q' => 'Is the estimate from this ' . $name . ' calculator exact?', 'a' => $pick('exact', [
            'It is a high-accuracy estimate. Your real ' . $name . ' tax depends on your exact deductions, credits, and filing details.',
            'Treat it as a close estimate, the final number comes from your actual return and ' . $name . ' rules.',
            'It is for planning. Adjust the inputs to your situation for the most accurate ' . $name . ' figure.',
        ])],
        ['q' => 'Does the calculator handle other income or side gigs?', 'a' => $pick('other', [
            'Yes, add freelance, rental, or investment income to see how it affects your bracket and total ' . $name . ' tax.',
            'It can, include other income so the estimate reflects your full tax picture, not just your salary.',
            'You can enter additional income, which the tool factors into your ' . $name . ' and federal tax estimate.',
        ])],
        ['q' => 'What is the additional Medicare tax for high earners?', 'a' => $pick('addmed', [
            'Wages above $200,000 (single) or $250,000 (married) carry an extra 0.9% Medicare tax, withheld once you cross the threshold.',
            'High earners pay 0.9% more Medicare beyond $200,000 single / $250,000 joint, on top of the regular 1.45%.',
            'Above the thresholds, an extra 0.9% Medicare surtax applies to the wages over the line in ' . $name . ' and everywhere.',
        ])],
    ];

    $faqs = usc_get_deterministic_faqs($state_slug, $faq_pool, 12);
    $ty = function_exists('usac_get_active_tax_year') ? usac_get_active_tax_year() : '2026';
    foreach ($faqs as &$f) { $f['q'] = str_replace('{tax_year}', $ty, $f['q']); $f['a'] = str_replace('{tax_year}', $ty, $f['a']); }
    unset($f);
    return $faqs;
}
