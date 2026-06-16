<?php
/**
 * Paycheck Calculator — V6 content engine.
 *
 * Goal: kill duplicate/"AI" feel across all 50 state pages.
 *  - 15+ human-tone variations per section (50 / 15 = ~3 states share a line)
 *  - Real per-state data woven in (cities, region, tax rules, live example)
 *  - Per-state official .gov links + neighbour-state internal links
 *  - 13 sections => 15^13 structural combinations (effectively all unique)
 *
 * @package USA_State_All_Calculators
 */

if (!defined('ABSPATH')) exit;

/**
 * Picks a heading phrasing deterministically per state, so the same section
 * does not carry an identical <h2> on all 50 pages.
 */
function usc_pv6_h($slug, $key, $variants) {
    return $variants[usc_get_variation_index($slug, 'head_' . $key, count($variants))];
}

/**
 * Deterministically shuffles a bullet pool by state and returns $count items
 * wrapped in <ul>/<ol>. Different states therefore show a different subset and
 * order of bullets, cutting list duplication across pages.
 */
function usc_pv6_list($slug, $key, $items, $count, $tag = 'ul') {
    usort($items, function($a, $b) use ($slug, $key) {
        return strcmp(md5($slug . '|' . $key . '|' . $a), md5($slug . '|' . $key . '|' . $b));
    });
    $items = array_slice($items, 0, $count);
    $li = '';
    foreach ($items as $it) {
        $li .= '<li>' . $it . '</li>';
    }
    return '<' . $tag . '>' . $li . '</' . $tag . '>';
}


/**
 * Returns the Paycheck text variations (15+ per section).
 * Tokens: {state_name} {city1} {city2} {region} {state_tax_para}
 */
function usc_paycheck_variations_v6() {
    return array_merge(usc_pv6_a(), usc_pv6_b(), usc_pv6_c());
}

/** Variation set A: intro, whatis */
function usc_pv6_a() {
    return [
        'intro' => [
            "Ever signed a {state_name} job offer, done some quick mental math, then felt that little drop in your stomach when the first deposit actually landed? You are far from alone. The number your employer advertises is gross pay; what you can actually spend is take-home pay, and the gap between them is filled with federal tax, FICA, and {state_name}'s own rules. This calculator closes that gap before payday.",
            "Let's be honest: payroll math is confusing, and most of us just accept whatever shows up in the bank. But if you live or work in {state_name}, a few minutes with a good paycheck calculator shows exactly where each dollar goes, from Social Security and Medicare to federal withholding and state tax. Once you see the breakdown, budgeting stops being a guessing game.",
            "Your salary and your real spending money are two very different things in {state_name}. Between the IRS, the Social Security Administration, and the state's own tax office, a real slice of every check vanishes before you ever touch it. The good news? None of it has to be a mystery. Enter your numbers and watch the full, deduction-by-deduction story appear in seconds.",
            "Whether you just landed a role in {city1}, picked up extra shifts, or you are weighing a move to {state_name}, the question never changes: what will I actually take home? Gross pay looks great on paper, but federal tax, FICA, and {state_name} withholding all take a bite. This tool runs the same steps a payroll team would, so your estimate matches your real stub.",
            "Moving from a sticker salary to a real {state_name} paycheck can feel like a magic trick gone wrong, money simply disappears. The truth is far less mysterious: it is going to predictable places, and most of it is easy to plan around once you can see it. Plug in your details below and let the calculator show you the honest figure.",
            "If you have ever compared two job offers and wished you could see the after-tax number instead of the headline salary, this is for you. People in {city1} and {city2} use a paycheck calculator to turn a {state_name} gross figure into the cash that actually hits checking. A couple of inputs and you will know your real number.",
            "New job, first job, or just curious why this month's deposit looks different? Understanding your {state_name} paycheck is one of those small money skills that pays off for years. This calculator breaks every line item down in plain English so the deductions stop feeling random.",
            "There is a reason that 'why is my paycheck smaller than I expected' is one of the most-searched payroll questions in {state_name}. The headline salary ignores taxes; your bank account does not. This tool reconciles the two, showing federal, FICA, and state withholding side by side so the math finally makes sense.",
            "Relocating to {region}, chasing a raise, or fine-tuning your W-4 before open enrollment? Each of those decisions hinges on one figure: your {state_name} take-home pay. Rather than guess, run the numbers here and see the impact of every change before it shows up on a real stub.",
            "Most people can recite their salary but freeze when asked what they net per check. In {state_name}, that net depends on federal brackets, FICA, pre-tax benefits, and the state's tax treatment. This calculator answers the question in seconds, so you can budget around what you keep, not what you are promised.",
            "Think of your gross salary in {state_name} as the price on the menu and your take-home pay as the bill after tax and tip, related, but never identical. Knowing the after-everything figure is what lets you set rent, savings, and spending with confidence. Start with the calculator below.",
            "A paycheck in {state_name} passes through several hands before it reaches yours: the federal government, the Social Security and Medicare systems, and the state. Each takes a defined share. This tool lays those shares out clearly so you understand not just how much is gone, but exactly why.",
            "Budgeting works far better when it starts from your real number rather than a rounded-up salary. For workers in {city1}, {city2}, and across {state_name}, this calculator converts gross pay into honest, spendable take-home in moments, no spreadsheet, no payroll degree required.",
            "Got a raise and barely noticed it in your account? That is the gap between gross and net at work, and in {state_name} it is shaped by federal tax, FICA, and state rules. Use this calculator to see how much of any raise you actually keep before you mentally spend it.",
            "Whether you are an hourly worker in {city1} or a salaried employee elsewhere in {state_name}, your paycheck follows the same logical path from gross to net. This tool walks that path with you, step by step, so the final take-home figure is something you understand rather than just accept.",
            "Payday should feel good, not confusing. If your {state_name} deposit never quite matches your expectations, this calculator is the fix: it itemizes federal withholding, Social Security, Medicare, state tax, and your benefits so you can see precisely where your money lands."
        ],
        'whatis' => [
            "A <strong>{state_name} Paycheck Calculator</strong> is an automated tool that works out your net pay using the latest tax tables. It takes your raw earnings and subtracts federal withholding, FICA, and {state_name}'s state rules, then hands you an instant, line-by-line breakdown of your real take-home pay.",
            "Think of the <strong>{state_name} Paycheck Calculator</strong> as a pocket-sized payroll department. Feed it your hourly rate or annual salary and it computes every required deduction, federal income tax, Social Security, Medicare, and anything specific to {state_name}, in one go.",
            "The <strong>{state_name} Paycheck Calculator</strong> is a financial model that turns gross salary into spendable net pay. It mirrors a normal payroll run, making sure {state_name}'s tax brackets, allowances, and local quirks are baked into the final figure.",
            "At its core, a <strong>{state_name} Paycheck Calculator</strong> answers one question: of everything I earn, how much actually reaches me? It applies federal and FICA rules first, layers on {state_name}'s state treatment, and returns a net number you can budget against.",
            "A <strong>{state_name} Paycheck Calculator</strong> is essentially a simulator for your pay stub. Before HR ever cuts a check, it predicts the same deductions, federal tax, the 6.2% and 1.45% FICA pieces, and {state_name} withholding, so there are no surprises later.",
            "Put simply, the <strong>{state_name} Paycheck Calculator</strong> converts a big, motivating salary into the smaller, real figure you live on. It does the multi-layer tax math for you and presents {state_name}-specific results in plain numbers rather than jargon.",
            "The <strong>{state_name} Paycheck Calculator</strong> is a planning tool that decodes your stub. By accounting for filing status, pre-tax benefits, and {state_name}'s rules, it shows how gross pay shrinks into net pay and where every withheld dollar goes.",
            "A <strong>{state_name} Paycheck Calculator</strong> is a free, instant estimator of take-home pay. You supply earnings and a few W-4 details; it applies current federal brackets, FICA, and {state_name} tax to produce an accurate net-pay snapshot.",
            "Consider the <strong>{state_name} Paycheck Calculator</strong> a translation layer between 'what I'm paid' and 'what I keep.' It reads your inputs, applies the same rules a {state_name} employer's payroll software uses, and outputs a clear deduction summary.",
            "The <strong>{state_name} Paycheck Calculator</strong> is a digital tool built specifically for {state_name} workers. Rather than generic math, it factors in the state's exact income-tax stance alongside federal and FICA withholding to estimate your true net pay.",
            "In practical terms, a <strong>{state_name} Paycheck Calculator</strong> is your what-if machine for income. Change your salary, benefits, or filing status and it instantly recalculates your {state_name} take-home, no manual tax tables required.",
            "A <strong>{state_name} Paycheck Calculator</strong> takes the guesswork out of payday. It breaks your gross pay into federal tax, Social Security, Medicare, {state_name} tax, and benefit deductions, leaving you with a net figure you can actually plan around.",
            "The <strong>{state_name} Paycheck Calculator</strong> is a self-service payroll estimator. Whether you are paid weekly in {city1} or monthly elsewhere in {state_name}, it annualizes your pay, applies the right brackets, and reports your net per period.",
            "Think of the <strong>{state_name} Paycheck Calculator</strong> as a financial mirror: it reflects what your paycheck will really look like after {state_name} and federal rules are applied, so you can compare offers and plan budgets with real numbers.",
            "A <strong>{state_name} Paycheck Calculator</strong> is an online estimator that replicates professional payroll processing. It handles the order of operations, pre-tax first, then federal and FICA, then {state_name} tax, that determines how much of your salary survives to net pay.",
            "The <strong>{state_name} Paycheck Calculator</strong> is a quick, judgment-free way to see your real earnings. Enter your numbers and it applies {state_name}'s tax rules plus federal withholding and FICA to reveal the take-home figure your budget should be built on."
        ]
    ];
}



/** Variation set B: why, how, inputs, formula */
function usc_pv6_b() {
    return [
        'why' => [
            "Running your numbers ahead of time pays off in real ways. It helps you dodge a surprise tax bill in April, lets you test W-4 changes safely, makes job offers easy to compare, and turns monthly budgeting in {state_name} into something you actually control.",
            "Using a paycheck calculator is one of those quietly smart money habits. You can see how a bigger pre-tax retirement contribution changes your tax, dial in your W-4 allowances, and build a household budget around real net income instead of a hopeful guess.",
            "Whether you are starting a new role, negotiating a raise, or tweaking your withholding in {state_name}, this tool brings clarity. Switch filing statuses, add deductions, and watch the immediate effect on your take-home pay before you commit to anything.",
            "Knowing your net pay in advance is the difference between planning and hoping. It lets you size your rent in {city1}, schedule loan payments, and decide how aggressively to save, all from a figure you trust rather than a salary you rounded up.",
            "A quick calculation today can save a real headache later. By estimating {state_name} withholding throughout the year, you avoid underpaying the IRS, you see how benefits affect your check, and you walk into salary talks knowing your true after-tax worth.",
            "There is power in seeing the breakdown. Once you know how much {state_name} tax, FICA, and federal withholding actually take, you can decide whether to boost your 401(k), open an HSA, or adjust your W-4, each choice with a visible dollar impact.",
            "This calculator is your financial sandbox. Model a move from {city1} to {city2}, a jump to a higher salary, or a switch in filing status, and see the net result instantly, no risk, no waiting for the next pay run to find out.",
            "Most paycheck surprises come from not running the math first. Use this tool to confirm your withholding is on track, to plan for a bonus, or to check whether adding overtime in {state_name} pushes more of your income into a higher bracket.",
            "For anyone budgeting seriously in {state_name}, net pay is the only number that matters. This calculator hands it to you in seconds, then lets you flex the inputs, benefits, deductions, frequency, so your plan is built on reality.",
            "Thinking about a job offer? The gross figure rarely tells the real story in {state_name}. Run it through here to reveal the take-home pay, then compare offers apples-to-apples instead of being dazzled by the bigger headline number.",
            "Using the calculator regularly keeps you ahead of change. A raise, a new benefit election, a move within {region}, each shifts your net pay, and seeing that shift early means no scrambling when the smaller-or-larger check arrives.",
            "It removes the fear from financial decisions. Want to know if you can afford a higher rent or a new car payment in {state_name}? Start from your real take-home pay here, and the answer stops being a guess.",
            "Smart W-4 management starts with visibility. This tool shows how claiming dependents or adding extra withholding changes your {state_name} check, helping you aim for a small refund instead of a painful balance due.",
            "Every benefit choice has a paycheck consequence. With this calculator you can see exactly how a traditional 401(k), an HSA, or a health premium reshapes your taxable income and your {state_name} take-home before open enrollment closes.",
            "The biggest reason to use it is peace of mind. When you know your real {state_name} net pay, money decisions, from savings to spending to side income, get easier, because every one of them starts from an honest baseline.",
            "Plain and simple, it puts you in charge. Instead of accepting whatever lands in your {state_name} account, you can predict it, question it, and adjust the levers, W-4, deductions, contributions, until the number works for your life."
        ],
        'how' => [
            "The calculator works through your pay in clear steps: it starts with gross earnings, subtracts pre-tax benefits, applies the progressive federal brackets, adds FICA, factors in {state_name} state tax, and finally removes any post-tax deductions to reach net pay.",
            "Behind the scenes it mirrors a real {state_name} payroll run. First it finds gross pay, then it strips out pre-tax items to get taxable income, calculates federal and FICA withholding, applies the state's rate, and subtracts post-tax deductions.",
            "Step by step, the tool determines gross pay, lowers it by pre-tax healthcare or retirement contributions, computes federal, FICA, and {state_name} taxes based on your filing status, and then deducts any voluntary post-tax items to land on your take-home.",
            "The math follows a fixed order. Gross pay comes first; pre-tax deductions shrink the taxable base; federal brackets and the 6.2% plus 1.45% FICA pieces apply next; {state_name}'s rules adjust the state portion; post-tax deductions finish the job.",
            "To estimate net pay, the calculator annualizes your earnings, applies the correct federal bracket for your filing status, removes Social Security and Medicare, layers on {state_name} state tax, and then converts everything back to your pay period.",
            "It processes income the same way payroll software does: identify gross, deduct pre-tax benefits, withhold federal income tax, take out FICA, apply {state_name} state and any local tax, and subtract post-tax deductions for the final figure.",
            "The engine separates your pay into buckets. One bucket is untouched (pre-tax benefits), the rest is taxed by the federal government, FICA, and {state_name}, and what remains after every bucket is settled becomes your take-home pay.",
            "Under the hood, the calculator first reduces gross by pre-tax contributions, then taxes that adjusted amount at the federal and {state_name} levels, applies the flat FICA percentages on gross, and removes Roth or other post-tax items last.",
            "Think of it as a waterfall: money flows from gross pay, over the pre-tax ledge, through federal and FICA withholding, across {state_name}'s state-tax step, past post-tax deductions, and whatever pools at the bottom is yours to spend.",
            "The calculator applies each rule in the legally correct sequence. Pre-tax deductions lower taxable income, federal and state taxes are computed on that lower base, FICA is taken on gross, and post-tax deductions reduce only the final net.",
            "It replicates the logic your {state_name} employer uses every cycle: compute gross, subtract qualified pre-tax benefits, run federal and FICA withholding, apply the state's income-tax treatment, and deduct anything post-tax to show your real check.",
            "Functionally, the tool builds your stub from the top down, gross at the top, then federal tax, Social Security, Medicare, {state_name} tax, and benefit lines, until the net-pay total at the bottom reflects what truly reaches your account.",
            "The process is methodical: establish gross earnings for the period, deduct pre-tax retirement and health contributions, calculate progressive federal tax, add the FICA pair, apply {state_name} state tax, and remove post-tax deductions.",
            "First gross, then pre-tax, then taxes. The calculator nails that order because it changes the answer, pre-tax deductions in {state_name} reduce what the federal and state governments can tax, which is why the sequence matters so much.",
            "It treats your paycheck like a recipe with fixed steps. Skip none and order matters: gross pay, minus pre-tax benefits, minus federal and FICA, minus {state_name} state tax, minus post-tax deductions, equals the net you take home.",
            "The system calculates withholding the way the IRS and {state_name} intend: annualize the pay, apply bracketed federal tax and flat FICA, add the state portion, then prorate back to weekly, bi-weekly, or monthly to match how you are actually paid."
        ],
        'inputs' => [
            "For the most accurate result, enter your gross pay rate, pick your pay frequency (weekly, bi-weekly, and so on), choose your W-4 filing status, and add any health insurance or retirement contributions listed on your {state_name} stub.",
            "The calculator needs a few basics from your W-4 and pay stub: gross earnings, pay frequency, filing status (Single, Married, and so on), and any pre-tax or post-tax deductions such as a traditional 401(k) or health premiums.",
            "Getting a precise number is easy when you supply gross wages, pay frequency, W-4 settings, and details of any employer benefits, pre-tax or post-tax, that show up regularly on your {state_name} paycheck.",
            "Have these handy: your salary or hourly rate, how often you are paid, your filing status, and your benefit elections. The more accurately you enter your {state_name} deductions, the closer the estimate lands to your real stub.",
            "You will provide gross pay, pay frequency, and filing status, plus any pre-tax items (401(k), HSA, health insurance) and post-tax items (Roth, union dues). Those few fields are enough to model your {state_name} take-home accurately.",
            "Start with your earnings and pay schedule, then add your W-4 filing status and dependent information. Finish with deductions, the pre-tax and post-tax lines from your {state_name} stub, for a result that closely tracks reality.",
            "The required inputs are straightforward: gross income, pay period, filing status, and deductions. If you have local {state_name} city or county tax, include that too so the estimate reflects every layer of withholding.",
            "Enter the figures that drive payroll: gross wages, frequency, filing status, and benefit contributions. Each one shapes the result, frequency sets the bracket math, while pre-tax deductions lower what {state_name} and the IRS can tax.",
            "To run the numbers, you need your pay amount, how often it arrives, your W-4 details, and your deductions. With those, the calculator can apply {state_name} and federal rules and return an accurate net-pay breakdown.",
            "Gather your gross pay, pay frequency, filing status, and any retirement or health contributions. These inputs let the tool replicate your {state_name} payroll run and show where every dollar of withholding goes.",
            "The tool asks for earnings, pay schedule, W-4 status, and deductions. Including details like a 401(k) percentage or an HSA deposit matters, because in {state_name} those pre-tax dollars meaningfully change your taxable income.",
            "All it needs is gross pay, frequency, filing status, and your benefit lines. Enter post-tax items like Roth contributions separately, since unlike pre-tax deductions they do not lower your {state_name} or federal taxable income.",
            "Provide your wage, how often you are paid, and your filing status, then layer in deductions. Accurate inputs here are what separate a rough guess from a reliable {state_name} take-home estimate you can budget against.",
            "You will need your gross salary or hourly rate, pay frequency, W-4 selections, and a list of deductions. If you work in a {state_name} locality with its own tax, add that detail to capture the full picture.",
            "The essentials are simple: earnings, pay period, filing status, and deductions. Enter pre-tax benefits (which cut your taxable income) and post-tax items separately so the calculator handles your {state_name} withholding correctly.",
            "Feed it your gross pay, your pay frequency, your filing status, and your deduction details. With those four pieces, the calculator can apply current federal brackets, FICA, and {state_name} tax to estimate your true net pay."
        ],
        'formula' => [
            "The baseline is simple: Net Pay = Gross Pay minus Pre-Tax Deductions, minus Federal Tax, minus FICA, minus State and Local Taxes, minus Post-Tax Deductions. FICA is 6.2% for Social Security plus 1.45% for Medicare.",
            "Here is the core equation: Net Pay = Gross Earnings - Pre-Tax Deductions - Federal Income Tax - FICA (Social Security and Medicare) - State/Local Taxes - Post-Tax Deductions. The FICA pieces are 6.2% and 1.45% respectively.",
            "Your take-home is calculated as: Net Income = Gross Earnings - Pre-Tax Deductions - Federal Withholding - FICA (6.2% Social Security + 1.45% Medicare) - {state_name} State Tax - Local Taxes - Voluntary Deductions.",
            "The formula reads from gross to net: start with Gross Pay, remove Pre-Tax Deductions to get taxable income, subtract Federal Tax and FICA, apply {state_name} tax, then take out Post-Tax Deductions for the final number.",
            "In equation form: Take-Home = Gross - (Pre-Tax Benefits) - (Federal Income Tax) - (6.2% + 1.45% FICA) - ({state_name} + Local Tax) - (Post-Tax Items). Each term is calculated on the correct base, which is why order matters.",
            "The standard payroll formula applies: Net = Gross - Pre-Tax - Federal - FICA - State - Local - Post-Tax. Note that federal and {state_name} taxes are computed on income after pre-tax deductions, while FICA is computed on gross.",
            "Mathematically, your net pay equals gross pay minus four layers of withholding, federal income tax, FICA, {state_name} state tax, and local tax, plus your benefit deductions split into pre-tax and post-tax buckets.",
            "The calculation chains together like this: Gross - Pre-Tax = Taxable Income; Taxable Income drives Federal and {state_name} Tax; FICA is 7.65% of gross (6.2% + 1.45%); Net = Gross - all taxes - all deductions.",
            "Put as a single line: Net Pay = Gross - Pre-Tax Deductions - Federal Tax - Social Security (6.2%) - Medicare (1.45%) - {state_name} State Tax - Post-Tax Deductions. That is the entire journey from salary to spendable cash.",
            "The formula the tool uses is: Net = Gross Earnings - Pre-Tax Contributions - Federal Withholding - FICA - {state_name} and Local Income Tax - Post-Tax Deductions, with FICA fixed at 6.2% Social Security and 1.45% Medicare.",
            "Expressed cleanly: Take-Home Pay = Gross Pay - Pre-Tax Deductions - Federal Income Tax - (Social Security + Medicare) - {state_name} Tax - Local Tax - Post-Tax Deductions. The pre-tax step is what lowers your taxable base.",
            "Your net figure follows: Gross Pay, less Pre-Tax Deductions, less Federal Tax, less the 6.2% and 1.45% FICA taxes, less {state_name} state and any local tax, less Post-Tax Deductions. What remains is your real paycheck.",
            "The underlying formula is: Net Income = Gross - Pre-Tax Benefits - Federal Tax - FICA - {state_name} Income Tax - Local Income Tax - Post-Tax Deductions. FICA combines a 6.2% Social Security tax and a 1.45% Medicare tax.",
            "Stated as a sequence of subtractions: begin with gross pay, deduct pre-tax benefits, then federal income tax, then FICA, then {state_name} state and local tax, then post-tax deductions, and the result is your take-home pay.",
            "The net-pay formula is: Gross Pay - Pre-Tax Deductions - Federal Withholding - FICA (6.2% + 1.45%) - {state_name} State Tax - Local Tax - Post-Tax Deductions. Each tax sits on its own base, which the calculator handles automatically.",
            "Formally: Net Pay equals Gross Earnings minus Pre-Tax Deductions, minus Federal Income Tax, minus Social Security and Medicare, minus {state_name} and local income tax, minus Post-Tax Deductions, the same chain payroll software runs."
        ]
    ];
}


/** Variation set C: howtouse, example, factors, benefits, mistakes, usecases, conclusion */
function usc_pv6_c() {
    return [
        'howtouse' => [
            "Using the tool is simple: enter your salary or hourly wage, pick how often you are paid, set your W-4 filing status, add any pre-tax or post-tax deductions, and hit calculate to see the full {state_name} breakdown with charts.",
            "To estimate your pay, type in your gross earnings, choose your payment schedule, select your filing status, add deductions like health insurance or a 401(k), and run the calculation for a detailed {state_name} take-home summary.",
            "Just follow the flow: fill in your wages, choose your pay frequency, select your W-4 details, enter your deductions, and press calculate. The tool instantly maps out your {state_name} paycheck line by line.",
            "Start by entering your earnings and pay frequency, then add your filing status and any benefit contributions. One click later, you will have a clear {state_name} net-pay breakdown ready to compare or budget against.",
            "It takes under a minute: input gross pay, set the pay period, choose Single or Married, list your deductions, and calculate. The result shows your {state_name} federal, FICA, and state withholding alongside your take-home.",
            "Enter your salary, select weekly or bi-weekly, choose your filing status, and add deductions, then calculate. The tool handles the {state_name} and federal math and presents the numbers in a readable, itemized format.",
            "Type your wage into the earnings field, pick your frequency, set your W-4, and include any pre-tax or post-tax items. Click calculate and the {state_name} paycheck calculator does the rest, instantly and privately.",
            "Working it is intuitive: provide your pay and schedule, choose your filing status, enter deductions, and run it. Within seconds you will see how your {state_name} gross pay becomes net pay, deduction by deduction.",
            "Add your gross earnings, choose how often you are paid, select your filing status, and key in your benefits. Hit calculate to reveal your {state_name} take-home pay, complete with a visual breakdown of every withholding.",
            "The steps are quick: enter wages, set pay frequency, select W-4 status, add deductions, and calculate. Whether you earn hourly in {city1} or a salary elsewhere in {state_name}, the tool adapts the math to your inputs.",
            "Pop in your salary or hourly rate, choose your pay period, pick your filing status, and list deductions, then calculate. The {state_name} results appear immediately, so you can tweak inputs and watch your net pay update.",
            "Simply enter your earnings, select your pay schedule and filing status, add any deductions from your stub, and click calculate. The calculator returns a tidy {state_name} summary of taxes, FICA, and your final take-home.",
            "To run it, fill in gross pay, choose frequency, set your W-4, and enter pre-tax and post-tax deductions. One calculation later, your {state_name} paycheck is broken into clear, labelled line items.",
            "Begin with your wage and pay frequency, choose your filing status, and add your benefit contributions. Press calculate and the tool shows your {state_name} net pay plus every federal, FICA, and state deduction behind it.",
            "It is a three-part process: enter earnings and frequency, set filing status and W-4 details, then add deductions and calculate. The {state_name} breakdown that follows is detailed enough to plan a real budget around.",
            "Enter your numbers, choose your pay period and filing status, list your deductions, and calculate, that is it. The {state_name} paycheck calculator instantly translates your gross pay into the take-home figure you actually keep."
        ],
        'example' => [
            "Picture a worker in {city1} earning a gross salary of \$85,000 a year, paid bi-weekly, filing as Single, and putting 6% into a traditional 401(k). The table below shows how {state_name}'s rules shape their real take-home pay.",
            "Let's walk through a realistic case: someone in {state_name} earns \$85,000 annually, is paid every two weeks, files Single, and contributes 6% pre-tax to retirement. Here is how the deductions stack up for them.",
            "Consider an employee living in {city1} on an \$85,000 salary, paid bi-weekly with a 6% traditional 401(k) deferral and a Single filing status. The breakdown below reflects {state_name}'s specific tax treatment.",
            "To make it concrete, imagine a {state_name} worker earning \$85,000 a year. They file as Single, are paid bi-weekly, and route 6% of pay into a pre-tax 401(k). The figures below trace their journey from gross to net.",
            "Here is a worked example for {state_name}: a \$85,000 salary, Single filer, bi-weekly pay, 6% pre-tax retirement contribution. Watch how federal tax, FICA, and the state portion combine to set the take-home figure.",
            "Take a typical case in {city1}: \$85,000 gross, paid bi-weekly, filing Single, with a 6% traditional 401(k). The table lays out each deduction so you can see exactly how {state_name} affects the bottom line.",
            "Suppose an employee in {state_name} pulls in \$85,000 per year, files as Single, gets paid every two weeks, and contributes 6% pre-tax. The numbers below show how much survives to net pay after all withholding.",
            "Let's model a real scenario: a single filer in {state_name} earning \$85,000 annually, paid bi-weekly, deferring 6% to a 401(k). The breakdown demonstrates how the state's rate, or lack of one, changes the result.",
            "Imagine someone in {city2} earning \$85,000 a year on a bi-weekly schedule, filing Single, with a 6% pre-tax 401(k) contribution. Their {state_name} paycheck breaks down as shown in the table below.",
            "For illustration, a {state_name} employee earns \$85,000, files as Single, is paid bi-weekly, and sets aside 6% pre-tax. The figures that follow reveal the gap between that gross salary and actual take-home pay.",
            "Here is how it plays out: a worker in {state_name} on \$85,000, Single, bi-weekly pay, 6% traditional 401(k). The table converts that salary into a per-period net figure using current federal and state rules.",
            "Consider a practical {state_name} example, \$85,000 salary, paid every two weeks, Single filing status, 6% pre-tax retirement. The deduction table shows precisely where the money goes before it reaches the bank.",
            "Let's run the math for a {city1} resident: \$85,000 annual salary, bi-weekly checks, Single filer, 6% into a pre-tax 401(k). The result below reflects how {state_name} taxes (or doesn't tax) that income.",
            "Take an \$85,000 earner in {state_name}, filing Single, paid bi-weekly, contributing 6% pre-tax. The example table walks through gross pay, each deduction, and the net pay that lands on their stub.",
            "As a sample, picture a single filer in {state_name} making \$85,000 a year, paid bi-weekly, with a 6% traditional 401(k). The breakdown shows the combined effect of federal tax, FICA, and the state's treatment.",
            "Here's a down-to-earth example: someone in {city2} earns \$85,000, files Single, is paid every two weeks, and defers 6% pre-tax. Follow the table to see how {state_name} shapes their final take-home pay."
        ],
        'factors' => [
            "Your final net pay hinges on several moving parts: pre-tax benefits lower your taxable income, your filing status sets your bracket thresholds, {state_name}'s own rules apply ({state_tax_para}), and FICA caps out at its annual limit.",
            "A handful of variables decide your take-home. Pre-tax deductions reduce taxable income, your W-4 filing status controls withholding, {state_name} adds its layer ({state_tax_para}), and Social Security stops once you hit the wage cap.",
            "Several things shift your paycheck: traditional 401(k) or health premiums (which cut taxable income), filing status (Single versus Married), {state_name}'s tax treatment ({state_tax_para}), and the annual Social Security wage limit.",
            "Net pay is sensitive to your choices and your location. Benefit elections trim taxable income, filing status moves your brackets, and {state_name} applies its rules ({state_tax_para}), all on top of fixed FICA percentages.",
            "Watch these factors closely: pre-tax contributions, filing status, local taxes, and {state_name}'s state rate ({state_tax_para}). Each one nudges the final figure, which is why two people on the same salary can net different amounts.",
            "The result depends on more than salary. Your pre-tax benefits, your W-4 status, any local {state_name} tax, and the state's income-tax stance ({state_tax_para}) all combine with federal and FICA withholding to set your net.",
            "Key drivers include pre-tax deductions that shrink taxable income, the filing status that determines your rates, {state_name}'s rules ({state_tax_para}), and the Social Security cap that frees up income later in the year.",
            "Your take-home moves with several inputs: how much you defer pre-tax, whether you file Single or jointly, where in {state_name} you live, and the state's tax approach ({state_tax_para}), layered over federal and FICA math.",
            "Several elements shape the outcome: benefit contributions reduce what is taxed, filing status sets bracket cutoffs, {state_name} applies its treatment ({state_tax_para}), and high earners eventually clear the Social Security wage base.",
            "Factors that matter most are pre-tax benefits, filing status, local {state_name} taxes, and the state rate itself ({state_tax_para}). Adjust any of them and your net pay changes, sometimes by more than people expect.",
            "Your paycheck reflects a mix of federal, FICA, and {state_name} rules ({state_tax_para}), plus your personal choices, filing status, pre-tax deferrals, and benefit elections, each of which can raise or lower the final number.",
            "The big levers are pre-tax deductions (lower taxable income), filing status (sets your bracket), and {state_name}'s tax treatment ({state_tax_para}). FICA stays constant until Social Security hits its annual ceiling.",
            "Take-home depends on what you defer, how you file, and where you work. In {state_name}, the state rule ({state_tax_para}) joins federal brackets and FICA to determine how much of your gross pay you ultimately keep.",
            "Among the factors at play: pre-tax retirement and health contributions, your chosen filing status, any city or county tax in {state_name}, and the state income-tax rule itself ({state_tax_para}), all stacked with federal withholding.",
            "Several inputs steer your net: benefits that reduce taxable income, the filing status that fixes your rates, the Social Security cap, and {state_name}'s specific treatment ({state_tax_para}) of wage income.",
            "Your results respond to four main things, pre-tax deductions, filing status, local taxes, and {state_name}'s rate ({state_tax_para}), working alongside federal income tax and the flat 7.65% FICA on your gross pay."
        ],
        'benefits' => [
            "This calculator gives you precise estimates from current tax tables, lets you compare different retirement-contribution scenarios, and protects your privacy by running every calculation locally in your browser, no {state_name} data leaves your device.",
            "Why use it? It delivers accurate tax math based on the latest guidelines, lets you trial W-4 changes before submitting them to HR, and keeps your information private, with no storage or tracking of your {state_name} figures.",
            "Built for accuracy, flexibility, and privacy, the tool lets you model W-4 tweaks, estimate the effect of benefit changes, and pin down your exact {state_name} take-home, all without sharing a single personal detail.",
            "The benefits are practical: reliable estimates, instant what-if scenarios, and total privacy. Test a higher 401(k), a new filing status, or a move within {state_name}, and see the impact immediately and confidentially.",
            "Among its advantages: it uses up-to-date federal and {state_name} rules, it recalculates instantly as you change inputs, and it never asks for identifying information, your numbers stay on your screen.",
            "You get accuracy you can trust, the freedom to compare scenarios side by side, and peace of mind on privacy. For {state_name} workers, that means smarter decisions about pay, benefits, and withholding.",
            "The tool's strengths are speed, precision, and discretion. Run unlimited {state_name} calculations, compare pre-tax versus Roth contributions, and never worry about your financial details being saved or sold.",
            "Key benefits include current-year tax accuracy, flexible scenario testing, and a privacy-first design. Whether you are in {city1} or anywhere in {state_name}, you can plan confidently without exposing personal data.",
            "It pays off in three ways: dependable estimates, easy comparisons, and complete privacy. Adjust your {state_name} inputs as often as you like and the calculator keeps every figure on your device.",
            "Expect precise results, instant recalculation, and zero data collection. That combination makes this {state_name} paycheck calculator a safe, practical tool for everyday budgeting and big financial decisions alike.",
            "The advantages stack up quickly: accurate withholding math, the ability to test W-4 and benefit changes, and a privacy model that keeps your {state_name} salary details to yourself, no sign-up, no tracking.",
            "Using it, you gain clarity and control. See the exact effect of a raise, a benefit change, or a move within {region}, and do it all privately, since the calculator processes your numbers without saving them.",
            "This calculator is fast, accurate, and private by design. It applies the latest {state_name} and federal rules, lets you compare scenarios in seconds, and never stores the personal figures you enter.",
            "The payoff is better decisions with less hassle. Reliable {state_name} estimates, unlimited scenario testing, and ironclad privacy mean you can plan your finances without spreadsheets or second-guessing.",
            "Benefits include precision from current tax data, the flexibility to model many situations, and a strict privacy stance. For anyone earning in {state_name}, that is a dependable foundation for financial planning.",
            "You get a tool that is accurate to the current year, flexible enough for any what-if, and private enough to trust. Those three qualities make estimating your {state_name} take-home both easy and safe."
        ],
        'mistakes' => [
            "A common slip is mixing up pre-tax and post-tax deductions. Logging a Roth contribution as pre-tax will understate your tax, so double-check which is which, and confirm your filing status and any local {state_name} tax too.",
            "Watch out for the usual traps: choosing the wrong filing status or dropping post-tax items into the pre-tax field. Either mistake skews your taxable income and throws off your {state_name} take-home estimate.",
            "To stay accurate, don't misclassify deductions (a Roth account is post-tax, not pre-tax) and don't forget local {state_name} county or city taxes if they apply where you live, they quietly change the result.",
            "The biggest errors are entering the wrong pay frequency and misplacing deductions. In {state_name}, frequency drives the bracket math, so a weekly figure entered as monthly will badly distort your net pay.",
            "People often overlook local taxes or pick the wrong filing status. Both matter in {state_name}: confirm your status matches your W-4, and add any city or county tax so the estimate reflects every withholding line.",
            "A frequent mistake is forgetting that pre-tax benefits lower taxable income while post-tax ones do not. Entering them in the wrong field changes your {state_name} tax, so map each deduction to the correct bucket.",
            "Avoid double-counting deductions and selecting an incorrect filing status. These small input errors are the top reason a {state_name} estimate drifts from the real stub, so review your entries before trusting the number.",
            "Many users skip local {state_name} taxes or misenter their 401(k) type. Remember: traditional contributions are pre-tax, Roth contributions are post-tax, and the distinction directly affects your withholding.",
            "Common pitfalls include the wrong pay frequency, an incorrect filing status, and misclassified deductions. Each one quietly shifts your {state_name} result, so it is worth a quick check of all three before you rely on it.",
            "Don't assume every deduction lowers your taxes. In {state_name}, only pre-tax items reduce taxable income; logging a post-tax deduction as pre-tax will make your estimate too optimistic.",
            "A typical error is ignoring local income tax where it applies in {state_name}. Cities and counties can add their own withholding, and leaving it out makes your take-home estimate higher than your real check.",
            "Be careful not to overstate deductions or pick a filing status that doesn't match your W-4. Both inflate or deflate your {state_name} net pay, so accuracy on these inputs is what makes the estimate trustworthy.",
            "The mistakes that bite hardest are simple: wrong frequency, wrong filing status, and deductions in the wrong field. Get those right and your {state_name} estimate will track your actual paycheck closely.",
            "Users sometimes forget the Social Security wage cap or the extra Medicare tax on high earnings. While these affect fewer people, in {state_name} they still matter once your income climbs past the thresholds.",
            "A classic oversight is entering gross pay but skipping pre-tax benefits. Those benefits lower your {state_name} and federal taxable income, so omitting them makes the tool overstate your withholding and understate your net.",
            "To avoid surprises, verify three things: your pay frequency, your filing status, and whether your deductions are pre-tax or post-tax. Nail those and your {state_name} paycheck estimate will be reliably close to reality."
        ],
        'usecases' => [
            "This tool is ideal if you are relocating to {state_name} and want to compare cost-of-living differences, starting a new job and planning a budget, or checking whether your current W-4 withholding needs a tweak.",
            "Real-world uses include sizing up a job offer in {city1}, testing W-4 changes to right-size your refund, and estimating how a different retirement-contribution rate would reshape your {state_name} take-home pay.",
            "Reach for it when planning a move to {state_name}, weighing a new salary, adjusting withholding to avoid owing in April, or figuring out the financial impact of picking up overtime hours.",
            "Use cases range from everyday budgeting to big decisions: comparing offers in {city1} and {city2}, planning for a bonus, or deciding whether a {state_name} relocation actually leaves you better off after taxes.",
            "It shines when you are negotiating pay, planning a household budget in {state_name}, or modelling how a raise translates to real take-home, so you celebrate the part you actually keep, not just the headline.",
            "Common scenarios include checking take-home before signing a lease in {city1}, fine-tuning your W-4 mid-year, and comparing the after-tax value of two {state_name} jobs with different salaries and benefits.",
            "Whether you are a new hire, a job switcher, or just budget-conscious, the calculator helps: estimate net pay, test benefit changes, and see how {state_name} taxes affect each scenario before you commit.",
            "Put it to work when evaluating overtime, planning savings goals, or deciding between a traditional and Roth 401(k), each choice has a different effect on your {state_name} paycheck, and this tool reveals it.",
            "Use it to plan a move within {region}, compare a promotion's real value, or set a realistic monthly budget. For {state_name} workers, it turns abstract salary figures into concrete spending power.",
            "Typical uses: confirming your withholding is on track, modelling a side-gig's tax impact, and comparing how the same salary nets out in {state_name} versus a neighbouring state with different rules.",
            "It is handy for lease and mortgage planning in {city1}, for testing how a bigger HSA or 401(k) changes your check, and for sanity-checking an offer letter before you accept a {state_name} role.",
            "Lean on it when life changes, new job, raise, marriage, or a move to {state_name}, since each event shifts your take-home pay, and seeing the new number early keeps your budget honest.",
            "Practical applications include comparing {state_name} offers, planning around a bonus, adjusting your W-4 for a target refund, and estimating the paycheck impact of dropping or adding a pre-tax benefit.",
            "Use the calculator to decide if a higher-paying job in {city2} is truly better after taxes, to plan contributions before open enrollment, or to budget confidently around your real {state_name} net pay.",
            "From first jobs to career moves, it helps you answer the money questions that matter in {state_name}: what will I net, how does this benefit change my check, and can I afford this next step?",
            "Whether you are budgeting in {city1}, comparing offers across {state_name}, or planning a major purchase, this calculator gives you the after-tax figure those decisions should be built on."
        ],
        'conclusion' => [
            "At the end of the day, your take-home pay is the number your real life runs on, not the salary on the offer letter. Bookmark this {state_name} calculator and revisit it whenever your pay, benefits, or W-4 change, a two-minute check today beats a tax-time surprise.",
            "Knowing your real {state_name} take-home turns money stress into a plan. Run the numbers before you sign a lease in {city1}, accept a raise, or bump your 401(k), and you will always know what you can comfortably afford.",
            "Paychecks shouldn't feel like a black box. Now that you can see every deduction in your {state_name} pay, you are back in control, adjust your withholding, test a higher contribution, or simply budget with confidence.",
            "The smartest money move is also the simplest: know your real number. Use this {state_name} calculator whenever life shifts, share it with a friend who just got hired, and lean on the breakdown to fine-tune your W-4.",
            "Your {state_name} salary and your spending money were never the same thing, and now you can prove it to the dollar. Keep this tool handy, re-run it after any change, and let the honest figure guide your budget.",
            "When you understand where every dollar goes, payday stops being a guessing game. Use this {state_name} paycheck calculator as your go-to before big decisions, and budget around what you keep rather than what you are promised.",
            "Whether you live in {city1} or anywhere across {state_name}, the lesson is the same: plan from take-home, not gross. Bookmark this calculator, revisit it often, and let real numbers, not hopeful ones, shape your finances.",
            "A clear paycheck is a powerful thing. With your {state_name} deductions laid bare, you can right-size your withholding, weigh benefit changes, and walk into salary talks knowing exactly what an offer is worth after tax.",
            "Money decisions get easier when they start from reality. Use this {state_name} calculator to anchor your budget, test changes before they happen, and avoid the all-too-common shock of a smaller-than-expected deposit.",
            "Come back to this tool any time your situation shifts, a raise, a move within {region}, a new benefit. Each change moves your {state_name} take-home, and a quick recalculation keeps your plan, and your peace of mind, intact.",
            "The bottom line: your net pay is the foundation everything else sits on. Now that you can see it clearly for {state_name}, build your rent, savings, and goals on that solid number instead of a salary that overpromises.",
            "Understanding your {state_name} paycheck is a small skill with a big payoff. Keep this calculator bookmarked, run it whenever money decisions loom, and let the breakdown turn uncertainty into a confident, well-planned budget.",
            "You started wondering where your money goes; now you know. Use this {state_name} tool to stay ahead of every change, fine-tune your W-4 toward the refund you want, and spend with the clarity that real numbers bring.",
            "There is real freedom in seeing your true take-home. For workers in {city1}, {city2}, and beyond, this {state_name} calculator replaces guesswork with facts, so every financial choice you make rests on solid ground.",
            "Treat your take-home pay as the headline number it deserves to be. Bookmark this {state_name} calculator, revisit it after raises and benefit changes, and you will never again be surprised by what actually lands in your account.",
            "In the end, the goal is simple: spend and save from what you keep, not what you earn on paper. This {state_name} paycheck calculator hands you that honest figure in seconds, come back whenever your numbers change."
        ]
    ];
}


/**
 * Builds the full V6 Paycheck article for a given state.
 * Produces ~1,200-1,500 words with a live, per-state worked example,
 * per-state .gov links, and neighbour-state internal links.
 */
function usc_paycheck_article_v6($state) {
    $name = $state['name'];
    $desc = $state['tax_desc'];
    $type = $state['tax_type'];
    $abbr = $state['abbr'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $city1 = $x['cities'][0];
    $city2 = isset($x['cities'][1]) ? $x['cities'][1] : $x['cities'][0];

    // State-tax explanatory paragraph (kept accurate per tax type).
    // Short, parenthetical-friendly state-tax clause for the "factors" section,
    // with 2 phrasings per tax type selected deterministically per state.
    if ($type === 'none') {
        $stp = [$name . ' levies no state income tax on wages', 'there is no ' . $name . ' state wage tax to withhold'];
    } elseif ($type === 'flat') {
        $stp = [$name . ' uses a ' . $desc, $name . '\'s ' . $desc . ' applies to all taxable wages'];
    } else {
        $stp = [$name . ' uses ' . $desc, $name . ' applies ' . $desc . ' across its brackets'];
    }
    $state_tax_para = $stp[usc_get_variation_index($state_slug, 'stp', count($stp))];

    if ($type === 'none') {
        $desc_sentence = $name . ' charges no state income tax on wages, so only federal tax and FICA come out of your check.';
    } elseif ($type === 'flat') {
        $desc_sentence = $name . ' applies a ' . $desc . ' to your taxable state wages.';
    } else {
        $desc_sentence = $name . ' uses ' . $desc . ' across its income brackets.';
    }

    $replacements = [
        'state_name'     => $name,
        'state_tax_para' => $state_tax_para,
        'abbr'           => $abbr,
        'city1'          => $city1,
        'city2'          => $city2,
        'region'         => $x['region'],
    ];

    $pool = usc_paycheck_variations_v6();
    $ex   = usc_paycheck_example($state, 85000);

    // State-tax row of the example table reflects the per-state estimate.
    if ($ex['has_state_tax']) {
        $state_row = '<tr style="border-bottom: 1px solid #e5e7eb;">
            <td style="padding: 12px; color: #4b5563;">' . esc_html($name) . ' State Income Tax (approx. ' . number_format($ex['eff_state'], 1) . '% effective)</td>
            <td style="padding: 12px; text-align: right; color: #b91c1c;">-' . usc_money($ex['state_period']) . '</td>
        </tr>';
    } else {
        $state_row = '<tr style="border-bottom: 1px solid #e5e7eb; background-color:#f0fdf4;">
            <td style="padding: 12px; color: #15803d;">' . esc_html($name) . ' State Income Tax (no state wage tax)</td>
            <td style="padding: 12px; text-align: right; color: #15803d;">$0.00</td>
        </tr>';
    }

    $sec = function($key) use ($state_slug, $pool, $replacements) {
        return usc_get_section_content($state_slug, $key, $pool, $replacements);
    };

    $html = '<h2>1. ' . usc_pv6_h($state_slug, 'intro', ['Introduction', 'Getting Started', 'Overview', 'Your ' . $name . ' Paycheck, Explained']) . '</h2>
<p>' . $sec('intro') . '</p>

<h2>2. ' . usc_pv6_h($state_slug, 'whatis', ['What is a ' . $name . ' Paycheck Calculator?', 'What This ' . $name . ' Calculator Does', 'Meet the ' . $name . ' Paycheck Calculator', 'What Exactly Is This Tool?']) . '</h2>
<p>' . $sec('whatis') . '</p>

<h2>3. ' . usc_pv6_h($state_slug, 'why', ['Why Use This Calculator?', 'Why This Tool Is Worth Your Time', 'Reasons to Run Your Numbers First', 'Why Bother Estimating Your Check?']) . '</h2>
<p>' . $sec('why') . '</p>
' . usc_pv6_list($state_slug, 'why', [
    '<strong>Prevent Tax Surprises:</strong> Estimating your withholding through the year keeps you from underpaying and facing an IRS penalty or a shock bill in April.',
    '<strong>Optimize Your W-4:</strong> Run what-if scenarios to see how filing status, dependent credits, or extra withholding change your ' . $name . ' take-home pay.',
    '<strong>Evaluate Job Offers:</strong> Compare offers in ' . $city1 . ' and beyond by their real net pay, not just the headline gross salary.',
    '<strong>Budget With Confidence:</strong> Get precise per-period cash flow to schedule rent, loans, and savings.',
    '<strong>See Deduction Impact:</strong> Watch how a bigger 401(k) or HSA contribution lowers your tax while reshaping your check.',
    '<strong>Plan a Move:</strong> Weigh a relocation within ' . $x['region'] . ' by comparing real after-tax pay, not just salary.',
    '<strong>Time a Raise or Bonus:</strong> See how much of a pay bump actually survives taxes before you mentally spend it.',
    '<strong>Avoid Withholding Drift:</strong> Catch an over- or under-withheld W-4 early, so each ' . $name . ' check lands where you expect.',
], 5) . '

<h2>4. ' . usc_pv6_h($state_slug, 'how', ['How Does the ' . $name . ' Paycheck Calculator Work?', 'How the ' . $name . ' Calculator Crunches Your Pay', 'What Happens Behind the Scenes', 'How Your Gross Pay Becomes Net Pay']) . '</h2>
<p>' . $sec('how') . '</p>
<ol>
    <li><strong>Gross Earnings:</strong> Computes your gross pay for the period from your salary or hourly rate and hours worked.</li>
    <li><strong>Pre-Tax Deductions:</strong> Subtracts traditional 401(k), health premiums, and HSA deposits to lower your taxable base.</li>
    <li><strong>Federal Withholding:</strong> Applies the progressive federal brackets based on your W-4 filing status.</li>
    <li><strong>FICA:</strong> Deducts 6.2% Social Security (up to the annual cap) and 1.45% Medicare, plus 0.9% extra Medicare above $200,000.</li>
    <li><strong>' . $name . ' State Tax:</strong> Applies the state\'s rules to your taxable state wages.</li>
    <li><strong>Local Tax:</strong> Adds any city, county, or school-district tax where applicable.</li>
    <li><strong>Post-Tax Deductions:</strong> Removes Roth contributions, union dues, or garnishments to reach net pay.</li>
</ol>

<h2>5. ' . usc_pv6_h($state_slug, 'inputs', ['Inputs Required', 'What You Will Need', 'Information to Have Ready', 'What to Enter']) . '</h2>
<p>' . $sec('inputs') . '</p>
' . usc_pv6_list($state_slug, 'inputs', [
    '<strong>Gross Pay / Hourly Rate:</strong> Your salary before taxes or your hourly wage, plus bonuses or commissions.',
    '<strong>Pay Frequency:</strong> Weekly, bi-weekly, semi-monthly, monthly, or annually, this sets the bracket math.',
    '<strong>Filing Status:</strong> Single, Married Filing Jointly, Married Filing Separately, or Head of Household.',
    '<strong>W-4 Settings:</strong> Dependent credits, other income, deductions, or extra withholding.',
    '<strong>Pre-Tax Deductions:</strong> 401(k)/403(b), health, dental, vision, or HSA/FSA.',
    '<strong>Post-Tax Deductions:</strong> Roth contributions, life insurance, union dues, or garnishments.',
    '<strong>State &amp; Local Details:</strong> Any ' . $name . ' local jurisdiction or county tax that applies.',
    '<strong>Dependents:</strong> The number of qualifying children or dependents claimed on your W-4.',
    '<strong>Additional Income:</strong> Side earnings or a second job you want reflected in withholding.',
], 7) . '

<h2>6. ' . usc_pv6_h($state_slug, 'formula', ['Formula Used', 'The Math Behind It', 'How the Numbers Are Calculated', 'The Net-Pay Equation']) . '</h2>
<p>' . $sec('formula') . '</p>
<pre style="background:#f4f4f5; padding:15px; border-radius:5px; overflow-x:auto;">Net Pay = Gross Pay - Pre-Tax Deductions - Federal Withholding - FICA - State Tax - Local Tax - Post-Tax Deductions</pre>
<p>Where:</p>
' . usc_pv6_list($state_slug, 'formuladefs', [
    '<strong>FICA</strong> = 6.2% Social Security (up to the annual wage base) + 1.45% Medicare.',
    '<strong>Federal Taxable Base</strong> = Gross Pay - Pre-Tax Deductions.',
    '<strong>State Taxable Base</strong> = Gross Pay - Pre-Tax Deductions - ' . $name . ' exemptions/allowances.',
], 3) . '

<h2>7. ' . usc_pv6_h($state_slug, 'howtouse', ['How to Use the Calculator', 'Step-by-Step Instructions', 'Using the Tool in 60 Seconds', 'How to Run Your Estimate']) . '</h2>
<p>' . $sec('howtouse') . '</p>
<ol>
    <li>Enter your gross wages or hourly rate in the earnings field.</li>
    <li>Select your pay frequency (for example, bi-weekly for 26 checks a year).</li>
    <li>Choose your W-4 version and filing status.</li>
    <li>Add any pre-tax or post-tax deductions from your stub.</li>
    <li>If you have ' . $name . ' local taxes, select your jurisdiction.</li>
    <li>Click Calculate to see your take-home breakdown with charts.</li>
</ol>

<h2>8. ' . usc_pv6_h($state_slug, 'example', ['Example Calculation for ' . $name, 'A Worked ' . $name . ' Example', 'See It in Action: ' . $name, $name . ' Take-Home: A Sample Run']) . '</h2>
<p>' . $sec('example') . '</p>
<table style="width:100%; border-collapse: collapse; margin-bottom: 25px; font-size:14px; border: 1px solid #e5e7eb;">
    <thead>
        <tr style="background-color: #f9fafb; border-bottom: 2px solid #e5e7eb;">
            <th style="padding: 12px; text-align: left; font-weight: 600; color: #374151;">Category / Description</th>
            <th style="padding: 12px; text-align: right; font-weight: 600; color: #374151;">Amount per Period</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <td style="padding: 12px; color: #4b5563;">Gross Pay per Period ($85,000 / 26)</td>
            <td style="padding: 12px; text-align: right; color: #111827;">' . usc_money($ex['gross_period']) . '</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <td style="padding: 12px; color: #4b5563;">Pre-Tax 401(k) Contribution (6%)</td>
            <td style="padding: 12px; text-align: right; color: #b91c1c;">-' . usc_money($ex['pretax_period']) . '</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <td style="padding: 12px; color: #4b5563;">Federal Income Tax Withheld</td>
            <td style="padding: 12px; text-align: right; color: #b91c1c;">-' . usc_money($ex['federal_period']) . '</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <td style="padding: 12px; color: #4b5563;">Social Security Tax (6.2%)</td>
            <td style="padding: 12px; text-align: right; color: #b91c1c;">-' . usc_money($ex['ss_period']) . '</td>
        </tr>
        <tr style="border-bottom: 1px solid #e5e7eb;">
            <td style="padding: 12px; color: #4b5563;">Medicare Tax (1.45%)</td>
            <td style="padding: 12px; text-align: right; color: #b91c1c;">-' . usc_money($ex['medicare_period']) . '</td>
        </tr>
        ' . $state_row . '
        <tr style="border-bottom: 1px solid #e5e7eb; background-color: #f0fdf4;">
            <td style="padding: 12px; font-weight: bold; color: #15803d;">Estimated Net Take-Home Pay (per check)</td>
            <td style="padding: 12px; text-align: right; font-weight: bold; color: #166534;">' . usc_money($ex['net_period']) . '</td>
        </tr>
    </tbody>
</table>
<p><em>That works out to roughly ' . usc_money($ex['net_year']) . ' a year in take-home pay on an $85,000 salary in ' . $name . '. These figures are estimates for illustration; your real check depends on your exact W-4, benefits, and any local taxes.</em></p>

<h2>9. ' . usc_pv6_h($state_slug, 'factors', ['Factors Affecting Results', 'What Changes Your Take-Home Pay', 'Variables That Move the Number', 'What Influences Your Net Pay']) . '</h2>
<p>' . $sec('factors') . '</p>

<h2>10. ' . usc_pv6_h($state_slug, 'benefits', ['Benefits of Using This Calculator', 'Why This Tool Helps', 'What You Gain From It', 'The Advantages at a Glance']) . '</h2>
<p>' . $sec('benefits') . '</p>

<h2>11. ' . usc_pv6_h($state_slug, 'mistakes', ['Common Mistakes to Avoid', 'Pitfalls That Skew Your Estimate', 'Errors People Often Make', 'What Throws Off the Numbers']) . '</h2>
<p>' . $sec('mistakes') . '</p>

<h2>12. ' . usc_pv6_h($state_slug, 'usecases', ['Practical Use Cases', 'Real-World Scenarios', 'When to Reach for This Tool', 'Everyday Uses']) . '</h2>
<p>' . $sec('usecases') . '</p>

<h2>13. ' . usc_pv6_h($state_slug, 'keynums', ['Key ' . $name . ' Paycheck Numbers for {tax_year}', '{tax_year} Tax Figures That Affect Your ' . $name . ' Check', 'The {tax_year} Numbers Behind Your Estimate', $name . ' Paycheck: {tax_year} Rates at a Glance']) . '</h2>
<p>Tax figures refresh every year, so here are the federal numbers baked into your {tax_year} estimate, alongside ' . $name . '\'s own rules:</p>
' . usc_pv6_list($state_slug, 'keynums', [
    '<strong>Social Security (OASDI):</strong> 6.2% on wages up to the {tax_year} wage base of <strong>$184,500</strong>.',
    '<strong>Medicare:</strong> 1.45% on every dollar, plus an extra <strong>0.9%</strong> above $200,000 (single) or $250,000 (married filing jointly).',
    '<strong>{tax_year} standard deduction:</strong> about <strong>$16,100</strong> (single), <strong>$32,200</strong> (married filing jointly), and <strong>$24,150</strong> (head of household).',
    '<strong>' . $name . ' state tax:</strong> ' . $desc_sentence,
], 4) . '

<h2>14. ' . usc_pv6_h($state_slug, 'conclusion', ['Final Thoughts', 'The Bottom Line', 'Wrapping Up', 'Key Takeaways']) . '</h2>
<p>' . $sec('conclusion') . '</p>

<h2>15. Related ' . $name . ' Calculators</h2>
<p>Planning a move, a divorce settlement, or a home purchase in ' . $name . '? These free tools run the same way:</p>
' . usc_get_related_links_html($state_slug, $name, 'paycheck') . '

<h2>16. Paycheck Calculators in Nearby States</h2>
<p>Comparing offers across ' . $x['region'] . '? See how take-home pay changes just over the ' . $name . ' border:</p>
' . (function() use ($state_slug) { $h = usc_neighbour_links_html($state_slug, 'paycheck', 'Paycheck Calculator'); return $h ?: '<p>Explore paycheck calculators for every U.S. state from the menu above.</p>'; })() . '

<h2>17. Helpful Official Resources</h2>
<p>Want to double-check the numbers? Go straight to the source:</p>
' . usc_paycheck_authority_links_html($name, $state_slug) . '
<!-- usc-v5-article -->
<!-- usc-paycheck-v6 -->';

    $html = str_replace('{tax_year}', (function_exists('usac_get_active_tax_year') ? usac_get_active_tax_year() : '2026'), $html);
    return $html;
}

/**
 * V6 FAQ pool for Paycheck (state-aware). Selects 12 deterministically.
 */
function usc_paycheck_faqs_v6($state) {
    $name = $state['name'];
    $desc = $state['tax_desc'];
    $type = $state['tax_type'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);

    $city1 = $x['cities'][0];
    $rev   = $x['rev_name'];

    // Deterministic answer-variation picker: each FAQ has several phrasings,
    // and the state's slug selects which one it sees (so FAQs differ per page).
    $pick = function($qkey, $arr) use ($state_slug) {
        return $arr[usc_get_variation_index($state_slug, 'faqa_' . $qkey, count($arr))];
    };

    // State-income-tax answer: 3 phrasings per tax type.
    if ($type === 'none') {
        $stax = [
            'No, ' . $name . ' does not tax wage income at the state level. Your check only reflects federal tax, FICA, and any local city or county tax, which is why take-home pay tends to run higher here.',
            'There is no ' . $name . ' state income tax on wages. That leaves federal withholding and FICA as your main deductions, plus any local tax that applies where you live.',
            $name . ' is one of the no-income-tax states, so nothing is withheld for state wage tax. You will still see federal tax and the 6.2% and 1.45% FICA lines on your stub.',
        ];
    } elseif ($type === 'flat') {
        $stax = [
            'Yes. ' . $name . ' applies a flat income tax, a ' . $desc . ', to your taxable state wages, no matter how much you earn.',
            'Yes, ' . $name . ' uses a single flat rate (' . $desc . '). Because it does not change with income, your state-tax line is easy to predict each pay period.',
            'It does. ' . $name . ' charges a flat ' . $desc . ' on taxable wages, so everyone pays the same percentage to the state regardless of salary.',
        ];
    } else {
        $stax = [
            'Yes. ' . $name . ' runs a progressive income tax (' . $desc . '), so higher slices of your income are taxed at higher rates.',
            'Yes, ' . $name . ' uses graduated brackets noted as ' . $desc . '. Only the income that falls in each bracket is taxed at that bracket\'s rate.',
            $name . ' does tax wages on a progressive scale (' . $desc . '), meaning your effective rate rises gradually as your earnings climb.',
        ];
    }

    $faq_pool = [
        ['q' => 'Is this ' . $name . ' paycheck calculator free to use?', 'a' => $pick('free', [
            'Yes, it is completely free. Run as many salary or hourly calculations as you like, compare pay frequencies, and estimate deductions, with no fee and no sign-up.',
            'It is 100% free with no registration. Calculate take-home pay for any ' . $name . ' salary or wage as often as you need.',
            'Absolutely free. There is no account, no paywall, and no limit on how many ' . $name . ' paycheck estimates you can run.',
        ])],
        ['q' => 'Does ' . $name . ' have a state income tax?', 'a' => $stax[usc_get_variation_index($state_slug, 'faqa_stax', count($stax))]],
        ['q' => 'What is FICA, and how is it figured on my ' . $name . ' pay stub?', 'a' => $pick('fica', [
            'FICA is two taxes: 6.2% for Social Security (on wages up to the {tax_year} base of $184,500) and 1.45% for Medicare with no cap. Your employer quietly matches both.',
            'It stands for the Federal Insurance Contributions Act, 6.2% Social Security plus 1.45% Medicare. High earners also pay an extra 0.9% Medicare above $200,000 (single) or $250,000 (married).',
            'FICA bundles Social Security (6.2%, capped at the $184,500 wage base in {tax_year}) and Medicare (1.45%, uncapped). Together that is 7.65% of your gross, matched by your employer.',
        ])],
        ['q' => 'How does a pre-tax deduction lower my tax in ' . $name . '?', 'a' => $pick('pretax', [
            'Pre-tax items, a traditional 401(k), HSA, FSA, or medical premiums, come out before income tax is figured, shrinking the income that federal and ' . $name . ' tax apply to.',
            'They reduce your taxable income. Because the deduction happens before tax is calculated, every pre-tax dollar trims both your federal and ' . $name . ' state tax.',
            'A pre-tax contribution lowers the base your taxes are calculated on, so you keep more today, though the money is taxed later when withdrawn (for retirement accounts).',
        ])],
        ['q' => 'What is the difference between gross pay and net pay?', 'a' => $pick('grossnet', [
            'Gross pay is everything you earn before deductions; net pay is what is left, and what reaches your bank, after taxes, FICA, and benefits come out.',
            'Gross is the headline number on your offer letter. Net, or take-home, is the smaller figure after withholding and deductions that you actually spend.',
            'Think of gross as the total and net as the remainder. The gap between them is filled by federal tax, FICA, ' . $name . ' tax, and your benefit deductions.',
        ])],
        ['q' => 'How does the calculator handle local taxes in ' . $name . '?', 'a' => $pick('local', [
            'It offers a local-jurisdiction option. If your city or county levies its own tax, select it so the estimate applies the right localized withholding.',
            'Where ' . $name . ' localities charge income tax, you can pick your jurisdiction and the tool folds that rate into your result.',
            'Local taxes are supported through a dropdown, useful in the parts of ' . $name . ' where a city, county, or school district adds its own withholding.',
        ])],
        ['q' => 'What changed between the pre-2020 and current W-4?', 'a' => $pick('w4', [
            'The old W-4 used allowances; the 2020-and-later version dropped them for a five-step form covering income, multiple jobs, and dependents directly.',
            'Allowances are gone. The current W-4 asks about household income and dependents instead, which usually makes withholding more accurate.',
            'The modern W-4 replaced the allowance system with a clearer five-step process, so what you enter maps more directly to your real tax situation.',
        ])],
        ['q' => 'What is the {tax_year} federal standard deduction?', 'a' => $pick('stdded', [
            'For {tax_year} it is about $16,100 (single), $32,200 (married filing jointly), and $24,150 (head of household), and it is already built into your withholding.',
            'Roughly $16,100 for single filers and $32,200 for joint filers in {tax_year}. Most people take it rather than itemizing.',
            'The {tax_year} standard deduction is approximately $16,100 single / $32,200 joint / $24,150 head of household, the slice of income the IRS lets you earn tax-free.',
        ])],
        ['q' => 'How can I increase my take-home pay in ' . $name . '?', 'a' => $pick('increase', [
            'On your W-4 you can claim dependent credits or deductions to reduce withholding, just do not overdo it, or you may owe at tax time.',
            'Adjusting your W-4 (Steps 3 and 4b) lowers withholding and boosts each check, but aim for balance so you are not left with an April bill.',
            'Fewer dollars withheld means a bigger check now. Claim the credits you qualify for on your W-4, while keeping enough withheld to cover your actual tax.',
        ])],
        ['q' => 'Is the take-home figure here legally binding?', 'a' => $pick('binding', [
            'No, it is a careful estimate based on standard federal, ' . $name . ', and local rules. Your real check depends on your employer\'s exact payroll setup.',
            'It is for planning, not an official figure. Expect your actual ' . $name . ' stub to land very close, with small differences from specific benefit elections.',
            'No. Treat it as a high-accuracy estimate; the final word always comes from your employer\'s payroll and the relevant tax authorities.',
        ])],
        ['q' => 'What are post-tax deductions on a ' . $name . ' pay stub?', 'a' => $pick('posttax', [
            'Post-tax items, Roth 401(k) contributions, union dues, or voluntary savings, are taken after taxes, so they reduce net pay but not your taxable income.',
            'These come out of your pay after tax is calculated. Unlike pre-tax deductions, they do not lower what you owe the IRS or ' . $name . '.',
            'A post-tax deduction (like a Roth contribution) trims your take-home without changing your tax bill, since it is applied once taxes are already figured.',
        ])],
        ['q' => 'How are overtime wages taxed in ' . $name . '?', 'a' => $pick('ot', [
            'Overtime is taxed at the same rates as regular pay, but a bigger check can be withheld at a higher marginal rate for that period; it settles up when you file.',
            'There is no special overtime tax. The extra earnings may push that one check into higher withholding, which evens out on your annual return.',
            'Overtime dollars face the same brackets as normal wages. Temporary over-withholding on a large check is corrected when you file your ' . $name . ' and federal taxes.',
        ])],
        ['q' => 'What is the extra Medicare tax for high earners?', 'a' => $pick('addmed', [
            'An additional 0.9% Medicare tax applies to wages above $200,000 (single) or $250,000 (married filing jointly), withheld once your year-to-date pay crosses the line.',
            'High earners pay 0.9% more in Medicare beyond $200,000 single / $250,000 joint. Employers start withholding it automatically at that point.',
            'Above $200,000 (or $250,000 married), an extra 0.9% Medicare surtax kicks in on the wages over the threshold.',
        ])],
        ['q' => 'Traditional vs. Roth 401(k), which helps my ' . $name . ' check today?', 'a' => $pick('trad', [
            'Traditional contributions are pre-tax, so they cut today\'s withholding. Roth contributions are post-tax, no break now, but tax-free withdrawals later.',
            'For a bigger paycheck today, traditional wins because it lowers taxable income. Roth costs more now but pays off tax-free in retirement.',
            'Traditional 401(k) money reduces your current ' . $name . ' and federal tax; Roth does not, but its growth and withdrawals come out untaxed down the road.',
        ])],
        ['q' => 'My estimate is lower than my real check, why?', 'a' => $pick('lower', [
            'Usually it is a double-entered deduction or the wrong pay frequency. Confirm your filing status matches your W-4 and that no extra local tax was applied.',
            'Check for deductions entered twice, an incorrect pay frequency, or a local tax that does not apply to you, any of these can drag the estimate below your real pay.',
            'The common causes are a mismatched filing status, the wrong number of pay periods, or a misplaced deduction. Re-check those inputs and the gap usually closes.',
        ])],
        ['q' => 'Where can I verify ' . $name . ' withholding rules officially?', 'a' => $pick('verify', [
            'The ' . $rev . ' publishes the official ' . $name . ' tables, forms, and deadlines. For federal questions, use the IRS Tax Withholding Estimator.',
            'Go straight to the ' . $rev . ' for state rules, and to the IRS for federal withholding guidance, both are linked in the resources section above.',
            'Official ' . $name . ' figures come from the ' . $rev . '; the IRS handles federal brackets and the withholding estimator.',
        ])],
        ['q' => 'Is take-home pay different in ' . $city1 . ' than the rest of ' . $name . '?', 'a' => $pick('city', [
            'Federal tax and FICA are identical statewide. Any difference in ' . $city1 . ' usually comes from a local city or county tax, so set your jurisdiction for accuracy.',
            'Mostly no, the big deductions are the same across ' . $name . '. Local taxes are the exception, and where they apply (such as ' . $city1 . '), the calculator can include them.',
            'Your federal and FICA withholding does not change by city. Only local ' . $name . ' taxes can make ' . $city1 . ' differ, so select the right locality.',
        ])],
        ['q' => 'Does it work for both hourly and salaried ' . $name . ' jobs?', 'a' => $pick('hourly', [
            'Yes. Enter a salary or an hourly rate with hours worked; the tool annualizes either, applies the rules, and reports net pay per period.',
            'Both are supported. Hourly workers add their rate and hours, salaried workers enter the annual figure, and ' . $name . ' and federal rules do the rest.',
            'It handles either pay structure. Whether you are paid by the hour or on salary, the calculator converts it to a per-period ' . $name . ' take-home figure.',
        ])],
        ['q' => 'How current are the tax numbers in this calculator?', 'a' => $pick('update', [
            'It uses {tax_year} federal brackets, the standard deduction, and the Social Security wage base, with ' . $name . ' rules applied as currently published.',
            'The federal figures are the {tax_year} values, reviewed each year, and the ' . $name . ' state treatment reflects the latest published rates.',
            'All federal inputs are set to {tax_year}, and ' . $name . ' state rules are kept current, so your estimate reflects today\'s law, not last year\'s.',
        ])],
        ['q' => 'Can I compare a ' . $name . ' job offer against another state?', 'a' => $pick('compare', [
            'Yes. Run the same salary here and on another state\'s calculator; because state rules differ, the net pay can vary even on an identical gross.',
            'Definitely, that is a great use. Compare ' . $name . ' take-home with a neighbouring state to see which offer actually leaves you with more.',
            'You can. Enter the offer here, then on the other state\'s page, the difference in net pay often reveals the better deal after taxes.',
        ])],
    ];

    $faqs = usc_get_deterministic_faqs($state_slug, $faq_pool, 12);
    $ty = function_exists('usac_get_active_tax_year') ? usac_get_active_tax_year() : '2026';
    foreach ($faqs as &$f) { $f['q'] = str_replace('{tax_year}', $ty, $f['q']); $f['a'] = str_replace('{tax_year}', $ty, $f['a']); }
    unset($f);
    return $faqs;
}
