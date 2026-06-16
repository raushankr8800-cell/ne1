<?php
/**
 * Mortgage Calculator — V6 content engine.
 * 16 variations/section x 13 sections, per-state property-tax-aware example,
 * varied headings, pooled lists, unique per-state FAQs.
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

/** Returns the Mortgage text variations (16 per section). */
function usc_mtg_variations_v6() {
    return array_merge(usc_mtgv6_a(), usc_mtgv6_b(), usc_mtgv6_c());
}

/** Variation set A: intro, whatis */
function usc_mtgv6_a() {
    return [
        'intro' => [
            "Buying a home is exciting, right up until you realize the monthly payment is more than just principal and interest. In {state_name}, property taxes, homeowners insurance, PMI, and HOA dues can quietly add hundreds to your bill. This calculator shows your true all-in monthly cost so there are no surprises after you get the keys.",
            "House hunting in {state_name} is far more fun when you know exactly what you can afford. The sticker price is only half the story; your real payment bundles taxes and insurance on top of the loan. Run your numbers here first and you will shop with confidence instead of crossing your fingers at closing.",
            "A mortgage is probably the biggest loan you will ever take on, so it pays to understand it before you sign. In {state_name}, your monthly PITI combines principal, interest, property tax, and insurance, plus PMI if your down payment is under 20%. This tool breaks all of it down in plain numbers.",
            "Before you fall for a listing in {state_name}, find out what it actually costs each month. Interest rates, your down payment, local tax rates, and insurance all push the number around. This calculator models the full payment and even shows how extra payments can shave years off your loan.",
            "The price tag on a {state_name} home is not the same as what you will pay each month, and that gap surprises a lot of buyers. This calculator turns a purchase price into your real PITI payment, principal, interest, taxes, and insurance, so you can budget with open eyes.",
            "Whether you are buying your first place in {city1} or upgrading across {state_name}, one question rules everything: what is the monthly payment? This tool answers it, bundling the loan, local property tax, and insurance into a single, honest figure.",
            "Mortgages hide a lot behind the headline rate. In {state_name}, your true monthly cost depends on the loan, the down payment, local taxes, and insurance, sometimes PMI too. This calculator pulls all of it together so you know the number before you make an offer.",
            "Few financial decisions are as big as a home purchase, and few are as easy to underestimate. This {state_name} mortgage calculator reveals your full monthly payment and total interest, so you can compare homes, terms, and down payments with real data.",
            "Shopping for a home in {state_name} without running the numbers is like booking a trip without checking the price. This calculator shows your monthly PITI, your cash to close, and how a bigger down payment or shorter term changes everything.",
            "The difference between a comfortable mortgage and a stressful one is usually planning. Use this {state_name} calculator to model the payment before you commit, factoring in local property taxes and insurance that many buyers forget.",
            "Your dream home in {state_name} comes with a monthly reality: principal, interest, taxes, and insurance, the PITI payment. This tool calculates all four (plus PMI and HOA where relevant) so the number you plan around is the number you will actually pay.",
            "Interest rates, down payments, and local taxes all pull your {state_name} mortgage payment in different directions. Rather than guess, model it here, you will see the monthly cost, the amortization, and how extra principal can save you thousands.",
            "Home buyers across {state_name}, from {city1} to {city2}, use tools like this to avoid payment shock. Enter a price and down payment, and the calculator shows the full monthly cost so you can shop within a budget that truly fits.",
            "A clear payment picture is the foundation of a smart home purchase. This {state_name} mortgage calculator combines your loan, local property tax, and insurance into one number, then lets you test scenarios until it feels right.",
            "Buying in {state_name} means more than qualifying for a loan, it means living with the payment for years. This calculator shows the real monthly PITI and total interest so you choose a home you can comfortably afford, not just barely.",
            "From the loan itself to property taxes and insurance, a {state_name} mortgage has several moving parts. This tool assembles them into a clear monthly figure and amortization schedule, so you understand exactly what you are signing up for."
        ],
        'whatis' => [
            "A <strong>{state_name} Mortgage Calculator</strong> is a financial tool that computes your complete monthly housing cost. It estimates principal and interest from your rate and term, then adds {state_name} property taxes, homeowners insurance, and PMI where applicable.",
            "Think of the <strong>{state_name} Mortgage Calculator</strong> as a home-buying assistant. Enter your purchase price, down payment, and rate, and it models your monthly payment and the cash you will need at the closing table.",
            "The <strong>{state_name} Mortgage Calculator</strong> is a comprehensive modeling tool. It builds your amortization schedule, projects lifetime interest, and shows how extra payments shorten the loan, all tuned to {state_name} costs.",
            "At its core, a <strong>{state_name} Mortgage Calculator</strong> answers one question: what will this home cost me each month? It applies the loan math, then layers on {state_name} taxes and insurance for a true PITI figure.",
            "A <strong>{state_name} Mortgage Calculator</strong> is essentially a simulator for your future payment. Before a lender ever quotes you, it estimates principal, interest, property tax, insurance, and PMI for a home in {state_name}.",
            "Put simply, the <strong>{state_name} Mortgage Calculator</strong> turns a purchase price into a real monthly number. It handles the loan formula and adds {state_name}'s local taxes and insurance so nothing is left out.",
            "The <strong>{state_name} Mortgage Calculator</strong> is a planning tool for buyers and refinancers. It calculates monthly PITI, total interest, and payoff timelines, factoring in {state_name} property-tax rates.",
            "A <strong>{state_name} Mortgage Calculator</strong> is a free, instant estimator of home affordability. Provide price, down payment, rate, and term, and it returns a detailed monthly cost for a {state_name} property.",
            "Consider the <strong>{state_name} Mortgage Calculator</strong> a translation layer between a listing price and your real budget. It applies the mortgage formula plus {state_name} taxes and insurance to show what you will truly pay.",
            "The <strong>{state_name} Mortgage Calculator</strong> is a digital tool built for {state_name} buyers. Rather than generic math, it factors in local property-tax rates alongside principal, interest, and insurance.",
            "In practical terms, a <strong>{state_name} Mortgage Calculator</strong> is your what-if machine for home buying. Change the price, down payment, or term and it instantly recalculates your {state_name} monthly payment.",
            "A <strong>{state_name} Mortgage Calculator</strong> takes the guesswork out of affordability. It breaks your payment into principal, interest, taxes, insurance, and PMI, leaving a clear monthly figure to plan around.",
            "The <strong>{state_name} Mortgage Calculator</strong> is a self-service tool for buyers in {city1} and across the state. It converts price and down payment into a full PITI payment using {state_name} cost data.",
            "Think of the <strong>{state_name} Mortgage Calculator</strong> as a financial mirror: it reflects what a home will really cost each month in {state_name}, so you can compare properties and terms with confidence.",
            "A <strong>{state_name} Mortgage Calculator</strong> is an online estimator that replicates lender math. It handles amortization and adds {state_name} taxes and insurance to show your complete monthly obligation.",
            "The <strong>{state_name} Mortgage Calculator</strong> is a quick way to see a home's real cost. Enter your numbers and it applies {state_name} property-tax rates plus the loan math to reveal your monthly PITI."
        ]
    ];
}


/** Variation set B: why, how, inputs, formula */
function usc_mtgv6_b() {
    return [
        'why' => [
            "Running the numbers first gives you a real edge. You can test different down payments to see how they change PMI, weigh {state_name} closing costs, and compare a 15- versus 30-year term to find the biggest long-run savings.",
            "A mortgage calculator prevents budget surprises. It shows how much of your income goes to housing (your DTI), keeps you within lender guidelines, and lets you make a {state_name} offer with real confidence.",
            "Whether you are a first-time buyer or refinancing in {state_name}, this tool delivers insight. Simulate prepayments to see how fast you can be debt-free, and understand how equity builds over time.",
            "Knowing your true payment early changes how you shop. In {state_name}, you can match listings to a realistic budget, plan your cash to close, and avoid falling for a home that quietly breaks your monthly numbers.",
            "A quick estimate now saves stress later. By seeing the full {state_name} PITI, not just principal and interest, you avoid the common trap of underestimating taxes and insurance by hundreds a month.",
            "This calculator is your home-buying sandbox. Adjust price, down payment, or rate and watch the {state_name} payment respond, ideal for testing scenarios before you talk to a lender.",
            "Smart buyers compare before they commit. Use this tool to see how a {city1} home stacks up against another, how a 0.25% rate change moves the payment, and whether a shorter term fits your budget.",
            "It helps you borrow wisely. Seeing how interest is front-loaded on a {state_name} loan shows why a larger down payment or extra principal early on can save you thousands over the life of the mortgage.",
            "For anyone budgeting seriously in {state_name}, the monthly payment is the number that matters. This calculator hands it to you instantly, then lets you flex the inputs to find a comfortable, sustainable figure.",
            "Thinking about an offer? The list price rarely tells the real story in {state_name}. Run it here to reveal the true monthly cost and cash to close, then negotiate from a position of knowledge.",
            "Using it regularly keeps you ahead of the market. A rate change, a different down payment, or a move within {region} all shift your {state_name} payment, and seeing that early means no surprises.",
            "It removes fear from a huge decision. Want to know if a {state_name} home fits your budget? Start from the real PITI payment here, and the answer stops being a guess.",
            "Affordability starts with visibility. This tool shows how price, down payment, and {state_name} property taxes combine, helping you set a target price you can genuinely sustain.",
            "Every loan choice has a monthly consequence. With this calculator you can see exactly how term, rate, and down payment reshape your {state_name} payment before you lock anything in.",
            "The biggest reason to use it is peace of mind. When you know your real {state_name} payment and total interest, every step, offer, pre-approval, closing, gets easier and less stressful.",
            "Plain and simple, it puts you in control. Instead of hoping a {state_name} home is affordable, you can prove it, adjusting price, down payment, and term until the payment truly works for your life."
        ],
        'how' => [
            "The calculator works step by step: it subtracts your down payment from the price to find the loan, computes monthly principal and interest, adds {state_name} property tax and insurance escrows, then applies PMI and HOA if relevant.",
            "Behind the scenes it runs standard loan math. It builds your amortization from the rate and term, adds monthly escrows for {state_name} property taxes and hazard insurance, and applies PMI if your down payment is under 20%.",
            "Step by step, the tool finds the loan amount, calculates P&I with the mortgage formula, estimates {state_name} tax and insurance installments, and aggregates everything into a single monthly PITI total.",
            "It mirrors how a lender models your loan: determine the principal, compute interest over the term, escrow {state_name} property taxes and insurance, and add PMI and any HOA dues for the full payment.",
            "The engine layers your costs: principal and interest first, then monthly property tax based on {state_name} rates, then homeowners insurance, then PMI if applicable, ending with your true monthly figure.",
            "To estimate your payment, the calculator amortizes the loan, splits {state_name} property tax and insurance into monthly escrows, checks your loan-to-value for PMI, and sums it all into PITI.",
            "Functionally, it computes the loan balance, applies the standard payment formula for P&I, adds {state_name} tax and insurance, and includes PMI and HOA so nothing is left off the monthly total.",
            "Think of it as a waterfall: price minus down payment sets the loan, the rate and term set P&I, {state_name} taxes and insurance add escrow, and PMI or HOA finish the monthly number.",
            "The math follows a fixed order: loan amount, monthly P&I, escrowed {state_name} property tax and insurance, then PMI and HOA. The result is the all-in payment you will actually make.",
            "It replicates lender logic for {state_name}: amortize the principal over the term, add monthly tax and insurance, factor PMI for low down payments, and total everything into PITI.",
            "Under the hood, the tool calculates interest and principal for each period, estimates {state_name} property tax from local rates, adds insurance, and applies PMI when your equity is under 20%.",
            "The process is methodical: establish the loan, compute P&I, escrow {state_name} taxes and insurance monthly, include PMI and HOA, and present the combined payment plus an amortization schedule.",
            "First the loan amount, then the P&I, then the extras. The calculator adds {state_name} property tax and insurance to the base payment, which is why your real cost is higher than principal and interest alone.",
            "It treats your mortgage like a recipe: down payment and price set the loan, the rate and term cook the P&I, and {state_name} taxes, insurance, PMI, and HOA season the final monthly total.",
            "The system computes your amortized P&I, adds monthly {state_name} property tax and homeowners insurance, applies PMI for down payments under 20%, and sums everything into your PITI payment.",
            "The calculator processes the loan the way {state_name} lenders do: principal and interest from the formula, plus escrowed taxes and insurance, plus PMI and HOA, to reach your true monthly cost."
        ],
        'inputs' => [
            "For an accurate estimate, enter the home price, your down payment, the interest rate, and the loan term, then check the {state_name} property-tax and insurance settings for your area.",
            "The calculator uses a few key inputs: purchase price, down payment (percent or dollars), interest rate, loan term, and any extras like HOA dues or additional principal in {state_name}.",
            "Provide the home price, down payment, current rate, credit-score tier, and any extra monthly principal. With those, the tool models your full {state_name} payment accurately.",
            "Have these ready: the target price, your down payment, the interest rate, and the term. Adjusting {state_name} property-tax and insurance fields to your county sharpens the estimate.",
            "You will enter price, down payment, rate, and term, plus optional HOA and extra-payment details. Those inputs let the calculator apply {state_name} taxes and insurance for a true PITI.",
            "Start with the purchase price and down payment, then add the rate and term. Finish with {state_name} tax and insurance settings for a payment estimate that tracks reality.",
            "The required inputs are straightforward: price, down payment, rate, term, and local {state_name} tax and insurance. Add HOA dues if the property has them.",
            "Enter the figures that drive a mortgage: price, down payment, rate, and term. Each one shapes the result, your down payment also decides whether {state_name} PMI applies.",
            "To run the numbers, you need the home price, down payment, interest rate, and loan length. With those, the calculator can apply {state_name} property taxes and return a full payment.",
            "Gather the home price, down payment, rate, and term, plus any HOA or extra principal. These inputs let the tool replicate a {state_name} lender's monthly payment math.",
            "The tool asks for price, down payment, rate, and term. Including accurate {state_name} property-tax and insurance figures matters, since they can add hundreds to the monthly cost.",
            "All it needs is price, down payment, rate, and term. Enter HOA dues and extra payments separately so the calculator can show your true {state_name} monthly total and payoff timeline.",
            "Provide the purchase price, down payment, interest rate, and term, then layer in {state_name} taxes and insurance. Accurate inputs separate a rough guess from a reliable estimate.",
            "You will need the home price, your down payment, the rate, and the term. If the {state_name} property is in an HOA community, add those dues to capture the full picture.",
            "The essentials are simple: price, down payment, rate, and term. Enter local {state_name} tax and insurance settings so the calculator handles your escrow correctly.",
            "Feed it the price, down payment, rate, and term. With those four pieces, the calculator applies {state_name} property taxes and insurance to estimate your true monthly payment."
        ],
        'formula' => [
            "The monthly principal and interest uses the standard formula: M = P x [ r(1+r)^n ] / [ (1+r)^n - 1 ], where P is the loan amount, r is the monthly rate, and n is the number of payments.",
            "Your P&I is computed as: Monthly P&I = Principal x [ r(1+r)^n ] / [ (1+r)^n - 1 ], with r the monthly rate (annual / 12) and n the term in months. {state_name} taxes, insurance, and PMI are added on top.",
            "To find your repayment, the tool uses: P&I = L x [ c(1+c)^n ] / [ (1+c)^n - 1 ], where L is the loan balance, c the monthly rate, and n the payment count, the foundation of your {state_name} PITI.",
            "The core equation amortizes the loan: M = P x r(1+r)^n / ((1+r)^n - 1). After that baseline, {state_name} property tax, insurance, and PMI are layered in to reach the full monthly payment.",
            "In formula terms: Monthly P&I = Loan x [ r(1+r)^n / ((1+r)^n - 1) ]. The rate r is annual divided by 12, and n is years times 12. {state_name} escrow items are added afterward.",
            "The standard amortization formula applies: payment = P x r(1+r)^n / ((1+r)^n - 1). Note that taxes and insurance sit outside this, which is why your real {state_name} payment is higher than P&I.",
            "Mathematically, P&I = principal x monthly-rate-factor, where the factor is r(1+r)^n / ((1+r)^n - 1). Your full {state_name} payment then adds property tax, insurance, and any PMI.",
            "The calculation chains together: the formula M = P x [ r(1+r)^n / ((1+r)^n - 1) ] gives P&I, then {state_name} tax/12, insurance/12, and PMI are summed for the monthly PITI.",
            "Put as one line: Monthly P&I = Loan Amount x r(1+r)^n / ((1+r)^n - 1). Everything else, {state_name} taxes, insurance, PMI, HOA, is added to this base figure.",
            "The formula the tool uses is the standard mortgage equation: M = P x r(1+r)^n / ((1+r)^n - 1), with monthly rate r and term n in months, plus {state_name} escrow add-ons.",
            "Expressed cleanly: P&I = Principal x [ r(1+r)^n ] / [ (1+r)^n - 1 ]. That covers the loan; {state_name} property tax and insurance are escrowed separately into your payment.",
            "Your P&I follows: Loan x r(1+r)^n / ((1+r)^n - 1). After computing it, the calculator adds monthly {state_name} property tax, homeowners insurance, and PMI for the true total.",
            "The underlying formula is M = P x [ r(1+r)^n / ((1+r)^n - 1) ], where r is the monthly interest rate and n the number of payments. {state_name} taxes and insurance extend it to PITI.",
            "Stated as a process: apply the amortization formula to get P&I, then add {state_name} property tax and insurance escrows and PMI, and the result is your full monthly payment.",
            "The P&I formula is M = P x r(1+r)^n / ((1+r)^n - 1). Each payment splits between interest and principal, and the {state_name} calculator adds taxes and insurance on top.",
            "Formally: Monthly Principal & Interest = Loan x [ r(1+r)^n ] / [ (1+r)^n - 1 ], the same equation lenders use, with {state_name} escrow items added to reach your monthly PITI."
        ]
    ];
}


/** Variation set C: howtouse, example, factors, benefits, mistakes, usecases, conclusion */
function usc_mtgv6_c() {
    return [
        'howtouse' => [
            "Using the tool is simple: enter the home price, set your down payment, choose the rate and term, adjust {state_name} tax and insurance if needed, and click calculate to see charts and an amortization schedule.",
            "To estimate payments, type in the price, adjust the down payment, input the rate, and run it. Expand the advanced sections to test extra payoff payments and check your {state_name} DTI affordability.",
            "Just follow the steps: fill in the home value and down payment, set the loan terms, and hit calculate. The tool instantly maps your monthly payment, amortization chart, and {state_name} closing-cost estimate.",
            "Start with the price and down payment, then add the rate and term. One click later you will have a full {state_name} payment breakdown ready to compare or budget against.",
            "It takes under a minute: input price, down payment, rate, and term, then calculate. The {state_name} result shows P&I, taxes, insurance, and your total monthly payment.",
            "Enter the home price, choose a down payment percentage, set the rate and term, then calculate. The tool handles the {state_name} math and presents the numbers in a clear, itemized format.",
            "Type the purchase price, your down payment, and the rate, pick a term, and hit calculate. The {state_name} mortgage calculator does the rest, instantly and privately.",
            "Working it is intuitive: provide price and down payment, set rate and term, and run it. Within seconds you will see how a {state_name} home's cost breaks down month by month.",
            "Add the home price, your down payment, the rate, and the term, then calculate to reveal your {state_name} payment, complete with a visual amortization schedule.",
            "The steps are quick: enter price, down payment, rate, and term, then calculate. Whether you are buying in {city1} or elsewhere in {state_name}, the tool adapts to your inputs.",
            "Pop in the price, choose your down payment and term, set the rate, and calculate. The {state_name} results appear immediately, so you can tweak inputs and watch the payment update.",
            "Simply enter the home value, down payment, rate, and term, then click calculate. The calculator returns a tidy {state_name} summary of P&I, taxes, insurance, and total payment.",
            "To run it, fill in price, down payment, rate, and term. One calculation later, your {state_name} payment is broken into clear, labelled line items.",
            "Begin with the price and down payment, set the rate and term, and press calculate. The tool shows your {state_name} monthly payment plus the taxes and insurance behind it.",
            "It is a three-part process: enter price and down payment, set rate and term, then calculate. The {state_name} breakdown that follows is detailed enough to plan a real budget around.",
            "Enter your numbers, choose the down payment and term, set the rate, and calculate, that is it. The {state_name} mortgage calculator instantly turns a price into your true monthly cost."
        ],
        'example' => [
            "Let's look at a {state_name} example. Suppose you buy a home for $350,000, put 20% down ($70,000), and take a 30-year fixed mortgage at 6.5%. The table below shows how local property tax shapes your true monthly payment.",
            "To see it in practice, picture a $350,000 home in {city1}, 20% down, 30-year fixed at 6.5%. The loan is $280,000, and the breakdown below reflects {state_name}'s property-tax rate.",
            "Consider a buyer in {state_name} purchasing at $350,000 with 20% down and a 6.5% rate over 30 years. Watch how the property-tax line, set by {state_name} rates, changes the all-in payment.",
            "Here is a worked {state_name} example: a $350,000 home, $70,000 down, 6.5% for 30 years. The figures below trace principal and interest plus {state_name} taxes and insurance to a monthly total.",
            "Imagine buying a $350,000 home in {state_name}: 20% down, 30-year fixed at 6.5%. The P&I is about $1,770, and {state_name}'s property tax adds the amount shown to reach your true payment.",
            "Take a typical {state_name} case: $350,000 price, 20% down, 6.5% rate, 30-year term. The table lays out each piece so you can see how local taxes affect the bottom line.",
            "Suppose a {state_name} buyer pays $350,000, puts down 20%, and locks 6.5% for 30 years. The breakdown below shows how much the property-tax escrow adds in {state_name}.",
            "Let's model a real scenario: a $350,000 home in {state_name}, $70,000 down, 6.5% over 30 years. The result demonstrates how {state_name}'s tax rate, low or high, changes the payment.",
            "Picture someone buying in {city2} at $350,000, 20% down, 6.5% for 30 years. Their {state_name} monthly payment breaks down as the table shows, with local property tax included.",
            "For illustration, a {state_name} buyer purchases at $350,000 with 20% down and a 6.5% rate. The figures reveal how principal, interest, and {state_name} taxes combine into PITI.",
            "Here is how it plays out: a $350,000 home in {state_name}, 20% down, 6.5%, 30 years. The table converts that into a monthly payment using {state_name}'s real property-tax rate.",
            "Consider a practical {state_name} example, $350,000 price, $70,000 down, 6.5% for 30 years. The breakdown shows precisely where the money goes each month, taxes included.",
            "Let's run the math for a {city1} home: $350,000, 20% down, 6.5%, 30-year fixed. The result reflects how {state_name} taxes (high or low) shape the total payment.",
            "Take a $350,000 purchase in {state_name}, 20% down, 6.5% over 30 years. The example walks through P&I, {state_name} property tax, and insurance to the final monthly figure.",
            "As a sample, picture a {state_name} buyer at $350,000 with 20% down and a 6.5% rate. The breakdown shows the combined effect of the loan and {state_name}'s property taxes.",
            "Here's a down-to-earth example: a $350,000 home in {city2}, 20% down, 6.5% for 30 years. Follow the table to see how {state_name} property tax shapes the monthly payment."
        ],
        'factors' => [
            "Your costs hinge on several factors: the down payment decides whether you owe PMI, your credit score affects the rate and PMI tier, and {state_name} property taxes and insurance add to your monthly escrow.",
            "Several elements control the payment. A larger down payment lowers the loan and drops PMI at 20% equity, your credit score sets the rate tier, and {state_name} taxes plus HOA dues add to the total.",
            "The monthly figure varies with rate changes, down-payment size (under 20% triggers PMI), {state_name} property-tax rates, and homeowners insurance premiums, each one nudges the result.",
            "Watch these drivers: interest rate, down payment, {state_name} property tax, and insurance. Two buyers at the same price can pay very different amounts depending on these inputs.",
            "Your payment depends on more than price. The rate, the down payment, {state_name}'s property-tax rate, and insurance all combine, which is why local taxes matter so much to the total.",
            "Key factors include the loan amount, the rate tied to your credit, {state_name} property taxes, and insurance. PMI applies until you reach 20% equity, then it can be removed.",
            "The result moves with your choices and your location. Down payment and rate set the P&I, while {state_name} property taxes and insurance, set locally, shape the escrow portion.",
            "Several inputs steer your payment: the interest rate, the down-payment percentage, {state_name} property-tax rates, and annual insurance. HOA dues add to non-escrowed costs.",
            "Your mortgage budget reflects rate, down payment, and {state_name} taxes. A high-tax state adds noticeably to the monthly escrow, while a low-tax state keeps it lean.",
            "Factors that matter most are the rate, the down payment, {state_name}'s property-tax rate, and insurance. Adjust any of them and your monthly payment changes, sometimes a lot.",
            "Your payment is a mix of loan terms and {state_name} local costs. The rate and down payment drive P&I; the state's property tax and insurance drive the escrow.",
            "The big levers are interest rate, down payment, and {state_name} property tax. PMI also applies below 20% equity, so a bigger down payment can lower the payment two ways.",
            "Monthly cost depends on what you borrow, your rate, and where you buy. In {state_name}, the local property-tax rate joins the loan math to set the full payment.",
            "Among the factors at play: the interest rate, down-payment size, {state_name} property taxes, insurance premiums, and any HOA dues, all stacked into your monthly total.",
            "Several inputs steer the figure: rate, down payment, {state_name} property-tax rate, and insurance. Crossing 20% equity removes PMI, which can meaningfully cut the payment.",
            "Your results respond to rate, down payment, and {state_name} taxes. Because property-tax rates vary so much by state, the same loan can cost very different amounts to carry."
        ],
        'benefits' => [
            "This calculator gives precise PITI estimates, lets you simulate extra payments to see interest savings, computes DTI affordability, and protects your privacy by running every calculation locally.",
            "Why use it? It details your full {state_name} housing cost including taxes and closing, models the impact of extra principal, and never stores or shares your financial information.",
            "Built for depth and transparency, the tool itemizes closing costs, tests early-payoff scenarios, and evaluates your DTI ratio, all without sharing personal records.",
            "The benefits are practical: reliable estimates, instant scenario testing, and total privacy. Test a bigger down payment, a shorter term, or a different {state_name} price and see the impact at once.",
            "Among its advantages: it uses real {state_name} property-tax data, recalculates instantly as you change inputs, and never asks for identifying information, your numbers stay on your screen.",
            "You get accuracy you can trust, the freedom to compare scenarios, and privacy. For {state_name} buyers, that means smarter decisions about price, down payment, and term.",
            "The tool's strengths are precision, flexibility, and discretion. Run unlimited {state_name} scenarios, compare 15- versus 30-year terms, and never worry about your data being saved.",
            "Key benefits include full-PITI accuracy, easy what-if testing, and a privacy-first design. Whether you are in {city1} or anywhere in {state_name}, you can plan confidently.",
            "It pays off in three ways: dependable estimates, side-by-side comparison, and complete privacy. Adjust your {state_name} inputs freely and the math stays on your device.",
            "Expect precise PITI, instant recalculation, and zero data collection, a safe, practical tool for {state_name} home buyers and refinancers alike.",
            "The advantages add up: accurate payment math, the ability to test down payments and terms, and a privacy model that keeps your {state_name} numbers to yourself.",
            "Using it, you gain clarity and control. See the exact effect of a rate change or a bigger down payment in {state_name}, privately, since the tool saves nothing.",
            "This calculator is precise, flexible, and private by design. It applies real {state_name} property-tax rates, compares scenarios in seconds, and never stores your figures.",
            "The payoff is better decisions with less hassle. Reliable {state_name} estimates, unlimited scenario testing, and strong privacy let you plan a home purchase with confidence.",
            "Benefits include precision from real tax data, the flexibility to model many scenarios, and a strict privacy stance, a dependable foundation for {state_name} home buying.",
            "You get a tool that is accurate, flexible enough for any what-if, and private enough to trust, which makes estimating a {state_name} mortgage both easy and safe."
        ],
        'mistakes' => [
            "A common mistake is budgeting on principal and interest alone. Leaving out {state_name} property taxes and insurance can understate your real monthly cost by hundreds of dollars.",
            "Avoid pitfalls like ignoring closing costs or forgetting PMI. In {state_name}, closing typically needs an extra 2%-4% in cash that cannot always be rolled into the loan.",
            "To stay accurate, include HOA dues if the {state_name} property is in a managed community, and remember conventional PMI applies until your loan-to-value drops to 80%.",
            "The biggest error is underestimating escrow. {state_name} property taxes and insurance are real monthly costs, so plan for the full PITI, not just the loan payment.",
            "People often forget that a low down payment means PMI. In {state_name}, putting less than 20% down adds a monthly premium until you build enough equity.",
            "A frequent slip is shopping only one lender. Even a 0.25% lower rate saves thousands over a {state_name} 30-year loan, so compare at least three offers.",
            "Don't overlook closing costs. Many {state_name} buyers focus on the down payment and are surprised by the extra cash needed at the closing table.",
            "Be careful not to ignore the term's effect. A 30-year loan has a lower payment but far more interest than a 15-year, weigh both for your {state_name} purchase.",
            "Common pitfalls: forgetting taxes and insurance, ignoring PMI, and skipping HOA dues. Each quietly raises your true {state_name} monthly cost.",
            "A typical error is assuming the property tax stays fixed. {state_name} assessments can change, and an over-assessed bill is worth appealing to lower your payment.",
            "Don't budget with today's rate as a guarantee. Until you lock, a {state_name} rate can move, and even a small change shifts your monthly payment.",
            "Be careful to include insurance properly. {state_name} homeowners premiums (and flood insurance where needed) add to the monthly escrow many buyers overlook.",
            "The mistakes that hurt most are simple: ignoring escrow, forgetting PMI, and underestimating closing costs. Account for all three for a realistic {state_name} budget.",
            "Users sometimes forget extra principal's power. Even a small monthly addition can cut years and thousands in interest off a {state_name} mortgage.",
            "A classic oversight is entering price but skipping the down payment's effect on PMI. In {state_name}, that omission makes the payment look lower than it really is.",
            "To avoid surprises, verify three things: the {state_name} property-tax rate, your insurance estimate, and whether PMI applies. Those drive the true monthly payment."
        ],
        'usecases' => [
            "This tool is ideal if you are house hunting in {state_name} and comparing affordability, checking refinancing savings, or planning to pay off your mortgage early with extra payments.",
            "Real-world uses include comparing price ranges to fit your budget, estimating cash needed for {state_name} closing costs, and analyzing your DTI before seeking pre-approval.",
            "Reach for it when relocating to {state_name} to gauge regional affordability, testing whether a 15-year term is manageable, or estimating an early payoff with yearly extra payments.",
            "Use cases range from everyday budgeting to big decisions: comparing homes in {city1} and {city2}, planning closing costs, or deciding if a {state_name} purchase truly fits.",
            "It shines when comparing offers, planning a {state_name} budget, or seeing how a rate change moves the payment, so you shop and negotiate with real numbers.",
            "Common scenarios: checking affordability before touring homes in {city1}, comparing down-payment options, and weighing how {state_name} property taxes affect the monthly cost.",
            "Whether you are a first-time buyer or refinancing, the tool helps, estimate the payment, test scenarios, and see how {state_name} taxes shape each one.",
            "Put it to work when weighing a 15- versus 30-year loan, planning for PMI removal, or deciding between two {state_name} homes with different prices and tax rates.",
            "Use it to plan a move within {region}, compare a refinance's savings, or set a realistic target price. For {state_name} buyers, it turns listings into real monthly costs.",
            "Typical uses: confirming a home fits your budget, modelling extra-payment payoff, and comparing how the same price carries in {state_name} versus a neighbouring state.",
            "It is handy for affordability checks in {city1}, for testing how a bigger down payment changes PMI, and for sanity-checking a price before you make a {state_name} offer.",
            "Lean on it when life changes, a new job, a raise, or a move to {state_name}, since each can change what you can afford, and seeing the payment early keeps your budget honest.",
            "Practical applications include comparing {state_name} homes, planning closing costs, testing terms, and estimating the payoff timeline with extra principal.",
            "Use the calculator to decide if a pricier home in {city2} is truly affordable after {state_name} taxes, or to plan a refinance that lowers your monthly payment.",
            "From first homes to upgrades, it answers the money questions that matter in {state_name}: what will I pay monthly, and can I comfortably afford this purchase?",
            "Whether budgeting in {city1}, comparing offers across {state_name}, or planning an early payoff, this calculator gives the real monthly cost those decisions need."
        ],
        'conclusion' => [
            "A home is a long commitment, so the clearer you understand the monthly math, the better you sleep at night. Use this {state_name} mortgage calculator to test prices, down payments, and terms until the payment feels right, then make your offer with confidence.",
            "The smartest buyers run the numbers before they fall for a house. With your full {state_name} PITI in front of you, you can set a realistic budget, compare 15- versus 30-year terms, and see how extra principal saves thousands.",
            "Homeownership should build your wealth, not stretch you thin. This {state_name} mortgage calculator helps you find a payment you can live with, plan for closing costs, and map out an early-payoff strategy. Come back whenever rates or your down payment change.",
            "Knowing your real monthly payment is the difference between a confident offer and a financial headache. Lean on this {state_name} calculator to compare scenarios, understand your PITI, and plan your path to owning outright.",
            "Your {state_name} home will be one of your biggest commitments, so plan it from the real number, not the list price. Bookmark this calculator, test scenarios, and let the full PITI guide your budget.",
            "When you understand every part of the payment, buying a home gets far less stressful. Use this {state_name} mortgage calculator before big decisions and shop within a budget you can truly sustain.",
            "Whether you live in {city1} or anywhere across {state_name}, the lesson is the same: plan from the all-in payment, not just the loan. Run this calculator often and buy with clear eyes.",
            "A clear payment picture is powerful. With your {state_name} PITI mapped out, you can right-size your offer, plan for PMI and closing costs, and choose a term that fits your life.",
            "Home decisions get easier when they start from reality. Use this {state_name} calculator to anchor your budget, test changes before they happen, and avoid the shock of a higher-than-expected payment.",
            "Come back to this tool any time things shift, a rate change, a different down payment, a move within {region}. Each one moves your {state_name} payment, and a quick recalculation keeps your plan intact.",
            "The bottom line: your monthly payment is the foundation everything else sits on. Now that you can see it clearly for {state_name}, build your home search on that solid number.",
            "Understanding your {state_name} mortgage is a skill with a big payoff. Keep this calculator bookmarked, run it before every offer, and let the breakdown turn uncertainty into a confident purchase.",
            "You started wondering what a home really costs; now you know. Use this {state_name} tool to stay ahead of rate changes, plan an early payoff, and buy with the clarity real numbers bring.",
            "There is real freedom in seeing your true payment. For buyers in {city1}, {city2}, and beyond, this {state_name} calculator replaces guesswork with facts, so every decision rests on solid ground.",
            "Treat your full monthly payment as the number that matters. Bookmark this {state_name} calculator, revisit it as rates and prices change, and you will never be surprised by what a home really costs.",
            "In the end, the goal is simple: buy a home you can comfortably afford, not just qualify for. This {state_name} mortgage calculator hands you that honest monthly figure in seconds, come back whenever your numbers change."
        ]
    ];
}


/**
 * Builds the full V6 Mortgage article for a given state (~1,250 words),
 * with a property-tax-aware worked example so the monthly total differs per state.
 */
function usc_mtg_article_v6($state) {
    $name = $state['name'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $city1 = $x['cities'][0];
    $city2 = isset($x['cities'][1]) ? $x['cities'][1] : $x['cities'][0];
    $ptr  = usc_state_property_tax_rate($state_slug); // % per year

    // Worked example: $350k home, 20% down, 6.5% 30yr.
    $price = 350000; $down = 70000; $loan = $price - $down;
    $mr = 0.065 / 12; $n = 360;
    $pi = $loan * ($mr * pow(1 + $mr, $n)) / (pow(1 + $mr, $n) - 1);
    $tax_m = $price * ($ptr / 100) / 12;
    $ins_m = 1400 / 12;
    $total = $pi + $tax_m + $ins_m;

    $replacements = [
        'state_name' => $name,
        'city1'      => $city1,
        'city2'      => $city2,
        'region'     => $x['region'],
    ];

    $pool = usc_mtg_variations_v6();
    $sec = function($key) use ($state_slug, $pool, $replacements) {
        return usc_get_section_content($state_slug, $key, $pool, $replacements);
    };

    $html = '<!-- usc-v5-article -->
<div class="usc-article-content">
  <p>' . $sec('intro') . '</p>

  <h2>1. ' . usc_pv6_h($state_slug, 'mwhatis', ['What is the ' . esc_html($name) . ' Mortgage Calculator?', 'What This ' . esc_html($name) . ' Calculator Does', 'Meet the ' . esc_html($name) . ' Mortgage Calculator', 'What Exactly Is This Tool?']) . '</h2>
  <p>' . $sec('whatis') . '</p>

  <h2>2. ' . usc_pv6_h($state_slug, 'mwhy', ['Why Calculate Your Payments Ahead of Time?', 'Why Use This Calculator?', 'Why Run the Numbers First?', 'Why Estimate Before You Buy?']) . '</h2>
  <p>' . $sec('why') . '</p>
' . usc_pv6_list($state_slug, 'mwhy', [
    '<strong>Test Down Payments:</strong> See how 5%, 10%, or 20% down changes your loan, PMI, and monthly payment.',
    '<strong>Plan Closing Costs:</strong> Estimate the extra cash you will need at the ' . esc_html($name) . ' closing table.',
    '<strong>Compare Terms:</strong> Weigh a 15-year against a 30-year loan to see the real interest savings.',
    '<strong>Check Affordability:</strong> Know your debt-to-income ratio before applying for pre-approval.',
    '<strong>Model Extra Payments:</strong> See how a little extra principal each month shortens the loan.',
    '<strong>Shop With Confidence:</strong> Match ' . esc_html($name) . ' listings to a payment you can actually sustain.',
], 5) . '

  <h2>3. ' . usc_pv6_h($state_slug, 'mhow', ['How Does the Calculator Process Your Payments?', 'How the ' . esc_html($name) . ' Calculator Works', 'What Happens Behind the Scenes', 'How Your Payment Is Built']) . '</h2>
  <p>' . $sec('how') . '</p>

  <h2>4. ' . usc_pv6_h($state_slug, 'minputs', ['Key Inputs Needed for Mortgage Estimates', 'What You Will Need', 'Information to Have Ready', 'What to Enter']) . '</h2>
  <p>' . $sec('inputs') . '</p>
' . usc_pv6_list($state_slug, 'minputs', [
    '<strong>Home Price:</strong> the purchase price of the ' . esc_html($name) . ' property.',
    '<strong>Down Payment:</strong> as a percentage or dollar amount; under 20% usually means PMI.',
    '<strong>Interest Rate:</strong> your quoted or expected mortgage rate.',
    '<strong>Loan Term:</strong> typically 15 or 30 years.',
    '<strong>Property Tax &amp; Insurance:</strong> ' . esc_html($name) . ' local rates, adjustable to your county.',
    '<strong>HOA Dues &amp; Extra Payments:</strong> optional monthly costs and extra principal.',
], 5) . '

  <h2>5. ' . usc_pv6_h($state_slug, 'mformula', ['Understanding the Mortgage Payment Formula', 'The Math Behind Your Payment', 'How the Numbers Are Calculated', 'The Payment Equation']) . '</h2>
  <p>' . $sec('formula') . '</p>
  <pre style="background:#f4f4f5; padding:15px; border-radius:5px; overflow-x:auto;">Monthly P&amp;I = P x [ r(1+r)^n ] / [ (1+r)^n - 1 ]</pre>
  <p>Here P is your loan amount (price minus down payment), r is the monthly interest rate (your annual rate divided by 12), and n is the number of payments (years times 12). The calculator solves this for principal and interest, then adds your ' . esc_html($name) . ' property tax, homeowners insurance, and PMI where applicable to build the full monthly payment you actually make.</p>

  <h2>6. ' . usc_pv6_h($state_slug, 'mhowtouse', ['How to Use the Calculator Step-by-Step', 'Step-by-Step Instructions', 'Using the Tool in 60 Seconds', 'How to Run Your Estimate']) . '</h2>
  <p>' . $sec('howtouse') . '</p>

  <h2>7. ' . usc_pv6_h($state_slug, 'mexample', ['Practical Mortgage Example in ' . esc_html($name), 'A Worked ' . esc_html($name) . ' Example', 'See It in Action: ' . esc_html($name), $name . ' Payment: A Sample Run']) . '</h2>
  <p>' . $sec('example') . '</p>
  <table style="width:100%; border-collapse: collapse; margin-bottom: 25px; font-size:14px; border: 1px solid #e5e7eb;">
    <thead><tr style="background-color:#f9fafb; border-bottom:2px solid #e5e7eb;"><th style="padding:12px; text-align:left; font-weight:600; color:#374151;">Component (on a $350,000 home, 20% down, 6.5%, 30 yr)</th><th style="padding:12px; text-align:right; font-weight:600; color:#374151;">Monthly</th></tr></thead>
    <tbody>
      <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px; color:#4b5563;">Principal &amp; Interest ($280,000 loan)</td><td style="padding:12px; text-align:right; color:#111827;">' . usc_money($pi) . '</td></tr>
      <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px; color:#4b5563;">' . esc_html($name) . ' Property Tax (approx. ' . number_format($ptr, 2) . '%/yr)</td><td style="padding:12px; text-align:right; color:#b91c1c;">' . usc_money($tax_m) . '</td></tr>
      <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px; color:#4b5563;">Homeowners Insurance (est.)</td><td style="padding:12px; text-align:right; color:#b91c1c;">' . usc_money($ins_m) . '</td></tr>
      <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px; color:#4b5563;">PMI (20% down)</td><td style="padding:12px; text-align:right; color:#15803d;">$0.00</td></tr>
      <tr style="border-bottom:1px solid #e5e7eb; background-color:#f0fdf4;"><td style="padding:12px; font-weight:bold; color:#15803d;">Estimated Total Monthly Payment (PITI)</td><td style="padding:12px; text-align:right; font-weight:bold; color:#166534;">' . usc_money($total) . '</td></tr>
    </tbody>
  </table>
  <p><em>Because ' . esc_html($name) . '\'s property-tax rate is about ' . number_format($ptr, 2) . '% a year, the tax portion alone runs roughly ' . usc_money($tax_m) . ' a month on this home, which is why your all-in payment is well above principal and interest. These are estimates; adjust the fields for your exact county, rate, and insurance.</em></p>

  <h2>8. ' . usc_pv6_h($state_slug, 'mfactors', ['Primary Factors Influencing Your Payments', 'What Changes Your Payment', 'Variables That Move the Number', 'What Influences the Cost']) . '</h2>
  <p>' . $sec('factors') . '</p>

  <h2>9. ' . usc_pv6_h($state_slug, 'mbenefits', ['Benefits of Using This Calculator', 'Why This Tool Helps', 'What You Gain From It', 'The Advantages at a Glance']) . '</h2>
  <p>' . $sec('benefits') . '</p>

  <h2>10. ' . usc_pv6_h($state_slug, 'mmistakes', ['Common Home-Buyer Budgeting Mistakes', 'Pitfalls to Avoid', 'Errors People Often Make', 'What Trips Buyers Up']) . '</h2>
  <p>' . $sec('mistakes') . '</p>

  <h2>11. ' . usc_pv6_h($state_slug, 'musecases', ['Real-World Use Cases', 'Practical Scenarios', 'When to Reach for This Tool', 'Everyday Uses']) . '</h2>
  <p>' . $sec('usecases') . '</p>

  <h2>12. ' . usc_pv6_h($state_slug, 'mconclusion', ['Taking Control of Your Home Financing', 'Final Thoughts', 'The Bottom Line', 'Wrapping Up']) . '</h2>
  <p>' . $sec('conclusion') . '</p>

  <h2>13. ' . esc_html($name) . ' Mortgage Costs to Watch in {tax_year}</h2>
  <p>A few moving parts shape your ' . esc_html($name) . ' payment in {tax_year}. Thirty-year fixed rates have hovered in the mid-6% range, so even a half-point change noticeably moves your monthly number. Conventional loans require PMI until you reach 20% equity, FHA loans allow as little as 3.5% down, and most lenders look for a total debt-to-income ratio under about 43%. With ' . esc_html($name) . '\'s property-tax rate near ' . number_format($ptr, 2) . '%, adjust the tax field to your county for the most realistic estimate. As a gut-check, many planners suggest keeping total housing under roughly 28% of gross monthly income.</p>
  <h3>What makes up your monthly payment (PITI)</h3>
' . usc_pv6_list($state_slug, 'mpiti', [
    '<strong>Principal:</strong> the part that pays down what you borrowed; it starts small and grows each year.',
    '<strong>Interest:</strong> the lender\'s charge, front-loaded, which is why early extra principal saves so much.',
    '<strong>Taxes:</strong> ' . esc_html($name) . ' property taxes, usually escrowed monthly and paid to your county.',
    '<strong>Insurance:</strong> homeowners hazard insurance, plus PMI if your down payment is under 20%.',
    '<strong>HOA dues:</strong> not part of the loan, but a real monthly cost in many ' . esc_html($name) . ' communities.',
], 5) . '
  <h3>Smart ways to lower your ' . esc_html($name) . ' payment</h3>
' . usc_pv6_list($state_slug, 'mlower', [
    'Put 20% down to skip PMI, or request its removal once you cross 20% equity.',
    'Compare a 15-year term: a lower rate and dramatic lifetime interest savings, despite a higher monthly payment.',
    'Shop at least three lenders, even 0.25% lower adds up to thousands over a 30-year loan.',
    'Re-shop homeowners insurance yearly, and appeal an over-assessed ' . esc_html($name) . ' property-tax bill.',
    'Send extra toward principal, or make one extra payment a year, to shave years off the loan.',
], 4) . '

  <h2>14. Related ' . esc_html($name) . ' Calculators</h2>
  <p>Planning a move or a new budget? These free ' . esc_html($name) . ' tools pair well with your mortgage math:</p>
  ' . usc_get_related_links_html($state_slug, $name, 'mortgage') . '

  <h2>15. Mortgage Calculators in Nearby States</h2>
  <p>Home costs vary across ' . esc_html($x['region']) . '. See how payments change just over the ' . esc_html($name) . ' border:</p>
  ' . (function() use ($state_slug) { $h = usc_neighbour_links_html($state_slug, 'mortgage', 'Mortgage Calculator'); return $h ?: '<p>Explore mortgage calculators for every U.S. state from the menu above.</p>'; })() . '

  <h2>16. Helpful Official Resources</h2>
  <p>For trustworthy, up-to-date guidance, go straight to the source:</p>
  <ul>
    <li><a href="https://www.consumerfinance.gov/owning-a-home/" target="_blank" rel="nofollow noopener">CFPB Owning a Home</a> &mdash; unbiased federal guidance on loans and closing costs.</li>
    <li><a href="https://www.freddiemac.com/pmms" target="_blank" rel="nofollow noopener">Freddie Mac mortgage rate survey</a> &mdash; current national average rates.</li>
    <li><a href="https://www.hud.gov/buying" target="_blank" rel="nofollow noopener">HUD home-buying resources</a> &mdash; first-time buyer programs and counseling.</li>
  </ul>
</div>
<!-- usc-mortgage-v6 -->';

    $html = str_replace('{tax_year}', (function_exists('usac_get_active_tax_year') ? usac_get_active_tax_year() : '2026'), $html);
    return $html;
}

/** V6 FAQ pool for Mortgage (state aware). Selects 12. */
function usc_mtg_faqs_v6($state) {
    $name = $state['name'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $ptr = usc_state_property_tax_rate($state_slug);

    $pick = function($qkey, $arr) use ($state_slug) {
        return $arr[usc_get_variation_index($state_slug, 'mtgfaqa_' . $qkey, count($arr))];
    };

    $faq_pool = [
        ['q' => 'What does PITI mean on a ' . $name . ' mortgage?', 'a' => $pick('piti', [
            'PITI stands for Principal, Interest, Taxes, and Insurance, the four parts of your monthly payment. In ' . $name . ', taxes and insurance are usually escrowed and added to your loan payment.',
            'It is the full monthly payment: principal and interest on the loan, plus property taxes and homeowners insurance. ' . $name . ' lenders typically collect all four together.',
            'PITI is the all-in monthly cost, loan principal, interest, ' . $name . ' property tax, and insurance, which is why your real payment is more than principal and interest alone.',
        ])],
        ['q' => 'How much are property taxes in ' . $name . '?', 'a' => $pick('ptax', [
            $name . '\'s effective property-tax rate is roughly ' . number_format($ptr, 2) . '% of home value per year, though the exact bill depends on your county and assessment.',
            'On average, ' . $name . ' property taxes run about ' . number_format($ptr, 2) . '% annually, so on a $350,000 home that is roughly ' . usc_money(350000 * $ptr / 100 / 12) . ' a month.',
            'Property tax in ' . $name . ' averages around ' . number_format($ptr, 2) . '% a year, but local rates vary, so set the tax field to your specific county for accuracy.',
        ])],
        ['q' => 'Is this ' . $name . ' mortgage calculator free?', 'a' => $pick('free', [
            'Yes, it is completely free, run unlimited scenarios with no fee and no sign-up.',
            'It is 100% free and private. Calculate as many ' . $name . ' payment scenarios as you like.',
            'Absolutely free, no account, no paywall, and no limit on calculations.',
        ])],
        ['q' => 'When do I have to pay PMI in ' . $name . '?', 'a' => $pick('pmi', [
            'PMI generally applies when your down payment is under 20%. Once you reach 20% equity on your ' . $name . ' home, you can request its removal.',
            'If you put down less than 20%, conventional loans add PMI until your loan-to-value drops to 80%, then it can be cancelled.',
            'Down payments below 20% usually trigger PMI in ' . $name . '; it falls off once you build 20% equity.',
        ])],
        ['q' => 'Should I choose a 15-year or 30-year mortgage in ' . $name . '?', 'a' => $pick('term', [
            'A 15-year loan has higher monthly payments but a lower rate and far less lifetime interest. A 30-year keeps payments lower and more flexible. Run both here to compare.',
            'It depends on your budget: 15-year saves dramatically on interest, 30-year eases monthly cash flow. Compare the ' . $name . ' payments side by side.',
            'Shorter terms cost less overall but more per month. Test a 15- and 30-year on your ' . $name . ' numbers to see which fits.',
        ])],
        ['q' => 'How much down payment do I need in ' . $name . '?', 'a' => $pick('down', [
            'Conventional loans often want 20% to avoid PMI, but many programs allow far less, FHA loans go as low as 3.5%. More down means a lower ' . $name . ' payment.',
            'You can buy with as little as 3%-3.5% down on some loans, though 20% avoids PMI and lowers your monthly cost in ' . $name . '.',
            'It varies by loan type. Twenty percent skips PMI, but first-time ' . $name . ' buyers often put down much less using FHA or other programs.',
        ])],
        ['q' => 'What credit score do I need for a ' . $name . ' mortgage?', 'a' => $pick('credit', [
            'Conventional loans usually want around 620+, while FHA can go lower. A higher score earns a better rate, which meaningfully lowers your ' . $name . ' payment.',
            'Most lenders look for 620 or above for conventional loans; FHA is more flexible. Better scores mean better rates in ' . $name . '.',
            'A score in the 600s can qualify, but the higher your score, the lower your ' . $name . ' interest rate and monthly cost.',
        ])],
        ['q' => 'What are closing costs in ' . $name . '?', 'a' => $pick('closing', [
            'Closing costs typically run 2%-4% of the loan in ' . $name . ', covering lender fees, title, appraisal, and prepaid taxes and insurance. Budget this as cash on top of your down payment.',
            'Expect roughly 2%-4% of the loan amount at closing in ' . $name . ', for fees, title work, and prepaids, separate from your down payment.',
            'In ' . $name . ', closing costs usually total a few percent of the loan and cannot always be rolled in, so plan for that cash upfront.',
        ])],
        ['q' => 'Does the calculator include ' . $name . ' property taxes and insurance?', 'a' => $pick('incl', [
            'Yes. It adds ' . $name . ' property taxes (about ' . number_format($ptr, 2) . '% by default) and homeowners insurance to your principal and interest for a true PITI figure.',
            'It does, the tool escrows ' . $name . ' taxes and insurance into the monthly payment, and you can adjust both to your county.',
            'Absolutely, taxes and insurance are built in, which is why the ' . $name . ' total is higher than principal and interest alone.',
        ])],
        ['q' => 'Can I pay off my ' . $name . ' mortgage early?', 'a' => $pick('early', [
            'Yes, and the savings are large. Even a small extra principal payment each month can cut years and thousands in interest off a ' . $name . ' loan, test it in the tool.',
            'You can. Extra principal, or one extra payment a year, shortens the term and reduces total interest. Most ' . $name . ' loans have no prepayment penalty.',
            'Early payoff is usually allowed and very effective. Add extra principal in the calculator to see how much faster you finish in ' . $name . '.',
        ])],
        ['q' => 'How does my interest rate affect the ' . $name . ' payment?', 'a' => $pick('rate', [
            'Significantly, even a 0.25% change moves the monthly payment and adds up to thousands over 30 years. That is why shopping multiple ' . $name . ' lenders pays off.',
            'A lot. Rates drive the principal-and-interest portion directly, so a small rate difference noticeably changes your ' . $name . ' payment.',
            'Heavily, the lower your rate, the lower your monthly P&I. Compare several ' . $name . ' lenders to capture the best rate.',
        ])],
        ['q' => 'Is the estimate from this ' . $name . ' calculator exact?', 'a' => $pick('exact', [
            'It is a high-accuracy estimate. Your real ' . $name . ' payment depends on your exact rate, county tax, insurance quote, and lender fees.',
            'Treat it as a close estimate, the final numbers come from your lender and your county\'s actual ' . $name . ' tax assessment.',
            'It is for planning. Adjust the rate, tax, and insurance fields to your situation for the most accurate ' . $name . ' figure.',
        ])],
        ['q' => 'What is a good debt-to-income ratio for a ' . $name . ' mortgage?', 'a' => $pick('dti', [
            'Most lenders prefer a total DTI under about 43%, with housing under roughly 28% of gross income. Staying below those helps you qualify in ' . $name . '.',
            'Aim for total debt under ~43% of income and housing under ~28%. Lower ratios improve your ' . $name . ' approval odds and rate.',
            'Lenders generally want housing costs near 28% of gross income and total debt under 43%, useful targets when budgeting a ' . $name . ' home.',
        ])],
        ['q' => 'Does the calculator work for refinancing in ' . $name . '?', 'a' => $pick('refi', [
            'Yes. Enter your new rate, balance, and term to compare a refinance against your current ' . $name . ' payment and estimate the savings.',
            'It does, plug in the refinance terms to see the new monthly payment and how much interest you would save in ' . $name . '.',
            'You can use it for refinancing, just enter the new loan details to compare against your existing ' . $name . ' mortgage.',
        ])],
    ];

    return usc_get_deterministic_faqs($state_slug, $faq_pool, 12);
}
