<?php
/**
 * Sales Tax Calculator (UST) — V6 content engine.
 * 16 variations/section x 13 sections, real per-state sales-tax example,
 * varied headings, pooled lists, unique FAQs.
 * Tokens: {state_name} {sales_rate} {city1} {city2} {region}
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

/** Returns the Sales Tax text variations (16 per section). */
function usc_st_variations_v6() {
    return array_merge(usc_stv6_a(), usc_stv6_b(), usc_stv6_c());
}

/** Variation set A: intro, whatis */
function usc_stv6_a() {
    return [
        'intro' => [
            "Sales tax sneaks into almost every purchase you make in {state_name}, from a coffee to a car. The rate you actually pay combines the state baseline with county and city add-ons, so it varies block by block. This calculator shows your exact total so big purchases never surprise you at checkout.",
            "Whenever you buy something in {state_name}, sales tax quietly tacks on to the price. Because local jurisdictions add their own rates on top of the state's, the real cost depends on where you shop. This calculator gives you the precise total before you reach the register.",
            "The price on the shelf in {state_name} is rarely what you pay, sales tax sees to that. State, county, and city rates stack together, especially on big-ticket items. This tool breaks down the combined rate so you can budget for the true final cost.",
            "Whether you are buying electronics in {city1} or a car across {state_name}, sales tax adds up fast. The combined rate blends state and local taxes that differ by location. This calculator reveals exactly what you will pay so there are no checkout surprises.",
            "Sales tax is one of the most common, and most overlooked, costs in {state_name}. It is added at the point of sale and varies by city and county. This calculator shows the state and local breakdown so you know the real total on any purchase.",
            "For shoppers in {city1} and across {state_name}, sales tax shapes the true cost of everything. This tool combines the state baseline with local rates to give you an accurate total, handy for big purchases like furniture, appliances, or a vehicle.",
            "Few costs are as easy to underestimate as sales tax. In {state_name}, the combined rate can vary by zip code, so the same item costs more in one city than another. This calculator pins down your exact total before you buy.",
            "Before a major purchase in {state_name}, it pays to know the real checkout price. Sales tax stacks state, county, and city rates, and this calculator adds them up so you can budget precisely and avoid surprises.",
            "Sales tax can feel invisible until the total appears at the register. This {state_name} calculator makes it visible, separating state and local rates so you understand exactly what you are paying and why.",
            "Budgeting for a big buy in {state_name} works best when sales tax is in the math from the start. This calculator gives you the combined rate and final total instantly, factoring in {state_name}'s baseline and local add-ons.",
            "From {city1} to {city2}, {state_name} shoppers use tools like this to avoid checkout surprises. Enter a price and see the state tax, local tax, and final total laid out clearly.",
            "The combined sales-tax rate in {state_name} may be higher or lower than you assume, and it changes by location. This calculator computes your exact total so you can compare jurisdictions and plan major purchases.",
            "A clear view of sales tax helps every {state_name} shopper. This tool converts a purchase price into the real total, including state and local tax, so you can budget and compare with confidence.",
            "Whether you are buying a big-ticket item or just curious about the rate, knowing your {state_name} sales tax matters. This calculator applies the state and local rates to any price in moments.",
            "The path from sticker price to checkout total runs through state and local sales tax in {state_name}. This calculator maps that path so you know precisely what a purchase will cost.",
            "Sales tax should not be a surprise at the register. This {state_name} calculator shows your combined rate and total up front, helping you budget purchases, verify receipts, and compare rates across locations."
        ],
        'whatis' => [
            "A <strong>{state_name} Sales Tax Calculator</strong> estimates the tax and final total on a purchase by combining {state_name}'s baseline rate of {sales_rate} with any local county or city rates you select.",
            "The <strong>{state_name} Sales Tax Calculator</strong> is a tool that turns a price into a real total. It applies the state rate ({sales_rate}) plus local add-ons and shows the tax amount and final cost.",
            "Think of the <strong>{state_name} Sales Tax Calculator</strong> as a checkout previewer. Enter a price and your location, and it combines {state_name}'s {sales_rate} baseline with local rates for an accurate total.",
            "At its core, a <strong>{state_name} Sales Tax Calculator</strong> answers what a purchase really costs. It layers {state_name}'s {sales_rate} state rate with county and city taxes to produce the final total.",
            "A <strong>{state_name} Sales Tax Calculator</strong> is a simulator for your receipt. Before you buy, it estimates the combined sales tax on a {state_name} purchase, including local add-ons.",
            "Put simply, the <strong>{state_name} Sales Tax Calculator</strong> converts a price into a final cost. It handles the state-plus-local math so the {sales_rate} baseline and any local rates are all included.",
            "The <strong>{state_name} Sales Tax Calculator</strong> is a budgeting tool that decodes your total. Accounting for the {sales_rate} state rate and local taxes, it shows how a price becomes the amount you pay.",
            "A <strong>{state_name} Sales Tax Calculator</strong> is a free, instant estimator of purchase costs. Provide a price and location, and it applies {state_name}'s {sales_rate} rate plus local taxes for the total.",
            "Consider the <strong>{state_name} Sales Tax Calculator</strong> a translation layer between a shelf price and your checkout total. It applies {state_name}'s {sales_rate} rate and local add-ons to show the real cost.",
            "The <strong>{state_name} Sales Tax Calculator</strong> is built for {state_name} shoppers. Rather than guessing, it factors in the {sales_rate} state baseline and local rates for an accurate final total.",
            "In practical terms, a <strong>{state_name} Sales Tax Calculator</strong> is your what-if machine for purchases. Change the price or location and it instantly re-estimates your {state_name} total.",
            "A <strong>{state_name} Sales Tax Calculator</strong> takes the guesswork out of checkout. It breaks your cost into price, state tax ({sales_rate}), local tax, and final total, all in one view.",
            "The <strong>{state_name} Sales Tax Calculator</strong> is a self-service tool for shoppers in {city1} and across the state. It converts a price into a real total using {state_name}'s {sales_rate} rate plus local taxes.",
            "Think of the <strong>{state_name} Sales Tax Calculator</strong> as a financial mirror: it reflects what a purchase will really cost in {state_name}, so you can budget and compare with confidence.",
            "A <strong>{state_name} Sales Tax Calculator</strong> replicates how retailers compute tax. It applies the {sales_rate} state rate and local add-ons to estimate the sales tax and final total.",
            "The <strong>{state_name} Sales Tax Calculator</strong> is a quick way to see a purchase's true cost. Enter a price and it applies {state_name}'s {sales_rate} rate plus local taxes to reveal the total."
        ]
    ];
}


/** Variation set B: why, how, inputs, formula */
function usc_stv6_b() {
    return [
        'why' => [
            "Estimating sales tax ahead of time pays off. It helps you budget for big purchases, verify that a retailer charged the correct rate, compare {state_name} cities, and see how exemptions on groceries or medicine lower your total.",
            "Running the numbers prevents checkout surprises. You can budget the true cost of furniture or a car, double-check receipts, and compare combined rates across {state_name} jurisdictions before you buy.",
            "Whether you are making a major purchase or just shopping smart in {state_name}, this tool brings clarity. Test different prices and locations to see exactly how much sales tax adds.",
            "Knowing the combined rate early is the difference between budgeting and guessing. It lets you plan a big buy in {city1}, compare nearby cities, and avoid being overcharged on the {state_name} rate.",
            "A quick estimate now avoids overpaying later. By seeing your {state_name} state-plus-local rate, you can verify receipts and catch the outdated point-of-sale systems that charge the wrong tax.",
            "There is real value in the breakdown. Once you see how {state_name}'s state rate and local add-ons combine, you can choose where to make a major purchase to minimize tax.",
            "This calculator is your shopping sandbox. Compare a purchase in {city1} with one in {city2}, test a bigger price, or model an exemption, and see the {state_name} total respond instantly.",
            "Most sales-tax surprises come from not checking the rate first. Use this tool to confirm the {state_name} total before a big buy and to spot when a store charges more than the correct combined rate.",
            "For anyone budgeting in {state_name}, sales tax adds up on large purchases. This calculator hands you the total in seconds, then lets you flex price and location to plan realistically.",
            "Thinking about a big purchase? The shelf price hides the tax in {state_name}. Run it here to reveal the combined sales tax and final total, then compare retailers and cities fairly.",
            "Using it regularly keeps you ahead of costs. A different city, a special district tax, or a move within {region} all shift your {state_name} sales tax, and seeing that early means no surprises.",
            "It removes the guesswork from big buys. Want to know the real cost of a {state_name} purchase? Start from the combined-rate total here, and the price stops being a mystery.",
            "Smart shopping starts with visibility. This tool shows how {state_name}'s state and local rates combine, helping you budget accurately and verify you were charged correctly.",
            "Every exemption has a dollar impact. With this calculator you can see how tax-exempt items like groceries or prescriptions lower your {state_name} total before you check out.",
            "The biggest reason to use it is confidence. When you know your real {state_name} sales tax, decisions about big purchases, where to buy, and verifying receipts all get easier.",
            "Plain and simple, it puts you in control. Instead of being surprised at the {state_name} register, you can predict the total, compare locations, and budget for the exact final cost."
        ],
        'how' => [
            "The calculator works step by step: it takes your purchase price, applies {state_name}'s state baseline rate, adds any local county or city rate, and totals the combined sales tax and final cost.",
            "Behind the scenes it mirrors a register. It multiplies your price by {state_name}'s state rate, layers on the local rate for your jurisdiction, and sums everything into the final total.",
            "Step by step, the tool applies the {state_name} state rate to your price, adds the local rate, accounts for any exemptions, and shows the tax amount and total cost.",
            "It follows how retailers bill: price times the combined rate. The calculator separates {state_name}'s state portion from the local portion so you can see exactly what makes up the tax.",
            "The engine layers your tax: state rate first, then local county and city rates, then any exemption adjustments, ending with your {state_name} total cost.",
            "To estimate your total, the calculator applies {state_name}'s baseline rate, adds the jurisdiction's local rate, and handles reduced or exempt categories like groceries where they apply.",
            "Functionally, it computes state tax, adds local tax, applies any exemptions, and totals the final {state_name} cost, the same math a point-of-sale system runs.",
            "Think of it as stacking: the {state_name} state rate sits at the base, local rates stack on top, and exemptions trim specific items, producing your combined total.",
            "The math follows a clear order: price, state rate, local rate, exemptions. The calculator handles each so your {state_name} estimate matches a real receipt.",
            "It replicates retail logic for {state_name}: apply the state rate, add local rates, adjust for exempt categories, and total the cost the buyer pays.",
            "Under the hood, the tool multiplies price by {state_name}'s state rate, adds the local combined rate, and applies exemptions to produce an accurate total.",
            "The process is methodical: take the price, apply the {state_name} baseline, add local taxes, factor exemptions, and present the tax amount and final total.",
            "First the state rate, then local, then exemptions. The calculator combines them because in {state_name} the rate you pay is the sum of all applicable jurisdictions.",
            "It treats your purchase like a receipt: price plus {state_name} state tax plus local tax, minus any exemption relief, equals the total you pay.",
            "The system computes the combined {state_name} rate, applies it to your price, accounts for exempt items, and reports both the tax and the final cost.",
            "The calculator processes your purchase the way {state_name} retailers do: state rate plus local rate on the taxable amount, yielding your total at checkout."
        ],
        'inputs' => [
            "For an accurate estimate, enter your purchase price, select your {state_name} city or county, and choose any exemption category like groceries or prescriptions that applies.",
            "The calculator needs a few inputs: the purchase price, your {state_name} jurisdiction, and any local override or exemption. Those drive the combined sales-tax estimate.",
            "Provide your price, your {state_name} location, and any exemptions. The more accurately you set them, the closer the total lands to your real receipt.",
            "Have these ready: the item price, your {state_name} city or county, and any exempt category. With those, the tool estimates your combined tax and total.",
            "You will enter price, jurisdiction, and exemptions. Each shapes the result, the local rate in {state_name} can vary significantly between nearby cities.",
            "Start with the purchase price, then choose your {state_name} county or city and any exemption. Those inputs let the calculator apply the right combined rate.",
            "The required inputs are straightforward: price, location, and exemptions. Adding a custom local rate lets you match a specific {state_name} jurisdiction exactly.",
            "Enter the figures that drive your total: price, {state_name} location, and exemptions. Accurate location matters, since local rates differ across the state.",
            "To run the numbers, you need the price, your {state_name} city or county, and any exempt category. With those, the calculator estimates the combined total.",
            "Gather your purchase price, jurisdiction, and exemptions. These inputs let the tool mirror a {state_name} register and show the tax breakdown.",
            "The tool asks for price, location, and exemptions. Selecting your exact {state_name} city matters, because local add-ons change the combined rate.",
            "All it needs is price, {state_name} jurisdiction, and exemptions. Enter a custom local rate if your specific area differs from the listed default.",
            "Provide your purchase price, location, and exemption details. Accurate inputs here separate a rough guess from a reliable {state_name} total.",
            "You will need the item price, your {state_name} county or city, and any exempt category. These capture the full picture for an accurate estimate.",
            "The essentials are simple: price, jurisdiction, and exemptions. Enter the exempt category so the calculator applies your {state_name} taxable amount correctly.",
            "Feed it your purchase price, {state_name} location, and exemption details. With those, the calculator applies the combined rate to estimate your total."
        ],
        'formula' => [
            "The basic calculation is: Total = Price + (Price x Combined Rate), where the combined rate is {state_name}'s state rate plus your local county and city rates.",
            "Your sales tax is computed as: Tax = Price x Combined Rate, and Total = Price + Tax. The combined rate sums {state_name}'s baseline and local rates.",
            "The core formula: Sales Tax = Purchase Price x (State Rate + Local Rate). In {state_name}, the state baseline is {sales_rate}, with local add-ons on top.",
            "In equation form: Total Cost = Price x (1 + Combined Rate), where the combined rate blends {state_name}'s state rate and any local taxes.",
            "The math is straightforward: multiply the price by {state_name}'s combined rate to get the tax, then add it back to the price for the final total.",
            "Sales tax in {state_name} follows: Tax = Price x (State {sales_rate} + Local Rate). Exempt items are taxed at a reduced rate or zero.",
            "Expressed simply: Final Total = Price + (Price x Combined Rate). The combined rate is the sum of {state_name} state and local jurisdiction taxes.",
            "The formula chains together: price times {state_name}'s state rate, plus price times the local rate, equals the tax, which is added to the price.",
            "Mathematically, your total is the price multiplied by one plus the combined {state_name} rate, after any exemption reduces the taxable amount.",
            "The calculation: Sales Tax = Taxable Price x (State Rate + Local Rate), then Total = Price + Sales Tax. {state_name}'s state rate is {sales_rate}.",
            "Put as one line: Total = Price x (1 + State Rate + Local Rate). The calculator handles {state_name}'s {sales_rate} baseline and local add-ons for you.",
            "Your total follows: Price + (Price x Combined Rate). In {state_name}, exemptions on groceries or medicine lower the taxable price first.",
            "The underlying formula is: Total = Price + Price x (State + Local Rate), with {state_name}'s state rate at {sales_rate} plus local jurisdiction taxes.",
            "Stated as a process: take the price, multiply by the combined {state_name} rate for the tax, add it to the price, and the result is your total cost.",
            "The sales-tax formula is: Tax = Price x Combined Rate; Total = Price + Tax. Many {state_name} areas add local rates on top of the {sales_rate} state baseline.",
            "Formally: Total Cost = Purchase Price x (1 + Combined Sales-Tax Rate), the same method retailers use, with {state_name} state and local rates summed."
        ]
    ];
}


/** Variation set C: howtouse, example, factors, benefits, mistakes, usecases, conclusion */
function usc_stv6_c() {
    return [
        'howtouse' => [
            "Using the tool is simple: enter your purchase price, select your {state_name} city or county, choose any exemption, and click calculate to see the state tax, local tax, and final total.",
            "To estimate your total, type in the price, pick your {state_name} jurisdiction, add any exempt category, and run the calculation for a clear breakdown.",
            "Just follow the flow: fill in the price, choose your county, select exemptions, and press calculate. The tool instantly maps out your {state_name} sales tax.",
            "Start by entering the price and your {state_name} location, then add exemptions. One click later you will have the combined tax and final total.",
            "It takes seconds: input the price, select your county, add exemptions, and calculate. The {state_name} result shows state and local tax plus the total.",
            "Enter your price, choose your {state_name} city, and add any exempt category, then calculate. The tool handles the combined-rate math and shows it clearly.",
            "Type the price, pick your jurisdiction, select exemptions, and hit calculate. The {state_name} sales tax calculator does the rest, instantly and privately.",
            "Working it is intuitive: provide the price and location, add exemptions, and run it. Within seconds you will see your {state_name} total broken down.",
            "Add the purchase price, choose your {state_name} county, and key in exemptions. Hit calculate to reveal the combined tax and final cost.",
            "The steps are quick: enter price, set jurisdiction, add exemptions, and calculate. Whether you shop in {city1} or elsewhere in {state_name}, the tool adapts.",
            "Pop in the price, choose your location and exemptions, then calculate. The {state_name} results appear immediately, so you can tweak inputs and watch them update.",
            "Simply enter the price, select your county, add exemptions, and click calculate. The calculator returns a tidy {state_name} summary of tax and total.",
            "To run it, fill in price, jurisdiction, and exemptions. One calculation later, your {state_name} sales tax is broken into clear figures.",
            "Begin with the price and county, add exemptions, and press calculate. The tool shows your {state_name} combined tax plus the final total.",
            "It is a three-part process: enter price and location, add exemptions, and calculate. The {state_name} breakdown that follows is detailed and clear.",
            "Enter your numbers, choose the county and exemptions, and calculate, that is it. The {state_name} sales tax calculator instantly turns a price into your real total."
        ],
        'example' => [
            "Let's look at a {state_name} example: a $1,000 purchase at the state baseline rate of {sales_rate}. The table below shows the sales tax and final total before any local add-ons.",
            "To see it in practice, picture a $1,000 purchase in {city1}. Applying {state_name}'s {sales_rate} state rate, the breakdown shows the tax and total cost.",
            "Consider a {state_name} shopper buying $1,000 of goods. At the {sales_rate} state rate, the figures below trace the sales tax and the final amount paid.",
            "Here is a worked {state_name} example: a $1,000 purchase and the {sales_rate} state rate. The table converts that into a clear tax and total, before local rates.",
            "Imagine spending $1,000 in {state_name}. With a state rate of {sales_rate}, the example shows roughly the tax you would pay and the final total.",
            "Take a typical {state_name} case: a $1,000 purchase taxed at {sales_rate} state. The table lays out the tax and total, with local rates added on top in your city.",
            "Suppose a {state_name} buyer spends $1,000. At {sales_rate}, the breakdown below shows the state sales tax and the final amount.",
            "Let's model a real scenario: $1,000 spent in {state_name} at {sales_rate}. The result demonstrates how the state rate shapes the total before local taxes.",
            "Picture a $1,000 purchase in {city2}. Applying {state_name}'s {sales_rate} rate, the table shows the sales tax and the final total cost.",
            "For illustration, $1,000 of goods in {state_name} at {sales_rate} produces the tax and total shown, before any local jurisdiction add-ons.",
            "Here is how it plays out: a $1,000 {state_name} purchase at {sales_rate}. The table turns that into a sales-tax amount and a final total.",
            "Consider a practical {state_name} example, a $1,000 purchase, {sales_rate} state rate, and follow the math to the tax and total cost.",
            "Let's run the math for a {city1} purchase: $1,000 spent, {state_name}'s {sales_rate} state rate. The result reflects the sales tax and total before local taxes.",
            "Take a $1,000 purchase in {state_name} at {sales_rate}. The example walks through the state rate to the final total, with local rates layered on in your area.",
            "As a sample, picture a {state_name} buyer spending $1,000 at the {sales_rate} state rate. The breakdown shows the tax and the total cost.",
            "Here's a down-to-earth example: $1,000 spent in {city2} at {state_name}'s {sales_rate} rate. Follow the table to see the sales tax and final total."
        ],
        'factors' => [
            "Your sales tax hinges on several factors: {state_name}'s state baseline ({sales_rate}), the local county and city rates, the type of item, and whether it qualifies for an exemption.",
            "A handful of variables decide your total. The state rate ({sales_rate}) sets the floor, local rates add on, and exemptions on groceries or medicine lower the taxable amount in {state_name}.",
            "Several things shift your tax: the {state_name} baseline of {sales_rate}, local jurisdiction rates, the product category, and any reduced or exempt status.",
            "Sales tax is sensitive to location and item. In {state_name}, the state rate ({sales_rate}), local add-ons, and exemptions all combine to set what you pay.",
            "Watch these factors: the {sales_rate} state rate, your city and county rates, and exemptions. Because local rates vary across {state_name}, the same item can cost more in one place.",
            "The result depends on more than price. {state_name}'s {sales_rate} state rate, local taxes, and product exemptions all combine, which is why location matters so much.",
            "Key drivers include the {state_name} baseline ({sales_rate}), local rates, item type, and exemptions. A different city can change your combined rate noticeably.",
            "Your tax moves with where and what you buy. In {state_name}, the {sales_rate} state rate plus local add-ons and exemptions shape the final figure.",
            "Several elements shape the outcome: the state rate ({sales_rate}), county and city rates, and exempt categories. {state_name} totals vary by jurisdiction.",
            "Factors that matter most are the {state_name} state rate ({sales_rate}), local rates, and exemptions. Adjust the location and your total changes.",
            "Your total reflects {state_name}'s rules and your location. The {sales_rate} state rate sets the base, local rates add on, and exemptions trim specific items.",
            "The big levers are the state rate ({sales_rate}), local add-ons, and exemptions. In {state_name}, special district taxes can also raise the combined rate.",
            "Tax depends on what you buy and where. In {state_name}, the local rate joins the {sales_rate} state rate and exemptions to set your total.",
            "Among the factors: the {state_name} baseline ({sales_rate}), county and city rates, item category, and exemptions, all combining into your final tax.",
            "Several inputs steer the figure: the {sales_rate} state rate, local jurisdiction taxes, and exempt categories. Combined rates differ across {state_name} by zip code.",
            "Your results respond to the state rate ({sales_rate}), local rates, and exemptions. Because {state_name} combined rates vary by location, the same purchase can cost different amounts."
        ],
        'benefits' => [
            "This calculator gives precise totals, lets you model exemptions, compares {state_name} jurisdictions, and protects your privacy by running every calculation locally.",
            "Why use it? It details your full {state_name} purchase cost, helps you verify receipts, compares city rates, and never stores your information.",
            "Built for accuracy and transparency, the tool estimates your total, tests exemptions, and compares {state_name} locations, all without sharing personal records.",
            "The benefits are practical: reliable totals, exemption modeling, and rate comparison. Test a different price, city, or exempt item in {state_name} and see the impact at once.",
            "Among its advantages: it uses {state_name}'s state rate, recalculates instantly, and keeps your data private, your figures stay on your device.",
            "You get accuracy you can trust, the freedom to compare locations, and privacy. For {state_name} shoppers, that means smarter big-purchase decisions.",
            "The tool's strengths are precision, flexibility, and discretion. Run unlimited {state_name} scenarios, compare cities, and never worry about your data being saved.",
            "Key benefits include accurate totals, easy exemption testing, and a privacy-first design. Whether you shop in {city1} or anywhere in {state_name}, you can plan confidently.",
            "It pays off in three ways: dependable totals, location comparison, and complete privacy. Adjust your {state_name} inputs freely and the math stays on your device.",
            "Expect precise figures, instant recalculation, and zero data collection, a safe, practical tool for {state_name} shoppers and big-ticket buyers alike.",
            "The advantages add up: accurate tax math, exemption modeling, and a privacy model that keeps your {state_name} purchase details to yourself.",
            "Using it, you gain clarity and control. See the exact effect of an exemption or a different city in {state_name}, privately, since the tool saves nothing.",
            "This calculator is precise, flexible, and private by design. It applies {state_name}'s rates, compares scenarios in seconds, and never stores your figures.",
            "The payoff is better decisions with less hassle. Reliable {state_name} totals, exemption testing, and rate comparison let you budget purchases with confidence.",
            "Benefits include precision from real rate data, the flexibility to model exemptions and cities, and a strict privacy stance, a dependable foundation for {state_name} shopping.",
            "You get a tool that is accurate, flexible enough for any what-if, and private enough to trust, which makes estimating {state_name} sales tax both easy and safe."
        ],
        'mistakes' => [
            "A common mistake is using only the state rate. In {state_name}, local county and city taxes stack on top, so the real combined rate is usually higher than {sales_rate}.",
            "Watch for ignoring local rates. Two {state_name} cities can have very different combined rates, so always select your exact jurisdiction.",
            "To stay accurate, remember exemptions. Groceries and prescriptions are often tax-free or reduced in {state_name}, and forgetting that overstates your total.",
            "The biggest error is assuming the rate is the same statewide. {state_name} combined rates vary by zip code, so the same item costs different amounts in different cities.",
            "People often forget use tax. If you buy online from an out-of-state seller who does not collect {state_name} tax, you may owe use tax at the same rate.",
            "A frequent slip is trusting an outdated register. Point-of-sale systems sometimes charge the wrong {state_name} rate, this calculator helps you verify receipts.",
            "Don't overlook special district taxes. Some {state_name} areas add transit or stadium levies that raise the combined rate above the base.",
            "Be careful not to tax exempt items. In {state_name}, applying the full rate to groceries or medicine where they are exempt inflates your estimate.",
            "Common pitfalls: using only the state rate, ignoring local add-ons, and taxing exempt items. Each distorts your {state_name} total.",
            "A typical error is assuming online purchases are tax-free. Post-Wayfair, most large retailers collect {state_name} sales tax at checkout.",
            "Don't forget that prepared food is usually taxed even where groceries are not. In {state_name}, restaurant meals typically carry the full rate.",
            "Be careful to use your specific {state_name} city rate, not a neighboring one. Even adjacent jurisdictions can differ by a full percentage point.",
            "The mistakes that matter most are simple: skipping local rates, ignoring exemptions, and assuming a flat statewide rate. Account for all three in {state_name}.",
            "Users sometimes miss that clothing or back-to-school items may be exempt during {state_name} tax holidays, which lowers the total at certain times.",
            "A classic oversight is entering a price but forgetting local tax. In {state_name}, that makes the estimate lower than your real checkout total.",
            "To avoid surprises, verify three things: the {state_name} state rate, your local rate, and any exemptions. Those drive the combined sales-tax total."
        ],
        'usecases' => [
            "This tool is ideal if you are making a big purchase in {state_name} and want the real total, verifying a receipt, or comparing combined rates across cities.",
            "Real-world uses include budgeting for furniture or a car in {city1}, double-checking that a retailer charged the right rate, and comparing {state_name} jurisdictions.",
            "Reach for it when planning a major buy in {state_name}, checking an out-of-state online order for use tax, or seeing how an exemption lowers your total.",
            "Use cases range from everyday budgeting to big decisions: comparing prices across {city1} and {city2}, verifying receipts, or planning a large {state_name} purchase.",
            "It shines when budgeting big-ticket items, verifying a {state_name} receipt, or comparing where to buy to minimize the combined rate.",
            "Common scenarios: estimating the total on a car or appliance in {city1}, checking a receipt, and comparing how sales tax differs across {state_name} cities.",
            "Whether you are a careful shopper or planning a major purchase, the tool helps, estimate the total, test exemptions, and compare {state_name} locations.",
            "Put it to work when budgeting a large buy, verifying a receipt, or deciding between two {state_name} cities with different combined rates.",
            "Use it to plan a purchase within {region}, compare a city's combined rate, or set a realistic budget. For {state_name} shoppers, it turns price into real cost.",
            "Typical uses: confirming a receipt is correct, modeling exemptions, and comparing how the same purchase is taxed in {state_name} versus a neighboring state.",
            "It is handy for budget checks in {city1}, for testing how an exemption changes your total, and for verifying a {state_name} receipt after a big purchase.",
            "Lean on it when shopping changes, a big buy, an online order, or a move to {state_name}, since each can change your sales tax, and seeing it early keeps your budget honest.",
            "Practical applications include comparing {state_name} cities, budgeting big purchases, modeling exemptions, and checking use tax on online orders.",
            "Use the calculator to decide where to buy a big-ticket item in {state_name}, or to confirm a retailer applied the correct combined rate.",
            "From everyday shopping to major purchases, it answers the questions that matter in {state_name}: what is the real total, and how do local rates and exemptions affect it?",
            "Whether budgeting in {city1}, comparing cities across {state_name}, or verifying a receipt, this calculator gives the real total those decisions need."
        ],
        'conclusion' => [
            "Sales tax adds up fast on big purchases, so the clearer you see it, the better you budget. Use this {state_name} calculator to estimate the combined rate, test exemptions, and know your real total before you buy.",
            "The smartest shoppers know the total before they reach the register. With your {state_name} combined rate in hand, you can budget big buys, compare cities, and verify receipts.",
            "Purchase costs do not end at the shelf price. This {state_name} sales tax calculator helps you budget the real total, model exemptions, and compare jurisdictions. Come back whenever you plan a major buy.",
            "Knowing your real sales tax is the difference between a confident purchase and a checkout surprise. Lean on this {state_name} calculator to estimate the total and plan ahead.",
            "Your {state_name} purchases come with a combined tax that varies by location, so plan for it. Bookmark this calculator, test scenarios, and let the total guide your budget.",
            "When you understand state and local rates, sales tax stops being a surprise. Use this {state_name} calculator before big buys and whenever you want to verify a receipt.",
            "Whether you shop in {city1} or anywhere across {state_name}, the lesson is the same: budget for the combined rate, not just the price. Run this calculator often and shop with clear eyes.",
            "A clear total is powerful. With your {state_name} sales tax mapped out, you can budget a major purchase, compare cities, and catch any incorrect charge at the register.",
            "Shopping decisions get easier when they start from the real total. Use this {state_name} calculator to anchor your budget, test exemptions, and avoid checkout surprises.",
            "Come back to this tool any time things change, a different city, a special district tax, a move within {region}. Each shifts your {state_name} sales tax, and a quick recalculation keeps your budget intact.",
            "The bottom line: sales tax is a real cost worth planning for. Now that you can estimate it clearly for {state_name}, build your purchase budget on that solid number.",
            "Understanding your {state_name} sales tax is a small skill with a real payoff. Keep this calculator bookmarked, run it before big buys, and turn checkout surprises into confident budgeting.",
            "You started wondering what a purchase really costs; now you know. Use this {state_name} tool to budget big buys, verify receipts, and shop with the clarity real numbers bring.",
            "There is real value in seeing your true total. For shoppers in {city1}, {city2}, and beyond, this {state_name} calculator replaces guesswork with facts, so every purchase decision rests on solid ground.",
            "Treat sales tax as the real cost it is. Bookmark this {state_name} calculator, revisit it before major purchases, and you will never be surprised at the register.",
            "In the end, the goal is simple: know what you will actually pay before you buy. This {state_name} sales tax calculator hands you that total in seconds, come back whenever you shop big."
        ]
    ];
}


/**
 * Builds the full V6 Sales Tax article for a given state (~1,100 words),
 * with a real per-state sales-tax example on a $1,000 purchase.
 */
function usc_st_article_v6($state) {
    $name = $state['name'];
    $sales_rate = $state['sales_rate']; // e.g. "7.25%" or "0%"
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $city1 = $x['cities'][0];
    $city2 = isset($x['cities'][1]) ? $x['cities'][1] : $x['cities'][0];

    $rate_num = (float) str_replace(['%', ' '], '', $sales_rate);
    $price = 1000;
    $tax = $price * ($rate_num / 100);
    $total = $price + $tax;
    $has_tax = ($rate_num > 0);

    $replacements = [
        'state_name' => $name,
        'sales_rate' => $sales_rate,
        'city1'      => $city1,
        'city2'      => $city2,
        'region'     => $x['region'],
    ];

    $pool = usc_st_variations_v6();
    $sec = function($key) use ($state_slug, $pool, $replacements) {
        return usc_get_section_content($state_slug, $key, $pool, $replacements);
    };

    $region_comp = function_exists('ust_get_state_region_comparison') ? ust_get_state_region_comparison($state_slug, 'sales-tax') : '';

    $tax_cell = $has_tax ? '-' . usc_money($tax) : '$0.00';
    $note = $has_tax
        ? 'At ' . esc_html($name) . '\'s state baseline of ' . esc_html($sales_rate) . ', a $1,000 purchase adds about ' . usc_money($tax) . ' in state sales tax, for a total near ' . usc_money($total) . ' before any local rates. Your real total depends on your city and county, so set them in the calculator above.'
        : esc_html($name) . ' charges no statewide sales tax, so a $1,000 purchase stays $1,000 at the state level. A few localities may still add their own tax, so check your specific area.';

    $html = '<!-- ust-v3-article -->
<h2>' . usc_pv6_h($state_slug, 'stintro', ['Understanding Sales Tax in ' . $name, $name . ' Sales Tax, Explained', 'Your ' . $name . ' Checkout Total', 'Sales Tax in ' . $name . ': An Overview']) . '</h2>
<p>' . $sec('intro') . '</p>
<p>Sales tax applies to most retail purchases in ' . esc_html($name) . ', from clothing and electronics to dining out. Retailers collect it at the point of sale and remit it to the state, while local jurisdictions can add their own rates on top. For shoppers, that means the final cost of a purchase depends on both the state baseline and any city or county add-ons where you buy.</p>

<h2>' . usc_pv6_h($state_slug, 'stwhatis', ['What is the ' . $name . ' Sales Tax Calculator?', 'What This ' . $name . ' Calculator Does', 'Meet the ' . $name . ' Sales Tax Calculator', 'What Exactly Is This Tool?']) . '</h2>
<p>' . $sec('whatis') . '</p>
<p>It works by taking your purchase price and applying ' . esc_html($name) . '\'s state baseline rate of ' . esc_html($sales_rate) . '. You can select your local county or city to load the corresponding local rate, enter a custom override, and account for exemptions such as groceries or prescription drugs. The result is a clear breakdown of the state and local tax and the final total cost of your purchase.</p>

<h2>' . usc_pv6_h($state_slug, 'stwhy', ['Why Estimate Your Sales Tax?', 'Why Use This Calculator?', 'Why Check the Total First?', 'Why Knowing the Rate Matters']) . '</h2>
<p>' . $sec('why') . '</p>
' . usc_pv6_list($state_slug, 'stwhy', [
    '<strong>Budget Big Purchases:</strong> Know the real total on furniture, electronics, or a vehicle in ' . esc_html($name) . '.',
    '<strong>Verify Receipts:</strong> Catch outdated registers that charge the wrong combined rate.',
    '<strong>Compare Cities:</strong> Local rates vary across ' . esc_html($name) . '; find tax-friendlier jurisdictions.',
    '<strong>Model Exemptions:</strong> See how tax-free groceries or medicine lower your total.',
    '<strong>Plan Online Buys:</strong> Understand use tax on out-of-state orders.',
    '<strong>Shop With Confidence:</strong> No checkout surprises when you know the rate in advance.',
], 5) . '

<h2>' . usc_pv6_h($state_slug, 'sthow', ['How the Calculator Works', 'How Your Tax Is Calculated', 'What Happens Behind the Scenes', 'How the Total Is Built']) . '</h2>
<p>' . $sec('how') . '</p>

<h2>' . usc_pv6_h($state_slug, 'stinputs', ['What You Will Need', 'Inputs Required', 'Information to Have Ready', 'What to Enter']) . '</h2>
<p>' . $sec('inputs') . '</p>
' . usc_pv6_list($state_slug, 'stinputs', [
    '<strong>Purchase Price:</strong> the pre-tax price of the item or order.',
    '<strong>City / County:</strong> your ' . esc_html($name) . ' jurisdiction, which sets the local rate.',
    '<strong>Custom Local Rate:</strong> an optional override to match your exact area.',
    '<strong>Exemption Category:</strong> groceries, prescriptions, or other reduced-rate items.',
    '<strong>Discounts:</strong> any percentage discount applied before tax.',
    '<strong>Quantity:</strong> for multiple items, to total the taxable amount.',
], 5) . '

<h2>' . usc_pv6_h($state_slug, 'stformula', ['The Sales Tax Formula', 'The Math Behind Your Total', 'How the Numbers Add Up', 'The Total-Cost Equation']) . '</h2>
<p>' . $sec('formula') . '</p>
<pre style="background:#f4f4f5; padding:15px; border-radius:5px; overflow-x:auto;">Total = Price + (Price x Combined Rate)</pre>
<p>The combined rate sums ' . esc_html($name) . '\'s state baseline of ' . esc_html($sales_rate) . ' with any county, city, and special-district rates that apply where you shop. Exempt categories like unprepared groceries or prescription drugs are taxed at a reduced rate or not at all, which the calculator accounts for before computing your final total.</p>

<h2>' . usc_pv6_h($state_slug, 'sthowtouse', ['How to Use the Calculator', 'Step-by-Step Instructions', 'Using the Tool in 60 Seconds', 'How to Run Your Estimate']) . '</h2>
<p>' . $sec('howtouse') . '</p>

<h2>' . usc_pv6_h($state_slug, 'stexample', ['A Real ' . $name . ' Example', 'A Worked ' . $name . ' Example', 'See It in Action: ' . $name, $name . ' Sales Tax: A Sample']) . '</h2>
<p>' . $sec('example') . '</p>
<table style="width:100%; border-collapse: collapse; margin-bottom: 25px; font-size:14px; border: 1px solid #e5e7eb;">
  <thead><tr style="background-color:#f9fafb;border-bottom:2px solid #e5e7eb;"><th style="padding:12px;text-align:left;font-weight:600;color:#374151;">Component (on a $1,000 ' . esc_html($name) . ' purchase)</th><th style="padding:12px;text-align:right;font-weight:600;color:#374151;">Amount</th></tr></thead>
  <tbody>
    <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">Purchase Price</td><td style="padding:12px;text-align:right;color:#111827;">' . usc_money($price) . '</td></tr>
    <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:#4b5563;">' . esc_html($name) . ' State Rate</td><td style="padding:12px;text-align:right;color:#111827;">' . esc_html($sales_rate) . '</td></tr>
    <tr style="border-bottom:1px solid #e5e7eb;"><td style="padding:12px;color:' . ($has_tax ? '#b91c1c' : '#15803d') . ';">State Sales Tax</td><td style="padding:12px;text-align:right;color:' . ($has_tax ? '#b91c1c' : '#15803d') . ';">' . $tax_cell . '</td></tr>
    <tr style="border-bottom:1px solid #e5e7eb;background-color:#f0fdf4;"><td style="padding:12px;font-weight:bold;color:#15803d;">Total (before local tax)</td><td style="padding:12px;text-align:right;font-weight:bold;color:#166534;">' . usc_money($total) . '</td></tr>
  </tbody>
</table>
<p><em>' . $note . '</em></p>

<h2>' . usc_pv6_h($state_slug, 'strates', ['How Combined Rates Work', 'State, County, and Local Rates', 'Why Rates Vary by Location', 'Understanding the Combined Rate']) . '</h2>
<p>Sales tax in the United States is layered: the final rate combines state, county, and local municipal or special-district taxes. In ' . esc_html($name) . ', local jurisdictions can add their own rates on top of the ' . esc_html($sales_rate) . ' state baseline, so combined rates can differ by zip code even within the same county.</p>
<p>This is why two stores a few miles apart in ' . esc_html($name) . ' can ring up different totals on the same item. County and municipal taxes are usually approved by local voters to fund transit, schools, or emergency services, so they reflect local priorities rather than a single statewide number.</p>
' . usc_pv6_list($state_slug, 'stexempt', [
    '<strong>Groceries (unprepared food):</strong> often exempt or taxed at a reduced rate in many states.',
    '<strong>Prescription drugs:</strong> almost always exempt from sales tax nationwide.',
    '<strong>Clothing:</strong> exempt below certain thresholds in a few states, especially during tax holidays.',
    '<strong>Prepared food &amp; candy:</strong> usually taxed at the full rate, even where groceries are not.',
], 4) . '

<h2>' . usc_pv6_h($state_slug, 'stfactors', ['Factors Affecting Your Total', 'What Changes Your Tax', 'Variables That Move the Number', 'What Influences the Cost']) . '</h2>
<p>' . $sec('factors') . '</p>

<h2>' . usc_pv6_h($state_slug, 'stbenefits', ['Benefits of Using This Calculator', 'Why This Tool Helps', 'What You Gain From It', 'The Advantages at a Glance']) . '</h2>
<p>' . $sec('benefits') . '</p>

<h2>' . usc_pv6_h($state_slug, 'stmistakes', ['Common Mistakes to Avoid', 'Pitfalls That Skew Your Estimate', 'Errors People Often Make', 'What Throws Off the Numbers']) . '</h2>
<p>' . $sec('mistakes') . '</p>

<h2>' . usc_pv6_h($state_slug, 'stusecases', ['Practical Use Cases', 'Real-World Scenarios', 'When to Reach for This Tool', 'Everyday Uses']) . '</h2>
<p>' . $sec('usecases') . '</p>
' . ($region_comp ? '
<h2>' . usc_pv6_h($state_slug, 'stregion', [$name . ' vs. Neighboring States', 'How ' . $name . ' Compares Regionally', 'Regional Sales Tax Comparison', $name . ' in Its Region']) . '</h2>
<p>' . $region_comp . '</p>' : '') . '

<h2>' . usc_pv6_h($state_slug, 'stconclusion', ['Final Thoughts', 'The Bottom Line', 'Taking Control of Your Spending', 'Key Takeaways']) . '</h2>
<p>' . $sec('conclusion') . '</p>

<h2>Related ' . esc_html($name) . ' Calculators</h2>
<p>Planning a purchase or budget? These free ' . esc_html($name) . ' tools pair well with your sales-tax math:</p>
' . usc_get_related_links_html($state_slug, $name, 'sales-tax') . '

<h2>Sales Tax Calculators in Nearby States</h2>
<p>Rates differ across ' . esc_html($x['region']) . '. See how sales tax changes just over the ' . esc_html($name) . ' border:</p>
' . (function() use ($state_slug) { $h = usc_neighbour_links_html($state_slug, 'sales-tax', 'Sales Tax Calculator'); return $h ?: '<p>Explore sales tax calculators for every U.S. state from the menu above.</p>'; })() . '

<h2>Helpful Official Resources</h2>
<ul>
  <li><a href="' . esc_url($x['rev_url']) . '" target="_blank" rel="nofollow noopener">' . esc_html($x['rev_name']) . '</a> &mdash; official ' . esc_html($name) . ' sales-tax rates and rules.</li>
  <li><a href="https://www.usa.gov/state-taxes" target="_blank" rel="nofollow noopener">USA.gov state taxes</a> &mdash; links to every state\'s revenue department.</li>
  <li><a href="https://www.taxadmin.org/" target="_blank" rel="nofollow noopener">Federation of Tax Administrators</a> &mdash; comparative state tax-rate data.</li>
</ul>
<!-- ust-sales-v6 -->';

    return $html;
}

/** V6 FAQ pool for Sales Tax (state aware). Selects 12. */
function usc_st_faqs_v6($state) {
    $name = $state['name'];
    $sales_rate = $state['sales_rate'];
    $state_slug = strtolower(str_replace(' ', '-', $name));
    $x = usc_state_extra($state_slug);
    $rate_num = (float) str_replace(['%', ' '], '', $sales_rate);
    $has_tax = ($rate_num > 0);

    $pick = function($qkey, $arr) use ($state_slug) {
        return $arr[usc_get_variation_index($state_slug, 'stfaqa_' . $qkey, count($arr))];
    };

    if ($has_tax) {
        $rate_ans = [
            $name . '\'s state sales-tax rate is ' . $sales_rate . ', and local county or city taxes can add to that, so your combined rate is often higher depending on where you shop.',
            'The ' . $name . ' state baseline is ' . $sales_rate . '; many cities and counties add local rates on top, raising the combined total.',
            'At the state level, ' . $name . ' charges ' . $sales_rate . '. Local jurisdictions layer their own rates on, so check your city for the combined figure.',
        ];
    } else {
        $rate_ans = [
            $name . ' has no statewide sales tax, so most purchases are not taxed at the state level, though a few localities may add their own.',
            'There is no state sales tax in ' . $name . '. That makes it one of the few states where the shelf price is usually the price you pay.',
            $name . ' is a no-sales-tax state at the state level, a notable saving on big purchases compared with neighboring states.',
        ];
    }

    $faq_pool = [
        ['q' => 'What is the sales tax rate in ' . $name . '?', 'a' => $rate_ans[usc_get_variation_index($state_slug, 'stfaqa_rate', count($rate_ans))]],
        ['q' => 'Is this ' . $name . ' sales tax calculator free?', 'a' => $pick('free', [
            'Yes, it is completely free, run unlimited estimates with no fee and no sign-up.',
            'It is 100% free and private. Calculate as many ' . $name . ' totals as you like.',
            'Absolutely free, no account, no paywall, and no limit on calculations.',
        ])],
        ['q' => 'How is sales tax calculated in ' . $name . '?', 'a' => $pick('calc', [
            'Multiply the purchase price by the combined rate (' . $name . ' state plus local), then add it to the price for your total.',
            'It is price times the combined ' . $name . ' rate. The calculator adds state and local portions, then sums the total.',
            'Take the price, apply ' . $name . '\'s state and local rates, and add the tax to the price to get your final cost.',
        ])],
        ['q' => 'Why do sales tax rates vary within ' . $name . '?', 'a' => $pick('vary', [
            'Because counties, cities, and special districts can add their own rates on top of the state baseline, combined rates differ by location, sometimes by zip code.',
            'Local jurisdictions in ' . $name . ' set their own add-on rates, so two nearby cities can have different combined totals.',
            'The state rate is uniform, but local add-ons vary across ' . $name . ', which is why the combined rate changes by area.',
        ])],
        ['q' => 'Are groceries taxed in ' . $name . '?', 'a' => $pick('groceries', [
            'Many states exempt unprepared groceries or tax them at a reduced rate; prepared food and candy are usually taxed at the full rate. Check your ' . $name . ' category in the tool.',
            'Unprepared groceries are often exempt or reduced, while restaurant and prepared food typically carry the full ' . $name . ' rate.',
            'It depends on the item, basic groceries may be exempt in ' . $name . ', but prepared meals generally are not.',
        ])],
        ['q' => 'Are prescription drugs taxed in ' . $name . '?', 'a' => $pick('rx', [
            'In almost all states, including ' . $name . ', prescription medicines are exempt from sales tax. Over-the-counter drugs are often still taxed.',
            'Prescriptions are generally tax-free in ' . $name . '; non-prescription medicine usually remains taxable.',
            'Yes, prescription drugs are typically exempt in ' . $name . ', though over-the-counter products are commonly taxed.',
        ])],
        ['q' => 'Do I owe use tax on online purchases in ' . $name . '?', 'a' => $pick('use', [
            'If an out-of-state seller does not collect ' . $name . ' sales tax, you may owe use tax at the same rate, reported on your state return.',
            'Yes, use tax applies to untaxed out-of-state purchases in ' . $name . ', at the same rate as sales tax.',
            'When no sales tax is collected on an online order, ' . $name . ' use tax is technically due at the equivalent rate.',
        ])],
        ['q' => 'Do online retailers collect ' . $name . ' sales tax?', 'a' => $pick('online', [
            'After the Wayfair ruling, large out-of-state retailers with significant sales must collect ' . $name . ' sales tax at checkout.',
            'Most major online sellers now collect ' . $name . ' sales tax automatically, due to economic-nexus rules.',
            'Yes, big online retailers generally collect ' . $name . ' sales tax; smaller sellers may not, leaving use tax to the buyer.',
        ])],
        ['q' => 'Does the calculator include local ' . $name . ' rates?', 'a' => $pick('local', [
            'Yes, select your city or county to add the local rate, or enter a custom override to match your exact ' . $name . ' jurisdiction.',
            'It does, choose your jurisdiction and the local rate is added to ' . $name . '\'s state baseline.',
            'Local rates are supported, so your ' . $name . ' total reflects the full combined rate where you shop.',
        ])],
        ['q' => 'What is the difference between state and combined sales tax?', 'a' => $pick('combined', [
            'The state rate (' . $sales_rate . ' in ' . $name . ') is the baseline; the combined rate adds local county and city taxes for the total you actually pay.',
            'State is just the baseline; combined includes local add-ons, which is the real rate at checkout in ' . $name . '.',
            'Combined rate = ' . $name . ' state rate plus all applicable local rates, and it is what determines your final total.',
        ])],
        ['q' => 'Where can I verify ' . $name . ' sales-tax rates officially?', 'a' => $pick('verify', [
            'The ' . $x['rev_name'] . ' publishes official ' . $name . ' state and local rates, the authoritative source for your area.',
            'Check the ' . $x['rev_name'] . ' for current ' . $name . ' rates and any local jurisdiction details.',
            'Official rates come from the ' . $x['rev_name'] . '; it lists ' . $name . ' state and local sales-tax information.',
        ])],
        ['q' => 'Is the estimate from this ' . $name . ' calculator exact?', 'a' => $pick('exact', [
            'It is a high-accuracy estimate. Your real ' . $name . ' total depends on your exact local rate and any exemptions.',
            'Treat it as a close estimate, the final figure depends on your specific ' . $name . ' jurisdiction and item type.',
            'It is for planning. Set your exact city and exemptions for the most accurate ' . $name . ' total.',
        ])],
        ['q' => 'Are there sales tax holidays in ' . $name . '?', 'a' => $pick('holiday', [
            'Some states hold annual tax holidays, often on clothing or school supplies. Check whether ' . $name . ' offers one and the qualifying items.',
            'Several states waive sales tax on certain items during back-to-school or storm-prep holidays; ' . $name . ' may have its own.',
            'Tax holidays exist in some states for specific categories, so it is worth checking the ' . $name . ' calendar before a big buy.',
        ])],
    ];

    return usc_get_deterministic_faqs($state_slug, $faq_pool, 12);
}
