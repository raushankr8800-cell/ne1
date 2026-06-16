<?php
/**
 * Child Support Calculator — V6 content engine.
 *
 * Same uniqueness approach as the Paycheck V6 engine:
 *  - 16 human-tone variations per section (13 sections)
 *  - Real per-state data woven in (custody model, cities, region, neighbours)
 *  - Model-aware worked example (Income Shares / Melson / Percentage of Income)
 *  - Varied headings + pooled/shuffled bullet lists
 *  - Per-state FAQ answers (3 phrasings each)
 *
 * Tokens: {state_name} {model} {model_text} {city1} {city2} {region}
 *
 * @package USA_State_All_Calculators
 */

if (!defined('ABSPATH')) exit;

/** Heading picker (reuses paycheck helper if present). */
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

/** Returns the Child Support text variations (16 per section). */
function usc_cs_variations_v6() {
    return array_merge(usc_csv6_a(), usc_csv6_b(), usc_csv6_c());
}

/** Variation set A: intro, whatis */
function usc_csv6_a() {
    return [
        'intro' => [
            "Few topics carry as much emotion as child support, and the not-knowing is often the hardest part. If you are separating or already co-parenting in {state_name}, this calculator gives you a clear, judgment-free estimate of the monthly number, so you can plan instead of worry. It follows {state_name}'s official guidelines, not guesswork.",
            "When a family splits up, the kids should feel it the least, and that is exactly what child support is meant to protect. In {state_name}, the amount is not pulled out of thin air; it follows a state formula based on income and parenting time. This tool walks through that math in plain language so there are no surprises.",
            "Trying to work out child support on your own can feel overwhelming when emotions and legal jargon get tangled together. The good news is that {state_name} uses a structured formula, and this calculator turns it into a simple, honest estimate you can use for budgeting, mediation, or peace of mind.",
            "Whether you are heading into mediation, preparing for court, or simply trying to understand what to expect, knowing your likely number changes everything. In {state_name}, support follows clear guidelines, and this calculator gives you a realistic monthly estimate in under a minute.",
            "Money is one of the biggest stress points when parents split, and child support sits right at the centre of it. This {state_name} calculator removes the mystery by applying the state's own rules to your numbers, giving both parents a fair starting point for the conversation.",
            "If you are a parent in {city1} or anywhere in {state_name} facing a separation, you probably have one urgent question: how much will child support be? Rather than lose sleep guessing, enter your details here and get a guideline-based estimate you can actually plan around.",
            "Child support is really about keeping a child's life steady when the adults' lives change. {state_name} uses a defined formula to work out each parent's share, and this tool makes that formula approachable, no spreadsheets, no legalese, just a clear monthly figure.",
            "Co-parenting works best when both households know what to expect financially. This {state_name} child support calculator gives you a realistic estimate based on incomes and parenting time, so you can budget two homes and negotiate from facts, not fear.",
            "The fear of the unknown is what makes child support so stressful. Put real numbers on the table: this {state_name} calculator applies the state's {model} to your incomes and custody schedule, turning a worrying question into a concrete, plannable figure.",
            "Going through a separation in {state_name} means making dozens of decisions, and child support is one of the most important. This calculator gives you a quick, guideline-based estimate so you can approach mediation or court with a clear idea of the likely outcome.",
            "Nobody plans for a separation, but planning afterward is what protects your children. In {state_name}, child support follows the {model}, and this tool translates that into a monthly estimate you can use for budgeting and honest conversations.",
            "Whether you will be paying or receiving, understanding the {state_name} child support number early puts you in a stronger position. This calculator runs the state's formula on your figures and shows a realistic estimate, so nothing about the process feels like a black box.",
            "Parents across {state_name}, from {city1} to {city2}, use tools like this to get ahead of the child support question. Instead of waiting for a lawyer or a court date, you can see a guideline estimate now and start planning your finances today.",
            "A clear head starts with clear numbers. This {state_name} child support calculator takes your incomes, the number of children, and parenting time, then applies the {model} to estimate the monthly obligation, fast, free, and judgment-free.",
            "Separation is hard enough without financial uncertainty hanging over it. This {state_name} tool gives both parents an objective, guideline-based child support estimate, the kind of number that makes mediation smoother and budgets realistic.",
            "Knowing roughly what child support will look like in {state_name} helps everyone, especially the kids. This calculator follows the state's official approach to give you a dependable monthly estimate before you ever set foot in a courtroom."
        ],
        'whatis' => [
            "A <strong>{state_name} Child Support Calculator</strong> is a planning tool that estimates monthly payments using the state's guidelines. It factors in parental incomes, parenting time, and child-related expenses under the {model} to give you a clear estimate.",
            "This <strong>{state_name} Child Support Calculator</strong> turns complex family-law guidelines into an easy tool. By weighing income shares, custody schedules, and health-insurance costs, it produces an objective estimate under the {model}.",
            "The <strong>{state_name} Child Support Calculator</strong> estimates monthly obligations using the official {model} of {state_name}. It processes gross income, deductions, and parenting overnights to produce a baseline support figure.",
            "Think of the <strong>{state_name} Child Support Calculator</strong> as a guideline simulator. It applies the {model} the way a {state_name} court would, using both parents' incomes and the custody split to estimate fair monthly support.",
            "A <strong>{state_name} Child Support Calculator</strong> answers a single hard question, how much support is likely owed each month, by running your numbers through the state's {model} and returning a clear estimate.",
            "The <strong>{state_name} Child Support Calculator</strong> is a free estimator built around {state_name}'s {model}. Enter incomes, children, and overnights, and it calculates a guideline support amount you can plan around.",
            "Put simply, the <strong>{state_name} Child Support Calculator</strong> converts your family's financial and custody details into an estimated monthly payment, following the {model} that {state_name} uses by law.",
            "A <strong>{state_name} Child Support Calculator</strong> is a decision-support tool for separating parents. It models the {model}, factoring incomes and parenting time, so you can see a realistic monthly figure before negotiations.",
            "Consider the <strong>{state_name} Child Support Calculator</strong> a translation layer between messy real-life finances and the state's formula. It applies the {model} to produce an objective, guideline-based estimate.",
            "The <strong>{state_name} Child Support Calculator</strong> is an online tool that mirrors how {state_name} sets support. Using the {model}, it weighs each parent's income and custody time to estimate the monthly obligation.",
            "In practical terms, a <strong>{state_name} Child Support Calculator</strong> is your what-if machine for co-parenting finances. Adjust incomes or overnights and it recalculates the {model} estimate instantly.",
            "A <strong>{state_name} Child Support Calculator</strong> takes the guesswork out of separation finances. It applies {state_name}'s {model} to your inputs and breaks the result into a clear, monthly support estimate.",
            "The <strong>{state_name} Child Support Calculator</strong> is a self-service estimator for parents in {city1} and across the state. It uses the {model} to convert incomes and parenting time into a guideline figure.",
            "Think of the <strong>{state_name} Child Support Calculator</strong> as a financial mirror for co-parenting: it reflects what monthly support is likely to be under the {model}, so both households can plan realistically.",
            "A <strong>{state_name} Child Support Calculator</strong> is a tool that replicates the state's official method. It runs the {model} on your incomes, children, and custody schedule to estimate a fair monthly payment.",
            "The <strong>{state_name} Child Support Calculator</strong> is a quick, judgment-free way to see likely support. Enter your details and it applies the {model} to reveal an estimate you can use for mediation or budgeting."
        ]
    ];
}


/** Variation set B: why, how, inputs, formula */
function usc_csv6_b() {
    return [
        'why' => [
            "Having an estimate before court or mediation gives you a clear baseline. It helps both parents plan household budgets, compare how different custody schedules change the number, and save time and money on legal consultations.",
            "Using this calculator takes the mystery and stress out of child support talks. You can test different overnight schedules, walk into mediation with realistic figures, and make sure your child's needs are covered fairly.",
            "Whether you are negotiating a parenting plan or preparing for a hearing, this tool brings clarity. Model different custody splits and incomes so you can negotiate from objective, guideline-based numbers rather than emotion.",
            "Knowing the likely number early changes how the whole process feels. In {state_name}, you can use this estimate to budget two households, prepare for mediation, and avoid being blindsided by an unexpected obligation.",
            "A quick estimate now can prevent conflict later. By seeing how income and parenting time drive the {state_name} figure, both parents can approach the conversation with the same realistic starting point.",
            "This calculator is your planning sandbox. Adjust overnights, incomes, or health-insurance costs and watch the {state_name} support estimate change, useful for testing scenarios before you commit to anything.",
            "Support discussions go better with facts. Use this tool to get a guideline number for {state_name}, then focus the conversation on your children rather than arguing over what the amount should be.",
            "For parents in {city1} and across {state_name}, an early estimate means fewer surprises. You can plan rent, childcare, and savings around a realistic figure instead of waiting anxiously for a court order.",
            "Running the numbers helps you prepare, not just react. With a {state_name} guideline estimate in hand, you can ready your finances, gather the right documents, and meet with a mediator or attorney already informed.",
            "It puts both parents on equal footing. Because the {model} is transparent, this calculator lets each household see the same objective number, which tends to reduce friction during an already hard time.",
            "Whether you expect to pay or receive support, clarity helps. This {state_name} tool shows how the guideline figure responds to income changes and custody shifts, so you can plan for different outcomes.",
            "Use it to stress-test your budget. Before agreeing to a parenting schedule in {state_name}, see how each option affects the monthly support number and your household's bottom line.",
            "An estimate is a powerful negotiation tool. Walking into {state_name} mediation with a guideline-based figure means the discussion starts from a shared, realistic baseline rather than two very different guesses.",
            "It saves time, money, and stress. Instead of paying for hours of legal calculation, you can get a solid {state_name} estimate here first and use professional time for the genuinely tricky questions.",
            "Planning beats worrying. This calculator gives {state_name} parents a concrete number to build budgets around, so both homes can prepare for the realities of raising children apart.",
            "The clearer the math, the calmer the process. Use this {state_name} estimate to understand your likely obligation, plan ahead, and keep the focus where it belongs, on your children's wellbeing."
        ],
        'how' => [
            "The calculator works in stages: it evaluates each parent's monthly income, applies allowed deductions, finds the basic obligation from state tables, splits it proportionally, and adjusts for the overnight custody schedule.",
            "It follows {state_name}'s official guidelines: starting with income assessments, finding the basic support need from the tables, determining each parent's share, and applying credits for parenting time and health insurance.",
            "To estimate support, the tool first calculates both parents' net income, looks up the basic obligation, divides it by each parent's income percentage, and adjusts for parenting time and childcare costs.",
            "Behind the scenes it mirrors how a {state_name} court applies the {model}: combine incomes, find the guideline obligation, allocate it proportionally, then fine-tune for overnights, health premiums, and other children.",
            "The process is methodical: assess each parent's resources, pull the basic obligation for the number of children, split by income share, and apply adjustments for custody time and add-on expenses.",
            "Step by step, the calculator determines net incomes, references the {state_name} support schedule, proportions the obligation between parents, and credits the paying parent for overnight parenting time.",
            "It runs the same logic the {model} prescribes: income in, deductions out, basic obligation from the tables, proportional division, and adjustments for insurance and parenting time, to reach a monthly estimate.",
            "The engine breaks the calculation into clear parts, income, basic obligation, proportional shares, and credits, so the {state_name} estimate reflects both what parents earn and how they share custody.",
            "First it establishes each parent's income and net resources, then it finds the guideline amount for your number of children, divides it fairly, and adjusts for the realities of your parenting schedule.",
            "The tool applies {state_name}'s rules in order: net income, basic obligation lookup, income-share split, then credits for overnights, health insurance, and work-related childcare to finalize the estimate.",
            "Functionally, it combines both incomes to find a basic obligation, assigns each parent a percentage based on earnings, and then shifts the result up or down for parenting time and shared expenses.",
            "The calculation flows logically: determine resources, look up the obligation for your children, proportion it by income, and apply the parenting-time credit that {state_name} allows for shared custody.",
            "It treats support like a structured formula: incomes and deductions set the base, the {state_name} tables set the obligation, and custody plus add-on costs adjust the final monthly figure.",
            "The system computes net income for each parent, finds the combined basic obligation, splits it by income share, and then layers in adjustments for overnights and the child's healthcare costs.",
            "Under the hood, the {model} drives everything: the calculator combines incomes, derives the basic obligation, divides it proportionally, and credits parenting time to estimate the net monthly payment.",
            "The tool processes your inputs the way {state_name} intends, income assessment, guideline lookup, proportional split, and custody adjustment, so the estimate lines up with how support is actually set."
        ],
        'inputs' => [
            "To run the calculation, you will need the gross and net incomes of both parents, the number of children, the annual overnight split, healthcare premiums for the children, and any work-related childcare costs.",
            "Getting an accurate estimate requires a few inputs: both parents' monthly incomes, the number of support-eligible children, the parenting schedule in overnights, health-insurance costs, and daycare expenses.",
            "Have these ready: gross monthly income for both parents, the number of children, the overnight visitation schedule, monthly health premiums for the children, and work-related childcare costs.",
            "The tool needs each parent's income, the children's count, the custody overnights per year, and the child-related costs (health insurance and childcare) that {state_name} factors into the {model}.",
            "Provide both incomes, the number of children, and the parenting-time split, then add health-insurance and childcare figures. The more accurate these are, the closer the {state_name} estimate lands.",
            "You will enter monthly incomes for both parents, the number of children, the overnight schedule, and add-on costs like medical premiums and daycare that affect the {state_name} calculation.",
            "Gather the essentials: gross and net income for each parent, how many children are involved, the annual overnight count, and the recurring child costs the {model} accounts for.",
            "The required inputs are straightforward, both parents' earnings, children supported, parenting overnights, and child-related expenses, which together let the calculator apply {state_name}'s {model}.",
            "Start with incomes and the number of children, then specify the custody overnights and add health-insurance and childcare costs. These few details drive the entire {state_name} estimate.",
            "Make sure you have each parent's income, the children's count, the overnight split, and the monthly cost of the children's health coverage and any work-related daycare.",
            "Enter both parents' monthly income, the number of children, the parenting-time schedule, and child-related expenses; if either parent supports other children, include that too, as it can adjust the {state_name} result.",
            "The calculator asks for incomes, children, overnights, and add-on costs. Including accurate health-premium and childcare figures matters, because the {model} divides those proportionally.",
            "You need the financial and custody picture: gross/net incomes, number of children, annual overnights, and the children's insurance and childcare costs that {state_name} folds into support.",
            "Collect both parents' income, the count of children, the overnight schedule, and recurring child costs. Prior support obligations for other children can also be entered to refine the estimate.",
            "Provide each parent's earnings, the number of children, the parenting-time split, and the child-related expenses. Accurate inputs here separate a rough guess from a reliable {state_name} estimate.",
            "The essentials are simple: both incomes, children supported, overnights per year, and health/childcare costs, the same inputs a {state_name} court uses to apply the {model}."
        ],
        'formula' => [
            "The basic formula divides support proportionally by combined income: Parental Share = Basic Obligation x (Parent's Income / Combined Income) + Proportional Shared Expenses. {model_text}",
            "Under {state_name} guidelines, support follows a proportional formula: Support Due = Basic Obligation x (Paying Parent's Income / Combined Income), adjusted for shared expenses. {model_text}",
            "The core calculation is: each parent's share equals the basic obligation times their share of combined income, plus their portion of health and childcare costs. {model_text}",
            "In equation form: Support = Basic Guideline Obligation x (Paying Parent Income / Combined Income), then adjusted up or down for parenting time and add-on expenses. {model_text}",
            "The math proportions the obligation by income: Parent's Share = Obligation x (Their Income / Combined Income), with credits for overnights and shared costs applied afterward. {model_text}",
            "{state_name} uses an income-proportional approach: find the basic obligation, multiply by the paying parent's income percentage, and adjust for custody and expenses. {model_text}",
            "Expressed simply: Support Due = (Paying Parent's % of Combined Income) x Basic Obligation +/- Adjustments for parenting time and shared costs. {model_text}",
            "The formula chains together: combined income sets the basic obligation; each parent's income share sets their portion; overnights and add-ons adjust the result. {model_text}",
            "Mathematically, the obligation is split by earnings: Parental Share = Basic Obligation x (Parent Income / Combined Income), then refined by the {model}. {model_text}",
            "The guideline computes a basic obligation, then assigns each parent a proportional slice based on income, with health and childcare costs divided the same way. {model_text}",
            "Put as a single line: Net Support = (Paying Parent Income / Combined Income) x Basic Obligation, plus shared expenses, minus parenting-time credits. {model_text}",
            "The calculation starts from combined income, derives the obligation, and proportions it: Parent's Share = Obligation x Income Percentage, adjusted for custody. {model_text}",
            "In {state_name}, the formula is proportional by design: each parent pays their share of the basic obligation according to income, with adjustments layered on top. {model_text}",
            "The equation is: Basic Obligation x (Parent's Income / Combined Income) + that parent's share of add-on costs, then reduced by any parenting-time credit. {model_text}",
            "Stated plainly: support equals the guideline obligation split by each parent's income share, with health, childcare, and overnight adjustments applied. {model_text}",
            "The underlying formula proportions support by income: Parental Share = Basic Obligation x (Income / Combined Income) + Shared Expenses - Parenting-Time Credits. {model_text}"
        ]
    ];
}


/** Variation set C: howtouse, example, factors, benefits, mistakes, usecases, conclusion */
function usc_csv6_c() {
    return [
        'howtouse' => [
            "To get an estimate, enter both parents' monthly incomes, select the number of children, set the overnight split, add health-insurance and childcare costs, and click calculate to see your estimated monthly payment.",
            "Simply input the financial details for both parents, enter the child count, specify the overnight schedule, add healthcare and daycare costs, and run the calculation for a line-item {state_name} summary.",
            "Follow these steps: enter monthly income for both parents, input the number of children, set the annual custody nights, add health and childcare premiums, and press calculate to view results.",
            "Start with both incomes, choose how many children are involved, then use the parenting slider for overnights. Add child costs and calculate to see a clear {state_name} support estimate.",
            "It takes under a minute: enter incomes, children, and overnights, add insurance and daycare figures, and hit calculate. The tool applies the {model} and shows the monthly number.",
            "Enter the income for each parent, the number of children, and the custody schedule, then add health-insurance and childcare costs and run it for a detailed {state_name} breakdown.",
            "Type in both parents' earnings, select the child count, set the overnight split, and include add-on costs. One click later you will see the estimated {state_name} obligation.",
            "Working it is intuitive: provide incomes and children, specify parenting time, add the child's expenses, and calculate. The {state_name} estimate appears with a clear summary.",
            "Add both monthly incomes, choose the number of children, set the overnights, and key in health and childcare costs. Hit calculate to reveal the guideline {state_name} support figure.",
            "The steps are quick: enter incomes, children, overnights, and expenses, then calculate. Whether you are in {city1} or elsewhere in {state_name}, the tool applies the same {model}.",
            "Pop in each parent's income, the number of children, and the custody split, then add insurance and daycare. Calculate to see the {state_name} estimate update instantly.",
            "Enter the financials for both parents, the child count, and the parenting schedule, add the child-related costs, and click calculate for a tidy {state_name} support summary.",
            "To run it, fill in both incomes, choose the number of children, set overnights, and add health and childcare costs. One calculation later, the {state_name} estimate is broken into clear lines.",
            "Begin with incomes and children, set the parenting-time split, and add the child's expenses. Press calculate and the tool shows the estimated monthly {state_name} support plus the factors behind it.",
            "It is a simple flow: enter incomes and children, specify overnights, add insurance and daycare, and calculate. The {state_name} breakdown is detailed enough to plan a budget around.",
            "Enter your numbers, choose the children and custody schedule, add the child costs, and calculate, that is it. The calculator translates it into a guideline {state_name} support estimate."
        ],
        'example' => [
            "Let's look at a sample case in {state_name}. Suppose one parent earns $6,000 net per month, the other earns $4,000, they have 2 children spending 80 overnights a year with the paying parent, who also pays $200 for health insurance.",
            "Consider this {state_name} example: a paying parent with $6,000 monthly net income, the other parent at $4,000, two children, 80 overnights with the paying parent, and a $200 monthly health premium.",
            "To see the math, imagine a {state_name} case where one parent nets $6,000 monthly and the other $4,000. They have 2 children, the paying parent has 80 overnights, and covers $200 in health insurance.",
            "Here is a worked {state_name} example: combined net income of $10,000 (split $6,000 / $4,000), two children, 80 custody overnights, and $200 in monthly health premiums. Watch how the {model} sets the figure.",
            "Picture a family in {city1}: one parent earns $6,000 net, the other $4,000, with 2 children and 80 overnights a year with the paying parent. The {state_name} {model} turns that into a monthly estimate.",
            "Take a typical {state_name} scenario, $6,000 and $4,000 net monthly incomes, two children, 80 overnights, $200 health insurance, and see how the guideline obligation is shared between the parents.",
            "Suppose, in {state_name}, the paying parent nets $6,000 a month and the other $4,000. With 2 children and 80 overnights, the {model} produces the estimated support shown below.",
            "Let's model a real {state_name} situation: incomes of $6,000 and $4,000 net, two children, 80 custody nights, and $200 monthly health premiums. The breakdown reveals the likely monthly support.",
            "Imagine a {state_name} case with a $6,000 / $4,000 net income split, two children, and 80 overnights with the paying parent. Here is how the {model} arrives at the estimated obligation.",
            "For illustration, a {state_name} paying parent earns $6,000 net, the other $4,000, with 2 children and 80 overnights. The table shows how the guideline support breaks down.",
            "Here is how it plays out in {state_name}: combined net income $10,000, two children, 80 overnights, $200 health insurance. The {model} proportions the obligation as shown.",
            "Consider a practical {state_name} example, one parent at $6,000 net, the other at $4,000, two children, 80 custody overnights, $200 health premium, and follow the math to the monthly figure.",
            "Let's run the numbers for a family in {city2}: $6,000 and $4,000 net incomes, two children, 80 overnights, $200 insurance. The {state_name} {model} sets the estimated support.",
            "Take a {state_name} case: paying parent $6,000 net, other parent $4,000, two children, 80 overnights, $200 health coverage. The example below walks through the obligation and credits.",
            "As a sample, picture a {state_name} family with $6,000 / $4,000 net incomes, two children, and 80 custody nights. The breakdown shows the combined obligation and each parent's share.",
            "Here's a down-to-earth {state_name} example: one parent nets $6,000, the other $4,000, with 2 children and 80 overnights plus $200 health insurance. See how the {model} shapes the result."
        ],
        'factors' => [
            "The obligation depends on several moving parts: changes in either parent's income, shifts in the overnight schedule, variations in health-insurance premiums, and any pre-existing support orders. {model_short}",
            "Your {state_name} estimate can change if wages shift, the parenting schedule crosses a custody threshold, health premiums rise or fall, or there are prior support obligations. {model_short}",
            "Key factors include both parents' monthly earnings, the exact number of overnights, changes in childcare or medical premiums, and legal credits for other children. {model_short}",
            "Several variables drive the result: income changes, the custody overnight count, add-on costs like insurance and daycare, and whether a parent supports children from another relationship. {model_short}",
            "The figure responds to income, parenting time, and expenses. In {state_name}, crossing an overnight threshold or a change in either income can noticeably move the monthly number. {model_short}",
            "Watch these closely: each parent's income, the overnight split, health and childcare costs, and prior obligations, all of which the {state_name} guideline weighs. {model_short}",
            "The main drivers are combined income, the parenting-time schedule, and the child's add-on costs. A shift in any of them changes how the {state_name} obligation is shared. {model_short}",
            "Your estimate moves with the inputs: higher or lower incomes, more or fewer overnights, and changing insurance or daycare costs all reshape the {state_name} support figure. {model_short}",
            "Several elements matter: income for both parents, the custody overnights, medical and childcare premiums, and credits for other dependents the parents support. {model_short}",
            "Factors that affect the amount include each parent's earnings, the number of overnights, the children's healthcare costs, and any existing court-ordered support. {model_short}",
            "The result reflects incomes, parenting time, and shared costs. Because {state_name} uses the {model}, changes to combined income or the custody split have a direct effect. {model_short}",
            "Big levers are income, overnights, and add-on expenses. Adjust any of these in {state_name} and the monthly obligation shifts, sometimes more than parents expect. {model_short}",
            "The obligation depends on what each parent earns, how custody time is divided, and what the children's care costs, the core inputs of the {state_name} guideline. {model_short}",
            "Among the factors at play: both incomes, the annual overnights, health and childcare premiums, and prior support duties, all of which feed the {state_name} calculation. {model_short}",
            "Several inputs steer the number: combined income, the parenting schedule, the child's medical and daycare costs, and credits for other children in either home. {model_short}",
            "Your results respond to income, custody time, and expenses. In {state_name}, the {model} ties these together, so a change in one ripples through the final figure. {model_short}"
        ],
        'benefits' => [
            "This calculator promotes transparency and fairness, helps parents prepare for mediation or court, and lets you test different custody scenarios to see their financial impact, all privately, in your browser.",
            "Why use it? It gives a clear, objective guideline calculation, helps reduce conflict during negotiations, and lets you see how parenting-time changes affect the monthly {state_name} support amount.",
            "It is built for clarity and fairness. Model different schedules and incomes, prepare realistic numbers for mediation, and keep your information private, the tool stores nothing.",
            "The benefits are practical: an objective baseline, easy scenario testing, and total privacy. For {state_name} parents, that means calmer, better-informed support discussions.",
            "Using it, both households gain a shared, guideline-based number, which tends to lower conflict, plus the freedom to test custody scenarios and complete privacy on your figures.",
            "It helps you plan two budgets at once. See how the {state_name} obligation changes with income or overnights, and prepare for mediation with realistic, defensible numbers.",
            "The tool's strengths are objectivity, flexibility, and privacy. Run as many {state_name} scenarios as you like, compare outcomes, and never worry about your data being saved.",
            "Key benefits include a transparent guideline figure, the ability to model parenting-time changes, and a privacy-first design, useful whether you expect to pay or receive support in {state_name}.",
            "It pays off in three ways: an objective estimate, side-by-side scenario comparison, and complete privacy. Adjust your {state_name} inputs freely and the math stays on your device.",
            "Expect a fair baseline, instant recalculation, and zero data collection, a safe, practical tool for {state_name} parents navigating support and custody decisions.",
            "The advantages add up: an objective number that reduces arguments, the flexibility to test schedules, and privacy that keeps your family's details to yourself.",
            "Using it gives you clarity and control. See how each custody option affects the {state_name} obligation, and do it privately, since the calculator processes your numbers without storing them.",
            "This calculator is objective, flexible, and private by design. It applies {state_name}'s {model}, lets you compare scenarios in seconds, and never keeps the figures you enter.",
            "The payoff is calmer, better decisions. A clear {state_name} estimate plus unlimited scenario testing means both parents can plan without guesswork or unnecessary conflict.",
            "Benefits include a guideline-accurate estimate, the flexibility to model many situations, and strict privacy, a dependable foundation for {state_name} co-parenting plans.",
            "You get a tool that is objective, flexible enough for any what-if, and private enough to trust, which makes estimating {state_name} child support both easy and low-stress."
        ],
        'mistakes' => [
            "Common errors include using gross income instead of net (or vice versa), using estimated rather than actual overnights, and forgetting credits for health-insurance premiums or spousal support.",
            "Watch for mix-ups like confusing gross and net income, miscounting annual custody overnights, or omitting healthcare premiums, each can significantly change the {state_name} estimate.",
            "Avoid these pitfalls: use the correct income base required by {state_name} guidelines, count overnights accurately, and include medical-premium splits and any alimony adjustments.",
            "The biggest slips are an inaccurate overnight count and the wrong income figure. In {state_name}, both feed the {model} directly, so errors there skew the whole result.",
            "People often forget add-on costs. Leaving out the children's health insurance or work-related daycare understates each parent's share of the {state_name} obligation.",
            "A frequent mistake is entering gross income where net is required, or vice versa. Check which {state_name} uses, and make sure overnights reflect the real parenting schedule.",
            "Don't overlook prior obligations. Support paid for other children can reduce a parent's net resources, and omitting it inflates the {state_name} estimate.",
            "Be careful with the overnight slider, guessing instead of counting actual nights can push you across a custody threshold and change the number meaningfully.",
            "Common pitfalls: wrong income base, miscounted overnights, and missing health or childcare costs. Each quietly distorts the {state_name} support figure, so review all three.",
            "A typical error is ignoring spousal support. Alimony paid or received shifts net income, which in turn changes the proportional split under the {model}.",
            "Avoid double-counting or omitting expenses. The children's medical premiums and daycare should be entered once and split proportionally, not left out or duplicated.",
            "Many users enter approximate incomes. For a reliable {state_name} estimate, use actual figures from pay stubs or tax returns, especially for self-employed parents.",
            "The mistakes that matter most are simple: wrong income type, inaccurate overnights, and forgotten add-on costs. Get those right and the {state_name} estimate tracks the guideline closely.",
            "Don't assume a new spouse's income counts, in most states it does not. Including it incorrectly will overstate the {state_name} obligation.",
            "A classic oversight is using last year's custody schedule. If overnights have changed, update them, because the parenting-time credit directly affects the {state_name} result.",
            "To avoid surprises, verify three things: the correct income base, the actual overnight count, and the children's add-on costs. Those drive the {state_name} {model} estimate."
        ],
        'usecases' => [
            "This calculator is useful during mediation to set fair terms, when requesting a modification after a job or custody change, or when verifying guideline calculations with your attorney.",
            "Practical uses include preparing estimates for {state_name} family court, calculating modifications after income changes, and verifying custody credits during parenting-time negotiations.",
            "Use it to estimate support during divorce proceedings, check whether a job or custody change warrants a {state_name} modification, or prepare realistic numbers before meeting a mediator.",
            "Reach for it when negotiating a parenting plan in {city1}, planning two household budgets, or testing how a new custody schedule changes the {state_name} obligation.",
            "It shines for mediation prep, modification requests, and budget planning, anytime you need an objective {state_name} support figure to ground the conversation.",
            "Common scenarios: estimating support before filing, checking a modification after a raise or job loss, and comparing how different overnight splits affect the {state_name} number.",
            "Whether you are starting a separation or revisiting an old order, the tool helps, estimate the {state_name} obligation, test scenarios, and prepare for court or mediation.",
            "Use it to plan finances after a separation, to evaluate a proposed parenting schedule, or to sanity-check the figure your attorney or the {state_name} court provides.",
            "Typical uses include preparing for a {state_name} hearing, modelling a relocation's effect on support, and confirming how add-on costs change each parent's share.",
            "It is handy when incomes change, when custody shifts, or when you simply want a realistic {state_name} estimate before committing to a parenting agreement.",
            "Lean on it during mediation, when seeking a modification, or while budgeting two homes, each time it gives a guideline-based {state_name} figure to work from.",
            "Practical applications: estimating support for a settlement, testing custody scenarios, and verifying the math behind a proposed {state_name} order.",
            "Use the calculator to compare parenting schedules, plan around a likely obligation, or prepare informed questions for a {state_name} family-law attorney.",
            "From first filings to modifications, it answers the key questions in {state_name}: how much is likely owed, and how do income and custody changes affect it?",
            "Whether budgeting in {city1}, preparing for mediation, or weighing a custody change, this tool gives the {state_name} support estimate those decisions need.",
            "It is built for real decisions, estimating support, planning budgets, testing scenarios, and walking into {state_name} mediation or court already informed."
        ],
        'conclusion' => [
            "Child support is really about one thing: keeping your kids supported no matter what changed between the adults. Use this {state_name} estimate as a starting point for honest conversations, and revisit it whenever incomes or the schedule shift.",
            "No calculator replaces a judge or a good family lawyer, but walking in with a realistic {state_name} number puts you in a far stronger position. Treat this as your baseline and keep your details accurate.",
            "The clearer you are on the numbers, the easier it is to focus on what matters, your children. This {state_name} estimate helps both households budget fairly; bookmark it and re-run it as life changes.",
            "Co-parenting works best when both sides understand the math. With a realistic {state_name} estimate in hand, you can plan two budgets, prepare for mediation, and avoid nasty surprises later.",
            "Use this {state_name} figure to replace worry with a plan. Whether you pay or receive, knowing the likely number lets you budget with confidence and negotiate from facts.",
            "At the end of the day, support is about stability for your kids. This {state_name} calculator gives both parents an objective starting point, come back whenever your income or custody changes.",
            "Knowing your likely {state_name} obligation early makes every next step calmer, mediation, court, or a simple agreement. Keep this tool handy and update it as your situation evolves.",
            "A realistic number changes the tone of the whole conversation. Use this {state_name} estimate to plan ahead, prepare for negotiations, and keep the focus on your children's needs.",
            "Support should never be a guessing game. Now that you can see a guideline-based {state_name} figure, you can budget, negotiate, and plan with far more confidence.",
            "Bookmark this {state_name} calculator and return whenever life shifts, a new job, a move, a change in custody. Each one moves the number, and a quick re-check keeps your plan accurate.",
            "The bottom line: clear numbers protect your children and reduce conflict. Use this {state_name} estimate as the foundation for fair, informed co-parenting decisions.",
            "Understanding {state_name} child support is a small step with a big payoff. Keep this estimate close, run it before negotiations, and let real numbers guide a fair outcome.",
            "You started uncertain about the number; now you have a realistic one. Use this {state_name} tool to plan two budgets, prepare for mediation, and stay focused on your kids.",
            "There is real peace of mind in seeing a guideline-based figure. For parents in {city1} and beyond, this {state_name} calculator turns a stressful unknown into a plannable number.",
            "Treat this estimate as your starting line, not the finish. Bookmark the {state_name} calculator, revisit it as incomes and custody change, and approach every conversation prepared.",
            "In the end, the goal is simple: support your children fairly through change. This {state_name} child support calculator hands you a realistic figure in seconds, come back whenever things shift."
        ]
    ];
}


/**
 * Builds the full V6 Child Support article for a given state (~1,200 words).
 */
function usc_cs_article_v6($state) {
    $name  = $state['name'];
    $model = $state['cs_model'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $city1 = $x['cities'][0];
    $city2 = isset($x['cities'][1]) ? $x['cities'][1] : $x['cities'][0];

    // Full model explanation (kept accurate per model).
    if ($model === 'Income Shares Model') {
        $model_text = 'Under the Income Shares Model, ' . $name . ' combines both parents\' incomes to set a basic obligation from official tables, then divides it proportionally. If the paying parent earns 60% of the combined income, they cover roughly 60% of the obligation.';
        $model_short = 'as an Income Shares state, ' . $name . ' splits the obligation by each parent\'s share of combined income';
    } elseif ($model === 'Melson Formula Model') {
        $model_text = 'Under the Melson Formula (a refinement of Income Shares), ' . $name . ' first ensures each parent can meet basic self-support needs, then sets a primary support amount for the children, with a share of remaining income added so the children benefit from a higher standard of living.';
        $model_short = 'under the Melson Formula, ' . $name . ' protects each parent\'s self-support reserve before calculating support';
    } else {
        $model_text = 'Under the Percentage of Income Model, ' . $name . ' bases support on a flat percentage of the paying parent\'s income. The receiving parent\'s income generally is not used, since the state assumes they spend their share directly on the child (for example, a set percentage of net resources per child).';
        $model_short = 'as a Percentage of Income state, ' . $name . ' bases support mainly on the paying parent\'s income';
    }

    // Model-aware worked example (combined $10,000 net: $6,000 / $4,000, 2 kids).
    if ($model === 'Percentage of Income Model') {
        $basic = 1500; $payer_share = 1500; $credit = 0; $support = 1450;
        $basis = '25% of the paying parent\'s $6,000 net resources for two children, lightly adjusted for parenting time';
    } elseif ($model === 'Melson Formula Model') {
        $basic = 1700; $payer_share = 1020; $credit = 80; $support = 940;
        $basis = 'the primary support need split 60/40 by income after each parent\'s self-support reserve, less the health-premium credit';
    } else {
        $basic = 1800; $payer_share = 1080; $credit = 80; $support = 1000;
        $basis = 'the $1,800 basic obligation split 60/40 by income, less the mother\'s 40% health-premium credit';
    }

    $replacements = [
        'state_name'  => $name,
        'model'       => $model,
        'model_text'  => $model_text,
        'model_short' => $model_short,
        'city1'       => $city1,
        'city2'       => $city2,
        'region'      => $x['region'],
    ];

    $pool = usc_cs_variations_v6();
    $sec = function($key) use ($state_slug, $pool, $replacements) {
        return usc_get_section_content($state_slug, $key, $pool, $replacements);
    };

    $html = '<h2>1. ' . usc_pv6_h($state_slug, 'cintro', ['Introduction', 'Getting Started', 'Overview', 'Child Support in ' . $name . ', Explained']) . '</h2>
<p>' . $sec('intro') . '</p>

<h2>2. ' . usc_pv6_h($state_slug, 'cwhatis', ['What is a ' . $name . ' Child Support Calculator?', 'What This ' . $name . ' Calculator Does', 'Meet the ' . $name . ' Child Support Calculator', 'What Exactly Is This Tool?']) . '</h2>
<p>' . $sec('whatis') . '</p>

<h2>3. ' . usc_pv6_h($state_slug, 'cwhy', ['Why Use This Calculator?', 'Why This Tool Helps', 'Reasons to Estimate First', 'Why Run Your Numbers Now?']) . '</h2>
<p>' . $sec('why') . '</p>
' . usc_pv6_list($state_slug, 'cwhy', [
    '<strong>Fair Expectations:</strong> A transparent, objective baseline before court hearings or custody negotiations.',
    '<strong>Budget Planning:</strong> Helps both households budget for housing, food, clothing, education, and healthcare.',
    '<strong>Custody Assessment:</strong> Test different overnight splits to see how parenting time changes the monthly amount.',
    '<strong>Time &amp; Cost Savings:</strong> Avoids hours of manual work with complex ' . $name . ' guideline spreadsheets.',
    '<strong>Ready for Mediation:</strong> Concrete numbers that mediators and judges can build a final agreement around.',
    '<strong>Reduce Conflict:</strong> A shared, guideline-based figure keeps the discussion grounded in facts.',
    '<strong>Plan for Change:</strong> See how a raise, job loss, or move within ' . $x['region'] . ' would affect support.',
    '<strong>Two-Home Clarity:</strong> Understand the financial picture for both households, not just one.',
], 5) . '

<h2>4. ' . usc_pv6_h($state_slug, 'chow', ['How Does the ' . $name . ' Child Support Calculator Work?', 'How the ' . $name . ' Calculator Works', 'What Happens Behind the Scenes', 'How the Estimate Is Built']) . '</h2>
<p>' . $sec('how') . '</p>
<ol>
    <li><strong>Income Assessment:</strong> Calculates each parent\'s gross monthly income, then deducts taxes and allowed items to find net resources.</li>
    <li><strong>Basic Obligation Lookup:</strong> Finds the basic support obligation from ' . $name . ' tables based on combined income and the number of children.</li>
    <li><strong>Proportional Split:</strong> Divides the obligation between parents by their share of combined income.</li>
    <li><strong>Parenting-Time Adjustment:</strong> Applies credits when the paying parent has significant overnight custody.</li>
    <li><strong>Add-On Expenses:</strong> Allocates health insurance and work-related childcare proportionally between parents.</li>
</ol>

<h2>5. ' . usc_pv6_h($state_slug, 'cinputs', ['Inputs Required', 'What You Will Need', 'Information to Have Ready', 'What to Enter']) . '</h2>
<p>' . $sec('inputs') . '</p>
' . usc_pv6_list($state_slug, 'cinputs', [
    '<strong>Gross &amp; Net Monthly Income:</strong> Wages, salary, business profit, investments, or spousal support.',
    '<strong>Number of Children:</strong> The children for whom support is being calculated.',
    '<strong>Custody Overnights:</strong> Nights per year with each parent, a critical factor in shared-custody models.',
    '<strong>Health-Insurance Premiums:</strong> The cost of the children\'s medical, dental, and vision coverage.',
    '<strong>Work-Related Childcare:</strong> Daycare or after-school costs needed for a parent to work.',
    '<strong>Other Children Supported:</strong> Support paid for children from other relationships, which can reduce net income.',
    '<strong>Spousal Support:</strong> Alimony paid or received, which shifts each parent\'s net resources.',
], 6) . '

<h2>6. ' . usc_pv6_h($state_slug, 'cformula', ['Formula Used', 'The Math Behind It', 'How the Numbers Are Calculated', 'The Support Equation']) . '</h2>
<p>' . $sec('formula') . '</p>
<pre style="background:#f4f4f5; padding:15px; border-radius:5px; overflow-x:auto;">Parental Share = Basic Obligation x (Parent\'s Income / Combined Income) + Proportional Shared Expenses</pre>

<h2>7. ' . usc_pv6_h($state_slug, 'chowtouse', ['How to Use the Calculator', 'Step-by-Step Instructions', 'Using the Tool in 60 Seconds', 'How to Run Your Estimate']) . '</h2>
<p>' . $sec('howtouse') . '</p>
<ol>
    <li>Enter the monthly income for both parents.</li>
    <li>Enter the number of children requiring support.</li>
    <li>Use the parenting-time slider to set the overnight schedule.</li>
    <li>Add health-insurance premiums and work-related childcare costs.</li>
    <li>Include any spousal support paid or received.</li>
    <li>Click Calculate to see the estimated monthly obligation.</li>
</ol>

<h2>8. ' . usc_pv6_h($state_slug, 'cexample', ['Example Calculation for ' . $name, 'A Worked ' . $name . ' Example', 'See It in Action: ' . $name, $name . ' Support: A Sample Run']) . '</h2>
<p>' . $sec('example') . '</p>
<table style="width:100%; border-collapse: collapse; margin-bottom: 25px; font-size:14px; border: 1px solid #e5e7eb;">
    <thead>
        <tr style="background-color: #f9fafb; border-bottom: 2px solid #e5e7eb;">
            <th style="padding: 12px; text-align: left; font-weight: 600; color: #374151;">Category / Description</th>
            <th style="padding: 12px; text-align: right; font-weight: 600; color: #374151;">Amount</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom: 1px solid #e5e7eb;"><td style="padding: 12px; color: #4b5563;">Paying Parent Net Income (60% of combined)</td><td style="padding: 12px; text-align: right; color: #111827;">$6,000.00</td></tr>
        <tr style="border-bottom: 1px solid #e5e7eb;"><td style="padding: 12px; color: #4b5563;">Other Parent Net Income (40% of combined)</td><td style="padding: 12px; text-align: right; color: #111827;">$4,000.00</td></tr>
        <tr style="border-bottom: 1px solid #e5e7eb; background-color: #f9fafb;"><td style="padding: 12px; color: #4b5563; font-weight: 500;">Basic Guideline Obligation (2 children)</td><td style="padding: 12px; text-align: right; color: #111827; font-weight: 500;">' . usc_money($basic) . '</td></tr>
        <tr style="border-bottom: 1px solid #e5e7eb;"><td style="padding: 12px; color: #4b5563;">Paying Parent Share (' . $model . ')</td><td style="padding: 12px; text-align: right; color: #111827;">' . usc_money($payer_share) . '</td></tr>
        <tr style="border-bottom: 1px solid #e5e7eb;"><td style="padding: 12px; color: #b91c1c;">Health-Premium Credit</td><td style="padding: 12px; text-align: right; color: #b91c1c;">-' . usc_money($credit) . '</td></tr>
        <tr style="border-bottom: 1px solid #e5e7eb; background-color: #f0fdf4;"><td style="padding: 12px; font-weight: bold; color: #15803d;">Estimated Monthly Support</td><td style="padding: 12px; text-align: right; font-weight: bold; color: #166534;">~' . usc_money($support) . '</td></tr>
    </tbody>
</table>
<p><em>In this ' . $name . ' example the estimate is based on ' . $basis . '. Real orders vary with exact overnights, deductions, and any judicial deviation; treat this as a guideline figure.</em></p>

<h2>9. ' . usc_pv6_h($state_slug, 'cfactors', ['Factors Affecting Results', 'What Changes the Support Amount', 'Variables That Move the Number', 'What Influences the Estimate']) . '</h2>
<p>' . $sec('factors') . '</p>

<h2>10. ' . usc_pv6_h($state_slug, 'cbenefits', ['Benefits of Using This Calculator', 'Why This Tool Helps', 'What You Gain From It', 'The Advantages at a Glance']) . '</h2>
<p>' . $sec('benefits') . '</p>

<h2>11. ' . usc_pv6_h($state_slug, 'cmistakes', ['Common Mistakes to Avoid', 'Pitfalls That Skew the Estimate', 'Errors People Often Make', 'What Throws Off the Numbers']) . '</h2>
<p>' . $sec('mistakes') . '</p>

<h2>12. ' . usc_pv6_h($state_slug, 'cusecases', ['Practical Use Cases', 'Real-World Scenarios', 'When to Reach for This Tool', 'Everyday Uses']) . '</h2>
<p>' . $sec('usecases') . '</p>

<h2>13. ' . usc_pv6_h($state_slug, 'cset', ['How ' . $name . ' Sets Child Support in {tax_year}', $name . ' Support Guidelines for {tax_year}', 'The Current ' . $name . ' Approach to Support']) . '</h2>
<p>' . $name . ' calculates support under the <strong>' . $model . '</strong>. ' . $model_text . ' States review these guidelines periodically, and judges can deviate for special circumstances, but the core inputs stay the same: each parent\'s income, the number of children, parenting overnights, health insurance, and work-related childcare. Recent updates have mostly nudged the self-support reserve and low-income thresholds upward for inflation, so a current estimate is more reliable than an older one.</p>

<h2>14. ' . usc_pv6_h($state_slug, 'cconclusion', ['Final Thoughts', 'The Bottom Line', 'Wrapping Up', 'Key Takeaways']) . '</h2>
<p>' . $sec('conclusion') . '</p>

<h2>15. Related ' . $name . ' Calculators</h2>
<p>A separation usually touches more than one part of your finances. These free ' . $name . ' tools help you see the full picture:</p>
' . usc_get_related_links_html($state_slug, $name, 'child-support') . '

<h2>16. Child Support Calculators in Nearby States</h2>
<p>Guidelines differ across ' . $x['region'] . '. See how support is set just over the ' . $name . ' border:</p>
' . (function() use ($state_slug) { $h = usc_neighbour_links_html($state_slug, 'child-support', 'Child Support Calculator'); return $h ?: '<p>Explore child support calculators for every U.S. state from the menu above.</p>'; })() . '

<h2>17. Helpful Official Resources</h2>
<p>For authoritative guidance and ' . $name . '\'s official worksheets, start here:</p>
<ul>
    <li><a href="https://www.acf.hhs.gov/css" target="_blank" rel="nofollow noopener">Federal Office of Child Support Services (OCSS)</a> &mdash; program overview and state contacts.</li>
    <li><a href="https://www.childwelfare.gov/topics/systemwide/laws-policies/state/" target="_blank" rel="nofollow noopener">State child-support statutes</a> &mdash; the rules behind ' . $name . '\'s ' . $model . '.</li>
    <li><a href="https://www.usa.gov/child-support" target="_blank" rel="nofollow noopener">USA.gov child support help</a> &mdash; how to open a case or request a modification.</li>
</ul>
<!-- usc-v5-article -->
<!-- usc-cs-v6 -->';

    $html = str_replace('{tax_year}', (function_exists('usac_get_active_tax_year') ? usac_get_active_tax_year() : '2026'), $html);
    return $html;
}

/** V6 FAQ pool for Child Support (state + model aware). Selects 12. */
function usc_cs_faqs_v6($state) {
    $name  = $state['name'];
    $model = $state['cs_model'];
    $state_slug = strtolower(str_replace(' ', '-', $name));

    $pick = function($qkey, $arr) use ($state_slug) {
        return $arr[usc_get_variation_index($state_slug, 'csfaqa_' . $qkey, count($arr))];
    };

    if ($model === 'Income Shares Model') {
        $mdesc = ['In ' . $name . ', support uses the Income Shares Model, both parents\' incomes are combined to set a basic obligation, then divided by each parent\'s income share.',
                  $name . ' follows the Income Shares Model: it pools both incomes, finds the guideline obligation, and splits it proportionally between the parents.',
                  'Under ' . $name . '\'s Income Shares Model, the obligation is based on combined income and shared in proportion to what each parent earns.'];
    } elseif ($model === 'Melson Formula Model') {
        $mdesc = ['In ' . $name . ', support uses the Melson Formula, each parent\'s basic self-support needs are protected first, then support is calculated proportionally from remaining income.',
                  $name . ' applies the Melson Formula, a refinement of Income Shares that reserves a self-support amount before setting the children\'s support.',
                  'Under ' . $name . '\'s Melson Formula, the calculation ensures parents can meet their own basic needs before the children\'s support obligation is set.'];
    } else {
        $mdesc = ['In ' . $name . ', support uses the Percentage of Income Model, it is based on a flat percentage of the paying parent\'s income, with the other parent\'s income generally not counted.',
                  $name . ' follows the Percentage of Income Model, support is a set percentage of the paying parent\'s net resources, scaled to the number of children.',
                  'Under ' . $name . '\'s Percentage of Income Model, the obligation is figured mainly from the paying parent\'s income rather than the combined total.'];
    }

    $faq_pool = [
        ['q' => 'What model does ' . $name . ' use to calculate child support?', 'a' => $mdesc[usc_get_variation_index($state_slug, 'csfaqa_model', count($mdesc))]],
        ['q' => 'Who pays child support in ' . $name . '?', 'a' => $pick('whopays', [
            'Usually the non-custodial parent, the one the child lives with less than half the time, pays support, since the custodial parent is assumed to spend their share directly on the child.',
            'Typically the parent with fewer overnights pays, because ' . $name . ' assumes the other parent already covers daily costs in their home.',
            'The parent who has the child a minority of the time generally pays, though in shared-custody cases the higher earner often pays the difference.',
        ])],
        ['q' => 'Does parenting time affect child support in ' . $name . '?', 'a' => $pick('time', [
            'Yes, heavily. Once the paying parent reaches a certain number of overnights, a shared-parenting credit reduces the monthly obligation.',
            'It does. More overnights with the paying parent generally lower support, since they cover more direct costs themselves.',
            'Parenting time is a key input, crossing ' . $name . '\'s overnight threshold can noticeably change the support figure.',
        ])],
        ['q' => 'Can a ' . $name . ' child support order be modified?', 'a' => $pick('modify', [
            'Yes. Either parent can ask the court to modify support after a substantial change, such as a job loss, income shift, or custody change.',
            'It can. A meaningful change in circumstances, income, custody, or a child\'s needs, lets either parent request a ' . $name . ' modification.',
            'Modifications are allowed when circumstances change significantly; you file a motion with the ' . $name . ' court that holds the case.',
        ])],
        ['q' => 'What does basic child support cover?', 'a' => $pick('covers', [
            'Basic support covers everyday essentials, housing, utilities, food, clothing, and public-school costs. Extras like private school or activities are usually shared separately.',
            'It is meant for core living costs. Health insurance, daycare, and special expenses are typically added on and split proportionally.',
            'Basic support handles the child\'s routine needs; medical premiums and work-related childcare are generally allocated on top.',
        ])],
        ['q' => 'What happens if a parent does not pay support in ' . $name . '?', 'a' => $pick('enforce', [
            'Non-payment can trigger wage garnishment, license suspension, tax-refund interception, credit reporting, and even contempt of court.',
            'Enforcement tools include garnishing wages, suspending licenses, intercepting tax refunds, and reporting to credit bureaus.',
            $name . ' can enforce orders through wage withholding, license holds, passport denial, and other measures for unpaid support.',
        ])],
        ['q' => 'How does alimony affect child support in ' . $name . '?', 'a' => $pick('alimony', [
            'Alimony shifts the income picture, support paid lowers the payer\'s net income and support received raises the recipient\'s, changing the proportional split.',
            'Spousal support is usually folded into the income calculation, which then alters each parent\'s share of the obligation.',
            'Because child support is income-based, alimony paid or received adjusts net resources and therefore the final ' . $name . ' figure.',
        ])],
        ['q' => 'Can a judge deviate from the ' . $name . ' guideline amount?', 'a' => $pick('deviate', [
            'Yes. A judge may order more or less than the guideline if the standard amount would be unjust, citing special needs, travel, or extraordinary costs.',
            'Judges can deviate when the guideline result is inappropriate, for example, for a child\'s special needs or unusual expenses.',
            'Deviation is allowed with justification; the court documents why the ' . $name . ' guideline figure was adjusted.',
        ])],
        ['q' => 'Are child support payments taxable?', 'a' => $pick('tax', [
            'No. Child support is tax-neutral, not taxable to the recipient and not deductible for the payer under federal law.',
            'Federal law treats child support as tax-free, the parent receiving it owes no tax, and the paying parent gets no deduction.',
            'Neither side reports child support on taxes; it is neither income for the recipient nor a deduction for the payer.',
        ])],
        ['q' => 'How is self-employment income handled in ' . $name . '?', 'a' => $pick('selfemp', [
            'For self-employed parents, income is gross receipts minus ordinary, necessary business expenses; courts review tax returns and bank statements closely.',
            'Courts scrutinize self-employment income, examining returns and profit-and-loss statements to prevent under-reporting.',
            'Self-employment income is net business profit, and ' . $name . ' courts look carefully at the documentation behind it.',
        ])],
        ['q' => 'Does ' . $name . ' child support cover college?', 'a' => $pick('college', [
            'Guideline support generally ends at 18 or high-school graduation, but parents can agree in a settlement to share college costs.',
            'Basic support usually stops at the age of majority; college expenses are typically handled by separate agreement.',
            'College is normally outside guideline support, though a divorce decree can require parents to split tuition and related costs.',
        ])],
        ['q' => 'What happens to support if a parent moves out of ' . $name . '?', 'a' => $pick('relocate', [
            'The existing order stays valid after a move. To change it for cost-of-living or travel reasons, you file in the court with jurisdiction.',
            'Relocation does not cancel support, the order remains until a court with jurisdiction modifies it.',
            'An existing ' . $name . ' order continues across state lines; modifications go through the court that holds the case.',
        ])],
        ['q' => 'Does a new spouse\'s income count in ' . $name . '?', 'a' => $pick('newspouse', [
            'Generally no, a new spouse has no legal duty to support a stepchild, so their income usually is not counted.',
            'In most cases a new spouse\'s earnings are excluded, though remarriage can affect tax status reviewed during a modification.',
            'A new spouse\'s income typically does not factor into the ' . $name . ' calculation.',
        ])],
        ['q' => 'Can I withhold support if visitation is denied in ' . $name . '?', 'a' => $pick('withhold', [
            'No. Support and visitation are separate legal matters, you cannot stop paying because visits are denied, nor deny visits over unpaid support.',
            'They are handled independently; withholding support for denied visitation is not allowed and can backfire legally.',
            'Courts treat support and parenting time separately, so disputes must be resolved through the ' . $name . ' court, not by withholding.',
        ])],
        ['q' => 'What counts as income for ' . $name . ' child support?', 'a' => $pick('income', [
            'Income usually includes wages, commissions, bonuses, self-employment profit, interest, dividends, and benefits like Social Security or workers\' compensation.',
            'Most regular income streams count, salary, bonuses, investment income, and many government benefits, before taxes and deductions.',
            'Gross income for support is broad: nearly any recurring source a parent receives is included in the ' . $name . ' calculation.',
        ])],
    ];

    return usc_get_deterministic_faqs($state_slug, $faq_pool, 12);
}
