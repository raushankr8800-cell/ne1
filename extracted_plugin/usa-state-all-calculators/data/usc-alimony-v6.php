<?php
/**
 * Alimony / Spousal Support Calculator — V6 content engine.
 *
 * Same uniqueness approach as Paycheck / Child Support V6:
 *  - 16 human-tone variations per section (13 sections)
 *  - Real per-state touch (cities, region, neighbouring states)
 *  - Varied headings + pooled/shuffled bullet lists
 *  - Per-state FAQ answers (3 phrasings each)
 *
 * Tokens: {state_name} {city1} {city2} {region}
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

/** Returns the Alimony text variations (16 per section). */
function usc_al_variations_v6() {
    return array_merge(usc_alv6_a(), usc_alv6_b(), usc_alv6_c());
}

/** Variation set A: intro, whatis */
function usc_alv6_a() {
    return [
        'intro' => [
            "Money is one of the hardest parts of any divorce, and alimony, or spousal support, is often the most uncertain piece of all. If you are facing a separation in {state_name}, this calculator gives you a realistic estimate of what support might look like, so you can plan your next chapter with clear eyes instead of anxiety.",
            "Whether you expect to pay spousal support or receive it, the same question keeps you up at night: how much, and for how long? In {state_name}, judges weigh income, the length of the marriage, and each spouse's needs. This tool turns those factors into a quick, honest estimate you can plan around.",
            "Alimony rarely comes with a simple answer, because {state_name} gives courts real discretion. Still, most outcomes cluster around predictable patterns based on the income gap and how long you were married. This calculator gives you a grounded starting number for budgeting, mediation, or a talk with your attorney.",
            "Divorce forces you to rebuild a budget from scratch, and spousal support is usually the biggest unknown in that math. Before you sign anything in {state_name}, use this calculator to estimate a fair monthly amount and a likely duration, so you negotiate informed rather than guessing.",
            "Separating in {state_name} brings a flood of financial questions, and alimony sits at the top of the list. Rather than lose sleep over the unknown, enter your details here for a realistic spousal-support estimate you can actually build a plan on.",
            "For anyone in {city1} or across {state_name} going through a divorce, the spousal-support question is daunting. This calculator demystifies it, applying the factors courts care about to give you a clear, judgment-free estimate in moments.",
            "Spousal support is meant to soften the financial shock of divorce, but figuring out the number on your own feels impossible. This {state_name} calculator does the heavy lifting, weighing incomes and marriage length to estimate both the amount and the likely duration.",
            "Few divorce questions cause more worry than alimony, and the uncertainty is the worst part. This {state_name} tool replaces guesswork with a realistic estimate, so whether you will pay or receive, you can plan two budgets with confidence.",
            "Going through a divorce in {state_name} means rebuilding your finances around new realities, and spousal support is central to that. Use this calculator to see a likely monthly figure and duration before you head into mediation or court.",
            "The fear with alimony is almost always the not-knowing. Put a real number on it: this {state_name} calculator applies the income gap and marriage length the way courts do, turning an anxious question into a plannable estimate.",
            "Whether you are the higher earner bracing for payments or the lower earner counting on support, clarity helps. This {state_name} spousal-support calculator gives both sides an objective figure to ground the conversation.",
            "Divorce is stressful enough without financial uncertainty hanging over it. This {state_name} tool estimates spousal support and its likely duration, so you can approach negotiations with facts instead of fear.",
            "People across {state_name}, from {city1} to {city2}, use tools like this to get ahead of the alimony question. Instead of waiting for a court date, you can see a realistic estimate now and start planning your post-divorce finances today.",
            "A clear head starts with clear numbers. This {state_name} alimony calculator takes both spouses' incomes and the length of the marriage and estimates support, fast, free, and judgment-free.",
            "Spousal support can feel like the most arbitrary part of a divorce, but it follows recognizable patterns. This {state_name} calculator surfaces those patterns, giving you a realistic estimate to plan and negotiate around.",
            "Knowing roughly what alimony might look like in {state_name} takes a huge weight off your mind. This calculator applies the same core factors courts use to give you a dependable estimate before you ever set foot in a courtroom."
        ],
        'whatis' => [
            "A <strong>{state_name} Alimony Calculator</strong> is a financial tool that estimates monthly spousal support and how long it may last. It takes both spouses' gross incomes and the marriage length, then applies {state_name}'s guidelines and common legal formulas.",
            "The <strong>{state_name} Alimony Calculator</strong> is an educational guide for estimating spousal maintenance. Enter annual incomes, marriage duration, and child-support adjustments, and it returns a clear breakdown of the post-divorce income split.",
            "This <strong>{state_name} Spousal Support Calculator</strong> applies recognized formulas to estimate maintenance obligations. It projects the monthly payment and the likely number of years support will run, mirroring how family-law professionals approach it.",
            "Think of the <strong>{state_name} Alimony Calculator</strong> as a planning tool for the most uncertain part of divorce. It weighs the income gap and marriage length to estimate a realistic support amount and duration.",
            "A <strong>{state_name} Alimony Calculator</strong> answers two hard questions, how much spousal support and for how long, by running your incomes and marriage length through the factors {state_name} courts consider.",
            "The <strong>{state_name} Alimony Calculator</strong> is a free estimator for spousal support. Provide both incomes and the length of the marriage, and it produces a guideline-style estimate you can plan around.",
            "Put simply, the <strong>{state_name} Alimony Calculator</strong> converts your financial details and marriage length into an estimated monthly support figure and a likely term, the two numbers that matter most in a settlement.",
            "A <strong>{state_name} Alimony Calculator</strong> is a decision-support tool for divorcing spouses. It models the income gap and duration factors that drive support, so you can see a realistic figure before negotiations begin.",
            "Consider the <strong>{state_name} Alimony Calculator</strong> a translation layer between messy divorce finances and a workable number. It applies the relevant factors to estimate spousal support and its duration.",
            "The <strong>{state_name} Alimony Calculator</strong> is an online tool that mirrors how spousal support is approached in {state_name}. Using incomes and marriage length, it estimates the monthly amount and likely term.",
            "In practical terms, a <strong>{state_name} Alimony Calculator</strong> is your what-if machine for divorce finances. Adjust incomes or marriage length and it instantly re-estimates the support figure.",
            "A <strong>{state_name} Alimony Calculator</strong> takes the guesswork out of spousal support. It applies {state_name}'s relevant factors to your inputs and breaks the result into a clear monthly estimate and duration.",
            "The <strong>{state_name} Alimony Calculator</strong> is a self-service estimator for spouses in {city1} and across the state. It uses incomes and marriage length to project a realistic support figure.",
            "Think of the <strong>{state_name} Alimony Calculator</strong> as a financial mirror for divorce: it reflects what spousal support might look like, so both spouses can plan two separate households realistically.",
            "A <strong>{state_name} Alimony Calculator</strong> is a tool that replicates the factor-based approach courts use. It weighs incomes and marriage length to estimate a fair monthly support amount and term.",
            "The <strong>{state_name} Alimony Calculator</strong> is a quick, judgment-free way to see likely spousal support. Enter your details and it applies {state_name}'s factors to reveal an estimate for mediation or budgeting."
        ]
    ];
}


/** Variation set B: why, how, types, duration */
function usc_alv6_b() {
    return [
        'why' => [
            "Estimating spousal support in advance gives you real financial predictability. It helps you draft a realistic two-household budget, prepare for mediation with objective figures, weigh settlement offers, and plan your post-divorce future in {state_name}.",
            "Running your numbers through a maintenance tool clarifies your position. You can see how support shifts each spouse's disposable income, test how marriage length caps the duration, and make informed choices during {state_name} negotiations.",
            "Whether you are the likely payor or recipient in {state_name}, an estimate provides objective ground. It removes guesswork, helping both spouses align on fair expectations before expensive court proceedings begin.",
            "Knowing the likely number early changes the whole process. Use this {state_name} estimate to budget two homes, prepare for mediation, and avoid being blindsided by a support figure you never saw coming.",
            "A quick estimate now can prevent conflict later. By seeing how the income gap and marriage length drive the {state_name} figure, both spouses start from the same realistic baseline.",
            "This calculator is your planning sandbox. Adjust incomes or marriage length and watch the {state_name} support estimate change, useful for testing scenarios before you commit to a settlement.",
            "Support talks go better with facts. Use this tool to get a guideline-style number for {state_name}, then focus the conversation on a fair outcome rather than arguing over what the amount should be.",
            "For spouses in {city1} and across {state_name}, an early estimate means fewer surprises. You can plan rent, insurance, and savings around a realistic figure instead of waiting anxiously for a court order.",
            "Running the numbers helps you prepare, not just react. With a {state_name} estimate in hand, you can ready your finances, gather documents, and meet with a mediator or attorney already informed.",
            "It puts both spouses on more equal footing. Because the estimate is factor-based and transparent, each side can see the same objective number, which tends to reduce friction during a hard time.",
            "Whether you expect to pay or receive, clarity helps. This {state_name} tool shows how support responds to income changes and marriage length, so you can plan for different outcomes.",
            "Use it to stress-test your budget. Before agreeing to a settlement in {state_name}, see how the proposed amount and duration affect your household's bottom line for years to come.",
            "An estimate is a powerful negotiation tool. Walking into {state_name} mediation with a realistic figure means the discussion starts from a shared baseline instead of two very different guesses.",
            "It saves time, money, and stress. Instead of paying for hours of legal calculation, get a solid {state_name} estimate here first and use professional time for the genuinely tricky questions.",
            "Planning beats worrying. This calculator gives {state_name} spouses a concrete number to build budgets around, so both households can prepare for life after the divorce.",
            "The clearer the math, the calmer the process. Use this {state_name} estimate to understand likely support, plan ahead, and keep the focus on rebuilding rather than fighting over numbers."
        ],
        'how' => [
            "Unlike child support's rigid formulas, spousal support leans heavily on {state_name} law and judicial discretion. Courts weigh the income gap, the length of the marriage, the marital standard of living, and each spouse's earning capacity to set an amount.",
            "In {state_name}, alimony is factor-driven rather than purely formulaic. The income difference between spouses is the main trigger, then duration, standard of living, and any career sacrifices shape the final award.",
            "Spousal support in {state_name} is calculated from several factors at once: how far apart the incomes are, how long the marriage lasted, the lifestyle it supported, and whether one spouse gave up career growth.",
            "The calculation blends formula and discretion. {state_name} courts start with the earnings gap, consider marriage length to set duration, and adjust for the standard of living and each spouse's ability to earn.",
            "Courts in {state_name} look at the whole financial picture: the disparity in incomes, the marriage's length, the lifestyle both spouses were used to, and the recipient's realistic path to self-support.",
            "Alimony math in {state_name} is more nuanced than child support. A judge weighs income difference, duration, contributions to the household, and earning potential, which is why estimates are guidance, not guarantees.",
            "The process starts with the income gap, the single biggest driver, then layers in marriage length, standard of living, and caregiving or career sacrifices that {state_name} courts recognize.",
            "In {state_name}, support reflects need and ability to pay. The court measures the gap between spouses, sets a duration tied to the marriage length, and adjusts for lifestyle and earning capacity.",
            "Spousal support is determined by balancing factors: the earnings disparity, how long you were married, the marital lifestyle, and whether the lower earner needs time or training to recover income.",
            "{state_name} judges apply discretion within guidelines. They examine the income difference, the duration of the marriage, the established standard of living, and each spouse's future earning ability.",
            "The award flows from a few key inputs: the income gap that creates the need, the marriage length that bounds the duration, and the lifestyle the court tries to preserve where feasible.",
            "Calculating support in {state_name} means weighing the higher earner's ability to pay against the lower earner's need, with marriage length and standard of living adjusting the result.",
            "Courts consider statutory factors in {state_name}: incomes and earning capacity, the length of the marriage, the marital standard of living, and contributions like homemaking or supporting a spouse's education.",
            "The method combines objective and subjective elements. The numbers, income gap and duration, set the baseline, while the standard of living and career sacrifices fine-tune the {state_name} award.",
            "Alimony is set by examining how unequal the incomes are, how long the couple was married, and what lifestyle the marriage supported, all viewed through {state_name}'s judicial discretion.",
            "In practice, {state_name} courts start from the earnings difference, use marriage length to frame the duration, and then adjust for standard of living, caregiving roles, and realistic earning capacity."
        ],
        'types' => [
            "Not all alimony is the same. Depending on your circumstances, a {state_name} court may order temporary support during the divorce, rehabilitative support to fund retraining, durational support for a set term, or, more rarely, permanent support.",
            "{state_name} recognizes several kinds of spousal support: temporary (while the case is pending), rehabilitative (to help the lower earner become self-sufficient), durational (for a fixed period), and occasionally permanent for long marriages.",
            "Spousal support comes in different forms. In {state_name} you may see temporary support during proceedings, rehabilitative support for education or job training, term support tied to marriage length, or reimbursement support for funding a spouse's schooling.",
            "There is no single type of alimony. {state_name} courts choose among temporary, rehabilitative, durational, reimbursement, and (rarely) permanent support, depending on the marriage and each spouse's situation.",
            "The form of support matters as much as the amount. {state_name} can order temporary support to bridge the divorce, rehabilitative support to rebuild earning power, or durational support for a defined number of years.",
            "Different situations call for different awards. A {state_name} judge might grant rehabilitative support to fund a degree, durational support for a set term, or reimbursement support to repay a spouse who financed the other's training.",
            "Alimony in {state_name} is not one-size-fits-all. Common types include temporary (pendente lite) support, rehabilitative support, term or durational support, and permanent support reserved for long marriages.",
            "Courts tailor the type of support to the case. In {state_name}, that can mean temporary support during the divorce, rehabilitative support for a fresh start, or durational support tied to how long you were married.",
            "Several support types exist in {state_name}: temporary support keeps both households running during the case, rehabilitative support funds a return to work, and durational support runs for a fixed period.",
            "The label on the support shapes its purpose. {state_name} uses rehabilitative support to build self-sufficiency, durational support for a set term, reimbursement support for past sacrifices, and permanent support only in rare cases.",
            "Expect more than one option. A {state_name} court can combine or choose among temporary, rehabilitative, durational, reimbursement, and permanent spousal support based on your circumstances.",
            "Spousal support types in {state_name} range from short-term to long-term: temporary during proceedings, rehabilitative to fund training, durational for a defined term, and permanent in limited long-marriage cases.",
            "The right type depends on need and marriage length. {state_name} courts lean on rehabilitative and durational support most, with permanent support increasingly rare and reserved for special situations.",
            "Knowing the categories helps you plan. In {state_name}, temporary support is interim, rehabilitative support is goal-oriented, durational support is time-limited, and reimbursement support repays a specific contribution.",
            "Alimony can take several shapes in {state_name}. The most common are rehabilitative and durational support; temporary support covers the divorce period, while permanent support applies only to long marriages.",
            "A {state_name} court picks the support type that fits: temporary to stabilize finances now, rehabilitative to restore earning power, durational for a set run, or reimbursement to repay schooling support."
        ],
        'duration' => [
            "Duration usually tracks the length of the marriage. As a rough rule many {state_name} courts lean on, shorter marriages bring brief, transitional support, while long marriages (often 20 years or more) can lead to long-term or even indefinite support.",
            "How long support lasts in {state_name} mostly depends on how long you were married. Short and moderate marriages typically see support for a fraction of the marriage length; long marriages can qualify for extended or open-ended support.",
            "In {state_name}, marriage length is the biggest driver of duration. A short marriage may yield only a year or two of transitional support, whereas a decades-long marriage can support a much longer, sometimes indefinite, award.",
            "The term of alimony is tied closely to the marriage's length. {state_name} courts often grant support for roughly 30% to 50% of the marriage duration in shorter cases, with long marriages opening the door to permanent support.",
            "Expect duration to scale with the marriage. In {state_name}, brief marriages bring short transitional support, moderate marriages a proportionate term, and long marriages potentially long-term or indefinite maintenance.",
            "Support rarely lasts forever. In {state_name}, the length of the marriage sets the expectation, short marriages get short support, and only long marriages typically justify extended or permanent awards.",
            "Duration in {state_name} reflects how long the couple was married. Reaching retirement age, the recipient remarrying, or either spouse passing away will usually end the obligation regardless of the original term.",
            "The clock on alimony is set mainly by marriage length. {state_name} courts use it as a benchmark, with transitional support for short marriages and the possibility of indefinite support after very long ones.",
            "How long you pay or receive support depends largely on duration of the marriage in {state_name}. Events like remarriage, cohabitation, or retirement can shorten or end it before the scheduled term.",
            "Marriage length frames the term in {state_name}. Many courts treat a 10- or 20-year mark as a threshold beyond which longer-term or indefinite support becomes more likely.",
            "Support duration is proportional in most {state_name} cases. The longer the marriage, the longer the likely term, while short marriages tend to bring only brief, get-back-on-your-feet support.",
            "In {state_name}, the duration question usually comes down to marriage length and the recipient's path to self-support. Long marriages and limited earning capacity point toward longer awards.",
            "Alimony in {state_name} typically ends on a set date tied to the marriage length, or sooner on remarriage, cohabitation, retirement, or death. Long marriages are the main exception, where support can run indefinitely.",
            "The length of support follows the length of the marriage in {state_name}. Treat any duration estimate as a starting point, since judges keep discretion and life events can change the timeline.",
            "Duration is rarely arbitrary. {state_name} courts anchor it to the marriage length, granting transitional support for short unions and reserving long-term or permanent support for lengthy marriages.",
            "Most {state_name} support orders are time-limited and tied to how long you were married, with built-in end events, remarriage, cohabitation, or retirement, that can conclude the obligation earlier."
        ]
    ];
}


/** Variation set C: taxrules, inputs, howtouse, example, mistakes, usecases, conclusion */
function usc_alv6_c() {
    return [
        'taxrules' => [
            "Under the Tax Cuts and Jobs Act (for divorces finalized after January 1, 2019), alimony is tax-neutral federally: the payer cannot deduct it, and the recipient does not report it as income. Some {state_name} state rules may still differ, so confirm locally.",
            "Federal tax treatment changed in 2019. For newer {state_name} divorces, spousal support is paid with post-tax dollars, no deduction for the payer, no taxable income for the recipient. A few states keep their own deductions.",
            "Since 2019, alimony has been tax-neutral on federal returns. In {state_name}, that means the paying spouse gets no federal deduction and the receiving spouse owes no federal tax on support, though state treatment can vary.",
            "The post-2018 rules matter. For divorces finalized after 2018, {state_name} payers cannot deduct alimony federally and recipients do not count it as income, a reversal of the old system that affects negotiations.",
            "Taxes shape the real cost of support. Under current federal law, alimony in {state_name} is neither deductible by the payer nor taxable to the recipient, so the headline number is also the after-tax number federally.",
            "Know the tax angle before you settle. For modern {state_name} divorces, spousal support is tax-neutral federally, which changes how much a given payment really costs the payer compared with pre-2019 rules.",
            "The 2017 tax law (effective 2019) flipped alimony's treatment. In {state_name}, support is now paid in post-tax dollars, with no federal deduction for the payer and no federal tax for the recipient.",
            "Federal rules treat alimony as tax-neutral for divorces after 2018. That means in {state_name}, neither spouse adjusts their federal return for support, though some state codes still allow a deduction.",
            "Don't overlook taxes when comparing offers. Current federal law makes {state_name} alimony non-deductible and non-taxable, so a dollar of support is a full dollar of cost to the payer.",
            "For divorces finalized since 2019, alimony is off the federal tax grid: {state_name} payers get no write-off and recipients report nothing. State-level treatment can still differ, so check {state_name} rules.",
            "The tax treatment is simpler now but costlier for payers. In {state_name}, post-2018 alimony is paid after tax, with no federal deduction, which is why the duration and amount matter so much.",
            "Under federal law since 2019, spousal support is tax-neutral. {state_name} recipients keep the full payment tax-free federally, and payers cannot deduct it, a key factor in any settlement math.",
            "Tax rules quietly drive negotiations. Because {state_name} alimony is no longer deductible federally (for post-2018 divorces), payers often push for lower amounts than they might have under the old rules.",
            "Remember the federal change: alimony from a post-2018 {state_name} divorce is not deductible and not taxable. Some states still permit a state-level deduction, so confirm how {state_name} handles it.",
            "Current federal law treats alimony as tax-neutral. For {state_name} divorces after 2018, the payer uses post-tax dollars and the recipient receives tax-free support, with possible state-level differences.",
            "The tax picture is straightforward today: no federal deduction, no federal income. In {state_name}, that makes the gross support figure the true cost, an important point when weighing amount against duration."
        ],
        'inputs' => [
            "To estimate support, you will need both spouses' gross incomes, the length of the marriage, and any child-support obligations. Adding deductions and filing status sharpens the {state_name} estimate further.",
            "The calculator needs a few essentials: the higher and lower earner's incomes, how long you were married, and whether children are involved. These drive the {state_name} support and duration estimate.",
            "Have these ready: both annual incomes, the marriage length in years, and any existing child-support figures. The more accurate they are, the closer the {state_name} estimate lands.",
            "You will enter each spouse's income, the duration of the marriage, and child-support details if relevant. {state_name} support hinges on the income gap and length, so accuracy there matters most.",
            "Provide both gross incomes and the marriage length, then add child-support obligations and filing status. Those inputs let the tool apply {state_name}'s factor-based approach to estimate support.",
            "Gather the basics: payer and recipient incomes, years married, and any children. With those, the calculator can project a realistic {state_name} spousal-support amount and term.",
            "The required inputs are simple, both incomes and the length of the marriage, with optional details like child support and deductions to refine the {state_name} estimate.",
            "Start with the two incomes and the marriage duration, then layer in child-support and tax-status details. These few fields drive the entire {state_name} support calculation.",
            "Make sure you have each spouse's gross income, the number of years married, and any child-support amounts. Those are the core drivers of the {state_name} estimate.",
            "Enter the higher and lower earner's income, the marriage length, and child-support obligations. Including accurate figures here separates a rough guess from a reliable {state_name} estimate.",
            "The tool asks for both incomes, marriage duration, and child-support details. Because {state_name} support depends on the income gap, precise income figures matter the most.",
            "You need the financial picture: both gross incomes, years married, and any child support. Optional deductions and filing status help the calculator fine-tune the {state_name} result.",
            "Collect both spouses' incomes and the length of the marriage, then add child-support and deduction details. These inputs mirror what a {state_name} court would weigh.",
            "Provide payer and recipient incomes, the marriage duration, and child-support obligations. Accurate inputs let the calculator estimate both the {state_name} amount and the likely term.",
            "The essentials are both incomes and marriage length; add children and deductions for a sharper figure. Together they let the tool apply {state_name}'s support factors.",
            "Feed it both gross incomes, the years married, and any child-support amounts. With those, the calculator projects a realistic {state_name} spousal-support estimate and duration."
        ],
        'howtouse' => [
            "Using the tool is simple: enter the paying spouse's income, the receiving spouse's income, the length of the marriage, and any child support, then click calculate for a {state_name} support and duration estimate.",
            "To estimate support, input both incomes, set the marriage length, add child-support details, and run the calculation for a clear {state_name} breakdown of the monthly amount and term.",
            "Just follow the flow: enter the higher and lower earner's incomes, the years married, and any children, then press calculate. The tool maps out the {state_name} estimate instantly.",
            "Start by entering both spouses' incomes and the marriage duration, then add child-support figures. One click later you will have a {state_name} spousal-support estimate to plan around.",
            "It takes under a minute: input both incomes, the marriage length, and child support, then calculate. The {state_name} result shows the likely monthly amount and how long it may last.",
            "Enter the payer's income, the recipient's income, and the years married, then add any child support and calculate. The tool handles the {state_name} factors and presents the numbers clearly.",
            "Type both incomes into the fields, set the marriage length, include child-support details, and hit calculate. The {state_name} alimony calculator does the rest, instantly and privately.",
            "Working it is intuitive: provide both incomes and the marriage duration, add children if relevant, and run it. Within seconds you will see a {state_name} support estimate and term.",
            "Add the higher and lower incomes, choose the marriage length, and enter child-support figures. Hit calculate to reveal your {state_name} spousal-support estimate with a clear breakdown.",
            "The steps are quick: enter incomes, set marriage length, add child support, and calculate. Whether you are in {city1} or elsewhere in {state_name}, the tool applies the same factors.",
            "Pop in both spouses' incomes, the years married, and any children, then calculate. The {state_name} estimate appears immediately, so you can tweak inputs and watch it update.",
            "Simply enter the two incomes, the marriage duration, and child-support details, then click calculate. The calculator returns a tidy {state_name} summary of amount and likely duration.",
            "To run it, fill in both incomes, the marriage length, and any child support. One calculation later, your {state_name} spousal-support estimate is broken into clear figures.",
            "Begin with both incomes and the marriage duration, add child-support details, and press calculate. The tool shows your {state_name} support estimate plus the factors behind it.",
            "It is a simple flow: enter incomes and marriage length, add children, and calculate. The {state_name} breakdown that follows is detailed enough to plan a real budget around.",
            "Enter your numbers, set the marriage length and child-support details, and calculate, that is it. The calculator translates it into a guideline {state_name} spousal-support estimate."
        ],
        'example' => [
            "Imagine a ten-year marriage in {state_name} where one spouse earns $9,000 a month and the other $3,000. Many formulas land near 30% of the payer's income minus part of the recipient's, putting support roughly in the $1,500 to $2,000 range for a few years.",
            "Consider a {state_name} example: a 10-year marriage, payer at $9,000 monthly, recipient at $3,000. A common approach yields support around $1,500 to $2,000 a month for a term tied to the marriage length.",
            "To see the math, picture a {state_name} couple married 10 years, incomes of $9,000 and $3,000 per month. Typical guidelines suggest monthly support in the $1,500 to $2,000 range, adjusted for children and assets.",
            "Here is a worked {state_name} example: after a 10-year marriage, the higher earner makes $9,000 a month and the lower earner $3,000. Support often falls near $1,500 to $2,000 monthly for several years.",
            "Picture a couple in {city1}: married 10 years, one earning $9,000 a month, the other $3,000. Many {state_name} formulas estimate support around $1,500 to $2,000, with duration tied to the marriage.",
            "Take a typical {state_name} scenario, a decade-long marriage, $9,000 versus $3,000 monthly incomes. The income gap commonly produces support in the $1,500 to $2,000 range for a transitional period.",
            "Suppose, in {state_name}, a 10-year marriage ends with incomes of $9,000 and $3,000 per month. A standard estimate puts monthly support near $1,500 to $2,000, before adjustments for kids or unusual assets.",
            "Let's model a {state_name} case: 10 years married, payer at $9,000 monthly, recipient at $3,000. Support typically lands around $1,500 to $2,000 a month for a term proportionate to the marriage.",
            "Imagine a {state_name} divorce after 10 years, with a $9,000 and $3,000 monthly income split. Common formulas suggest roughly $1,500 to $2,000 in monthly support, depending on the details.",
            "For illustration, a {state_name} couple married a decade earns $9,000 and $3,000 per month. The resulting support estimate often sits between $1,500 and $2,000 monthly for a handful of years.",
            "Here is how it plays out in {state_name}: a 10-year marriage, monthly incomes of $9,000 and $3,000, and an estimated support figure around $1,500 to $2,000, shaped by children and assets.",
            "Consider a practical {state_name} example, married 10 years, payer earning $9,000 a month, recipient $3,000, and follow the math to monthly support in the $1,500 to $2,000 range.",
            "Let's run the numbers for a couple in {city2}: 10-year marriage, $9,000 and $3,000 monthly incomes. {state_name} guidelines commonly point to support near $1,500 to $2,000 a month.",
            "Take a {state_name} case: a 10-year marriage with a $9,000 payer and a $3,000 recipient. The estimate usually lands around $1,500 to $2,000 monthly, adjusted for any children or special circumstances.",
            "As a sample, picture a {state_name} couple married 10 years with $9,000 and $3,000 monthly incomes. Support typically estimates to $1,500 to $2,000 a month for a marriage-linked term.",
            "Here's a down-to-earth {state_name} example: after 10 years, one spouse earns $9,000 monthly and the other $3,000. Expect a support estimate in the $1,500 to $2,000 range, fine-tuned by your specifics."
        ],
        'mistakes' => [
            "A common slip is confusing alimony with child support, they are separate awards with different rules, and {state_name} courts usually calculate child support first.",
            "Watch for the post-2018 tax change: for newer {state_name} divorces, alimony is not deductible by the payer or taxable to the recipient. Budgeting with the old rules will mislead you.",
            "Don't ignore duration. In {state_name}, a lower monthly payment over many years can cost more than a higher payment over a short term, always weigh amount and length together.",
            "Using gross income instead of net is a frequent error. For real {state_name} household budgeting, compare after-tax figures so the support number reflects actual spending power.",
            "Many people overlook modifications. A job loss, big raise, remarriage, or cohabitation can change a {state_name} order later, assuming today's number is permanent is a mistake.",
            "A typical error is treating any estimate as a guarantee. {state_name} judges keep real discretion, so use the figure as a starting point for planning, not a fixed outcome.",
            "Forgetting state-specific rules trips people up. {state_name} may treat alimony differently from federal law, especially on state taxes, so confirm local details before relying on a number.",
            "Don't conflate the types of support. Temporary, rehabilitative, and durational alimony serve different purposes in {state_name}, and mixing them up distorts your expectations.",
            "Overlooking children's impact is common. Child support is usually calculated first in {state_name}, and it can change the income figures used for the spousal-support estimate.",
            "A classic mistake is negotiating amount without duration. In {state_name}, the total cost of support depends on both, so focus on the combination, not just the monthly figure.",
            "People often forget that cohabitation or remarriage can end support. In {state_name}, the recipient moving in with a partner can be grounds to reduce or terminate alimony.",
            "Be careful using outdated tax assumptions. Pre-2019 {state_name} divorces followed the old deductible/taxable rules; newer ones do not, and confusing the two skews the math.",
            "Skipping documentation is a quiet error. Keeping clear records of income and payments makes any future {state_name} modification far easier to prove, for either spouse.",
            "Assuming permanence is risky. Most {state_name} support is time-limited or modifiable, so plan for change rather than treating the order as fixed forever.",
            "Don't ignore earning capacity. {state_name} courts consider what each spouse could earn, not just current income, so voluntary underemployment may not lower support as expected.",
            "A common pitfall is signing a non-modifiable agreement without realizing it. In {state_name}, that can lock in support even if circumstances change, so read settlements carefully."
        ],
        'usecases' => [
            "This calculator is useful during mediation to set fair terms, when weighing a settlement offer, or when planning your post-divorce budget in {state_name} before anything is finalized.",
            "Practical uses include preparing realistic numbers for {state_name} mediation, evaluating a proposed support amount and duration, and budgeting two households after separation.",
            "Use it to estimate support during divorce proceedings, test how marriage length affects the term, or prepare informed questions before meeting a {state_name} family-law attorney.",
            "Reach for it when negotiating a settlement in {city1}, planning your finances for life after divorce, or checking whether a proposed {state_name} figure is in a reasonable range.",
            "It shines for mediation prep, settlement evaluation, and budget planning, anytime you need an objective {state_name} spousal-support figure to ground the conversation.",
            "Common scenarios: estimating support before filing, comparing settlement offers, and seeing how income changes or marriage length would shift the {state_name} number.",
            "Whether you are starting a divorce or reviewing a proposal, the tool helps, estimate {state_name} support, test scenarios, and prepare for mediation or court with realistic figures.",
            "Use it to plan finances after a separation, to evaluate a proposed amount and term, or to sanity-check the figure your attorney or the {state_name} court suggests.",
            "Typical uses include preparing for {state_name} mediation, modelling how a raise or job loss changes support, and confirming how duration affects the total cost.",
            "It is handy when incomes change, when a marriage was long or short, or when you simply want a realistic {state_name} estimate before committing to a settlement.",
            "Lean on it during mediation, when reviewing an offer, or while budgeting two homes, each time it gives a guideline-style {state_name} figure to work from.",
            "Practical applications: estimating support for a settlement, testing income and duration scenarios, and verifying the reasonableness of a proposed {state_name} order.",
            "Use the calculator to compare settlement options, plan around a likely obligation, or prepare informed questions for a {state_name} divorce mediator.",
            "From first filings to final settlements, it answers the key questions in {state_name}: how much support is realistic, and how long might it last?",
            "Whether budgeting in {city1}, preparing for mediation, or weighing an offer, this tool gives the {state_name} spousal-support estimate those decisions need.",
            "It is built for real decisions, estimating support, planning budgets, testing scenarios, and walking into {state_name} mediation or court already informed."
        ],
        'conclusion' => [
            "Spousal support is rarely just about money, but a clear number takes much of the fear out of the process. Use this {state_name} estimate to budget two households, prepare for mediation, and have grounded conversations with your attorney.",
            "No calculator replaces a judge or a good family lawyer, but walking in with a realistic {state_name} figure puts you in a stronger position. Treat this as your baseline and keep your income details accurate.",
            "The clearer you are on the numbers, the easier the rest becomes. This {state_name} alimony estimate helps both spouses plan; bookmark it and re-run it whenever an income or the proposed duration changes.",
            "Divorce is hard, but uncertainty makes it harder. With a realistic {state_name} support estimate in hand, you can plan your next chapter, prepare for negotiations, and avoid unpleasant surprises.",
            "Use this {state_name} figure to replace worry with a plan. Whether you will pay or receive, knowing the likely amount and duration lets you budget with confidence and negotiate from facts.",
            "At the end of the day, support is about a fair financial reset for both spouses. This {state_name} calculator gives you an objective starting point, come back whenever your situation changes.",
            "Knowing your likely {state_name} obligation early makes every next step calmer, mediation, court, or a negotiated settlement. Keep this tool handy and update it as things evolve.",
            "A realistic number changes the tone of the whole conversation. Use this {state_name} estimate to plan ahead, prepare for negotiations, and keep the focus on rebuilding rather than fighting.",
            "Spousal support should not be a guessing game. Now that you can see a realistic {state_name} figure, you can budget, negotiate, and plan your post-divorce life with far more confidence.",
            "Bookmark this {state_name} calculator and return whenever life shifts, a new job, a move, a change in income. Each one can move the number, and a quick re-check keeps your plan accurate.",
            "The bottom line: clear numbers reduce conflict and stress. Use this {state_name} estimate as the foundation for fair, informed decisions about spousal support.",
            "Understanding {state_name} alimony is a step toward control. Keep this estimate close, run it before negotiations, and let real numbers guide a fair, workable outcome.",
            "You started uncertain about support; now you have a realistic figure. Use this {state_name} tool to plan two budgets, prepare for mediation, and move forward with clarity.",
            "There is real peace of mind in seeing a grounded number. For spouses in {city1} and beyond, this {state_name} calculator turns a stressful unknown into a plannable estimate.",
            "Treat this estimate as your starting line, not the finish. Bookmark the {state_name} calculator, revisit it as incomes and circumstances change, and approach every conversation prepared.",
            "In the end, the goal is a fair financial fresh start. This {state_name} alimony calculator hands you a realistic figure in seconds, come back whenever your situation shifts."
        ]
    ];
}


/**
 * Builds the full V6 Alimony article for a given state (~1,100-1,300 words).
 */
function usc_al_article_v6($state) {
    $name = $state['name'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $city1 = $x['cities'][0];
    $city2 = isset($x['cities'][1]) ? $x['cities'][1] : $x['cities'][0];

    $replacements = [
        'state_name' => $name,
        'city1'      => $city1,
        'city2'      => $city2,
        'region'     => $x['region'],
    ];

    $pool = usc_al_variations_v6();
    $sec = function($key) use ($state_slug, $pool, $replacements) {
        return usc_get_section_content($state_slug, $key, $pool, $replacements);
    };

    $html = '<h2>1. ' . usc_pv6_h($state_slug, 'aintro', ['Introduction', 'Getting Started', 'Overview', 'Spousal Support in ' . $name . ', Explained']) . '</h2>
<p>' . $sec('intro') . '</p>

<h2>2. ' . usc_pv6_h($state_slug, 'awhatis', ['What is a ' . $name . ' Alimony Calculator?', 'What This ' . $name . ' Calculator Does', 'Meet the ' . $name . ' Alimony Calculator', 'What Exactly Is This Tool?']) . '</h2>
<p>' . $sec('whatis') . '</p>

<h2>3. ' . usc_pv6_h($state_slug, 'awhy', ['Why Estimate Spousal Support?', 'Why Use This Calculator?', 'Reasons to Estimate First', 'Why Run Your Numbers Now?']) . '</h2>
<p>' . $sec('why') . '</p>
' . usc_pv6_list($state_slug, 'awhy', [
    '<strong>Budgeting Predictability:</strong> Plan rent, insurance, and utilities for two separate households with a realistic monthly figure.',
    '<strong>Mediation Baseline:</strong> Objective guidelines beat arbitrary demands and lead to faster, calmer settlements.',
    '<strong>Saves Legal Costs:</strong> Understand the likely range before spending on attorney billable hours.',
    '<strong>Test Scenarios:</strong> See how a different income or marriage length changes the ' . $name . ' estimate.',
    '<strong>Plan the Duration:</strong> Weigh a lower payment over a long term against a higher payment over a short one.',
    '<strong>Reduce Conflict:</strong> A shared, factor-based number keeps the discussion grounded in facts.',
    '<strong>Prepare for Court:</strong> Walk into a ' . $name . ' hearing with a defensible, realistic figure.',
], 5) . '

<h2>4. ' . usc_pv6_h($state_slug, 'ahow', ['How Alimony is Calculated in ' . $name, 'How ' . $name . ' Courts Set Support', 'What Drives the Support Amount', 'How the Estimate Is Built']) . '</h2>
<p>' . $sec('how') . '</p>
<ol>
    <li><strong>Income Discrepancy:</strong> A significant gap between the spouses\' earning capacities is the primary trigger for support.</li>
    <li><strong>Marriage Duration:</strong> The length of the marriage shapes how long support is paid, from brief transitional terms to long-term awards.</li>
    <li><strong>Standard of Living:</strong> Courts try to keep both spouses near the lifestyle established during the marriage where feasible.</li>
    <li><strong>Earning Capacity &amp; Caregiving:</strong> Career sacrifices, such as raising children or supporting a spouse\'s education, are weighed.</li>
</ol>

<h2>5. ' . usc_pv6_h($state_slug, 'atypes', ['Common Types of Spousal Support in ' . $name, 'Types of Alimony in ' . $name, 'The Different Kinds of Support', 'Forms Spousal Support Can Take']) . '</h2>
<p>' . $sec('types') . '</p>
' . usc_pv6_list($state_slug, 'atypes', [
    '<strong>Temporary (pendente lite) support:</strong> paid while the divorce is in progress to keep both households afloat.',
    '<strong>Rehabilitative support:</strong> the most common type, funding education, training, or a job search toward self-support.',
    '<strong>Durational / term support:</strong> paid for a set number of years, often tied to the length of the marriage.',
    '<strong>Permanent support:</strong> increasingly rare, usually reserved for long marriages where self-sufficiency is unrealistic.',
    '<strong>Reimbursement support:</strong> repays a spouse who financed the other\'s schooling or career training.',
], 4) . '

<h2>6. ' . usc_pv6_h($state_slug, 'aduration', ['How Long Does Alimony Last in ' . $name . '?', 'Duration of Support in ' . $name, 'How Long Will Support Run?', 'The Length of an Alimony Award']) . '</h2>
<p>' . $sec('duration') . '</p>

<h2>7. ' . usc_pv6_h($state_slug, 'ataxrules', ['Tax Rules for Alimony Payments', 'How Alimony Is Taxed', 'The Tax Treatment of Support', 'Alimony and Your Taxes']) . '</h2>
<p>' . $sec('taxrules') . '</p>
<ul>
    <li><strong>Payer spouse:</strong> for divorces finalized after 2018, alimony is <strong>not tax-deductible</strong> federally.</li>
    <li><strong>Recipient spouse:</strong> alimony received is <strong>not federally taxable income</strong>.</li>
</ul>

<h2>8. ' . usc_pv6_h($state_slug, 'ainputs', ['What You Will Need', 'Inputs Required', 'Information to Have Ready', 'What to Enter']) . '</h2>
<p>' . $sec('inputs') . '</p>
' . usc_pv6_list($state_slug, 'ainputs', [
    '<strong>Paying Spouse Income:</strong> the higher earner\'s gross annual income, including bonuses and self-employment.',
    '<strong>Receiving Spouse Income:</strong> the lower earner\'s gross annual income.',
    '<strong>Marriage Duration:</strong> how many years you were married, the key driver of the support term.',
    '<strong>Child Support:</strong> any child-support obligation, usually calculated before spousal support.',
    '<strong>Filing Status &amp; Deductions:</strong> optional details that sharpen the net-income picture.',
    '<strong>Health &amp; Retirement Deductions:</strong> mandatory monthly deductions that affect available income.',
], 5) . '

<h2>9. ' . usc_pv6_h($state_slug, 'ahowtouse', ['How to Use the Calculator', 'Step-by-Step Instructions', 'Using the Tool in 60 Seconds', 'How to Run Your Estimate']) . '</h2>
<p>' . $sec('howtouse') . '</p>
<ol>
    <li>Enter the paying spouse\'s income (salary or hourly).</li>
    <li>Enter the receiving spouse\'s income.</li>
    <li>Set the length of the marriage in years.</li>
    <li>Add any child-support obligations and filing details.</li>
    <li>Click Calculate to see the estimated support and duration.</li>
</ol>

<h2>10. ' . usc_pv6_h($state_slug, 'aexample', ['A Realistic Example', 'A Worked ' . $name . ' Example', 'See It in Action', $name . ' Support: A Sample Run']) . '</h2>
<p>' . $sec('example') . '</p>
<p>Numbers like these are only a starting point. Add children, a large gap in earning capacity, significant separate assets, or a very long or very short marriage, and the figure shifts in either direction. ' . $name . ' judges also retain discretion to adjust the amount and the term, so the most reliable estimate is the one you run with your own real incomes and marriage length above.</p>

<h2>11. ' . usc_pv6_h($state_slug, 'amistakes', ['Common Alimony Mistakes to Avoid', 'Pitfalls to Watch For', 'Errors People Often Make', 'What Trips People Up']) . '</h2>
<p>' . $sec('mistakes') . '</p>
' . usc_pv6_list($state_slug, 'amistakes', [
    '<strong>Confusing alimony with child support:</strong> they are separate awards, and child support is usually calculated first.',
    '<strong>Forgetting the post-2018 tax change:</strong> alimony is no longer deductible or taxable federally for newer divorces.',
    '<strong>Ignoring duration:</strong> a small payment over many years can cost more than a larger one over a short term.',
    '<strong>Using gross instead of net income</strong> when comparing real household budgets.',
    '<strong>Overlooking modifications:</strong> a job loss, raise, or remarriage can be grounds to revisit the order.',
    '<strong>Treating an estimate as a guarantee:</strong> ' . $name . ' judges keep real discretion.',
], 4) . '

<h2>12. ' . usc_pv6_h($state_slug, 'ausecases', ['Practical Use Cases', 'Real-World Scenarios', 'When to Reach for This Tool', 'Everyday Uses']) . '</h2>
<p>' . $sec('usecases') . '</p>

<h2>13. ' . usc_pv6_h($state_slug, 'aconclusion', ['Final Thoughts', 'The Bottom Line', 'Wrapping Up', 'Key Takeaways']) . '</h2>
<p>' . $sec('conclusion') . '</p>
<p>One more thing worth knowing: alimony is rarely permanent or untouchable. If either spouse has a major change in circumstances, a job loss, a significant raise, a serious illness, retirement, or the recipient remarrying or cohabiting, a ' . $name . ' court can usually modify or even end the award. The big exception is support both spouses agreed in writing to make non-modifiable, so read any settlement carefully before you sign. Keeping organized records of income, expenses, and payments makes a future modification far easier to handle.</p>

<h2>14. Related ' . $name . ' Calculators</h2>
<p>Divorce touches every part of your finances. These free ' . $name . ' tools help you plan the whole picture:</p>
' . usc_get_related_links_html($state_slug, $name, 'alimony') . '

<h2>15. Alimony Rules in Nearby States</h2>
<p>Spousal-support rules differ across ' . $x['region'] . '. See how support is approached just over the ' . $name . ' border:</p>
' . (function() use ($state_slug) { $h = usc_neighbour_links_html($state_slug, 'alimony', 'Alimony Calculator'); return $h ?: '<p>Explore alimony calculators for every U.S. state from the menu above.</p>'; })() . '

<h2>16. Helpful Official Resources</h2>
<p>For authoritative rules and local help, start here:</p>
<ul>
    <li><a href="https://www.irs.gov/taxtopics/tc452" target="_blank" rel="nofollow noopener">IRS Topic No. 452 (Alimony and Separate Maintenance)</a> &mdash; the current federal tax treatment.</li>
    <li><a href="https://www.americanbar.org/groups/family_law/" target="_blank" rel="nofollow noopener">ABA Family Law Section</a> &mdash; background on spousal-support law.</li>
    <li><a href="https://www.usa.gov/divorce" target="_blank" rel="nofollow noopener">USA.gov divorce guide</a> &mdash; official steps and state resources.</li>
</ul>
<!-- usc-v5-article -->
<!-- usc-alimony-v6 -->';

    return $html;
}

/** V6 FAQ pool for Alimony (state aware). Selects 12. */
function usc_al_faqs_v6($state) {
    $name = $state['name'];
    $state_slug = strtolower(str_replace(' ', '-', $name));

    $pick = function($qkey, $arr) use ($state_slug) {
        return $arr[usc_get_variation_index($state_slug, 'alfaqa_' . $qkey, count($arr))];
    };

    $faq_pool = [
        ['q' => 'What is alimony or spousal support in ' . $name . '?', 'a' => $pick('whatis', [
            'Alimony, also called spousal support or maintenance, is court-ordered money paid by a higher-earning spouse to a lower-earning one after a ' . $name . ' separation or divorce, to ease the economic impact.',
            'In ' . $name . ', spousal support is financial assistance from one ex-spouse to the other, meant to help the lower earner stay self-supporting after divorce.',
            'It is post-divorce financial support paid between spouses in ' . $name . ', designed to soften the unequal economic effects of ending the marriage.',
        ])],
        ['q' => 'How is spousal support calculated in ' . $name . '?', 'a' => $pick('calc', [
            'Guidelines vary. Temporary support often follows a formula, while final maintenance in ' . $name . ' is factor-based, income levels, marriage length, standard of living, and earning capacity.',
            'In ' . $name . ', courts weigh the income gap, the length of the marriage, the marital lifestyle, and each spouse\'s ability to earn, rather than a single rigid formula.',
            'There is no one formula. ' . $name . ' judges consider both incomes, how long you were married, and the standard of living to set a fair amount.',
        ])],
        ['q' => 'How long does spousal support last in ' . $name . '?', 'a' => $pick('howlong', [
            'Duration mostly tracks the marriage length. Short and moderate marriages often see support for 30%-50% of the marriage length; long marriages can qualify for extended or indefinite support.',
            'In ' . $name . ', the longer the marriage, the longer the likely term. Short marriages bring brief transitional support, while 20-year-plus marriages may justify long-term support.',
            'It depends largely on how long you were married. ' . $name . ' courts use marriage length as the main benchmark for the support term.',
        ])],
        ['q' => 'Can alimony be modified in ' . $name . '?', 'a' => $pick('modify', [
            'Yes. Either spouse can request a modification after a substantial change, a big salary drop, job loss, the recipient\'s cohabitation, remarriage, or retirement.',
            'In most cases, yes, a significant change in circumstances lets either party ask a ' . $name . ' court to adjust support.',
            'Support is usually modifiable in ' . $name . ' unless the agreement is expressly non-modifiable; major life changes are the typical grounds.',
        ])],
        ['q' => 'Is alimony tax-deductible for the payer?', 'a' => $pick('tax', [
            'No. For divorces finalized after 2018, federal law makes alimony non-deductible for the payer and non-taxable for the recipient.',
            'Not for newer divorces. Since 2019, ' . $name . ' payers cannot deduct alimony federally, and recipients do not report it as income.',
            'Under current federal rules, alimony is tax-neutral, no deduction for the payer, no taxable income for the recipient.',
        ])],
        ['q' => 'What is the difference between temporary and permanent alimony?', 'a' => $pick('tempperm', [
            'Temporary (pendente lite) support is paid while the divorce is pending; permanent or post-judgment support is set in the decree and runs for a defined or indefinite period.',
            'Temporary support keeps both households running during the case, while permanent support is the longer-term award finalized in the ' . $name . ' divorce judgment.',
            'One is interim, paid during proceedings; the other is the final, often longer-term obligation set when the ' . $name . ' divorce concludes.',
        ])],
        ['q' => 'Does fault or cheating affect alimony in ' . $name . '?', 'a' => $pick('fault', [
            'In no-fault states, misconduct is generally not weighed for support. In states that recognize fault, it can influence a ' . $name . ' judge\'s decision.',
            'It depends on ' . $name . '\'s approach, many states ignore marital misconduct for alimony, while fault-based states may factor it in.',
            'Often not directly, but where ' . $name . ' permits fault-based considerations, misconduct can play a role in the award.',
        ])],
        ['q' => 'What happens to alimony if the recipient remarries?', 'a' => $pick('remarry', [
            'In nearly all cases, spousal support ends automatically when the receiving spouse remarries, unless the settlement says otherwise.',
            'Remarriage of the recipient typically terminates support in ' . $name . ', barring a written agreement to the contrary.',
            'Support usually stops on the recipient\'s remarriage, since the financial need it addressed is presumed to change.',
        ])],
        ['q' => 'How does cohabitation affect support in ' . $name . '?', 'a' => $pick('cohab', [
            'If the recipient cohabits in a marriage-like relationship, the payer can petition to reduce or end support, since shared living costs lower the need.',
            'Cohabitation can be grounds to modify or terminate alimony in ' . $name . ', because it changes the recipient\'s financial picture.',
            'In ' . $name . ', a recipient moving in with a new partner often lets the payer seek a reduction or termination of support.',
        ])],
        ['q' => 'How is alimony enforced in ' . $name . '?', 'a' => $pick('enforce', [
            'Alimony is legally binding. Non-payment can lead to wage garnishment, license suspension, passport holds, or a contempt-of-court motion.',
            'A ' . $name . ' court can enforce support through wage withholding, license suspension, and contempt proceedings if a payer refuses to pay.',
            'Enforcement tools include garnishing wages, suspending licenses, and contempt charges, which can carry serious penalties in ' . $name . '.',
        ])],
        ['q' => 'Is child support calculated before or after alimony in ' . $name . '?', 'a' => $pick('order', [
            'Child support is usually calculated first, since it is a priority obligation; the remaining income then informs the spousal-support estimate.',
            'In ' . $name . ', courts typically set child support first, then consider alimony based on the income that remains.',
            'Child support generally comes first, which is why it can change the income figures used for the ' . $name . ' alimony calculation.',
        ])],
        ['q' => 'Can spouses agree on their own alimony amount in ' . $name . '?', 'a' => $pick('agree', [
            'Yes. Spouses can negotiate support in a settlement, and ' . $name . ' courts usually approve a fair, voluntary agreement.',
            'Absolutely, a negotiated agreement is common and often approved, as long as it is reasonable and entered knowingly.',
            'In ' . $name . ', couples can settle on an amount and duration themselves, subject to court approval, which often avoids a contested hearing.',
        ])],
        ['q' => 'Does the type of income matter for ' . $name . ' alimony?', 'a' => $pick('income', [
            'Yes. Courts look at wages, bonuses, self-employment, and sometimes investment income, the broader the income, the more it can factor in.',
            'In ' . $name . ', most regular income counts, salary, commissions, and self-employment profit, when assessing ability to pay.',
            'Different income types are considered; ' . $name . ' courts focus on what is genuinely available to support both households.',
        ])],
        ['q' => 'Is the estimate from this ' . $name . ' calculator legally binding?', 'a' => $pick('binding', [
            'No. It is a planning estimate based on common factors and formulas. Your actual ' . $name . ' award depends on the judge and your specific facts.',
            'Not at all, treat it as guidance. The final number comes from your settlement or a ' . $name . ' court order.',
            'It is for planning only. A real ' . $name . ' award reflects judicial discretion and the details of your case.',
        ])],
    ];

    return usc_get_deterministic_faqs($state_slug, $faq_pool, 12);
}
