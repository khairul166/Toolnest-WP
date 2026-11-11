<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function tn_age_calculator_shortcode() {
    // $script_path = get_theme_file_path('/assets/js/tools/age-calculator.js');
    // wp_enqueue_script(
    //     'tools-age-calculator',
    //     get_theme_file_uri('/assets/js/tools/age-calculator.js'),
    //     ['age-calculator'],
    //     filemtime($script_path),
    //     true
    // );

    ob_start();
    ?>
    <!-- TOOL AREA START -->
    <section class="tn-tool-workspace" aria-label="Age Calculator Workspace">
        <span class="tn-privacy-banner">
            <i class="bi bi-shield-check" aria-hidden="true"></i>
            100% Client-Side &bull; Dates Never Leave Your Browser
        </span>

        <div class="tn-step-bar">
            <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Select Date of Birth</div>
            <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Pick Target Date</div>
            <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> View &amp; Copy Exact Age</div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="tn-age-dob" class="form-label fw-bold">Date of Birth (জন্ম তারিখ)</label>
                <input type="date" id="tn-age-dob" class="form-control form-control-lg">
            </div>
            <div class="col-md-6">
                <label for="tn-age-target" class="form-label fw-bold">Age at the Date of (হিসাবের তারিখ)</label>
                <input type="date" id="tn-age-target" class="form-control form-control-lg">
            </div>
        </div>

        <div class="d-flex flex-wrap gap-2 mb-4">
            <button type="button" id="tn-age-calc-btn" class="btn tn-btn--primary">
                <i class="bi bi-calculator" aria-hidden="true"></i> Calculate Exact Age
            </button>
            <button type="button" id="tn-age-sample-btn" class="btn tn-btn--outline">
                <i class="bi bi-magic" aria-hidden="true"></i> Sample DOB
            </button>
            <button type="button" id="tn-age-copy-btn" class="btn tn-btn--success">
                <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Result
            </button>
            <button type="button" id="tn-age-reset-btn" class="btn tn-btn--outline text-danger">
                <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
            </button>
        </div>

        <div id="tn-age-error" class="alert alert-danger d-none" role="alert"></div>

        <div id="tn-age-results">
            <div class="row g-3 mb-3">
                <div class="col-4">
                    <div class="tn-stat-card">
                        <div id="tn-age-years" class="tn-stat-card__value">28</div>
                        <div class="tn-stat-card__label">Years (বছর)</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="tn-stat-card">
                        <div id="tn-age-months" class="tn-stat-card__value">5</div>
                        <div class="tn-stat-card__label">Months (মাস)</div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="tn-stat-card">
                        <div id="tn-age-days" class="tn-stat-card__value">11</div>
                        <div class="tn-stat-card__label">Days (দিন)</div>
                    </div>
                </div>
            </div>

            <div class="tn-result-box mb-3">
                <div class="small text-muted fw-semibold text-uppercase mb-1">Exact Age Summary</div>
                <div id="tn-age-summary-en" class="fs-5 fw-bold text-dark">28 Years, 5 Months, and 11 Days</div>
                <div id="tn-age-summary-bn" class="fs-5 fw-semibold text-primary tn-bangla-text mt-1">২৮ বছর, ৫ মাস, ১১ দিন</div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <div class="tn-result-box h-100">
                        <h2 class="h6 fw-bold text-primary mb-2">
                            <i class="bi bi-cake2-fill me-1" aria-hidden="true"></i> Next Birthday Countdown
                        </h2>
                        <p id="tn-age-next-bday" class="fw-semibold mb-2">6 months, 19 days left</p>
                        <div class="small text-muted">
                            Born on: <strong id="tn-age-born-day" class="text-dark">Friday (শুক্রবার)</strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tn-result-box h-100">
                        <h2 class="h6 fw-bold text-primary mb-2">
                            <i class="bi bi-clock-history me-1" aria-hidden="true"></i> Total Time Lived Breakdown
                        </h2>
                        <ul class="list-unstyled small mb-0">
                            <li class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-muted">Total Months:</span>
                                <strong id="tn-age-total-months">341 months</strong>
                            </li>
                            <li class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-muted">Total Weeks:</span>
                                <strong id="tn-age-total-weeks">1,484 weeks</strong>
                            </li>
                            <li class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-muted">Total Days:</span>
                                <strong id="tn-age-total-days">10,391 days</strong>
                            </li>
                            <li class="d-flex justify-content-between pt-1">
                                <span class="text-muted">Approx. Hours:</span>
                                <strong id="tn-age-total-hours">249,384 hours</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TOOL AREA END -->

    <?php toolnest_render_incontent_ad_slot(); ?>

    <section class="tn-card mb-4" aria-labelledby="how-to-heading">
        <h2 id="how-to-heading" class="tn-section-title">How to Use the Age Calculator</h2>
        <ol class="mb-0 ps-3">
            <li class="mb-2"><strong>Step 1 — Enter Your Date of Birth:</strong> Pick your birth year, month, and day in the <em>Date of Birth</em> calendar input.</li>
            <li class="mb-2"><strong>Step 2 — Set the Reference Date:</strong> By default, the tool sets <em>Age at the Date of</em> to today's date. If you are applying for a government job or school admission with a specific circular cutoff date, select that date instead.</li>
            <li><strong>Step 3 — View &amp; Copy Your Exact Age:</strong> Instantly read your exact age in years, months, days, weeks, and Bangla wording, or click <strong>Copy Result</strong> to paste it into your application form.</li>
        </ol>
    </section>

    <section class="tn-card mb-4" aria-labelledby="features-heading">
        <h2 id="features-heading" class="tn-section-title">Why You Need an Exact Chronological Age Calculator</h2>
        <p class="text-muted">
            Calculating exact age by hand seems simple until you account for months with 28, 29, 30, and 31 days and leap years occurring every four years. In Bangladesh, public service recruitment exams (such as BCS, Bangladesh Bank, NTRCA, primary school teacher recruitment, and defense services) require candidates to state their exact age in <strong>Years, Months, and Days</strong> as of a specific gazetted circular date.
        </p>
        <p class="text-muted">
            Even a one-day miscalculation on an official Teletalk or ministry application portal can create complications during viva verification. ToolNest's Age Calculator uses the standard chronological calendar method recognized by HR departments, passport offices, and admission boards worldwide.
        </p>
        <div class="row g-3 my-2">
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                    <h3 class="h6 fw-bold"><i class="bi bi-calendar-range text-primary me-1" aria-hidden="true"></i> Leap-Year Aware Precision</h3>
                    <p class="small text-muted mb-0">Accurately handles February 29 leap years and exact month boundaries without rough 30-day approximations.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                    <h3 class="h6 fw-bold"><i class="bi bi-briefcase text-primary me-1" aria-hidden="true"></i> Job Circular Cutoff Support</h3>
                    <p class="small text-muted mb-0">Test your eligibility against any past or future job circular deadline date in seconds.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4" aria-labelledby="tool-faq-heading">
        <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
        <div class="accordion tn-faq" id="ageFaqAccordion">
            <div class="accordion-item">
                <h3 class="accordion-header" id="agFaq1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#agFaqCol1" aria-expanded="true" aria-controls="agFaqCol1">
                        1. How does this Age Calculator handle leap years and varying month lengths?
                    </button>
                </h3>
                <div id="agFaqCol1" class="accordion-collapse collapse show" aria-labelledby="agFaq1" data-bs-parent="#ageFaqAccordion">
                    <div class="accordion-body text-muted">
                        Our algorithm inspects the real calendar length of every month (28, 29, 30, or 31 days) rather than assuming a flat 30-day month. That guarantees your Years, Months, and Days match official government portals.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="agFaq2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agFaqCol2" aria-expanded="false" aria-controls="agFaqCol2">
                        2. Can I calculate my exact age on a specific past or future circular cutoff date?
                    </button>
                </h3>
                <div id="agFaqCol2" class="accordion-collapse collapse" aria-labelledby="agFaq2" data-bs-parent="#ageFaqAccordion">
                    <div class="accordion-body text-muted">
                        Yes. Change the second date field (<em>Age at the Date of</em>) to the exact deadline or cutoff date specified in your job circular or school admission notice.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="agFaq3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agFaqCol3" aria-expanded="false" aria-controls="agFaqCol3">
                        3. Is my Date of Birth saved or shared anywhere?
                    </button>
                </h3>
                <div id="agFaqCol3" class="accordion-collapse collapse" aria-labelledby="agFaq3" data-bs-parent="#ageFaqAccordion">
                    <div class="accordion-body text-muted">
                        Never. All calculations run 100% locally inside your web browser. Your personal birth date is never uploaded to any server.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="agFaq4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agFaqCol4" aria-expanded="false" aria-controls="agFaqCol4">
                        4. Does the tool show my age in Bangla as well as English?
                    </button>
                </h3>
                <div id="agFaqCol4" class="accordion-collapse collapse" aria-labelledby="agFaq4" data-bs-parent="#ageFaqAccordion">
                    <div class="accordion-body text-muted">
                        Yes! Underneath the English summary, we display your exact age in Bangla numerals and words (বছর, মাস, দিন) along with the Bangla day of the week you were born on.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="agFaq5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#agFaqCol5" aria-expanded="false" aria-controls="agFaqCol5">
                        5. How is the Next Birthday countdown calculated?
                    </button>
                </h3>
                <div id="agFaqCol5" class="accordion-collapse collapse" aria-labelledby="agFaq5" data-bs-parent="#ageFaqAccordion">
                    <div class="accordion-body text-muted">
                        The calculator compares your birth month and day against the target date to determine your next upcoming birthday, showing the remaining months, days, total days left, and weekday name.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode( 'tool_age_calculator', 'tn_age_calculator_shortcode' );

function tn_amount_to_words_shortcode() {
    ob_start();
    ?>
    <section class="tn-tool-workspace" aria-label="Amount to Words Workspace">
        <span class="tn-privacy-banner">
            <i class="bi bi-shield-check" aria-hidden="true"></i>
            100% Client-Side &bull; Financial Figures Never Leave Your Browser
        </span>

        <div class="tn-step-bar">
            <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Enter Amount</div>
            <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Choose Currency</div>
            <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Copy Cheque Wording</div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-7">
                <label for="tn-amount-input" class="form-label fw-bold">Enter Numeric Amount (English or বাংলা Digits)</label>
                <input type="text" id="tn-amount-input" class="form-control form-control-lg fw-bold" value="125500.50" placeholder="e.g. 125500.50 or ১২৫৫০০.৫০" inputmode="decimal">
            </div>
            <div class="col-md-5">
                <label for="tn-amount-currency" class="form-label fw-bold">Currency / Unit</label>
                <select id="tn-amount-currency" class="form-select form-select-lg">
                    <option value="BDT" selected>BDT — Taka &amp; Paisa (৳)</option>
                    <option value="USD">USD — Dollars &amp; Cents ($)</option>
                    <option value="INR">INR — Rupees &amp; Paise (₹)</option>
                    <option value="GBP">GBP — Pounds &amp; Pence (£)</option>
                    <option value="EUR">EUR — Euros &amp; Cents (€)</option>
                    <option value="NONE">Plain Number (No Currency)</option>
                </select>
            </div>
        </div>

        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <span class="small text-muted fw-semibold">Quick Presets:</span>
                <button type="button" class="btn tn-btn--outline btn-sm tn-quick-amount" data-amount="50000">50,000</button>
                <button type="button" class="btn tn-btn--outline btn-sm tn-quick-amount" data-amount="100000">1 Lakh</button>
                <button type="button" class="btn tn-btn--outline btn-sm tn-quick-amount" data-amount="2550000.75">25.5 Lakh</button>
                <button type="button" class="btn tn-btn--outline btn-sm tn-quick-amount" data-amount="10000000">1 Crore</button>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <div class="form-check form-switch me-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="tn-amount-only" checked>
                    <label class="form-check-label small fw-semibold" for="tn-amount-only">Append "Only / মাত্র"</label>
                </div>
                <button type="button" id="tn-amount-sample" class="btn tn-btn--outline btn-sm">Sample</button>
                <button type="button" id="tn-amount-reset" class="btn tn-btn--outline btn-sm text-danger">Reset</button>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-sm-6">
                <div class="tn-stat-card">
                    <div id="tn-formatted-en" class="tn-stat-card__value">৳ 1,25,500.50</div>
                    <div class="tn-stat-card__label">South Asian Comma Format (EN)</div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="tn-stat-card">
                    <div id="tn-formatted-bn" class="tn-stat-card__value tn-bangla-text">৳ ১,২৫,৫০০.৫০</div>
                    <div class="tn-stat-card__label">বাংলা অংকে ফরম্যাট (BN)</div>
                </div>
            </div>
        </div>

        <div class="tn-result-box mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-primary text-uppercase">English Words (Bangladesh Lakh &amp; Crore System)</span>
                <button type="button" class="btn tn-btn--outline btn-sm" data-copy-target="tn-out-en-lakh">
                    <i class="bi bi-clipboard" aria-hidden="true"></i> Copy
                </button>
            </div>
            <p id="tn-out-en-lakh" class="fs-5 fw-bold mb-0">One Lakh Twenty-Five Thousand Five Hundred Taka and Fifty Paisa Only</p>
        </div>

        <div class="tn-result-box mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-success text-uppercase tn-bangla-text">বাংলা কথায় (লক্ষ ও কোটি পদ্ধতি)</span>
                <button type="button" class="btn tn-btn--success btn-sm" data-copy-target="tn-out-bn">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy বাংলা
                </button>
            </div>
            <p id="tn-out-bn" class="fs-4 fw-bold mb-0 tn-bangla-text">এক লক্ষ পঁচিশ হাজার পাঁচ শত টাকা এবং পঞ্চাশ পয়সা মাত্র</p>
        </div>

        <div class="tn-result-box">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-secondary text-uppercase">English Words (International Million / Billion System)</span>
                <button type="button" class="btn tn-btn--outline btn-sm" data-copy-target="tn-out-en-intl">
                    <i class="bi bi-clipboard" aria-hidden="true"></i> Copy
                </button>
            </div>
            <p id="tn-out-en-intl" class="fs-5 fw-semibold mb-0">One Hundred Twenty-Five Thousand Five Hundred Taka and Fifty Paisa Only</p>
        </div>
    </section>

    <?php toolnest_render_incontent_ad_slot(); ?>

    <section class="tn-card mb-4" aria-labelledby="how-to-heading">
        <h2 id="how-to-heading" class="tn-section-title">How to Convert Numbers &amp; Taka to Words</h2>
        <ol class="mb-0 ps-3">
            <li class="mb-2"><strong>Step 1 — Type Your Amount:</strong> Enter any whole or decimal number into the input field using either English numerals (<code>125500.50</code>) or Bangla numerals (<code>১২৫৫০০.৫০</code>). Commas are ignored automatically.</li>
            <li class="mb-2"><strong>Step 2 — Select Currency &amp; Cheque Suffix:</strong> Choose <strong>BDT (Taka &amp; Paisa)</strong>, USD, INR, GBP, EUR, or Plain Number. Toggle the <em>Append "Only / মাত্র"</em> switch depending on whether you are filling out a bank cheque or an academic document.</li>
            <li><strong>Step 3 — Copy Your Wording:</strong> Click the <strong>Copy</strong> button next to the Bangladesh Lakh/Crore box, the Bangla কথায় box, or the International Million/Billion box.</li>
        </ol>
    </section>

    <section class="tn-card mb-4" aria-labelledby="features-heading">
        <h2 id="features-heading" class="tn-section-title">Why Accurate Lakh, Crore &amp; Bangla Wording Matters</h2>
        <p class="text-muted">
            When writing a commercial bank cheque, preparing a VAT invoice, or registering property deeds in Bangladesh, even a tiny discrepancy between numeric digits and spelled-out words causes banks to dishonor the cheque. Many international number-to-word calculators only output <em>Hundreds of Thousands</em> and <em>Millions</em>, which are rejected by local bank tellers who require <strong>Lakh (লক্ষ)</strong> and <strong>Crore (কোটি)</strong> notation.
        </p>
        <p class="text-muted">
            Furthermore, spelling compound Bangla numbers between 1 and 99—such as <em>পঁয়তাল্লিশ</em> (45), <em>ঊনপঞ্চাশ</em> (49), <em>তিপ্পান্ন</em> (53), or <em>পঁয়ষট্টি</em> (65)—is notoriously tricky even for native speakers. ToolNest solves both problems simultaneously in a single screen.
        </p>
        <div class="row g-3 my-2">
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                    <h3 class="h6 fw-bold"><i class="bi bi-bank text-primary me-1" aria-hidden="true"></i> Bank Cheque Ready (Lakh &amp; Crore)</h3>
                    <p class="small text-muted mb-0">Follows Bangladesh Bank cheque-writing conventions with automatic comma placement (<code>1,00,00,000</code>) and "Taka Only" suffix.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                    <h3 class="h6 fw-bold"><i class="bi bi-translate text-primary me-1" aria-hidden="true"></i> Authentic Bangla Spelling</h3>
                    <p class="small text-muted mb-0">Includes all 100 standard Bangla Academy number spellings from শূন্য (0) to নিরানব্বই (99) plus শত, হাজার, লক্ষ, and কোটি.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-4" aria-labelledby="tool-faq-heading">
        <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
        <div class="accordion tn-faq" id="amountFaqAccordion">
            <div class="accordion-item">
                <h3 class="accordion-header" id="aFaq1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#aFaqCol1" aria-expanded="true" aria-controls="aFaqCol1">1. How many zeroes are in 1 Lakh and 1 Crore?</button>
                </h3>
                <div id="aFaqCol1" class="accordion-collapse collapse show" aria-labelledby="aFaq1" data-bs-parent="#amountFaqAccordion">
                    <div class="accordion-body text-muted">
                        In the South Asian numbering system used across Bangladesh and India, <strong>1 Lakh (১ লক্ষ)</strong> is written as <code>1,00,000</code> (5 zeroes, equal to 100 Thousand), and <strong>1 Crore (১ কোটি)</strong> is written as <code>1,00,00,000</code> (7 zeroes, equal to 100 Lakh or 10 Million).
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="aFaq2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aFaqCol2" aria-expanded="false" aria-controls="aFaqCol2">2. Can I type Bangla digits (০-৯) directly into the input box?</button>
                </h3>
                <div id="aFaqCol2" class="accordion-collapse collapse" aria-labelledby="aFaq2" data-bs-parent="#amountFaqAccordion">
                    <div class="accordion-body text-muted">
                        Yes! Whether you type <code>25000</code> or <code>২৫০০০</code>, our converter recognizes both English and Bangla numerals automatically and displays the results in both languages.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="aFaq3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aFaqCol3" aria-expanded="false" aria-controls="aFaqCol3">3. Does this tool handle decimal Paisa and Cents for bank cheques?</button>
                </h3>
                <div id="aFaqCol3" class="accordion-collapse collapse" aria-labelledby="aFaq3" data-bs-parent="#amountFaqAccordion">
                    <div class="accordion-body text-muted">
                        Yes. Any two digits after the decimal point (for example <code>.50</code>) are converted into Paisa (পয়সা), Cents, or Paise and joined properly before the closing "Only" or "মাত্র".
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="aFaq4">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aFaqCol4" aria-expanded="false" aria-controls="aFaqCol4">4. Are my financial numbers sent to any server?</button>
                </h3>
                <div id="aFaqCol4" class="accordion-collapse collapse" aria-labelledby="aFaq4" data-bs-parent="#amountFaqAccordion">
                    <div class="accordion-body text-muted">
                        Never. All number-to-word conversions run 100% locally in your browser. Your invoice totals and cheque amounts remain completely private.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h3 class="accordion-header" id="aFaq5">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#aFaqCol5" aria-expanded="false" aria-controls="aFaqCol5">5. Can I switch between BDT Taka, US Dollars, and plain numbers?</button>
                </h3>
                <div id="aFaqCol5" class="accordion-collapse collapse" aria-labelledby="aFaq5" data-bs-parent="#amountFaqAccordion">
                    <div class="accordion-body text-muted">
                        Yes. Use the Currency dropdown to switch between BDT, USD, INR, GBP, EUR, or select "Plain Number (No Currency)" when you only want the pure mathematical wording.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_amount_to_words', 'tn_amount_to_words_shortcode');
function tn_background_remover_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Background Remover Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              Your photo stays in your browser. Only the AI model is downloaded.
            </span>
            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Choose a photo</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Remove background</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download PNG</div>
            </div>

            <div id="tn-bg-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Choose or drop a JPEG, PNG, or WebP photo">
              <i class="bi bi-cloud-arrow-up-fill tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drop a photo here</h2>
              <p class="small text-muted mb-3">Portraits work best. JPEG, PNG, or WebP, up to 20 MB.</p>
              <label for="tn-bg-file" class="btn tn-btn--primary mb-0">
                <i class="bi bi-folder2-open" aria-hidden="true"></i> Choose Photo
              </label>
              <input type="file" id="tn-bg-file" class="d-none" accept="image/jpeg,image/png,image/webp">
            </div>

            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-bg-remove" class="btn tn-btn--primary" disabled>
                <i class="bi bi-magic" aria-hidden="true"></i> Remove Background
              </button>
              <button type="button" id="tn-bg-download" class="btn tn-btn--success" disabled>
                <i class="bi bi-download" aria-hidden="true"></i> Download Transparent PNG
              </button>
              <button type="button" id="tn-bg-clear" class="btn tn-btn--outline" disabled>
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear
              </button>
            </div>

            <div id="tn-bg-progress-wrap" class="mb-3 d-none">
              <div id="tn-bg-progress-label" class="small fw-semibold mb-1">Preparing background removal...</div>
              <div class="progress" style="height: 18px;">
                <div id="tn-bg-progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Background removal progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="width: 0%;"></div>
              </div>
            </div>
            <p id="tn-bg-status" class="small text-muted mb-3" role="status" aria-live="polite">Choose a photo to get started.</p>

            <div id="tn-bg-results" class="row g-3 d-none">
              <div class="col-md-6">
                <h2 class="h6 fw-bold">Original photo</h2>
                <div class="tn-bg-remover__preview border rounded-3 d-flex align-items-center justify-content-center overflow-hidden p-2">
                  <img id="tn-bg-original-preview" alt="Original photo before background removal">
                </div>
              </div>
              <div class="col-md-6">
                <h2 class="h6 fw-bold">Transparent result</h2>
                <div class="tn-bg-remover__preview border rounded-3 d-flex align-items-center justify-content-center overflow-hidden p-2">
                  <canvas id="tn-bg-result-canvas" aria-label="Photo with background removed"></canvas>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="bg-howto-heading">
            <h2 id="bg-howto-heading" class="tn-section-title">How to Remove a Photo Background</h2>
            <ol class="text-muted ps-3 mb-0">
              <li class="mb-2">Choose or drop one JPEG, PNG, or WebP portrait (up to 20 MB).</li>
              <li class="mb-2">Select <strong>Remove Background</strong>. On first use, the browser downloads the AI model before processing your photo.</li>
              <li>Preview the transparent cutout and download it as a PNG when it is ready.</li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="bg-privacy-heading">
            <h2 id="bg-privacy-heading" class="tn-section-title">Private, Browser-Based Background Removal</h2>
            <p class="text-muted mb-0">The segmentation model runs locally in a browser worker. Your chosen image is not uploaded to ToolNest; an internet connection is used to fetch the AI model files on first use. This tool uses <a href="https://huggingface.co/Xenova/modnet" target="_blank" rel="noopener noreferrer">MODNet</a> through <a href="https://huggingface.co/docs/transformers.js" target="_blank" rel="noopener noreferrer">Transformers.js</a>. Portrait matting works best with a clear subject and distinct background. Fine hair, motion blur, and low-contrast edges can affect the cutout.</p>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="bg-faq-heading">
            <h2 id="bg-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="tnBgFaq">
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnBgFaqHeadingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tnBgFaqOne" aria-expanded="true" aria-controls="tnBgFaqOne">1. Are my photos uploaded to remove the background?</button>
                </h3>
                <div id="tnBgFaqOne" class="accordion-collapse collapse show" aria-labelledby="tnBgFaqHeadingOne" data-bs-parent="#tnBgFaq">
                  <div class="accordion-body text-muted">No. The AI model files are downloaded to your browser, but your selected photo is processed locally and is not uploaded to ToolNest.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnBgFaqHeadingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tnBgFaqTwo" aria-expanded="false" aria-controls="tnBgFaqTwo">2. What image formats can I use?</button>
                </h3>
                <div id="tnBgFaqTwo" class="accordion-collapse collapse" aria-labelledby="tnBgFaqHeadingTwo" data-bs-parent="#tnBgFaq">
                  <div class="accordion-body text-muted">Upload one JPEG, PNG, or WebP image up to 20 MB. The result downloads as a transparent PNG.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnBgFaqHeadingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tnBgFaqThree" aria-expanded="false" aria-controls="tnBgFaqThree">3. Why can the first background removal take longer?</button>
                </h3>
                <div id="tnBgFaqThree" class="accordion-collapse collapse" aria-labelledby="tnBgFaqHeadingThree" data-bs-parent="#tnBgFaq">
                  <div class="accordion-body text-muted">The browser needs to download the AI model the first time you use the tool. Processing time afterward depends on your device and image size.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnBgFaqHeadingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tnBgFaqFour" aria-expanded="false" aria-controls="tnBgFaqFour">4. Will the background remover work perfectly on every image?</button>
                </h3>
                <div id="tnBgFaqFour" class="accordion-collapse collapse" aria-labelledby="tnBgFaqHeadingFour" data-bs-parent="#tnBgFaq">
                  <div class="accordion-body text-muted">No. Results vary with the photo, lighting, and subject edges. This model is designed for portrait matting; fine hair or low-contrast boundaries may need additional editing.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnBgFaqHeadingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tnBgFaqFive" aria-expanded="false" aria-controls="tnBgFaqFive">5. Can I use the transparent PNG for passport photos or e-commerce?</button>
                </h3>
                <div id="tnBgFaqFive" class="accordion-collapse collapse" aria-labelledby="tnBgFaqHeadingFive" data-bs-parent="#tnBgFaq">
                  <div class="accordion-body text-muted">Yes. Once you download the transparent PNG, you can place it on a solid white or colored background in our Passport Photo Maker or any image editor.</div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_background_remover', 'tn_background_remover_shortcode');

function tn_bangla_typing_test_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Bangla Typing Test Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; NFC Conjunct-Safe Bangla Typing Evaluation
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Pick Duration &amp; Difficulty</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Switch Keyboard to Bangla &amp; Type</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> View WPM &amp; Accuracy Score</div>
            </div>

            <!-- Keyboard Switch Reminder Alert -->
            <div class="alert alert-info d-flex align-items-center gap-2 py-2 px-3 mb-3 small" role="note">
              <i class="bi bi-keyboard-fill text-primary fs-5" aria-hidden="true"></i>
              <div>
                <strong>Keyboard Note:</strong> Please switch your keyboard to <strong>Bangla Unicode</strong> (e.g., <em>Avro Phonetic F12</em>, <em>Bijoy Unicode Ctrl+Alt+V</em>, <em>Probhat</em>, or mobile <em>Ridmik/Gboard Bangla</em>) before typing. Timer starts on your first keystroke.
              </div>
            </div>

            <!-- Test Settings Bar -->
            <div class="row g-3 align-items-end mb-3">
              <div class="col-sm-6 col-md-4">
                <label for="tn-btt-difficulty" class="form-label fw-bold small">Difficulty Level</label>
                <select id="tn-btt-difficulty" class="form-select">
                  <option value="easy" selected>Easy (সহজ — সাধারণ শব্দ)</option>
                  <option value="medium">Medium (মাঝারি — দৈনন্দিন গদ্য)</option>
                  <option value="hard">Hard (কঠিন — যুক্তবর্ণ অনুশীলন)</option>
                </select>
              </div>
              <div class="col-sm-6 col-md-4">
                <label for="tn-btt-duration" class="form-label fw-bold small">Test Duration</label>
                <select id="tn-btt-duration" class="form-select">
                  <option value="1" selected>1 Minute Test (১ মিনিট)</option>
                  <option value="2">2 Minutes Test (২ মিনিট)</option>
                  <option value="5">5 Minutes Test (৫ মিনিট)</option>
                </select>
              </div>
              <div class="col-md-4 d-flex gap-2">
                <button type="button" id="tn-btt-new-btn" class="btn tn-btn--primary flex-grow-1">
                  <i class="bi bi-shuffle" aria-hidden="true"></i> New Passage
                </button>
                <button type="button" id="tn-btt-reset-btn" class="btn tn-btn--outline text-danger" title="Restart timer">
                  <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i>
                </button>
              </div>
            </div>

            <!-- Live Stats Row -->
            <div class="row g-2 mb-3">
              <div class="col-6 col-sm-3">
                <div class="tn-stat-card py-2">
                  <div id="tn-btt-stat-time" class="tn-stat-card__value">01:00</div>
                  <div class="tn-stat-card__label">Time Left</div>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="tn-stat-card py-2">
                  <div id="tn-btt-stat-wpm" class="tn-stat-card__value">0</div>
                  <div class="tn-stat-card__label">Speed (WPM)</div>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="tn-stat-card py-2">
                  <div id="tn-btt-stat-acc" class="tn-stat-card__value text-success">100%</div>
                  <div class="tn-stat-card__label">Accuracy %</div>
                </div>
              </div>
              <div class="col-6 col-sm-3">
                <div class="tn-stat-card py-2">
                  <div id="tn-btt-stat-err" class="tn-stat-card__value text-danger">0</div>
                  <div class="tn-stat-card__label">Errors</div>
                </div>
              </div>
            </div>

            <!-- Bangla Passage Display -->
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-primary tn-bangla-text">অনুচ্ছেদ: <span id="tn-btt-passage-title">ভোরের হাওয়া ও নদীর পাড়</span></span>
                <span class="small text-muted">Green = Correct &bull; Red = Error</span>
              </div>
              <div id="tn-btt-passage-box" class="tn-btt-passage" aria-live="off"></div>
            </div>

            <!-- User Typing Textarea (Paste Disabled) -->
            <div class="mb-3">
              <label for="tn-btt-input" class="form-label fw-bold small tn-bangla-text">
                এখানে বাংলায় টাইপ শুরু করুন (Start Typing Here — Paste Disabled):
              </label>
              <textarea
                id="tn-btt-input"
                class="form-control tn-bangla-text"
                rows="4"
                style="font-size: 1.3rem; line-height: 1.9;"
                placeholder="টাইম কাউন্টডাউন শুরু করতে উপরের বাংলা অনুচ্ছেদটি দেখে এখানে টাইপ করুন..."
                autocomplete="off"
                autocorrect="off"
                autocapitalize="off"
                spellcheck="false"
              ></textarea>
            </div>

            <!-- Final Test Result Card -->
            <div id="tn-btt-final-card" class="tn-result-box border-success bg-success-subtle d-none mt-3">
              <h2 class="h5 fw-bold text-success mb-3">
                <i class="bi bi-trophy-fill me-1" aria-hidden="true"></i> Bangla Typing Test Complete!
              </h2>
              <div class="row g-3 mb-3">
                <div class="col-6 col-md-3">
                  <div class="p-2 rounded bg-white border text-center">
                    <div class="small text-muted">Final Speed</div>
                    <div id="tn-btt-final-wpm" class="fw-bold text-primary">0 WPM</div>
                  </div>
                </div>
                <div class="col-6 col-md-3">
                  <div class="p-2 rounded bg-white border text-center">
                    <div class="small text-muted">Accuracy</div>
                    <div id="tn-btt-final-acc" class="fw-bold text-success">100%</div>
                  </div>
                </div>
                <div class="col-6 col-md-3">
                  <div class="p-2 rounded bg-white border text-center">
                    <div class="small text-muted">Total Errors</div>
                    <div id="tn-btt-final-err" class="fw-bold text-danger">0</div>
                  </div>
                </div>
                <div class="col-6 col-md-3">
                  <div class="p-2 rounded bg-white border text-center">
                    <div class="small text-muted">Correct Chars</div>
                    <div id="tn-btt-final-chars" class="fw-bold">0 / 0</div>
                  </div>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <button type="button" id="tn-btt-try-again-btn" class="btn tn-btn--primary btn-sm">
                  <i class="bi bi-arrow-repeat" aria-hidden="true"></i> Try Again
                </button>
                <button type="button" id="tn-btt-copy-score-btn" class="btn tn-btn--outline btn-sm">
                  <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Score Summary
                </button>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Take the Bangla Typing Speed Test</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Pick Difficulty &amp; Time Limit:</strong> Select <em>Easy</em>, <em>Medium</em>, or <em>Hard (Conjuncts)</em> and choose a <em>1, 2, or 5 minute</em> test duration. Click <strong>New Passage</strong> anytime for a fresh paragraph.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Switch Keyboard to Bangla &amp; Start Typing:</strong> Enable your Bangla Unicode keyboard (Avro, Bijoy Unicode, or Probhat) and begin typing in the box. The countdown starts automatically on your first keystroke.
              </li>
              <li>
                <strong>Step 3 — Review Your WPM &amp; Accuracy:</strong> Watch live character highlights as you type, and review your final WPM, accuracy percentage, and error breakdown when time expires.
              </li>
            </ol>
          </section>

          <!-- Detailed Explanation of WPM, Accuracy & Bangla Unicode Handling (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">How Bangla WPM &amp; Conjunct-Safe Accuracy Are Calculated</h2>
            <p class="text-muted">
              Many generic online typing tests are built only for ASCII English characters and fail when testing Bengali because a single Bangla syllable or conjunct (<em>Juktoborno / যুক্তবর্ণ</em>) is composed of multiple Unicode code points (base consonant + <em>hasant</em> <code>্</code> + second consonant + vowel sign). ToolNest's Bangla Typing Test is engineered specifically for Bengali Unicode scripts.
            </p>

            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-Speedometer text-primary me-1" aria-hidden="true"></i> How WPM Is Calculated</h3>
                  <p class="small text-muted mb-0">
                    <strong>Words Per Minute (WPM)</strong> compares your typed words against the passage words after Unicode NFC normalization:<br>
                    <code>WPM = Correct Bangla Words &divide; Elapsed Minutes</code>.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-bullseye text-primary me-1" aria-hidden="true"></i> How Accuracy % Is Calculated</h3>
                  <p class="small text-muted mb-0">
                    <strong>Accuracy %</strong> compares normalized Unicode characters:<br>
                    <code>Accuracy = (Correct Characters &divide; Total Typed Characters) &times; 100</code>.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-translate text-primary me-1" aria-hidden="true"></i> Unicode NFC &amp; Nukta Unification</h3>
                  <p class="small text-muted mb-0">
                    Some keyboards output decomposed <code>ড + ়</code> while others output precomposed <code>ড়</code>. Our engine normalizes both strings to <strong>NFC</strong> and unifies nukta pairs so you never get false errors.
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-journal-text text-primary me-1" aria-hidden="true"></i> 12 Original Practice Passages</h3>
                  <p class="small text-muted mb-0">
                    Practice across 12 original Bangla paragraphs spanning nature, technology, e-commerce, and complex conjuncts (<code>ক্ষ</code>, <code>জ্ঞ</code>, <code>ঞ্চ</code>, <code>স্ত</code>, <code>দ্ধ</code>) for BCC/PSC recruitment preparation.
                  </p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="bttFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="bttFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bttFaqCol1" aria-expanded="true" aria-controls="bttFaqCol1">
                    1. Which Bangla keyboard layouts work with this Bangla Typing Test?
                  </button>
                </h3>
                <div id="bttFaqCol1" class="accordion-collapse collapse show" aria-labelledby="bttFaq1" data-bs-parent="#bttFaqAccordion">
                  <div class="accordion-body text-muted">
                    You can use any keyboard that outputs Unicode Bangla, including <strong>Avro Phonetic</strong>, <strong>Bijoy Bayanno (Unicode Mode)</strong>, <strong>Probhat</strong>, <strong>National Layout</strong>, or mobile keyboards like <strong>Ridmik</strong> and <strong>Gboard</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bttFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bttFaqCol2" aria-expanded="false" aria-controls="bttFaqCol2">
                    2. How are Words Per Minute (WPM) and Accuracy % calculated?
                  </button>
                </h3>
                <div id="bttFaqCol2" class="accordion-collapse collapse" aria-labelledby="bttFaq2" data-bs-parent="#bttFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>WPM</strong> is calculated by dividing your accurately typed words by the elapsed time in minutes. <strong>Accuracy %</strong> divides the number of matching normalized characters by the total characters you have typed.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bttFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bttFaqCol3" aria-expanded="false" aria-controls="bttFaqCol3">
                    3. Does the test handle Bangla conjuncts (যুক্তবর্ণ) and vowel signs properly?
                  </button>
                </h3>
                <div id="bttFaqCol3" class="accordion-collapse collapse" aria-labelledby="bttFaq3" data-bs-parent="#bttFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Both strings are normalized to Unicode NFC before comparison, invisible zero-width joiners are unified, and intermediate <em>hasant</em> (<code>্</code>) keystrokes while forming a conjunct are not counted as mistakes.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bttFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bttFaqCol4" aria-expanded="false" aria-controls="bttFaqCol4">
                    4. What Bangla typing speed is required for Bangladesh government jobs?
                  </button>
                </h3>
                <div id="bttFaqCol4" class="accordion-collapse collapse" aria-labelledby="bttFaq4" data-bs-parent="#bttFaqAccordion">
                  <div class="accordion-body text-muted">
                    Most Bangladesh ministry and department recruitment tests require <strong>20 WPM</strong> for Office Assistant Cum Computer Typists and <strong>25 WPM</strong> for Computer Operators in Bangla.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bttFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bttFaqCol5" aria-expanded="false" aria-controls="bttFaqCol5">
                    5. Can I convert Bijoy ANSI text to Unicode for practice?
                  </button>
                </h3>
                <div id="bttFaqCol5" class="accordion-collapse collapse" aria-labelledby="bttFaq5" data-bs-parent="#bttFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes—if you have documents written in legacy SutonnyMJ font, use our <a href="../../tools/bijoy-to-unicode/index.html">Bijoy to Unicode Converter</a> anytime.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_bangla_typing_test', 'tn_bangla_typing_test_shortcode');

function tn_bijoy_to_unicode_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Bijoy to Unicode Converter Workspace">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
              <span class="tn-privacy-banner mb-0">
                <i class="bi bi-shield-check" aria-hidden="true"></i>
                100% Client-Side &bull; Text Never Leaves Your Browser
              </span>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="tn-bijoy-live" checked>
                <label class="form-check-label small fw-semibold" for="tn-bijoy-live">Instant Live Conversion</label>
              </div>
            </div>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Paste Bijoy or Unicode</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Convert Either Way</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Copy Clean Bangla</div>
            </div>

            <!-- Action Toolbar -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-bijoy-sample" class="btn tn-btn--outline btn-sm">
                <i class="bi bi-magic" aria-hidden="true"></i> Load Sample Bangla
              </button>
              <button type="button" id="tn-bijoy-clear" class="btn tn-btn--outline btn-sm text-danger">
                <i class="bi bi-trash3" aria-hidden="true"></i> Reset / Clear Both
              </button>
            </div>

            <!-- Bijoy Box -->
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label for="tn-bijoy-input" class="form-label fw-bold mb-0">
                  Bijoy Classic (ANSI / SutonnyMJ) Text
                </label>
                <span id="tn-bijoy-stats" class="small text-muted">0 words &middot; 0 characters</span>
              </div>
              <textarea id="tn-bijoy-input" class="form-control" rows="6" placeholder="Paste or type Bijoy ANSI text here (e.g. Avgvi †mvbvi evsjv)..."></textarea>
              <div class="d-flex justify-content-end mt-2">
                <button type="button" id="tn-copy-bijoy" class="btn tn-btn--outline btn-sm">
                  <i class="bi bi-clipboard" aria-hidden="true"></i> Copy Bijoy Text
                </button>
              </div>
            </div>

            <!-- Directional Conversion Buttons -->
            <div class="d-flex flex-wrap justify-content-center gap-3 my-3">
              <button type="button" id="tn-btn-bijoy-to-uni" class="btn tn-btn--primary">
                <i class="bi bi-arrow-down-circle-fill" aria-hidden="true"></i> Bijoy to Unicode (বিজয় &rarr; ইউনিকোড)
              </button>
              <button type="button" id="tn-btn-uni-to-bijoy" class="btn tn-btn--accent">
                <i class="bi bi-arrow-up-circle-fill" aria-hidden="true"></i> Unicode to Bijoy (ইউনিকোড &rarr; বিজয়)
              </button>
            </div>

            <!-- Unicode Box -->
            <div>
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label for="tn-unicode-input" class="form-label fw-bold mb-0 tn-bangla-text">
                  Bangla Unicode (ইউনিকোড / অভ্র / ওয়েব) Text
                </label>
                <span id="tn-unicode-stats" class="small text-muted">0 words &middot; 0 characters</span>
              </div>
              <textarea id="tn-unicode-input" class="form-control tn-bangla-text" rows="6" placeholder="এখানে ইউনিকোড বাংলা পেস্ট করুন বা লিখুন (যেমনঃ আমার সোনার বাংলা)..."></textarea>
              <div class="d-flex justify-content-end mt-2">
                <button type="button" id="tn-copy-unicode" class="btn tn-btn--success btn-sm">
                  <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Unicode Text
                </button>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Use the Bijoy to Unicode Converter</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Paste Your Source Text:</strong> If you have legacy Bangla text written in Microsoft Word or Adobe Illustrator using the <em>SutonnyMJ</em> font, paste it into the top <strong>Bijoy Classic</strong> box. If you typed Bangla using Avro Keyboard or mobile voice typing, paste it into the bottom <strong>Bangla Unicode</strong> box.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Convert Instantly:</strong> With <em>Instant Live Conversion</em> enabled, the opposite text box updates automatically as you type or paste. You can also click the <strong>Bijoy to Unicode</strong> or <strong>Unicode to Bijoy</strong> button at any time.
              </li>
              <li>
                <strong>Step 3 — Copy and Paste Anywhere:</strong> Click <strong>Copy Unicode Text</strong> to paste clean Bangla onto websites, Facebook, WhatsApp, or emails, or click <strong>Copy Bijoy Text</strong> and apply the SutonnyMJ font in your desktop publishing software.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Guide (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Key Features &amp; Why Professionals Use This Bangla Converter</h2>
            <p class="text-muted">
              In Bangladesh and West Bengal, two major Bangla text encoding standards coexist every day. Official government ministries, court offices, book publishers, and national newspapers frequently prepare manuscripts in <strong>Bijoy ANSI (SutonnyMJ)</strong> because legacy printing workflows and DTP layout programs depend on ANSI glyph tables. Meanwhile, modern web browsers, smartphones, Google Search, Facebook, and Government e-Service portals exclusively require <strong>UTF-8 Bangla Unicode</strong>.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-arrows-angle-expand text-primary me-1" aria-hidden="true"></i> Bidirectional Accuracy</h3>
                  <p class="small text-muted mb-0">Convert effortlessly from Bijoy to Unicode for web publishing, or convert Unicode back to Bijoy when sending drafts to a printing press.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-cpu text-primary me-1" aria-hidden="true"></i> Smart Kar &amp; Juktakkhor Engine</h3>
                  <p class="small text-muted mb-0">Automatically reorders pre-vowel signs (ি, ে, ৈ), two-part vowel signs (ো, ৌ), Reph (র্), and complex conjunct consonants without broken characters.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-wifi-off text-primary me-1" aria-hidden="true"></i> Zero Server Lag or Leaks</h3>
                  <p class="small text-muted mb-0">Even a 20-page Bangla article converts in milliseconds inside your browser memory without uploading sensitive drafts online.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-check2-square text-primary me-1" aria-hidden="true"></i> Live Word &amp; Character Count</h3>
                  <p class="small text-muted mb-0">Track exact word and character counts on both boxes in real time for newspaper columns and SMS campaigns.</p>
                </div>
              </div>
            </div>
            <p class="text-muted mb-0 mt-2">
              Whether you are a journalist meeting a tight deadline, a university student formatting a thesis, or an administrative officer updating an official notice board, ToolNest ensures your Bangla typography remains crisp, accurate, and universally readable.
            </p>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="bijoyFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol1" aria-expanded="true" aria-controls="bFaqCol1">
                    1. What is the difference between Bijoy ANSI and Bangla Unicode?
                  </button>
                </h3>
                <div id="bFaqCol1" class="accordion-collapse collapse show" aria-labelledby="bFaq1" data-bs-parent="#bijoyFaqAccordion">
                  <div class="accordion-body text-muted">
                    Bijoy ANSI (used with fonts like SutonnyMJ) replaces standard English letters with Bangla shapes so older desktop publishing programs can render Bangla. Unicode assigns a dedicated international code point to every Bangla letter so any phone, computer, or website can display Bangla without installing custom font files.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol2" aria-expanded="false" aria-controls="bFaqCol2">
                    2. Can I convert both Bijoy to Unicode and Unicode to Bijoy here?
                  </button>
                </h3>
                <div id="bFaqCol2" class="accordion-collapse collapse" aria-labelledby="bFaq2" data-bs-parent="#bijoyFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Both directions work in real time. Paste Bijoy text in the top box to get Unicode in the bottom box, or type/paste Unicode in the bottom box to generate SutonnyMJ-ready Bijoy code in the top box.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol3" aria-expanded="false" aria-controls="bFaqCol3">
                    3. Is my confidential Bangla document uploaded to any server?
                  </button>
                </h3>
                <div id="bFaqCol3" class="accordion-collapse collapse" aria-labelledby="bFaq3" data-bs-parent="#bijoyFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All conversion logic runs 100% locally in your browser via JavaScript. Legal drafts, exam papers, and unpublished articles never leave your computer.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol4" aria-expanded="false" aria-controls="bFaqCol4">
                    4. Why does Bijoy text look like garbled English letters in my browser?
                  </button>
                </h3>
                <div id="bFaqCol4" class="accordion-collapse collapse" aria-labelledby="bFaq4" data-bs-parent="#bijoyFaqAccordion">
                  <div class="accordion-body text-muted">
                    Because Bijoy stores Bangla characters using standard ASCII codes (for example, <code>Avgvi</code> represents <em>আমার</em> when formatted with the SutonnyMJ font). Pasting that raw string into our converter immediately turns it into readable Bangla Unicode.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol5" aria-expanded="false" aria-controls="bFaqCol5">
                    5. Does this converter handle compound letters (Juktakkhor) and Reph properly?
                  </button>
                </h3>
                <div id="bFaqCol5" class="accordion-collapse collapse" aria-labelledby="bFaq5" data-bs-parent="#bijoyFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Our conversion engine accurately maps over 60 Bangla conjuncts (such as ক্ষ, জ্ঞ, ক্ত, প্র, ত্র, হ্ম) and automatically places pre-kar vowels and Reph (র্) in the correct logical order required by Unicode and ANSI standards.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_bijoy_to_unicode', 'tn_bijoy_to_unicode_shortcode');

function tn_bold_text_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Bold Text Generator Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-lock-fill" aria-hidden="true"></i>
              100% Client-Side &bull; Text Never Leaves Your Device
            </span>

            <div class="mb-4">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <label for="tn-bold-input" class="form-label fw-bold mb-0">Your Normal Text</label>
                <div class="d-flex gap-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary" id="tn-bold-sample">
                    <i class="bi bi-magic me-1" aria-hidden="true"></i>Sample
                  </button>
                  <button type="button" class="btn btn-sm btn-outline-danger" id="tn-bold-clear">
                    <i class="bi bi-trash me-1" aria-hidden="true"></i>Clear
                  </button>
                </div>
              </div>
              <textarea id="tn-bold-input" class="form-control form-control-lg mb-2" rows="3" placeholder="Type or paste your text here (e.g. Follow me on Instagram)...">Hello World</textarea>
              <div class="d-flex justify-content-between text-muted small">
                <span><strong id="tn-bold-chars">11</strong> characters &bull; <strong id="tn-bold-words">2</strong> words</span>
                <span>Instant Live Preview</span>
              </div>
            </div>

            <h2 class="h5 fw-bold mb-3">Choose Your Bold Style</h2>
            <div class="row" id="tn-bold-results">
              <!-- Styles populated dynamically by bold-text-generator.js -->
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Generate Bold Social Media Text</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Type or Paste Your Text:</strong> Enter your headline, bio line, or caption into the <em>Your Normal Text</em> box above.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Compare Unicode Styles:</strong> Browse the live previews below, including Bold Sans, Bold Serif, Italic, Script, and Gothic variations.
              </li>
              <li>
                <strong>Step 3 — Copy &amp; Paste Anywhere:</strong> Click the <strong>Copy</strong> button next to any style and paste it directly into Facebook, Instagram, X, LinkedIn, or WhatsApp.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">How Bold Text Generator Works</h2>
            <p class="text-muted">
              Standard social media platforms like Facebook, Instagram, Twitter/X, and WhatsApp don't always provide rich text formatting buttons (like bold or italics) in posts and profile bios.
              This tool solves that problem using <strong>Unicode mathematical alphanumeric characters</strong>.
              Because these are genuine Unicode characters rather than HTML markup, they can be copied and pasted anywhere plain text is accepted.
            </p>

            <h3 class="h6 fw-bold mt-3 mb-2">Where You Can Use Bold Unicode Text</h3>
            <ul class="text-muted mb-0">
              <li><strong>Instagram Bio &amp; Captions:</strong> Highlight keywords, profile names, and call-to-actions.</li>
              <li><strong>Twitter/X &amp; Facebook Posts:</strong> Emphasize headlines and key phrases to stop the scroll.</li>
              <li><strong>YouTube Comments &amp; Descriptions:</strong> Make important links and timestamps pop.</li>
              <li><strong>Discord &amp; Telegram:</strong> Personalize your server nickname and chat messages.</li>
            </ul>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="boldFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol1" aria-expanded="true" aria-controls="bFaqCol1">
                    1. How does the Bold Text Generator work on Facebook and Instagram?
                  </button>
                </h3>
                <div id="bFaqCol1" class="accordion-collapse collapse show" aria-labelledby="bFaq1" data-bs-parent="#boldFaqAccordion">
                  <div class="accordion-body text-muted">
                    It maps standard English letters and numbers to mathematical alphanumeric Unicode characters, allowing you to copy and paste bold or italic styles into bios, captions, and comments where HTML formatting is not supported.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol2" aria-expanded="false" aria-controls="bFaqCol2">
                    2. Are all characters converted into bold Unicode?
                  </button>
                </h3>
                <div id="bFaqCol2" class="accordion-collapse collapse" aria-labelledby="bFaq2" data-bs-parent="#boldFaqAccordion">
                  <div class="accordion-body text-muted">
                    Standard Latin letters (A–Z, a–z) and digits (0–9) are converted into matching Unicode styles. Punctuation, emojis, and Bangla or other non-Latin scripts remain unchanged.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol3" aria-expanded="false" aria-controls="bFaqCol3">
                    3. Can screen readers read Unicode bold text?
                  </button>
                </h3>
                <div id="bFaqCol3" class="accordion-collapse collapse" aria-labelledby="bFaq3" data-bs-parent="#boldFaqAccordion">
                  <div class="accordion-body text-muted">
                    Some screen readers announce mathematical Unicode symbols individually or skip them. Use decorative Unicode styles sparingly for short headings or bio highlights rather than long paragraphs.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol4" aria-expanded="false" aria-controls="bFaqCol4">
                    4. Is my text sent to any server?
                  </button>
                </h3>
                <div id="bFaqCol4" class="accordion-collapse collapse" aria-labelledby="bFaq4" data-bs-parent="#boldFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. All character conversions happen 100% locally inside your browser using JavaScript. Your text never leaves your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bFaqCol5" aria-expanded="false" aria-controls="bFaqCol5">
                    5. Which styles are included in this generator?
                  </button>
                </h3>
                <div id="bFaqCol5" class="accordion-collapse collapse" aria-labelledby="bFaq5" data-bs-parent="#boldFaqAccordion">
                  <div class="accordion-body text-muted">
                    You can generate Bold Sans, Bold Serif, Bold Italic, Script, Double-Struck, Fraktur (Gothic), Monospace, and Circled text styles with one-click copy buttons.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_bold_text_generator', 'tn_bold_text_generator_shortcode');

function tn_bulk_image_resizer_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Bulk Image Resizer Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Batch Photos Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Select Multiple Images</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Configure Resize &amp; Naming</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Export Batch or .ZIP</div>
            </div>

            <!-- 1. Drag & Drop Multi-File Zone -->
            <div id="tn-bulk-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop multiple images to batch resize">
              <i class="bi bi-images tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop Multiple Images Here</h2>
              <p class="small text-muted mb-3">Supports batch JPG, PNG, WebP, GIF, and BMP files. Zero server uploads.</p>
              <label for="tn-bulk-file-input" class="btn tn-btn--primary mb-0">
                <i class="bi bi-folder-plus" aria-hidden="true"></i> Browse &amp; Select Images
              </label>
              <input type="file" id="tn-bulk-file-input" class="d-none" accept="image/*" multiple>
            </div>

            <!-- Queued Source Files Strip -->
            <div id="tn-bulk-queue-panel" class="p-3 rounded border bg-light mb-4 d-none">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span id="tn-bulk-queue-count" class="badge bg-primary">0 Images Queued</span>
                <span class="small text-muted">Click &times; on any file chip to remove it from the batch</span>
              </div>
              <div id="tn-bulk-queue-list" class="d-flex flex-wrap gap-2"></div>
            </div>

            <!-- 2. RedKetchup-Style Resize Configuration Card -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <h3 class="h6 fw-bold text-primary mb-3">
                <i class="bi bi-sliders2 me-1" aria-hidden="true"></i> Step 2A: Batch Resize Dimensions &amp; Fit Mode
              </h3>

              <div class="row g-3 mb-3">
                <div class="col-md-6">
                  <label for="tn-bulk-mode" class="form-label fw-bold small">Resize Mode</label>
                  <select id="tn-bulk-mode" class="form-select">
                    <option value="dimensions" selected>Exact Dimensions (Width &times; Height)</option>
                    <option value="filesize">Target File Size (KB / MB)</option>
                    <option value="percentage">Scale by Percentage (%)</option>
                    <option value="longest">Longest Side (Preserve Aspect Ratio)</option>
                    <option value="width">Fixed Width (Auto Aspect Height)</option>
                    <option value="height">Fixed Height (Auto Aspect Width)</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="tn-bulk-preset" class="form-label fw-bold small">Quick Social / Portal Preset</label>
                  <select id="tn-bulk-preset" class="form-select"></select>
                </div>
              </div>

              <!-- Mode: Width & Height -->
              <div id="tn-bulk-dim-group" class="row g-3 mb-3">
                <div id="tn-bulk-w-col" class="col-6">
                  <label for="tn-bulk-width" class="form-label fw-bold small">Target Width (px)</label>
                  <input type="number" id="tn-bulk-width" class="form-control" value="1200" min="16" max="8000">
                </div>
                <div id="tn-bulk-h-col" class="col-6">
                  <label for="tn-bulk-height" class="form-label fw-bold small">Target Height (px)</label>
                  <input type="number" id="tn-bulk-height" class="form-control" value="630" min="16" max="8000">
                </div>
              </div>

              <!-- Mode: Percentage -->
              <div id="tn-bulk-pct-group" class="row g-3 mb-3 d-none">
                <div class="col-md-6">
                  <label for="tn-bulk-pct" class="form-label fw-bold small">Scale Percentage (%)</label>
                  <div class="input-group">
                    <input type="number" id="tn-bulk-pct" class="form-control" value="50" min="5" max="500">
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>

              <!-- Mode: Longest Side -->
              <div id="tn-bulk-longest-group" class="row g-3 mb-3 d-none">
                <div class="col-md-6">
                  <label for="tn-bulk-longest" class="form-label fw-bold small">Max Longest Side (px)</label>
                  <div class="input-group">
                    <input type="number" id="tn-bulk-longest" class="form-control" value="1200" min="16" max="8000">
                    <span class="input-group-text">px</span>
                  </div>
                </div>
              </div>

              <!-- Mode: Target File Size (KB / MB) -->
              <div id="tn-bulk-filesize-group" class="p-3 rounded-3 border bg-white mb-3 d-none">
                <div class="row g-3 align-items-end">
                  <div class="col-sm-6 col-md-5">
                    <label for="tn-bulk-target-size" class="form-label fw-bold small">Target File Size (Approximate)</label>
                    <div class="input-group">
                      <input type="number" id="tn-bulk-target-size" class="form-control" value="5" min="1" max="50000" step="0.1">
                      <select id="tn-bulk-target-unit" class="form-select" style="max-width: 95px;" aria-label="File size unit">
                        <option value="KB">KB</option>
                        <option value="MB" selected>MB</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-7">
                    <label for="tn-bulk-filesize-strategy" class="form-label fw-bold small">File Size Adjustment Method</label>
                    <select id="tn-bulk-filesize-strategy" class="form-select">
                      <option value="auto" selected>Smart Auto (Scale Dimensions + Optimize Quality)</option>
                      <option value="dimensions-only">Scale Pixel Dimensions Only (Keep Quality Fixed)</option>
                      <option value="quality-first">Adjust Quality First, Then Scale Dimensions</option>
                    </select>
                  </div>
                </div>

                <div class="mt-2 d-flex flex-wrap align-items-center gap-1">
                  <span class="small text-muted me-1">Quick Target Sizes:</span>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-fsize-val="50" data-fsize-unit="KB">50 KB</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-fsize-val="100" data-fsize-unit="KB">100 KB</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-fsize-val="500" data-fsize-unit="KB">500 KB</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-fsize-val="1" data-fsize-unit="MB">1 MB</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-fsize-val="2" data-fsize-unit="MB">2 MB</button>
                  <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2 fw-semibold" data-fsize-val="5" data-fsize-unit="MB">5 MB</button>
                </div>

                <div class="form-check mt-2">
                  <input class="form-check-input" type="checkbox" id="tn-bulk-filesize-pad" checked>
                  <label class="form-check-label small text-muted" for="tn-bulk-filesize-pad">
                    Precision target match (if an image is smaller than target like <strong>5 MB</strong> even after scaling, add safe metadata bytes so final file size is right near your target)
                  </label>
                </div>
              </div>

              <!-- Fit Mode, 9-Point Crop Anchor & Background Fill -->
              <div id="tn-bulk-fit-group" class="row g-3 mb-2">
                <div class="col-sm-6 col-md-5">
                  <label for="tn-bulk-fit" class="form-label fw-bold small">Aspect Ratio / Fit Mode</label>
                  <select id="tn-bulk-fit" class="form-select">
                    <option value="cover" selected>Crop to Fill (Cover)</option>
                    <option value="contain">Fit Inside (Pad with Background)</option>
                    <option value="stretch">Stretch to Exact Dimensions</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-4">
                  <label for="tn-bulk-anchor" class="form-label fw-bold small">9-Point Crop / Pad Anchor</label>
                  <select id="tn-bulk-anchor" class="form-select">
                    <option value="center" selected>Center (Middle)</option>
                    <option value="top">Top Center</option>
                    <option value="bottom">Bottom Center</option>
                    <option value="left">Middle Left</option>
                    <option value="right">Middle Right</option>
                    <option value="top-left">Top Left</option>
                    <option value="top-right">Top Right</option>
                    <option value="bottom-left">Bottom Left</option>
                    <option value="bottom-right">Bottom Right</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-bulk-bg" class="form-label fw-bold small">Background Fill</label>
                  <input type="color" id="tn-bulk-bg" class="form-control form-control-color w-100" value="#FFFFFF">
                </div>
              </div>

              <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="tn-bulk-no-enlarge">
                <label class="form-check-label small fw-semibold" for="tn-bulk-no-enlarge">
                  Do not enlarge if original image is smaller than target dimensions
                </label>
              </div>
            </div>

            <!-- 3. Export Format, Quality, Orientation & File Naming -->
            <div class="p-3 rounded-3 border bg-light mb-4">
              <h3 class="h6 fw-bold text-primary mb-3">
                <i class="bi bi-gear-wide-connected me-1" aria-hidden="true"></i> Step 2B: Batch Format, Orientation &amp; Custom File Naming
              </h3>

              <div class="row g-3 mb-3">
                <div class="col-sm-6 col-md-4">
                  <label for="tn-bulk-format" class="form-label fw-bold small">Export Image Format</label>
                  <select id="tn-bulk-format" class="form-select">
                    <option value="image/jpeg" selected>JPEG (.jpg)</option>
                    <option value="image/webp">WebP (.webp)</option>
                    <option value="image/png">PNG (.png)</option>
                    <option value="original">Keep Original Format</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-4">
                  <div class="d-flex justify-content-between">
                    <label for="tn-bulk-quality" class="form-label fw-bold small mb-1">JPG / WebP Quality</label>
                    <span id="tn-bulk-quality-val" class="badge bg-primary">85%</span>
                  </div>
                  <input type="range" id="tn-bulk-quality" class="form-range" min="15" max="100" step="5" value="85">
                </div>
                <div class="col-sm-12 col-md-4">
                  <label for="tn-bulk-rotate" class="form-label fw-bold small">Rotate Batch</label>
                  <select id="tn-bulk-rotate" class="form-select">
                    <option value="0" selected>No Rotation (0&deg;)</option>
                    <option value="90">Rotate 90&deg; Clockwise</option>
                    <option value="180">Rotate 180&deg;</option>
                    <option value="270">Rotate 90&deg; Counter-Clockwise</option>
                  </select>
                </div>
              </div>

              <div class="row g-3 align-items-end">
                <div class="col-sm-6 col-md-4">
                  <label for="tn-bulk-prefix" class="form-label fw-bold small">Filename Prefix</label>
                  <input type="text" id="tn-bulk-prefix" class="form-control form-control-sm" value="" placeholder="e.g. web_">
                </div>
                <div class="col-sm-6 col-md-4">
                  <label for="tn-bulk-suffix" class="form-label fw-bold small">Filename Suffix Pattern</label>
                  <input type="text" id="tn-bulk-suffix" class="form-control form-control-sm" value="_{width}x{height}" placeholder="e.g. _{width}x{height}">
                </div>
                <div class="col-md-4 d-flex gap-3 pb-1">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tn-bulk-fliph">
                    <label class="form-check-label small fw-semibold" for="tn-bulk-fliph">Flip H</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tn-bulk-flipv">
                    <label class="form-check-label small fw-semibold" for="tn-bulk-flipv">Flip V</label>
                  </div>
                </div>
              </div>
              <div class="small text-muted mt-1">
                Supported naming placeholders: <code>{width}</code>, <code>{height}</code>, <code>{index}</code> (e.g. <code>photo_1200x630.jpg</code>)
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-bulk-run-btn" class="btn tn-btn--primary px-4">
                <i class="bi bi-arrows-angle-contract" aria-hidden="true"></i> Resize Images
              </button>
              <button type="button" id="tn-bulk-sample-btn" class="btn tn-btn--outline">
                <i class="bi bi-magic" aria-hidden="true"></i> Load 4 Sample Photos
              </button>
              <button type="button" id="tn-bulk-clear-btn" class="btn tn-btn--outline text-danger">
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear Queue
              </button>
            </div>

            <!-- Progress Bar -->
            <div id="tn-bulk-progress-wrap" class="mb-3 d-none">
              <div class="small fw-semibold mb-1">Batch resizing images in browser...</div>
              <div class="progress" style="height: 20px;">
                <div id="tn-bulk-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;">0%</div>
              </div>
            </div>

            <!-- Processed Results & ZIP Download -->
            <div id="tn-bulk-results-wrap" class="d-none mt-4">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 mb-3 rounded-3 bg-success-subtle border border-success-subtle">
                <div id="tn-bulk-summary-text" class="small text-dark"></div>
                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-bulk-dl-zip" class="btn tn-btn--success btn-sm">
                    <i class="bi bi-file-earmark-zip-fill" aria-hidden="true"></i> Download All as .ZIP
                  </button>
                  <button type="button" id="tn-bulk-dl-each" class="btn tn-btn--outline btn-sm">
                    <i class="bi bi-download" aria-hidden="true"></i> Download Individually
                  </button>
                </div>
              </div>
              <div id="tn-bulk-results-list"></div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Batch Resize Multiple Images at Once</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Drop Your Image Batch:</strong> Drag and drop dozens of photos into the upload box (or click <em>Load 4 Sample Photos</em> to test a multi-image batch immediately).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Pick Your Resize Rule &amp; Naming Pattern:</strong> Choose between <em>Exact Dimensions</em>, <em>Target File Size (KB / MB, e.g. 500 KB or 5 MB)</em>, <em>Percentage (%)</em>, <em>Longest Side</em>, or <em>Fixed Width/Height</em>. Select your crop anchor (e.g. Top Center for portraits), output format (JPG, WebP, PNG), and filename suffix pattern.
              </li>
              <li>
                <strong>Step 3 — Download as a Single ZIP:</strong> Click <strong>Resize All Queued Images</strong>, review the before/after dimensions and file sizes, and click <strong>Download All as .ZIP</strong>.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Why E-Commerce Stores &amp; Designers Love This Bulk Image Resizer</h2>
            <p class="text-muted">
              Preparing a catalog of 50 product photos for Daraz, Shopify, WooCommerce, or a Facebook shop one image at a time is tedious and error-prone. Inspired by professional batch workflows like RedKetchup Bulk Image Resizer, ToolNest gives you complete control over dimensions, target file sizes (KB/MB), aspect ratios, cropping anchors, and file naming across an entire folder of images in seconds.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-arrows-fullscreen text-primary me-1" aria-hidden="true"></i> 6 Flexible Resize Modes (Incl. File Size)</h3>
                  <p class="small text-muted mb-0">Resize by exact Width &times; Height, Target File Size (e.g. 100 KB or 5 MB), Percentage, Longest Side, or Fixed Width/Height.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-grid-3x3 text-primary me-1" aria-hidden="true"></i> 9-Point Crop Anchor Grid</h3>
                  <p class="small text-muted mb-0">Keep faces or products centered—or anchor crops to Top, Bottom, Left, or Right when batch-cropping mixed aspect ratios.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-input-cursor-text text-primary me-1" aria-hidden="true"></i> Dynamic Filename Templates</h3>
                  <p class="small text-muted mb-0">Automatically append <code>_{width}x{height}</code> or sequential <code>{index}</code> numbers to every exported file.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-file-earmark-zip text-primary me-1" aria-hidden="true"></i> One-Click Client-Side ZIP</h3>
                  <p class="small text-muted mb-0">Bundle all resized and converted images into a single clean <code>.zip</code> archive without waiting for server downloads.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="bulkFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="bkFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bkFaqCol1" aria-expanded="true" aria-controls="bkFaqCol1">
                    1. How many images can I resize at once with the Bulk Image Resizer?
                  </button>
                </h3>
                <div id="bkFaqCol1" class="accordion-collapse collapse show" aria-labelledby="bkFaq1" data-bs-parent="#bulkFaqAccordion">
                  <div class="accordion-body text-muted">
                    You can select or drag and drop dozens of images in a single batch. Because processing uses your device's local hardware rather than uploading over the internet, even 30+ high-resolution photos resize in a few seconds.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bkFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bkFaqCol2" aria-expanded="false" aria-controls="bkFaqCol2">
                    2. What resize modes are available in the Bulk Image Resizer?
                  </button>
                </h3>
                <div id="bkFaqCol2" class="accordion-collapse collapse" aria-labelledby="bkFaq2" data-bs-parent="#bulkFaqAccordion">
                  <div class="accordion-body text-muted">
                    Choose from 5 modes: <strong>Exact Dimensions</strong> (Width &times; Height), <strong>Scale by Percentage</strong> (e.g. 50%), <strong>Longest Side</strong> (e.g. max 1200px), <strong>Fixed Width</strong>, or <strong>Fixed Height</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bkFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bkFaqCol3" aria-expanded="false" aria-controls="bkFaqCol3">
                    3. How does the 9-Point Crop Anchor work when resizing multiple photos?
                  </button>
                </h3>
                <div id="bkFaqCol3" class="accordion-collapse collapse" aria-labelledby="bkFaq3" data-bs-parent="#bulkFaqAccordion">
                  <div class="accordion-body text-muted">
                    When cropping a batch of vertical portrait photos into square thumbnails, choosing <strong>Top Center</strong> ensures heads are never cut off, while <strong>Center</strong> keeps standard product shots balanced.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bkFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bkFaqCol4" aria-expanded="false" aria-controls="bkFaqCol4">
                    4. Can I rename all resized images automatically and download them as a ZIP?
                  </button>
                </h3>
                <div id="bkFaqCol4" class="accordion-collapse collapse" aria-labelledby="bkFaq4" data-bs-parent="#bulkFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Set a custom prefix (like <code>shop_</code>) or suffix (like <code>_{width}x{height}</code>), and click <strong>Download All as .ZIP</strong> to save every resized image in one organized archive.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="bkFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bkFaqCol5" aria-expanded="false" aria-controls="bkFaqCol5">
                    5. Are my batch photos uploaded to any external server?
                  </button>
                </h3>
                <div id="bkFaqCol5" class="accordion-collapse collapse" aria-labelledby="bkFaq5" data-bs-parent="#bulkFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All resizing, cropping, format conversion, and ZIP archiving happen 100% locally in your browser.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_bulk_image_resizer', 'tn_bulk_image_resizer_shortcode');

function tn_color_picker_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Color Picker Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Image Eyedropper &amp; Palette Extractor Run Locally
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Pick Color or Click Image</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Convert HEX / RGB / HSL / CMYK</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Copy Harmonies &amp; Palette</div>
            </div>

            <!-- 1. Interactive Color Picker & Format Codes -->
            <div class="p-3 rounded-3 border bg-light mb-4">
              <div class="row g-3 align-items-center mb-3">
                <div class="col-md-5">
                  <div class="p-3 rounded-3 border bg-white text-center shadow-sm">
                    <div id="tn-cp-preview-swatch" class="rounded-3 border mb-2 mx-auto" style="height: 96px; background-color: #2563EB;"></div>
                    <div id="tn-cp-preview-hex" class="h5 fw-bold font-monospace mb-2">#2563EB</div>
                    <div class="d-flex justify-content-center align-items-center gap-2">
                      <label for="tn-cp-native" class="btn tn-btn--primary btn-sm mb-0">
                        <i class="bi bi-palette-fill" aria-hidden="true"></i> Open Color Wheel
                      </label>
                      <input type="color" id="tn-cp-native" class="form-control form-control-color" value="#2563EB" title="Choose a color">
                      <button type="button" id="tn-cp-eyedropper-btn" class="btn tn-btn--outline btn-sm" title="Pick color from screen">
                        <i class="bi bi-eyedropper" aria-hidden="true"></i> Screen Pick
                      </button>
                    </div>
                  </div>
                </div>

                <!-- RGB Channel Sliders -->
                <div class="col-md-7">
                  <div class="p-3 rounded-3 border bg-white">
                    <div class="mb-2">
                      <div class="d-flex justify-content-between small fw-bold">
                        <label for="tn-cp-r" class="text-danger">Red (R)</label>
                        <span id="tn-cp-r-val" class="badge bg-danger">37</span>
                      </div>
                      <input type="range" id="tn-cp-r" class="form-range" min="0" max="255" value="37">
                    </div>
                    <div class="mb-2">
                      <div class="d-flex justify-content-between small fw-bold">
                        <label for="tn-cp-g" class="text-success">Green (G)</label>
                        <span id="tn-cp-g-val" class="badge bg-success">99</span>
                      </div>
                      <input type="range" id="tn-cp-g" class="form-range" min="0" max="255" value="99">
                    </div>
                    <div class="mb-0">
                      <div class="d-flex justify-content-between small fw-bold">
                        <label for="tn-cp-b" class="text-primary">Blue (B)</label>
                        <span id="tn-cp-b-val" class="badge bg-primary">235</span>
                      </div>
                      <input type="range" id="tn-cp-b" class="form-range" min="0" max="255" value="235">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Color Format Inputs with One-Click Copy -->
              <div class="row g-3">
                <div class="col-sm-6 col-md-4">
                  <label for="tn-cp-hex" class="form-label fw-bold small mb-1">HEX Code</label>
                  <div class="input-group input-group-sm">
                    <input type="text" id="tn-cp-hex" class="form-control font-monospace fw-bold" value="#2563EB">
                    <button type="button" class="btn btn-outline-primary" data-copy-target="tn-cp-hex" aria-label="Copy HEX">
                      <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <label for="tn-cp-rgb" class="form-label fw-bold small mb-1">RGB Code</label>
                  <div class="input-group input-group-sm">
                    <input type="text" id="tn-cp-rgb" class="form-control font-monospace" value="rgb(37, 99, 235)" readonly>
                    <button type="button" class="btn btn-outline-primary" data-copy-target="tn-cp-rgb" aria-label="Copy RGB">
                      <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <label for="tn-cp-hsl" class="form-label fw-bold small mb-1">HSL Code</label>
                  <div class="input-group input-group-sm">
                    <input type="text" id="tn-cp-hsl" class="form-control font-monospace" value="hsl(221, 83%, 53%)" readonly>
                    <button type="button" class="btn btn-outline-primary" data-copy-target="tn-cp-hsl" aria-label="Copy HSL">
                      <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <label for="tn-cp-hsv" class="form-label fw-bold small mb-1">HSV / HSB</label>
                  <div class="input-group input-group-sm">
                    <input type="text" id="tn-cp-hsv" class="form-control font-monospace" value="hsv(221, 84%, 92%)" readonly>
                    <button type="button" class="btn btn-outline-primary" data-copy-target="tn-cp-hsv" aria-label="Copy HSV">
                      <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <label for="tn-cp-cmyk" class="form-label fw-bold small mb-1">CMYK (Print)</label>
                  <div class="input-group input-group-sm">
                    <input type="text" id="tn-cp-cmyk" class="form-control font-monospace" value="cmyk(84%, 58%, 0%, 8%)" readonly>
                    <button type="button" class="btn btn-outline-primary" data-copy-target="tn-cp-cmyk" aria-label="Copy CMYK">
                      <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
                <div class="col-sm-6 col-md-4">
                  <label for="tn-cp-css" class="form-label fw-bold small mb-1">CSS Variable</label>
                  <div class="input-group input-group-sm">
                    <input type="text" id="tn-cp-css" class="form-control font-monospace" value="--color-primary: #2563EB;" readonly>
                    <button type="button" class="btn btn-outline-primary" data-copy-target="tn-cp-css" aria-label="Copy CSS Variable">
                      <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                  </div>
                </div>
              </div>

              <div class="d-flex flex-wrap gap-2 mt-3">
                <button type="button" id="tn-cp-save-btn" class="btn tn-btn--primary btn-sm">
                  <i class="bi bi-bookmark-plus" aria-hidden="true"></i> Save Color to Palette
                </button>
                <button type="button" id="tn-cp-random-btn" class="btn tn-btn--outline btn-sm">
                  <i class="bi bi-shuffle" aria-hidden="true"></i> Random Color
                </button>
              </div>
            </div>

            <!-- 2. Image Color Picker (Eyedropper from Image + Dominant Palette) -->
            <div class="p-3 rounded-3 border bg-light mb-4">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                <h2 class="h6 fw-bold text-primary mb-0">
                  <i class="bi bi-eyedropper me-1" aria-hidden="true"></i> Pick Color from Image (Eyedropper &amp; Auto Palette)
                </h2>
                <div class="d-flex gap-2">
                  <label for="tn-cp-file-input" class="btn tn-btn--primary btn-sm mb-0">
                    <i class="bi bi-upload" aria-hidden="true"></i> Upload Image
                  </label>
                  <button type="button" id="tn-cp-sample-img-btn" class="btn tn-btn--outline btn-sm">
                    <i class="bi bi-image" aria-hidden="true"></i> Reload Sample Artwork
                  </button>
                </div>
              </div>

              <div id="tn-cp-dropzone" class="tn-dropzone py-3 mb-3" role="button" tabindex="0" aria-label="Upload an image to pick pixel colors">
                <p class="small text-muted mb-0">
                  <i class="bi bi-cloud-arrow-up text-primary me-1" aria-hidden="true"></i>
                  Drag &amp; drop any JPG, PNG, WebP, or SVG image here, then <strong>click anywhere on the image below</strong> to pick its exact pixel color.
                </p>
                <input type="file" id="tn-cp-file-input" class="d-none" accept="image/*">
              </div>

              <div id="tn-cp-canvas-wrap" class="text-center">
                <div id="tn-cp-loupe-info" class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill border bg-white small mb-2 shadow-sm">
                  <span id="tn-cp-loupe-swatch" class="d-inline-block rounded-circle border" style="width: 18px; height: 18px; background-color: #2563EB;"></span>
                  <span id="tn-cp-loupe-text" class="font-monospace fw-semibold">Hover &amp; click image to pick pixel color</span>
                </div>
                <div class="overflow-auto border rounded-3 bg-white p-2">
                  <canvas id="tn-cp-image-canvas" class="img-fluid rounded" style="cursor: crosshair;"></canvas>
                </div>

                <div class="text-start mt-3">
                  <div class="small fw-bold text-muted mb-2">
                    <i class="bi bi-stars text-warning me-1" aria-hidden="true"></i> Auto-Extracted Dominant Image Palette (Click any swatch to select &amp; copy):
                  </div>
                  <div id="tn-cp-image-palette" class="d-flex flex-wrap gap-2"></div>
                </div>
              </div>
            </div>

            <!-- 3. Color Harmonies, Tints & Shades, and WCAG Contrast -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <h2 class="h6 fw-bold text-primary mb-2">
                <i class="bi bi-bezier2 me-1" aria-hidden="true"></i> Color Harmonies (Click Any Swatch to Copy)
              </h2>
              <div id="tn-cp-harmonies" class="row g-2 mb-3"></div>

              <h2 class="h6 fw-bold text-primary mb-2">
                <i class="bi bi-layers-half me-1" aria-hidden="true"></i> Tints &amp; Shades Scale
              </h2>
              <div id="tn-cp-shades" class="d-flex flex-wrap gap-2 mb-3"></div>

              <!-- WCAG 2.1 Contrast Ratio Checker -->
              <div class="p-3 rounded-3 border bg-white">
                <h3 class="h6 fw-bold mb-2">
                  <i class="bi bi-universal-access-circle text-primary me-1" aria-hidden="true"></i> WCAG 2.1 Accessibility Contrast Checker
                </h3>
                <div class="row g-3 align-items-center">
                  <div class="col-sm-4">
                    <div class="p-2 border rounded-3 text-center">
                      <div class="small text-muted">vs. White Text (<code>#FFFFFF</code>)</div>
                      <div id="tn-cp-contrast-white" class="fw-bold fs-6">5.17 : 1</div>
                      <span id="tn-cp-contrast-white-badge" class="badge bg-success">AA Pass</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="p-2 border rounded-3 text-center">
                      <div class="small text-muted">vs. Dark Text (<code>#0F172A</code>)</div>
                      <div id="tn-cp-contrast-dark" class="fw-bold fs-6">3.68 : 1</div>
                      <span id="tn-cp-contrast-dark-badge" class="badge bg-warning text-dark">AA Large Only</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div id="tn-cp-contrast-demo" class="p-3 rounded-3 text-center fw-bold" style="background-color: #2563EB; color: #FFFFFF;">
                      Live Text Contrast Preview
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Saved Session Swatches -->
            <div class="p-3 rounded-3 border bg-white">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="small fw-bold text-muted">Saved Color Swatches (Click to Copy HEX)</span>
                <button type="button" id="tn-cp-clear-history" class="btn btn-link btn-sm text-danger p-0 text-decoration-none">Clear Swatches</button>
              </div>
              <div id="tn-cp-history" class="d-flex flex-wrap gap-2"></div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Use the Color Picker &amp; Image Eyedropper</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Pick a Color or Upload an Image:</strong> Use the interactive color wheel, drag the Red/Green/Blue sliders, or drop any image into the <em>Image Eyedropper</em> and click on any pixel.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Convert &amp; Check Contrast:</strong> View instant conversions across <strong>HEX, RGB, HSL, HSV, and CMYK</strong> along with live WCAG 2.1 text contrast ratings.
              </li>
              <li>
                <strong>Step 3 — Copy Harmonies &amp; Swatches:</strong> Click any swatch in the auto-extracted image palette, Complementary/Triadic harmonies, or Tints &amp; Shades scale to copy its HEX code immediately.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">All-in-One Browser Color Toolkit for Designers &amp; Developers</h2>
            <p class="text-muted">
              Whether you are matching a client's brand color from a product photo, converting web HEX codes into CMYK percentages for a print shop in Dhaka, or verifying WCAG AA accessibility contrast for a modern user interface, ToolNest's Color Picker brings every color workflow into one fast, zero-upload workspace.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-eyedropper text-primary me-1" aria-hidden="true"></i> Pixel-Exact Image Eyedropper</h3>
                  <p class="small text-muted mb-0">Hover over any uploaded photo or logo to inspect exact RGB values and extract an 8-color dominant palette automatically.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-arrow-left-right text-primary me-1" aria-hidden="true"></i> 6 Instant Color Formats</h3>
                  <p class="small text-muted mb-0">Convert seamlessly between HEX, RGB, HSL, HSV/HSB, print CMYK, and ready-to-use CSS variables.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-palette2 text-primary me-1" aria-hidden="true"></i> Harmonies &amp; Tints/Shades</h3>
                  <p class="small text-muted mb-0">Generate Complementary, Analogous, Triadic, and Split-Complementary palettes plus a 9-step lightness scale.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-universal-access text-primary me-1" aria-hidden="true"></i> WCAG 2.1 Contrast Verifier</h3>
                  <p class="small text-muted mb-0">Check contrast ratios against white and dark text with instant AA and AAA compliance badges.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="cpFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="cpFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaqCol1" aria-expanded="true" aria-controls="cpFaqCol1">
                    1. How do I pick a color from an image using this tool?
                  </button>
                </h3>
                <div id="cpFaqCol1" class="accordion-collapse collapse show" aria-labelledby="cpFaq1" data-bs-parent="#cpFaqAccordion">
                  <div class="accordion-body text-muted">
                    Drag and drop any JPG, PNG, WebP, or SVG image into the <strong>Pick Color from Image</strong> section. Move your cursor over the image to inspect pixels and click anywhere to select and copy that exact color.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cpFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaqCol2" aria-expanded="false" aria-controls="cpFaqCol2">
                    2. Which color code formats does the Color Picker support?
                  </button>
                </h3>
                <div id="cpFaqCol2" class="accordion-collapse collapse" aria-labelledby="cpFaq2" data-bs-parent="#cpFaqAccordion">
                  <div class="accordion-body text-muted">
                    Every color is displayed simultaneously in <strong>HEX</strong>, <strong>RGB</strong>, <strong>HSL</strong>, <strong>HSV/HSB</strong>, <strong>CMYK</strong>, and a <strong>CSS Variable</strong> snippet with one-click copy buttons.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cpFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaqCol3" aria-expanded="false" aria-controls="cpFaqCol3">
                    3. Does the Color Picker include a WCAG contrast ratio checker?
                  </button>
                </h3>
                <div id="cpFaqCol3" class="accordion-collapse collapse" aria-labelledby="cpFaq3" data-bs-parent="#cpFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. It calculates the exact WCAG 2.1 luminance contrast ratio against both White (<code>#FFFFFF</code>) and Dark (<code>#0F172A</code>) text so you know immediately whether your button or banner text passes AA or AAA accessibility standards.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cpFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaqCol4" aria-expanded="false" aria-controls="cpFaqCol4">
                    4. How are Complementary, Analogous, and Triadic palettes generated?
                  </button>
                </h3>
                <div id="cpFaqCol4" class="accordion-collapse collapse" aria-labelledby="cpFaq4" data-bs-parent="#cpFaqAccordion">
                  <div class="accordion-body text-muted">
                    The tool calculates color harmonies mathematically on the 360&deg; HSL color wheel—rotating hue by 180&deg; for Complementary, &plusmn;30&deg; for Analogous, and 120&deg; intervals for Triadic combinations.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cpFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaqCol5" aria-expanded="false" aria-controls="cpFaqCol5">
                    5. Are my uploaded images or logos sent to a server?
                  </button>
                </h3>
                <div id="cpFaqCol5" class="accordion-collapse collapse" aria-labelledby="cpFaq5" data-bs-parent="#cpFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All pixel inspection and dominant palette extraction run 100% locally inside your browser using HTML5 Canvas.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_color_picker', 'tn_color_picker_shortcode');

function tn_create_pdf_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Create PDF and Organize Pages Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; PDFs &amp; Photos Are Organized Locally in Your Browser
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Add Images &amp; PDFs</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Visually Organize Pages</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Create &amp; Download PDF</div>
            </div>

            <!-- 1. Multi-Format Drag and Drop Upload Zone -->
            <div id="tn-cpdf-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop images and PDF files">
              <i class="bi bi-files tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop Images (JPG, PNG, WebP) &amp; PDF Files Here</h2>
              <p class="small text-muted mb-3">Mix multi-page PDFs and photos freely. Every page will appear below as an interactive thumbnail card.</p>
              <div class="d-flex flex-wrap justify-content-center gap-2">
                <label for="tn-cpdf-file-input" class="btn tn-btn--primary mb-0">
                  <i class="bi bi-folder2-open" aria-hidden="true"></i> Select Images &amp; PDFs
                </label>
                <button type="button" id="tn-cpdf-sample-btn" class="btn tn-btn--outline">
                  <i class="bi bi-magic" aria-hidden="true"></i> Load Sample PDF + Images
                </button>
              </div>
              <input type="file" id="tn-cpdf-file-input" class="d-none" accept=".pdf,application/pdf,image/jpeg,image/png,image/webp" multiple>
              <!-- Hidden input used when inserting files after a specific page -->
              <input type="file" id="tn-cpdf-insert-input" class="d-none" accept=".pdf,application/pdf,image/jpeg,image/png,image/webp" multiple>
            </div>

            <!-- Loading / Parsing Status Bar -->
            <div id="tn-cpdf-loading-wrap" class="mb-3 d-none">
              <div id="tn-cpdf-loading-text" class="small fw-semibold text-primary mb-1">Rendering page thumbnails...</div>
              <div class="progress" style="height: 18px;">
                <div id="tn-cpdf-loading-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;">0%</div>
              </div>
            </div>

            <!-- 2. Adobe Acrobat-Style Organize Pages Workspace -->
            <div id="tn-cpdf-organizer-wrap" class="d-none mb-3">
              <!-- Sticky Action Toolbar -->
              <div class="tn-cpdf-toolbar mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pb-2 mb-2 border-bottom">
                  <div class="d-flex flex-wrap align-items-center gap-2">
                    <span id="tn-cpdf-total-badge" class="badge bg-primary">0 Pages</span>
                    <span id="tn-cpdf-selected-badge" class="badge bg-secondary-subtle text-dark border">0 Selected</span>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Selection shortcuts">
                      <button type="button" id="tn-cpdf-select-all-btn" class="btn btn-outline-secondary" title="Select all pages">All</button>
                      <button type="button" id="tn-cpdf-select-none-btn" class="btn btn-outline-secondary" title="Deselect all pages">None</button>
                      <button type="button" id="tn-cpdf-select-odd-btn" class="btn btn-outline-secondary" title="Select odd pages (1, 3, 5...)">Odd</button>
                      <button type="button" id="tn-cpdf-select-even-btn" class="btn btn-outline-secondary" title="Select even pages (2, 4, 6...)">Even</button>
                    </div>
                  </div>

                  <div class="d-flex align-items-center gap-2">
                    <label for="tn-cpdf-grid-size" class="small text-muted mb-0">View:</label>
                    <select id="tn-cpdf-grid-size" class="form-select form-select-sm" style="width: auto;">
                      <option value="compact">Compact Grid</option>
                      <option value="standard" selected>Standard Grid</option>
                      <option value="large">Large Preview</option>
                    </select>
                  </div>
                </div>

                <!-- Batch & Insert Controls -->
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                  <div class="d-flex flex-wrap align-items-center gap-1">
                    <button type="button" id="tn-cpdf-rot-ccw-btn" class="btn btn-sm tn-btn--outline" title="Rotate selected (or all) pages 90° left">
                      <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Rotate Left
                    </button>
                    <button type="button" id="tn-cpdf-rot-cw-btn" class="btn btn-sm tn-btn--outline" title="Rotate selected (or all) pages 90° right">
                      <i class="bi bi-arrow-clockwise" aria-hidden="true"></i> Rotate Right
                    </button>
                    <button type="button" id="tn-cpdf-dup-btn" class="btn btn-sm tn-btn--outline" title="Duplicate selected pages">
                      <i class="bi bi-copy" aria-hidden="true"></i> Duplicate
                    </button>
                    <button type="button" id="tn-cpdf-reverse-btn" class="btn btn-sm tn-btn--outline" title="Reverse page order">
                      <i class="bi bi-sort-numeric-down-alt" aria-hidden="true"></i> Reverse
                    </button>
                    <button type="button" id="tn-cpdf-delete-sel-btn" class="btn btn-sm tn-btn--outline text-danger" title="Delete selected pages">
                      <i class="bi bi-trash3" aria-hidden="true"></i> Delete Selected
                    </button>
                  </div>

                  <div class="d-flex flex-wrap align-items-center gap-1">
                    <button type="button" id="tn-cpdf-add-more-btn" class="btn btn-sm btn-outline-primary">
                      <i class="bi bi-file-earmark-plus" aria-hidden="true"></i> + Add Files
                    </button>
                    <button type="button" id="tn-cpdf-add-blank-btn" class="btn btn-sm btn-outline-secondary">
                      <i class="bi bi-file-earmark" aria-hidden="true"></i> + Blank Page
                    </button>
                  </div>
                </div>
              </div>

              <div class="small text-muted mb-2 d-flex align-items-center justify-content-between flex-wrap gap-1">
                <span><i class="bi bi-arrows-move text-primary me-1" aria-hidden="true"></i> <strong>Tip:</strong> Drag any page card to reorder, click the magnifying glass to zoom, or select multiple pages for batch actions.</span>
              </div>

              <!-- Visual Page Thumbnail Grid -->
              <div id="tn-cpdf-pages-grid" class="tn-cpdf-grid" data-grid-size="standard" role="list" aria-label="PDF pages organizer grid"></div>
            </div>

            <!-- 3. Output Page Setup & Filename Options -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <h3 class="h6 fw-bold text-primary mb-3">
                <i class="bi bi-sliders me-1" aria-hidden="true"></i> Page Size &amp; Output Settings
              </h3>
              <div class="row g-3">
                <div class="col-sm-6 col-md-3">
                  <label for="tn-cpdf-page-size" class="form-label fw-bold small">Image / Blank Page Size</label>
                  <select id="tn-cpdf-page-size" class="form-select">
                    <option value="a4" selected>A4 (210 &times; 297 mm)</option>
                    <option value="letter">US Letter (8.5 &times; 11 in)</option>
                    <option value="fit">Fit to Image Dimensions</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-cpdf-orientation" class="form-label fw-bold small">Image Orientation</label>
                  <select id="tn-cpdf-orientation" class="form-select">
                    <option value="auto" selected>Auto (Match Image)</option>
                    <option value="portrait">Portrait (Vertical)</option>
                    <option value="landscape">Landscape (Horizontal)</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-cpdf-margin" class="form-label fw-bold small">Image Margin</label>
                  <select id="tn-cpdf-margin" class="form-select">
                    <option value="0">No Margin (Full Bleed)</option>
                    <option value="20" selected>Small Margin (20 pt)</option>
                    <option value="38">Standard Margin (38 pt)</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-cpdf-filename" class="form-label fw-bold small">Output File Name</label>
                  <input type="text" id="tn-cpdf-filename" class="form-control" value="toolnest-created-document.pdf" placeholder="document.pdf">
                </div>
              </div>
              <div class="form-text small mt-2">
                <i class="bi bi-info-circle me-1" aria-hidden="true"></i> Pages imported from existing PDFs preserve their crisp vector text and original dimensions (or you can standardize all pages using the checkbox below).
              </div>
              <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="tn-cpdf-normalize-pdf-pages">
                <label class="form-check-label small" for="tn-cpdf-normalize-pdf-pages">
                  Scale imported PDF pages to match the selected Page Size (A4 / Letter) as well
                </label>
              </div>
            </div>

            <!-- Primary Build & Export Actions -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-cpdf-build-all-btn" class="btn tn-btn--primary px-4">
                <i class="bi bi-file-earmark-pdf-fill" aria-hidden="true"></i> Create PDF (All Pages)
              </button>
              <button type="button" id="tn-cpdf-build-selected-btn" class="btn tn-btn--outline" disabled>
                <i class="bi bi-bounding-box-circles" aria-hidden="true"></i> Export Selected Pages Only
              </button>
              <button type="button" id="tn-cpdf-clear-btn" class="btn tn-btn--outline text-danger ms-auto">
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear Workspace
              </button>
            </div>

            <!-- Ready PDF Result Card -->
            <div id="tn-cpdf-result-card" class="tn-result-box border-success bg-success-subtle d-none mt-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div id="tn-cpdf-result-summary" class="small text-dark"></div>
                <button type="button" id="tn-cpdf-download-btn" class="btn tn-btn--success btn-sm">
                  <i class="bi bi-download" aria-hidden="true"></i> Download PDF Again
                </button>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Create a PDF &amp; Organize Pages</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload Images &amp; PDF Files:</strong> Drag and drop any combination of JPG, PNG, WebP photos and existing PDF documents into the upload zone (or click <em>Load Sample PDF + Images</em> to try it immediately).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Visually Organize Pages Like Adobe Acrobat:</strong> View live thumbnails for every page. Drag cards to rearrange their sequence, rotate sideways scans 90&deg;, insert blank pages or additional files after any page, inspect pages in the zoom viewer, or delete unwanted pages.
              </li>
              <li>
                <strong>Step 3 — Create or Extract Your PDF:</strong> Choose your page size and margin settings, then click <strong>Create PDF (All Pages)</strong> to build the complete document or <strong>Export Selected Pages Only</strong> to extract checked pages.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Adobe Acrobat-Style Visual Page Organizer — 100% Free in Your Browser</h2>
            <p class="text-muted">
              Preparing a complete application package, legal filing, or project report often means combining a Word-exported PDF cover letter with smartphone photos of signed receipts, NID cards, or academic certificates. Instead of switching between separate image converters and blind PDF mergers, ToolNest's <strong>Create PDF &amp; Organize Pages</strong> workspace displays every single page—whether from a PDF or an image—in a unified visual grid.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-grid-3x3-gap text-primary me-1" aria-hidden="true"></i> Live Visual Page Thumbnails</h3>
                  <p class="small text-muted mb-0">See every page of your uploaded PDFs alongside your JPG, PNG, and WebP images before you export, eliminating guesswork.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-arrows-move text-primary me-1" aria-hidden="true"></i> Interleave PDFs &amp; Photos Freely</h3>
                  <p class="small text-muted mb-0">Drag a scanned signature image right between Page 2 and Page 3 of an existing PDF contract, or insert blank separator pages anywhere.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-zoom-in text-primary me-1" aria-hidden="true"></i> Full-Page Zoom Inspector</h3>
                  <p class="small text-muted mb-0">Click the magnifying glass on any page card to inspect fine print, step through pages, and rotate or remove pages in a large modal view.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-shield-lock text-primary me-1" aria-hidden="true"></i> Lossless Vector PDF Preservation</h3>
                  <p class="small text-muted mb-0">Existing PDF pages keep their selectable text and vector sharpness via <code>pdf-lib</code>, while all processing stays 100% on your device.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="cpdfFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="cpdfFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cpdfFaqCol1" aria-expanded="true" aria-controls="cpdfFaqCol1">
                    1. Can I mix JPG/PNG images and existing PDF files in the same document?
                  </button>
                </h3>
                <div id="cpdfFaqCol1" class="accordion-collapse collapse show" aria-labelledby="cpdfFaq1" data-bs-parent="#cpdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! You can select or drag-and-drop PDF files and images (JPG, PNG, WebP) at the same time. Multi-page PDFs are automatically split into individual visual page cards so you can place image pages anywhere between PDF pages.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cpdfFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpdfFaqCol2" aria-expanded="false" aria-controls="cpdfFaqCol2">
                    2. How do I insert a new file or blank page between two existing pages?
                  </button>
                </h3>
                <div id="cpdfFaqCol2" class="accordion-collapse collapse" aria-labelledby="cpdfFaq2" data-bs-parent="#cpdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Click the <strong>+ (Insert after this page)</strong> button on any page card to insert new images or PDF pages directly after that page, or use the toolbar buttons and drag the new pages into position.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cpdfFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpdfFaqCol3" aria-expanded="false" aria-controls="cpdfFaqCol3">
                    3. Will text in my uploaded PDF files remain selectable and sharp?
                  </button>
                </h3>
                <div id="cpdfFaqCol3" class="accordion-collapse collapse" aria-labelledby="cpdfFaq3" data-bs-parent="#cpdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. We use Mozilla <code>pdf.js</code> only to display visual thumbnails in the organizer grid. When you click <strong>Create PDF</strong>, <code>pdf-lib</code> copies the original vector PDF pages directly into your new document without rasterizing them.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cpdfFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpdfFaqCol4" aria-expanded="false" aria-controls="cpdfFaqCol4">
                    4. How do I rotate or delete multiple pages at once?
                  </button>
                </h3>
                <div id="cpdfFaqCol4" class="accordion-collapse collapse" aria-labelledby="cpdfFaq4" data-bs-parent="#cpdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Check the selection box on the top-left of the desired page cards (or use the <strong>All</strong>, <strong>Odd</strong>, or <strong>Even</strong> selection buttons in the toolbar), then click <strong>Rotate Left</strong>, <strong>Rotate Right</strong>, <strong>Duplicate</strong>, or <strong>Delete Selected</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cpdfFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cpdfFaqCol5" aria-expanded="false" aria-controls="cpdfFaqCol5">
                    5. Are my files uploaded to any cloud server?
                  </button>
                </h3>
                <div id="cpdfFaqCol5" class="accordion-collapse collapse" aria-labelledby="cpdfFaq5" data-bs-parent="#cpdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Every step—rendering thumbnails, reordering pages, rotating scans, and generating the final PDF—runs 100% locally in your browser's memory. Your files never leave your computer or phone.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_create_pdf', 'tn_create_pdf_shortcode');

function tn_currency_converter_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START (No Ads Inside) -->
          <section class="tn-tool-workspace" aria-label="Currency Converter Workspace">
            <!-- Status & One-Click Popular Pairs -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
              <span id="tn-cc-rate-status" class="badge bg-secondary-subtle text-secondary px-3 py-2">
                <i class="bi bi-database-check me-1" aria-hidden="true"></i> Reference Exchange Rates Ready
              </span>
              <div class="d-flex gap-2">
                <button type="button" id="tn-cc-refresh-btn" class="btn tn-btn--outline btn-sm py-1 px-2">
                  <i class="bi bi-arrow-repeat" aria-hidden="true"></i> Refresh Live Rates
                </button>
                <button type="button" id="tn-cc-reset-btn" class="btn tn-btn--outline btn-sm py-1 px-2">
                  <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                </button>
              </div>
            </div>

            <!-- Quick Pair Presets -->
            <div class="mb-3">
              <div class="d-flex flex-wrap gap-2">
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-cc-pair data-cc-from="USD" data-cc-to="BDT">USD &rarr; BDT</button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-cc-pair data-cc-from="SAR" data-cc-to="BDT">SAR &rarr; BDT</button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-cc-pair data-cc-from="AED" data-cc-to="BDT">AED &rarr; BDT</button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-cc-pair data-cc-from="GBP" data-cc-to="BDT">GBP &rarr; BDT</button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-cc-pair data-cc-from="EUR" data-cc-to="BDT">EUR &rarr; BDT</button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-cc-pair data-cc-from="MYR" data-cc-to="BDT">MYR &rarr; BDT</button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-cc-pair data-cc-from="INR" data-cc-to="BDT">INR &rarr; BDT</button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-cc-pair data-cc-from="BDT" data-cc-to="USD">BDT &rarr; USD</button>
              </div>
            </div>

            <!-- Main Conversion Inputs -->
            <div class="row g-3 align-items-end mb-3">
              <div class="col-md-4">
                <label for="tn-cc-amount" class="form-label fw-bold mb-1">Amount to Convert</label>
                <input type="number" id="tn-cc-amount" class="form-control form-control-lg fw-bold" value="100" min="0" step="any">
              </div>
              <div class="col-md-3">
                <label for="tn-cc-from" class="form-label fw-bold mb-1">From Currency</label>
                <select id="tn-cc-from" class="form-select"></select>
              </div>
              <div class="col-md-2 text-center">
                <button type="button" id="tn-cc-swap-btn" class="btn tn-btn--outline w-100" aria-label="Swap currencies">
                  <i class="bi bi-arrow-left-right" aria-hidden="true"></i> Swap
                </button>
              </div>
              <div class="col-md-3">
                <label for="tn-cc-to" class="form-label fw-bold mb-1">To Currency</label>
                <select id="tn-cc-to" class="form-select"></select>
              </div>
            </div>

            <!-- Custom Rate Override, Remittance Bonus & Bangla Digits Bar -->
            <div class="p-3 rounded-3 bg-light border mb-4">
              <div class="row g-3 align-items-center">
                <div class="col-md-5">
                  <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" role="switch" id="tn-cc-custom-rate-check">
                    <label class="form-check-label fw-semibold small" for="tn-cc-custom-rate-check">
                      Custom Bank / Exchange Rate (<span id="tn-cc-rate-unit-label">1 USD in BDT</span>)
                    </label>
                  </div>
                  <input type="number" id="tn-cc-custom-rate" class="form-control form-control-sm" value="120" min="0.0001" step="any" disabled aria-label="Custom exchange rate">
                </div>

                <div class="col-md-4">
                  <div class="form-check form-switch mb-1">
                    <input class="form-check-input" type="checkbox" role="switch" id="tn-cc-bonus-check">
                    <label class="form-check-label fw-semibold small" for="tn-cc-bonus-check">
                      Add Remittance Incentive (%)
                    </label>
                  </div>
                  <div class="input-group input-group-sm">
                    <input type="number" id="tn-cc-bonus-pct" class="form-control" value="2.5" min="0" max="50" step="0.1" aria-label="Remittance bonus percentage">
                    <span class="input-group-text">% Bonus</span>
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="tn-cc-bn-digits">
                    <label class="form-check-label fw-semibold small" for="tn-cc-bn-digits">
                      Bangla Digits (০-৯)
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Primary Result Card -->
            <div class="tn-result-box mb-4">
              <div class="row align-items-center g-3">
                <div class="col-md-8">
                  <div class="small text-uppercase text-muted fw-bold mb-1">Converted Amount</div>
                  <div id="tn-cc-result-primary" class="display-6 fw-bold text-primary mb-1">৳ 12,000.00 BDT</div>
                  <div id="tn-cc-result-rate-line" class="small fw-semibold text-dark">1 USD = 120.0000 BDT</div>
                  <div id="tn-cc-result-inverse-line" class="small text-muted">1 BDT = 0.008333 USD</div>
                </div>
                <div class="col-md-4 text-md-end">
                  <button type="button" id="tn-cc-copy-btn" class="btn tn-btn--primary w-100">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Result
                  </button>
                </div>
              </div>

              <!-- Remittance Bonus Breakdown (Shown when Bonus Toggle is ON) -->
              <div id="tn-cc-bonus-box" class="d-none mt-3 pt-3 border-top">
                <div class="row g-2 text-center">
                  <div class="col-sm-4">
                    <div class="p-2 rounded bg-white border">
                      <div class="small text-muted">Base Converted Amount</div>
                      <div id="tn-cc-bonus-base" class="fw-bold">৳ 12,000.00 BDT</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="p-2 rounded bg-white border">
                      <div class="small text-muted">Remittance Incentive Bonus</div>
                      <div id="tn-cc-bonus-extra" class="fw-bold text-success">+ ৳ 300.00 (2.50%)</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="p-2 rounded bg-white border border-primary">
                      <div class="small text-muted">Total Payout with Bonus</div>
                      <div id="tn-cc-bonus-total" class="fw-bold text-primary">৳ 12,300.00 BDT</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Two-Column Tables: Quick Multiples & All Currencies Comparison -->
            <div class="row g-4">
              <div class="col-md-5">
                <h2 class="h6 fw-bold mb-2">
                  <i class="bi bi-list-ol text-primary me-1" aria-hidden="true"></i> Quick Reference Multiples
                </h2>
                <div class="table-responsive">
                  <table class="table table-bordered table-sm align-middle mb-0 bg-white small">
                    <thead class="table-light">
                      <tr>
                        <th id="tn-cc-mult-from-head">USD ($)</th>
                        <th id="tn-cc-mult-to-head" class="text-end">BDT (৳)</th>
                      </tr>
                    </thead>
                    <tbody id="tn-cc-multiples-body"></tbody>
                  </table>
                </div>
              </div>

              <div class="col-md-7">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h2 class="h6 fw-bold mb-0">
                    <i class="bi bi-globe2 text-primary me-1" aria-hidden="true"></i> All Major Currencies at Once
                  </h2>
                  <button type="button" id="tn-cc-copy-table-btn" class="btn tn-btn--outline btn-sm py-1 px-2">
                    <i class="bi bi-clipboard" aria-hidden="true"></i> Copy Table
                  </button>
                </div>
                <div class="table-responsive" style="max-height: 310px; overflow-y: auto;">
                  <table class="table table-bordered table-hover table-sm align-middle mb-0 bg-white small">
                    <thead class="table-light sticky-top">
                      <tr>
                        <th>Currency</th>
                        <th class="text-end">Converted</th>
                        <th class="text-end">Unit Rate</th>
                      </tr>
                    </thead>
                    <tbody id="tn-cc-all-body"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Use the Currency &amp; Remittance Converter</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Enter Amount &amp; Select Currencies:</strong> Type the amount you want to convert and choose your <em>From</em> and <em>To</em> currencies, or click a quick pair like <strong>USD &rarr; BDT</strong>, <strong>SAR &rarr; BDT</strong>, or <strong>AED &rarr; BDT</strong>.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Optional Custom Rate or Remittance Bonus:</strong> Toggle <em>Custom Bank / Exchange Rate</em> to enter your exact bank TT or money-exchange rate, or switch on <em>Add Remittance Incentive (2.5%)</em> to calculate your government remittance bonus in Taka.
              </li>
              <li>
                <strong>Step 3 — Copy or Compare All Currencies:</strong> Click <strong>Copy Result</strong> to share the conversion breakdown, or check the <em>All Major Currencies at Once</em> table to compare 16+ currencies simultaneously.
              </li>
            </ol>
          </section>

          <!-- Detailed SEO Guide & Worked Examples (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="guide-heading">
            <h2 id="guide-heading" class="tn-section-title">Understanding Exchange Rates, Bank Spreads &amp; Bangladesh Remittance Incentives</h2>
            <p class="text-muted">
              Whether you are a freelancer withdrawing earnings from Upwork, Fiverr, or Payoneer to a Bangladeshi bank account, an expatriate worker sending remittance from Saudi Arabia, the UAE, Qatar, Oman, Malaysia, the UK, or the US, or an importer calculating landed product costs, knowing the exact exchange rate makes a major financial difference.
            </p>
            <p class="text-muted">
              Online search engines typically display the <strong>mid-market exchange rate</strong>—the midpoint between wholesale buy and sell orders on global foreign exchange markets. However, when you exchange currency through a commercial bank, credit card, or money transfer agency, the institution applies its own <em>TT Clean Rate</em>, <em>BC Selling Rate</em>, or <em>Cash Note Rate</em>. That is why ToolNest gives you both automatic live market rates and an instant <strong>Custom Exchange Rate</strong> override.
            </p>

            <h3 class="h6 fw-bold mt-3">3 Worked Currency &amp; Remittance Examples</h3>
            <div class="row g-3 my-1">
              <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h4 class="h6 fw-bold text-primary">Example 1: Freelancer USD Withdrawal</h4>
                  <p class="small text-muted mb-0">
                    Converting <strong>$500 USD</strong> at a bank TT rate of <strong>৳ 119.50</strong>:<br>
                    <code>500 &times; 119.50 = ৳ 59,750 BDT</code>.
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h4 class="h6 fw-bold text-primary">Example 2: Saudi Riyal + 2.5% Bonus</h4>
                  <p class="small text-muted mb-0">
                    Sending <strong>2,000 SAR</strong> at <strong>৳ 32.00/SAR</strong>:<br>
                    Base: <code>৳ 64,000</code><br>
                    2.5% Bonus: <code>+ ৳ 1,600</code><br>
                    <strong>Total: ৳ 65,600 BDT</strong>.
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h4 class="h6 fw-bold text-primary">Example 3: Tuition / Travel in GBP</h4>
                  <p class="small text-muted mb-0">
                    Paying <strong>£1,200 GBP</strong> at a card selling rate of <strong>৳ 156.00/GBP</strong>:<br>
                    <code>1,200 &times; 156.00 = ৳ 187,200 BDT</code>.
                  </p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="tn-card mb-4" aria-labelledby="faq-heading">
            <h2 id="faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="ccFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="ccFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ccFaqCol1" aria-expanded="true" aria-controls="ccFaqCol1">
                    1. Does this currency converter work offline or with custom bank rates?
                  </button>
                </h3>
                <div id="ccFaqCol1" class="accordion-collapse collapse show" aria-labelledby="ccFaq1" data-bs-parent="#ccFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. ToolNest automatically fetches live mid-market exchange rates when you are connected to the internet and falls back to built-in reference rates when offline. You can also turn on <strong>Custom Bank / Exchange Rate</strong> at any time to type the exact rate quoted by your bank or exchange house.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ccFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ccFaqCol2" aria-expanded="false" aria-controls="ccFaqCol2">
                    2. How does the +2.5% Bangladesh Remittance Incentive calculator work?
                  </button>
                </h3>
                <div id="ccFaqCol2" class="accordion-collapse collapse" aria-labelledby="ccFaq2" data-bs-parent="#ccFaqAccordion">
                  <div class="accordion-body text-muted">
                    When expatriates send remittance to Bangladesh through legal banking channels or licensed mobile financial services, the government provides a 2.5% cash incentive. Enabling the <strong>Add Remittance Incentive (%)</strong> switch calculates your base converted amount, the 2.5% bonus amount, and the final total payout.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ccFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ccFaqCol3" aria-expanded="false" aria-controls="ccFaqCol3">
                    3. Why is my bank or card exchange rate slightly different from the mid-market rate?
                  </button>
                </h3>
                <div id="ccFaqCol3" class="accordion-collapse collapse" aria-labelledby="ccFaq3" data-bs-parent="#ccFaqAccordion">
                  <div class="accordion-body text-muted">
                    Mid-market rates show the midpoint between global wholesale buy and sell orders. Commercial banks, dual-currency cards, and money transfer operators add a small currency conversion spread (typically 1% to 2.5%) for retail transactions.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ccFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ccFaqCol4" aria-expanded="false" aria-controls="ccFaqCol4">
                    4. Which Middle Eastern and Asian remittance currencies are supported?
                  </button>
                </h3>
                <div id="ccFaqCol4" class="accordion-collapse collapse" aria-labelledby="ccFaq4" data-bs-parent="#ccFaqAccordion">
                  <div class="accordion-body text-muted">
                    Alongside USD, EUR, GBP, CAD, and AUD, this tool supports Saudi Riyal (SAR), UAE Dirham (AED), Qatari Riyal (QAR), Omani Rial (OMR), Kuwaiti Dinar (KWD), Bahraini Dinar (BHD), Malaysian Ringgit (MYR), Singapore Dollar (SGD), and Indian Rupee (INR).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ccFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ccFaqCol5" aria-expanded="false" aria-controls="ccFaqCol5">
                    5. How can I spell out the converted BDT amount in words for a bank cheque?
                  </button>
                </h3>
                <div id="ccFaqCol5" class="accordion-collapse collapse" aria-labelledby="ccFaq5" data-bs-parent="#ccFaqAccordion">
                  <div class="accordion-body text-muted">
                    Once you convert your amount into BDT, open our <a href="../../tools/amount-to-words/index.html">Amount to Words Converter</a> to spell out the exact figure in English and Bangla using Lakh and Crore formatting.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_currency_converter', 'tn_currency_converter_shortcode');

function tn_cv_maker_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace tn-no-print" aria-label="CV Maker Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Resume Details Never Leave Your Browser
            </span>
            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Add details</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Add experience</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Print or save PDF</div>
            </div>
            <form id="tn-cv-form">
              <div class="row g-3 mb-3">
                <div class="col-md-6"><label class="form-label" for="tn-cv-name">Full Name</label><input id="tn-cv-name" class="form-control" placeholder="Your full name"></div>
                <div class="col-md-6"><label class="form-label" for="tn-cv-role">Professional Title</label><input id="tn-cv-role" class="form-control" placeholder="Software Engineer"></div>
                <div class="col-md-4"><label class="form-label" for="tn-cv-email">Email</label><input id="tn-cv-email" class="form-control" placeholder="you@example.com"></div>
                <div class="col-md-4"><label class="form-label" for="tn-cv-phone">Phone</label><input id="tn-cv-phone" class="form-control" placeholder="+880 1711 000000"></div>
                <div class="col-md-4"><label class="form-label" for="tn-cv-location">Location</label><input id="tn-cv-location" class="form-control" placeholder="Dhaka, Bangladesh"></div>
                <div class="col-md-6"><label class="form-label" for="tn-cv-website">LinkedIn / Portfolio</label><input id="tn-cv-website" class="form-control" placeholder="linkedin.com/in/yourname"></div>
                <div class="col-md-6"><label class="form-label" for="tn-cv-languages">Languages <span class="text-muted">(comma separated)</span></label><input id="tn-cv-languages" class="form-control" placeholder="English — Fluent, Bangla — Native"></div>
                <div class="col-12"><label class="form-label" for="tn-cv-summary">Professional Summary</label><textarea id="tn-cv-summary" class="form-control" rows="3"></textarea></div>
                <div class="col-12"><label class="form-label" for="tn-cv-skills">Skills <span class="text-muted">(comma separated)</span></label><input id="tn-cv-skills" class="form-control" placeholder="JavaScript, Communication"></div>
              </div>
              <div class="border rounded-3 p-3 mb-3">
                <div class="d-flex justify-content-between">
                  <h2 class="h6 fw-bold">Work Experience</h2><button type="button" id="tn-cv-add-experience" class="btn tn-btn--outline btn-sm">Add Experience</button>
                </div>
                <div id="tn-cv-experience"></div>
              </div>
              <div class="border rounded-3 p-3">
                <div class="d-flex justify-content-between"><h2 class="h6 fw-bold">Education</h2><button type="button" id="tn-cv-add-education" class="btn tn-btn--outline btn-sm">Add Education</button></div><div id="tn-cv-education"></div>
              </div>
              <div class="border rounded-3 p-3 mt-3"><div class="d-flex justify-content-between"><h2 class="h6 fw-bold">Certifications</h2><button type="button" id="tn-cv-add-certification" class="btn tn-btn--outline btn-sm">Add Certification</button></div><div id="tn-cv-certifications"></div></div>
              <div class="border rounded-3 p-3 mt-3"><div class="d-flex justify-content-between"><h2 class="h6 fw-bold">Projects</h2><button type="button" id="tn-cv-add-project" class="btn tn-btn--outline btn-sm">Add Project</button></div><div id="tn-cv-projects"></div></div>
              <div class="tn-cv-template-picker border rounded-3 p-3 mt-3"><div class="fw-bold mb-2">Choose CV Template</div><div class="row g-3"><div class="col-sm-4"><button type="button" class="tn-cv-template-card is-selected" data-cv-template="creative"><span class="tn-cv-thumb tn-cv-thumb-creative"><i></i><b></b><em></em></span><span>Creative Dark Hero</span></button></div><div class="col-sm-4"><button type="button" class="tn-cv-template-card" data-cv-template="classic"><span class="tn-cv-thumb tn-cv-thumb-classic"><i></i><b></b><em></em></span><span>Classic Blue Professional</span></button></div><div class="col-sm-4"><button type="button" class="tn-cv-template-card" data-cv-template="bluegray"><span class="tn-cv-thumb tn-cv-thumb-bluegray"><i></i><b></b><em></em></span><span>Blue &amp; Gray Simple</span></button></div></div><select id="tn-cv-template" class="visually-hidden" aria-label="Selected CV template"><option value="creative" selected>Creative Dark Hero</option><option value="classic">Classic Blue Professional</option><option value="bluegray">Blue &amp; Gray Simple</option></select></div>
              <div class="d-flex gap-2 mt-3"><button type="button" id="tn-cv-print" class="btn tn-btn--primary">Print / Save PDF</button><button type="button" id="tn-cv-reset" class="btn tn-btn--outline text-danger">Reset</button></div>
            </form>
          </section>

          <div class="mt-4 mb-4">
            <aside class="tn-cv-preview tn-printable-area" id="tn-cv-preview">
              <div class="tn-cv-hero"><div class="tn-cv-hero-main"><div class="tn-cv-kicker">✦ PROFESSIONAL RESUME</div><h2 id="tn-cv-name-out">Your Name</h2><div id="tn-cv-role-out" class="tn-cv-tagline">Professional Title</div></div><div id="tn-cv-contact-out" class="tn-cv-contact"></div></div>
              <div class="tn-cv-body"><div class="tn-cv-main"><h3 class="tn-cv-section-title">Profile</h3><p id="tn-cv-summary-out" class="tn-cv-profile"></p><h3 class="tn-cv-section-title">Experience</h3><div id="tn-cv-experience-out"></div><h3 class="tn-cv-section-title">Education</h3><div id="tn-cv-education-out"></div><h3 class="tn-cv-section-title">Projects</h3><div id="tn-cv-projects-out"></div></div><div class="tn-cv-side"><h3 class="tn-cv-section-title">Skills</h3><div id="tn-cv-skills-out" class="tn-cv-chips"></div><h3 class="tn-cv-section-title">Languages</h3><ul id="tn-cv-languages-out" class="tn-cv-list"></ul><h3 class="tn-cv-section-title">Certifications</h3><ul id="tn-cv-certifications-out" class="tn-cv-list"></ul></div></div>
            </aside>
          </div>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <div class="tn-no-print"><?php toolnest_render_incontent_ad_slot(); ?></div>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4 tn-no-print" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Build &amp; Download Your CV</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Enter Your Personal &amp; Contact Info:</strong> Fill in your name, professional title, email, phone number, location, skills, and a concise career summary.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Add Experience, Education &amp; Projects:</strong> Click the <em>Add Experience</em>, <em>Add Education</em>, <em>Add Certification</em>, and <em>Add Project</em> buttons to list your background.
              </li>
              <li>
                <strong>Step 3 — Choose a Template &amp; Save as PDF:</strong> Pick one of the three resume styles and click <strong>Print / Save PDF</strong> to export a clean A4 resume using your browser's print dialog.
              </li>
            </ol>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4 tn-no-print" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="cvFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="cvFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cvFaqCol1" aria-expanded="true" aria-controls="cvFaqCol1">
                    1. How do I download my CV as a PDF?
                  </button>
                </h3>
                <div id="cvFaqCol1" class="accordion-collapse collapse show" aria-labelledby="cvFaq1" data-bs-parent="#cvFaqAccordion">
                  <div class="accordion-body text-muted">
                    Click the <strong>Print / Save PDF</strong> button and choose <strong>Save as PDF</strong> in your browser's print dialog. Only the formatted resume preview is included in the printout.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cvFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cvFaqCol2" aria-expanded="false" aria-controls="cvFaqCol2">
                    2. Are my personal details and resume saved on any server?
                  </button>
                </h3>
                <div id="cvFaqCol2" class="accordion-collapse collapse" aria-labelledby="cvFaq2" data-bs-parent="#cvFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Everything runs 100% locally in your browser. Your phone number, email, and work history are never uploaded or stored on any server.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cvFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cvFaqCol3" aria-expanded="false" aria-controls="cvFaqCol3">
                    3. Can I switch between different CV templates?
                  </button>
                </h3>
                <div id="cvFaqCol3" class="accordion-collapse collapse" aria-labelledby="cvFaq3" data-bs-parent="#cvFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. You can switch between <em>Creative Dark Hero</em>, <em>Classic Blue Professional</em>, and <em>Blue &amp; Gray Simple</em> at any time without losing your entered information.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cvFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cvFaqCol4" aria-expanded="false" aria-controls="cvFaqCol4">
                    4. Can I add multiple work experiences, projects, and certifications?
                  </button>
                </h3>
                <div id="cvFaqCol4" class="accordion-collapse collapse" aria-labelledby="cvFaq4" data-bs-parent="#cvFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Click the <strong>Add Experience</strong>, <strong>Add Education</strong>, <strong>Add Certification</strong>, and <strong>Add Project</strong> buttons to add or remove as many items as you need.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cvFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cvFaqCol5" aria-expanded="false" aria-controls="cvFaqCol5">
                    5. How do I keep background colors when saving as PDF?
                  </button>
                </h3>
                <div id="cvFaqCol5" class="accordion-collapse collapse" aria-labelledby="cvFaq5" data-bs-parent="#cvFaqAccordion">
                  <div class="accordion-body text-muted">
                    In your browser's print dialog, open <strong>More settings</strong> and enable <strong>Background graphics</strong> so the header banner and sidebar colors appear in the exported PDF.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_cv_maker', 'tn_cv_maker_shortcode');

function tn_developer_webmaster_tools_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Developer &amp; Webmaster Tools Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Code, Tokens &amp; Hashes Stay in Your Browser
            </span>
            <div class="dw-grid">
              <section id="json-formatter" class="dw-card dw-section"><h2>JSON Formatter</h2><textarea id="dw-json-input" class="form-control mb-2" placeholder='{"name":"ToolNest","free":true}'></textarea><div class="d-flex gap-2 mb-2"><button id="dw-json-format" class="btn tn-btn--primary">Format</button><button id="dw-json-minify" class="btn tn-btn--outline">Minify</button></div><textarea id="dw-json-output" class="form-control" readonly></textarea></section>
              <section id="base64-encoder" class="dw-card dw-section"><h2>Base64 Encoder / Decoder</h2><textarea id="dw-base64-input" class="form-control mb-2" placeholder="Text or Base64 input"></textarea><div class="d-flex gap-2 mb-2"><button id="dw-base64-encode" class="btn tn-btn--primary">Encode</button><button id="dw-base64-decode" class="btn tn-btn--outline">Decode</button></div><textarea id="dw-base64-output" class="form-control" readonly></textarea></section>
              <section id="url-encoder" class="dw-card dw-section"><h2>URL Encoder / Decoder</h2><textarea id="dw-url-input" class="form-control mb-2" placeholder="https://example.com/?q=hello world"></textarea><div class="d-flex gap-2 mb-2"><button id="dw-url-encode" class="btn tn-btn--primary">Encode</button><button id="dw-url-decode" class="btn tn-btn--outline">Decode</button></div><textarea id="dw-url-output" class="form-control" readonly></textarea></section>
              <section id="password-generator" class="dw-card dw-section"><h2>Password Generator</h2><label class="form-label" for="dw-password-length">Length</label><input id="dw-password-length" type="number" class="form-control mb-2" value="16" min="6" max="128"><div class="input-group"><input id="dw-password-output" class="form-control" readonly><button id="dw-password-generate" class="btn tn-btn--primary">Generate</button></div></section>
              <section id="uuid-generator" class="dw-card dw-section"><h2>UUID Generator</h2><div class="input-group"><input id="dw-uuid-output" class="form-control" readonly placeholder="Click Generate"><button id="dw-uuid-generate" class="btn tn-btn--primary">Generate</button></div></section>
              <section id="hash-generator" class="dw-card dw-section"><h2>Hash Generator</h2><textarea id="dw-hash-input" class="form-control mb-2" placeholder="Text to hash"></textarea><div class="input-group"><select id="dw-hash-algorithm" class="form-select"><option value="SHA-256">SHA-256</option><option value="SHA-384">SHA-384</option><option value="SHA-512">SHA-512</option></select><button id="dw-hash-generate" class="btn tn-btn--primary">Hash</button></div><textarea id="dw-hash-output" class="form-control mt-2" readonly></textarea></section>
              <section id="meta-tag-generator" class="dw-card dw-section"><h2>Meta Tag Generator &amp; SERP Preview</h2><input id="dw-meta-title" class="form-control mb-2" placeholder="Page title"><input id="dw-meta-description" class="form-control mb-2" placeholder="Meta description"><input id="dw-meta-url" class="form-control mb-2" placeholder="Canonical URL"><input id="dw-meta-image" class="form-control mb-2" placeholder="Social image URL"><textarea id="dw-meta-output" class="form-control mb-2" readonly></textarea><div class="border rounded p-2"><strong id="dw-serp-title">Page title preview</strong><p id="dw-serp-description" class="small text-muted mb-0">Search result description preview.</p></div></section>
              <section id="robots-generator" class="dw-card dw-section"><h2>robots.txt Generator</h2><input id="dw-robots-agent" class="form-control mb-2" value="*" placeholder="User-agent"><input id="dw-robots-disallow" class="form-control mb-2" value="/admin/" placeholder="Disallow path"><input id="dw-robots-sitemap" class="form-control mb-2" placeholder="https://example.com/sitemap.xml"><button id="dw-robots-generate" class="btn tn-btn--primary mb-2">Generate</button><textarea id="dw-robots-output" class="form-control" readonly></textarea></section>
              <section id="gradient-generator" class="dw-card dw-section"><h2>CSS Gradient Generator</h2><div id="dw-gradient-preview" class="dw-gradient mb-2"></div><div class="row g-2"><div class="col-4"><input id="dw-gradient-a" type="color" class="form-control form-control-color" value="#2563eb"></div><div class="col-4"><input id="dw-gradient-b" type="color" class="form-control form-control-color" value="#f59e0b"></div><div class="col-4"><input id="dw-gradient-angle" type="number" class="form-control" value="90"></div></div><input id="dw-gradient-output" class="form-control mt-2" readonly></section>
              <section id="color-format-converter" class="dw-card dw-section"><h2>Color Format Converter</h2><input id="dw-color-hex" class="form-control mb-2" value="#2563EB" placeholder="#RRGGBB"><pre id="dw-color-output" class="bg-light p-3 rounded mb-0"></pre><a href="../color-picker/index.html" class="small">Open full Color Picker &amp; Eyedropper →</a></section>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Use the Developer &amp; Webmaster Suite</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Pick Your Utility Card:</strong> Scroll to the JSON Formatter, Base64/URL Encoder, Password/UUID/Hash Generator, SEO Meta/robots.txt Builder, or CSS Color/Gradient card.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Enter Input or Adjust Controls:</strong> Paste your string, JSON payload, URL, or color values and click the action button.
              </li>
              <li>
                <strong>Step 3 — Copy Your Result:</strong> Copy the formatted output directly from the read-only result field for use in your code or website.
              </li>
            </ol>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="dwFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="dwFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dwFaqCol1" aria-expanded="true" aria-controls="dwFaqCol1">
                    1. What utilities are included on the Developer &amp; Webmaster Tools page?
                  </button>
                </h3>
                <div id="dwFaqCol1" class="accordion-collapse collapse show" aria-labelledby="dwFaq1" data-bs-parent="#dwFaqAccordion">
                  <div class="accordion-body text-muted">
                    This all-in-one page includes a JSON Formatter &amp; Minifier, Base64 Encoder/Decoder, URL Encoder/Decoder, Password Generator, UUID v4 Generator, SHA Hash Generator, Meta Tag &amp; SERP Preview, robots.txt Generator, CSS Gradient Builder, and HEX/RGB Color Converter.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dwFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dwFaqCol2" aria-expanded="false" aria-controls="dwFaqCol2">
                    2. Are JSON payloads, passwords, or hashes sent to any server?
                  </button>
                </h3>
                <div id="dwFaqCol2" class="accordion-collapse collapse" aria-labelledby="dwFaq2" data-bs-parent="#dwFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Every utility on this page executes 100% locally in your browser using native JavaScript and Web Crypto APIs.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dwFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dwFaqCol3" aria-expanded="false" aria-controls="dwFaqCol3">
                    3. Which cryptographic hash algorithms are supported?
                  </button>
                </h3>
                <div id="dwFaqCol3" class="accordion-collapse collapse" aria-labelledby="dwFaq3" data-bs-parent="#dwFaqAccordion">
                  <div class="accordion-body text-muted">
                    The Hash Generator uses the browser's built-in <code>crypto.subtle.digest</code> API to compute hexadecimal SHA-256, SHA-384, and SHA-512 hashes.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dwFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dwFaqCol4" aria-expanded="false" aria-controls="dwFaqCol4">
                    4. Does ToolNest also have dedicated pages for JSON, Passwords, Meta Tags, and robots.txt?
                  </button>
                </h3>
                <div id="dwFaqCol4" class="accordion-collapse collapse" aria-labelledby="dwFaq4" data-bs-parent="#dwFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Use the compact cards here when working on multiple tasks at once, or open our standalone JSON Formatter, Password Generator, Meta Tag Generator, and Robots.txt Generator pages for expanded controls.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dwFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dwFaqCol5" aria-expanded="false" aria-controls="dwFaqCol5">
                    5. Does Base64 encoding support Unicode and Bangla text?
                  </button>
                </h3>
                <div id="dwFaqCol5" class="accordion-collapse collapse" aria-labelledby="dwFaq5" data-bs-parent="#dwFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. The Base64 encoder and decoder process UTF-8 strings so Bangla and international characters encode and decode cleanly.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_developer_webmaster_tools', 'tn_developer_webmaster_tools_shortcode');

function tn_discount_vat_profit_calculator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Discount, VAT and Profit Calculator Workspace">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
              <span class="tn-privacy-banner mb-0">
                <i class="bi bi-shield-check" aria-hidden="true"></i>
                100% Client-Side &bull; Financial Figures Never Leave Your Browser
              </span>
              <div class="d-flex align-items-center gap-2">
                <label for="tn-dvp-currency" class="small fw-bold text-muted mb-0">Currency:</label>
                <select id="tn-dvp-currency" class="form-select form-select-sm" style="width: auto; min-height: 38px;"></select>
              </div>
            </div>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Select Calculator Tab</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Enter Price, VAT or Cost</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> View &amp; Copy Breakdown</div>
            </div>

            <!-- 3 Tabs Navigation -->
            <ul class="nav nav-pills nav-fill gap-2 p-2 bg-light rounded-3 border mb-4" id="dvpTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold" id="tab-disc-btn" data-bs-toggle="pill" data-bs-target="#pane-discount" type="button" role="tab" aria-controls="pane-discount" aria-selected="true">
                  <i class="bi bi-tag-fill me-1" aria-hidden="true"></i> 1. Discount
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="tab-vat-btn" data-bs-toggle="pill" data-bs-target="#pane-vat" type="button" role="tab" aria-controls="pane-vat" aria-selected="false">
                  <i class="bi bi-percent me-1" aria-hidden="true"></i> 2. VAT Calculator
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="tab-prof-btn" data-bs-toggle="pill" data-bs-target="#pane-profit" type="button" role="tab" aria-controls="pane-profit" aria-selected="false">
                  <i class="bi bi-graph-up-arrow me-1" aria-hidden="true"></i> 3. Profit &amp; F-Commerce
                </button>
              </li>
            </ul>

            <div class="tab-content" id="dvpTabContent">
              <!-- TAB 1: DISCOUNT CALCULATOR -->
              <div class="tab-pane fade show active" id="pane-discount" role="tabpanel" aria-labelledby="tab-disc-btn">
                <div class="row g-3 mb-4">
                  <div class="col-md-6">
                    <label for="tn-disc-orig" class="form-label fw-bold">Original Price</label>
                    <input type="number" id="tn-disc-orig" class="form-control" value="2500" min="0" step="any">
                  </div>
                  <div class="col-md-6">
                    <label for="tn-disc-type" class="form-label fw-bold">Primary Discount Type</label>
                    <select id="tn-disc-type" class="form-select">
                      <option value="percent" selected>Percentage Off (%)</option>
                      <option value="amount">Fixed Cash Discount Amount</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="tn-disc-val" class="form-label fw-bold">Primary Discount Value</label>
                    <input type="number" id="tn-disc-val" class="form-control" value="20" min="0" step="any">
                  </div>
                  <div class="col-md-6">
                    <label for="tn-disc-extra" class="form-label fw-bold">Optional 2nd Stacked Discount (%)</label>
                    <input type="number" id="tn-disc-extra" class="form-control" value="0" min="0" max="100" step="any" placeholder="e.g. 5 for extra coupon">
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-sm-4">
                    <div class="tn-stat-card border-primary bg-primary-subtle">
                      <div id="tn-disc-final" class="tn-stat-card__value">৳ 2,000.00</div>
                      <div class="tn-stat-card__label">Final Payable Price</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-disc-saved" class="tn-stat-card__value text-success">৳ 500.00</div>
                      <div class="tn-stat-card__label">Total Amount Saved</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-disc-eff" class="tn-stat-card__value">20%</div>
                      <div class="tn-stat-card__label">Effective Discount %</div>
                    </div>
                  </div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-disc-copy-btn" class="btn tn-btn--primary btn-sm">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Discount Result
                  </button>
                  <button type="button" id="tn-disc-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>
              </div>

              <!-- TAB 2: VAT CALCULATOR -->
              <div class="tab-pane fade" id="pane-vat" role="tabpanel" aria-labelledby="tab-vat-btn">
                <div class="alert alert-warning d-flex align-items-center gap-2 py-2 px-3 mb-3 small" role="note">
                  <i class="bi bi-info-circle-fill text-warning fs-5" aria-hidden="true"></i>
                  <div>
                    <strong>Official NBR Note:</strong> Check the current VAT rate and rules with the National Board of Revenue (NBR) before using this for official purposes.
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label for="tn-vat-amount" class="form-label fw-bold">Price Amount</label>
                    <input type="number" id="tn-vat-amount" class="form-control" value="1000" min="0" step="any">
                  </div>
                  <div class="col-md-4">
                    <label for="tn-vat-rate" class="form-label fw-bold">VAT Rate (%) — Editable</label>
                    <div class="input-group">
                      <input type="number" id="tn-vat-rate" class="form-control" value="15" min="0" max="100" step="any">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="tn-vat-mode" class="form-label fw-bold">Calculation Operation</label>
                    <select id="tn-vat-mode" class="form-select">
                      <option value="add" selected>Add VAT (Price is VAT-Exclusive)</option>
                      <option value="remove">Remove VAT (Price is VAT-Inclusive)</option>
                    </select>
                  </div>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-1 mb-4">
                  <span class="small text-muted me-1">Quick VAT Rates:</span>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-vat-preset="5">5%</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-vat-preset="7.5">7.5%</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-vat-preset="10">10%</button>
                  <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2 fw-semibold" data-vat-preset="15">15% (Standard)</button>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-vat-net" class="tn-stat-card__value">৳ 1,000.00</div>
                      <div class="tn-stat-card__label">Net Price (Excl. VAT)</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-vat-tax" class="tn-stat-card__value text-danger">৳ 150.00</div>
                      <div class="tn-stat-card__label">VAT Amount</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card border-primary bg-primary-subtle">
                      <div id="tn-vat-gross" class="tn-stat-card__value">৳ 1,150.00</div>
                      <div class="tn-stat-card__label">Gross Price (Incl. VAT)</div>
                    </div>
                  </div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-vat-copy-btn" class="btn tn-btn--primary btn-sm">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy VAT Breakdown
                  </button>
                  <button type="button" id="tn-vat-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>
              </div>

              <!-- TAB 3: PROFIT MARGIN & F-COMMERCE NET PROFIT -->
              <div class="tab-pane fade" id="pane-profit" role="tabpanel" aria-labelledby="tab-prof-btn">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label for="tn-prof-mode" class="form-label fw-bold">Calculation Mode</label>
                    <select id="tn-prof-mode" class="form-select">
                      <option value="standard" selected>Cost + Selling &rarr; Margin %</option>
                      <option value="reverse">Reverse: Cost + Target Margin % &rarr; Selling Price</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tn-prof-cost" class="form-label fw-bold">Product Cost Price</label>
                    <input type="number" id="tn-prof-cost" class="form-control" value="600" min="0" step="any">
                  </div>
                  <div id="tn-prof-sell-wrap" class="col-md-4">
                    <label for="tn-prof-sell" class="form-label fw-bold">Selling Price</label>
                    <input type="number" id="tn-prof-sell" class="form-control" value="1100" min="0" step="any">
                  </div>
                  <div id="tn-prof-target-wrap" class="col-md-4 d-none">
                    <label for="tn-prof-target" class="form-label fw-bold">Target Gross Margin (%)</label>
                    <input type="number" id="tn-prof-target" class="form-control" value="40" min="0" max="99.9" step="any">
                  </div>
                </div>

                <!-- Optional F-Commerce Extra Cost Fields -->
                <div class="p-3 rounded-3 border bg-light mb-3">
                  <h2 class="h6 fw-bold text-primary mb-2">
                    <i class="bi bi-box-seam me-1" aria-hidden="true"></i> Optional F-Commerce / E-Commerce Per-Order Costs
                  </h2>
                  <div class="row g-3">
                    <div class="col-6 col-md-3">
                      <label for="tn-prof-delivery" class="form-label small fw-bold mb-1">Delivery / Courier</label>
                      <input type="number" id="tn-prof-delivery" class="form-control form-control-sm" value="80" min="0" step="any">
                    </div>
                    <div class="col-6 col-md-3">
                      <label for="tn-prof-pack" class="form-label small fw-bold mb-1">Packaging Cost</label>
                      <input type="number" id="tn-prof-pack" class="form-control form-control-sm" value="25" min="0" step="any">
                    </div>
                    <div class="col-6 col-md-3">
                      <label for="tn-prof-ad" class="form-label small fw-bold mb-1">Ad Cost / Order</label>
                      <input type="number" id="tn-prof-ad" class="form-control form-control-sm" value="90" min="0" step="any">
                    </div>
                    <div class="col-6 col-md-3">
                      <label for="tn-prof-return" class="form-label small fw-bold mb-1">Return Allowance</label>
                      <input type="number" id="tn-prof-return" class="form-control form-control-sm" value="35" min="0" step="any">
                    </div>
                  </div>
                </div>

                <!-- Profit Results Grid -->
                <div class="row g-3 mb-3">
                  <div class="col-6 col-md-3">
                    <div class="tn-stat-card py-2">
                      <div id="tn-prof-out-selling" class="tn-stat-card__value fs-5">৳ 1,100.00</div>
                      <div class="tn-stat-card__label">Selling Price</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="tn-stat-card py-2">
                      <div id="tn-prof-out-gross" class="tn-stat-card__value fs-5">৳ 500.00</div>
                      <div class="tn-stat-card__label">Gross Profit</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="tn-stat-card py-2">
                      <div id="tn-prof-out-margin" class="tn-stat-card__value fs-5">45.45%</div>
                      <div class="tn-stat-card__label">Gross Margin %</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="tn-stat-card py-2">
                      <div id="tn-prof-out-markup" class="tn-stat-card__value fs-5">83.33%</div>
                      <div class="tn-stat-card__label">Markup %</div>
                    </div>
                  </div>
                </div>

                <div class="tn-result-box border-success bg-success-subtle mb-3 text-center">
                  <div class="small fw-bold text-uppercase text-success">True F-Commerce Net Profit Per Order</div>
                  <div id="tn-prof-out-net" class="tn-stat-card__value text-success">৳ 270.00</div>
                  <div id="tn-prof-out-net-margin" class="small text-muted">Net Margin: 24.55% (Extra Costs: ৳ 230.00)</div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-prof-copy-btn" class="btn tn-btn--primary btn-sm">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Profit Summary
                  </button>
                  <button type="button" id="tn-prof-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Use the Discount, VAT &amp; Profit Calculator</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Pick Your Currency &amp; Tab:</strong> Keep the default <strong>৳ (BDT)</strong> currency or switch to USD/EUR/INR, then choose between the <em>Discount</em>, <em>VAT</em>, or <em>Profit &amp; F-Commerce</em> tabs.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Enter Your Price or Cost Numbers:</strong> Type your original price, editable VAT rate, or product and courier costs. Every stat card updates in real time.
              </li>
              <li>
                <strong>Step 3 — Copy Your Summary:</strong> Click the <strong>Copy</strong> button to paste the formatted calculation into your quotation, invoice, or pricing spreadsheet.
              </li>
            </ol>
          </section>

          <!-- Explanation of Each Formula & F-Commerce Guide (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Formulas Explained: Discount, VAT Extraction, Margin vs. Markup &amp; F-Commerce Net Profit</h2>
            <p class="text-muted">
              Accurate pricing is the difference between a profitable online store and selling at a hidden loss. Many Facebook commerce (F-commerce) and Daraz/Shopify merchants calculate gross product profit (`Selling Price - Sourcing Cost`) without accounting for Steadfast/Pathao/RedX courier fees, bubble-wrap packaging, Facebook ad cost per conversion, and COD parcel return losses. ToolNest gives you transparent formulas for every scenario:
            </p>

            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-tag text-primary me-1" aria-hidden="true"></i> 1. Discount &amp; Stacked Discount Formula</h3>
                  <p class="small text-muted mb-0">
                    <code>Discount = Price &times; (Discount% &divide; 100)</code><br>
                    <code>After 1st = Price &minus; Discount</code><br>
                    <code>2nd Discount = After 1st &times; (Extra% &divide; 100)</code>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-percent text-primary me-1" aria-hidden="true"></i> 2. Add VAT vs. Remove Inclusive VAT</h3>
                  <p class="small text-muted mb-0">
                    <strong>Add VAT:</strong> <code>Gross = Net &times; (1 + Rate/100)</code><br>
                    <strong>Remove VAT:</strong> <code>Net = Gross &divide; (1 + Rate/100)</code><br>
                    <code>VAT Amount = Gross &minus; Net</code>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-calculator text-primary me-1" aria-hidden="true"></i> 3. Profit Margin % vs. Markup %</h3>
                  <p class="small text-muted mb-0">
                    <code>Gross Profit = Selling &minus; Cost</code><br>
                    <code>Margin % = (Gross Profit &divide; Selling) &times; 100</code><br>
                    <code>Markup % = (Gross Profit &divide; Cost) &times; 100</code><br>
                    <strong>Reverse Selling Price:</strong> <code>Cost &divide; (1 &minus; Target Margin%)</code>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-truck text-primary me-1" aria-hidden="true"></i> 4. F-Commerce Net Profit Formula</h3>
                  <p class="small text-muted mb-0">
                    <code>Net Profit = Gross Profit &minus; (Delivery + Packaging + Ad Cost + Return Allowance)</code><br>
                    <code>Net Margin % = (Net Profit &divide; Selling) &times; 100</code>
                  </p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="dvpFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol1" aria-expanded="true" aria-controls="dvpFaqCol1">
                    1. How do I remove VAT from a VAT-inclusive price?
                  </button>
                </h3>
                <div id="dvpFaqCol1" class="accordion-collapse collapse show" aria-labelledby="dvpFaq1" data-bs-parent="#dvpFaqAccordion">
                  <div class="accordion-body text-muted">
                    Select <strong>Remove VAT (Price is VAT-Inclusive)</strong> in the VAT tab. Instead of subtracting 15% directly, the tool divides the gross amount by <code>1 + (VAT Rate / 100)</code> (e.g., dividing <code>৳ 1,150</code> by <code>1.15</code> gives a net price of <code>৳ 1,000</code> and VAT of <code>৳ 150</code>).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol2" aria-expanded="false" aria-controls="dvpFaqCol2">
                    2. What is the difference between Profit Margin % and Markup %?
                  </button>
                </h3>
                <div id="dvpFaqCol2" class="accordion-collapse collapse" aria-labelledby="dvpFaq2" data-bs-parent="#dvpFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>Profit Margin %</strong> divides profit by the <em>Selling Price</em>, while <strong>Markup %</strong> divides profit by the <em>Cost Price</em>. For example, buying an item for ৳ 100 and selling it for ৳ 150 gives a <strong>50% Markup</strong> but a <strong>33.33% Profit Margin</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol3" aria-expanded="false" aria-controls="dvpFaqCol3">
                    3. How does the Reverse Target Margin mode work?
                  </button>
                </h3>
                <div id="dvpFaqCol3" class="accordion-collapse collapse" aria-labelledby="dvpFaq3" data-bs-parent="#dvpFaqAccordion">
                  <div class="accordion-body text-muted">
                    When you switch to <strong>Reverse: Cost + Target Margin % &rarr; Selling Price</strong>, enter your product cost and desired gross margin percentage (e.g. 40%). The calculator computes the exact selling price needed using <code>Cost &divide; (1 &minus; 0.40)</code>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol4" aria-expanded="false" aria-controls="dvpFaqCol4">
                    4. Why should F-commerce sellers enter a Return / Failure Allowance?
                  </button>
                </h3>
                <div id="dvpFaqCol4" class="accordion-collapse collapse" aria-labelledby="dvpFaq4" data-bs-parent="#dvpFaqFaqAccordion">
                  <div class="accordion-body text-muted">
                    In cash-on-delivery (COD) e-commerce, if 10% of parcels are returned uncollected, the seller still pays the courier charge for those failed deliveries. Adding a small per-order return allowance (e.g. ৳ 25–৳ 40) reveals your true sustainable net profit.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol5" aria-expanded="false" aria-controls="dvpFaqCol5">
                    5. Can I change the VAT rate to match specific NBR slabs?
                  </button>
                </h3>
                <div id="dvpFaqCol5" class="accordion-collapse collapse" aria-labelledby="dvpFaq5" data-bs-parent="#dvpFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. The VAT rate field is completely editable—type any rate (such as 5%, 7.5%, 10%, or 15%) or click the quick preset buttons. Always verify official NBR rules for your specific business sector.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_discount_vat_profit_calculator', 'tn_discount_vat_profit_calculator_shortcode');

function tn_document_scanner_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="AI Document Scanner and Auto-Enhancer Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side Document Scanner &bull; Your Confidential Documents Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Upload Document Photo</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Adjust 4 Corners &amp; Filter</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download Clean PDF / PNG</div>
            </div>

            <!-- 1. Drag and Drop Upload Zone -->
            <div id="tn-dscan-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop a document photo">
              <i class="bi bi-bounding-box tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop a Photo of Any Document, Receipt, or ID</h2>
              <p class="small text-muted mb-3">Supports JPEG, PNG, and WebP. Even angled or shadowed desk photos work great.</p>
              <div class="d-flex flex-wrap justify-content-center gap-2">
                <label for="tn-dscan-file" class="btn tn-btn--primary mb-0">
                  <i class="bi bi-camera" aria-hidden="true"></i> Choose Document Photo
                </label>
                <button type="button" id="tn-dscan-sample-btn" class="btn tn-btn--outline">
                  <i class="bi bi-magic" aria-hidden="true"></i> Load Sample Shadowed Document
                </button>
              </div>
              <input id="tn-dscan-file" class="d-none" type="file" accept="image/jpeg,image/png,image/webp">
            </div>

            <p id="tn-dscan-status" class="small text-muted mb-3" role="status" aria-live="polite">
              Upload a document photo or click "Load Sample Shadowed Document" to start scanning.
            </p>

            <!-- 2. Interactive Scanner Workspace (Hidden until image loaded) -->
            <div id="tn-dscan-workspace" class="d-none">
              <!-- Enhancement Mode & Corner Controls Bar -->
              <div class="p-3 rounded-3 border bg-light mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                  <div>
                    <span class="fw-bold small text-primary d-block">
                      <i class="bi bi-Sliders me-1" aria-hidden="true"></i> Scan Enhancement Filter
                    </span>
                  </div>
                  <div class="btn-group btn-group-sm flex-wrap" role="group" aria-label="Enhancement filter mode">
                    <button type="button" class="btn tn-btn--outline tn-dscan-mode-btn active" data-mode="magic">
                      <i class="bi bi-stars" aria-hidden="true"></i> Magic Color (Remove Shadows)
                    </button>
                    <button type="button" class="btn tn-btn--outline tn-dscan-mode-btn" data-mode="bw">
                      <i class="bi bi-file-earmark-font" aria-hidden="true"></i> B&amp;W Document
                    </button>
                    <button type="button" class="btn tn-btn--outline tn-dscan-mode-btn" data-mode="gray">
                      <i class="bi bi-circle-half" aria-hidden="true"></i> Clean Grayscale
                    </button>
                    <button type="button" class="btn tn-btn--outline tn-dscan-mode-btn" data-mode="original">
                      <i class="bi bi-image" aria-hidden="true"></i> Original Color
                    </button>
                  </div>
                </div>

                <div class="row g-3 align-items-center">
                  <div class="col-sm-6 col-md-4">
                    <div class="d-flex justify-content-between small mb-1">
                      <label for="tn-dscan-whiteness" class="fw-semibold">Shadow Clean / Whiteness</label>
                      <span id="tn-dscan-whiteness-val" class="text-primary fw-bold">75%</span>
                    </div>
                    <input type="range" id="tn-dscan-whiteness" class="form-range" min="10" max="100" value="75">
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="d-flex justify-content-between small mb-1">
                      <label for="tn-dscan-contrast" class="fw-semibold">Ink Contrast &amp; Sharpness</label>
                      <span id="tn-dscan-contrast-val" class="text-primary fw-bold">60%</span>
                    </div>
                    <input type="range" id="tn-dscan-contrast" class="form-range" min="0" max="100" value="60">
                  </div>

                  <div class="col-12 col-md-4">
                    <label for="tn-dscan-aspect" class="form-label fw-semibold small mb-1">Output Page Ratio</label>
                    <select id="tn-dscan-aspect" class="form-select form-select-sm">
                      <option value="auto" selected>Auto (Match Detected Paper)</option>
                      <option value="a4">A4 Portrait (1 : 1.414)</option>
                      <option value="letter">US Letter (1 : 1.294)</option>
                      <option value="id">ID Card / NID (1.58 : 1)</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Side-by-Side 4-Corner Crop & Live Enhanced Scan Preview -->
              <div class="row g-3 mb-3">
                <!-- Left: Source Photo with 4 Draggable Corner Handles -->
                <div class="col-md-6">
                  <div class="p-3 rounded-3 border bg-light h-100 d-flex flex-column">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-1 mb-2">
                      <h3 class="h6 fw-bold mb-0">1. Drag 4 Corners to Paper Edges</h3>
                      <div class="btn-group btn-group-sm">
                        <button type="button" id="tn-dscan-autodetect-btn" class="btn btn-outline-primary btn-sm" title="Auto-detect document edges">
                          <i class="bi bi-bounding-box-circles" aria-hidden="true"></i> Auto-Detect
                        </button>
                        <button type="button" id="tn-dscan-fullcrop-btn" class="btn btn-outline-secondary btn-sm" title="Select full image">
                          Full
                        </button>
                      </div>
                    </div>
                    <div class="tn-dscan-stage flex-grow-1">
                      <div class="tn-dscan-canvas-wrap">
                        <canvas id="tn-dscan-source-canvas" class="tn-dscan-canvas"></canvas>
                      </div>
                    </div>
                    <div class="small text-muted mt-2 text-center">
                      Drag the 4 blue corner handles to match the corners of your paper.
                    </div>
                  </div>
                </div>

                <!-- Right: Flattened & Shadow-Cleaned Result -->
                <div class="col-md-6">
                  <div class="p-3 rounded-3 border bg-light h-100 d-flex flex-column">
                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-1 mb-2">
                      <h3 class="h6 fw-bold mb-0">2. Flattened &amp; Enhanced Scan</h3>
                      <div class="d-flex align-items-center gap-1">
                        <span id="tn-dscan-out-dims" class="badge bg-primary">0 &times; 0 px</span>
                        <button type="button" id="tn-dscan-rot-ccw" class="btn btn-outline-secondary btn-sm py-0 px-2" title="Rotate 90° Left">
                          <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i>
                        </button>
                        <button type="button" id="tn-dscan-rot-cw" class="btn btn-outline-secondary btn-sm py-0 px-2" title="Rotate 90° Right">
                          <i class="bi bi-arrow-clockwise" aria-hidden="true"></i>
                        </button>
                      </div>
                    </div>
                    <div class="tn-dscan-stage flex-grow-1">
                      <canvas id="tn-dscan-result-canvas" class="tn-dscan-result-canvas"></canvas>
                    </div>
                    <div class="small text-muted mt-2 text-center">
                      Live perspective-warped and shadow-cleaned output.
                    </div>
                  </div>
                </div>
              </div>

              <!-- 3. Export & Download Controls -->
              <div class="p-3 rounded-3 border bg-light mb-3">
                <div class="row g-3 align-items-end">
                  <div class="col-sm-6 col-md-4">
                    <label for="tn-dscan-filename" class="form-label fw-bold small mb-1">Output File Name</label>
                    <input type="text" id="tn-dscan-filename" class="form-control form-control-sm" value="scanned-document">
                  </div>
                  <div class="col-sm-6 col-md-8">
                    <div class="d-flex flex-wrap gap-2">
                      <button type="button" id="tn-dscan-download-pdf" class="btn tn-btn--primary">
                        <i class="bi bi-file-earmark-pdf-fill" aria-hidden="true"></i> Download Scanned PDF
                      </button>
                      <button type="button" id="tn-dscan-download-png" class="btn tn-btn--outline">
                        <i class="bi bi-file-earmark-image" aria-hidden="true"></i> Download PNG
                      </button>
                      <button type="button" id="tn-dscan-download-jpg" class="btn tn-btn--outline">
                        <i class="bi bi-filetype-jpg" aria-hidden="true"></i> Download JPG
                      </button>
                      <button type="button" id="tn-dscan-clear-btn" class="btn tn-btn--outline text-danger ms-auto">
                        <i class="bi bi-trash3" aria-hidden="true"></i> Clear
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Scan &amp; Enhance Documents in Your Browser</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload a Document Photo:</strong> Drop a smartphone photo of any paper page, receipt, NID card, or certificate (or click <em>Load Sample Shadowed Document</em> to see it in action).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Adjust the 4 Corners &amp; Filter:</strong> Fine-tune the 4 blue corner handles around the paper edges to flatten the angle. Choose <strong>Magic Color</strong> to erase desk shadows while keeping colored stamps, or <strong>B&amp;W Document</strong> for a laser-sharp black-and-white scan.
              </li>
              <li>
                <strong>Step 3 — Export to PDF or Image:</strong> Click <strong>Download Scanned PDF</strong> to get a clean A4/printable PDF, or save as a high-resolution PNG or JPG.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">CamScanner-Style Perspective Deskew &amp; Shadow Removal Without Mobile Apps</h2>
            <p class="text-muted">
              Taking a photo of a paper document under indoor lighting almost always produces a trapezoid angle and a dark shadow cast by your phone or hand. Submitting raw, gray smartphone photos for bank KYC, job applications, or university portals looks unprofessional and makes text hard to read. ToolNest's <strong>AI Document Scanner &amp; Auto-Enhancer</strong> uses 4-point homography perspective warping and integral-image local illumination normalization to turn uneven photos into flatbed-quality scans.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-bounding-box text-primary me-1" aria-hidden="true"></i> 4-Point Perspective Straightening</h3>
                  <p class="small text-muted mb-0">Auto-detects paper boundaries and lets you drag all 4 corners independently to flatten skewed or angled shots into a crisp rectangle.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-brightness-high text-primary me-1" aria-hidden="true"></i> Adaptive Shadow Elimination</h3>
                  <p class="small text-muted mb-0">Calculates local paper background brightness across every region of the page, turning shadowed gray paper into pure, uniform white.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="dscanFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="dscanFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dscanFaqCol1" aria-expanded="true" aria-controls="dscanFaqCol1">
                    1. How does Magic Color remove shadows without turning colored stamps black?
                  </button>
                </h3>
                <div id="dscanFaqCol1" class="accordion-collapse collapse show" aria-labelledby="dscanFaq1" data-bs-parent="#dscanFaqAccordion">
                  <div class="accordion-body text-muted">
                    Magic Color estimates the local background illumination of the paper around each pixel using a fast integral image. By dividing each RGB channel by the local paper brightness and boosting ink saturation, uneven shadows disappear while blue signatures and red seals stay vivid.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dscanFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dscanFaqCol2" aria-expanded="false" aria-controls="dscanFaqCol2">
                    2. Can I manually adjust the corners if the paper is on a cluttered desk?
                  </button>
                </h3>
                <div id="dscanFaqCol2" class="accordion-collapse collapse" aria-labelledby="dscanFaq2" data-bs-parent="#dscanFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Simply grab any of the 4 blue corner circles on the left preview canvas with your mouse or finger and drag it to the exact corner of your page. The right preview updates automatically.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dscanFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dscanFaqCol3" aria-expanded="false" aria-controls="dscanFaqCol3">
                    3. When should I use B&amp;W Document mode instead of Magic Color?
                  </button>
                </h3>
                <div id="dscanFaqCol3" class="accordion-collapse collapse" aria-labelledby="dscanFaq3" data-bs-parent="#dscanFaqAccordion">
                  <div class="accordion-body text-muted">
                    Use <strong>B&amp;W Document</strong> for text-heavy pages, printed contracts, or book pages that you plan to print on a black-and-white laser printer. Use <strong>Magic Color</strong> for certificates, IDs, and signed forms with colored ink.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dscanFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dscanFaqCol4" aria-expanded="false" aria-controls="dscanFaqCol4">
                    4. Does this add any watermark like mobile scanner apps?
                  </button>
                </h3>
                <div id="dscanFaqCol4" class="accordion-collapse collapse" aria-labelledby="dscanFaq4" data-bs-parent="#dscanFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All exported PDFs, PNGs, and JPGs are 100% watermark-free and full resolution.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dscanFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dscanFaqCol5" aria-expanded="false" aria-controls="dscanFaqCol5">
                    5. Are my scanned documents uploaded to any cloud server?
                  </button>
                </h3>
                <div id="dscanFaqCol5" class="accordion-collapse collapse" aria-labelledby="dscanFaq5" data-bs-parent="#dscanFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Everything runs 100% locally in your browser using HTML5 Canvas and <code>pdf-lib</code>. Your private documents never leave your device.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_document_scanner', 'tn_document_scanner_shortcode');

function tn_excel_to_pdf_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Excel to PDF Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Browser-Based &bull; Spreadsheets Never Leave Your Device
            </span>

            <!-- Upload Dropzone -->
            <div id="epDropzone" class="tn-dropzone p-4 text-center mb-3" role="button" tabindex="0" aria-label="Upload Excel or CSV file">
              <input type="file" id="epFileInput" class="d-none" accept=".xlsx,.csv,.tsv,.txt,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/csv">
              <div class="mb-2">
                <i class="bi bi-file-earmark-spreadsheet text-success" style="font-size: 2.5rem;" aria-hidden="true"></i>
              </div>
              <h2 class="h5 fw-bold mb-1">Drop your Excel (.xlsx) or CSV spreadsheet here</h2>
              <p class="text-muted small mb-3">Supports multi-sheet <strong>.xlsx</strong> workbooks, <strong>.csv</strong>, and <strong>.tsv</strong> files — processed 100% offline in your browser</p>
              <div class="d-flex flex-wrap justify-content-center gap-2">
                <button type="button" class="btn btn-primary px-4" onclick="document.getElementById('epFileInput').click();">
                  <i class="bi bi-folder2-open me-1" aria-hidden="true"></i>Choose Excel / CSV File
                </button>
                <button type="button" id="epSampleBtn" class="btn btn-outline-secondary">
                  <i class="bi bi-magic me-1" aria-hidden="true"></i>Load Sample Excel (.XLSX)
                </button>
              </div>
            </div>

            <!-- Converting Progress State -->
            <div id="epProgress" class="d-none p-4 rounded-3 bg-light border text-center mb-3">
              <div class="spinner-border text-success mb-2" role="status" aria-hidden="true"></div>
              <div class="fw-bold">Converting Excel spreadsheet to PDF...</div>
              <div class="small text-muted">Preserving worksheets, columns, rows, and table grid formatting</div>
            </div>

            <!-- Error Alert -->
            <div id="epErrorAlert" class="alert alert-danger d-none mb-3" role="alert">
              <i class="bi bi-exclamation-triangle-fill me-2" aria-hidden="true"></i>
              <span id="epErrorMsg"></span>
            </div>

            <!-- Active Workspace (Conversion Complete & Download) -->
            <div id="epWorkspace" class="d-none">
              <!-- Converted Summary & Download Card -->
              <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 p-3 bg-white rounded-3 border mb-3">
                <div class="d-flex align-items-center gap-3">
                  <div class="rounded-3 bg-danger-subtle text-danger d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                    <i class="bi bi-file-earmark-pdf-fill fs-3" aria-hidden="true"></i>
                  </div>
                  <div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                      <span id="epFileName" class="fw-bold text-dark">sales-report.pdf</span>
                      <span class="badge bg-success-subtle text-success">Converted</span>
                    </div>
                    <div id="epFileMeta" class="small text-muted">Converted from Excel • 1 Page</div>
                  </div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="epConvertBtn" class="btn btn-success px-4">
                    <i class="bi bi-download me-1" aria-hidden="true"></i>Download PDF
                  </button>
                  <button type="button" id="epResetBtn" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-counterclockwise me-1" aria-hidden="true"></i>Convert Another
                  </button>
                </div>
              </div>

              <!-- Spreadsheet Table Preview -->
              <div class="border rounded-3 overflow-hidden">
                <div class="bg-light px-3 py-2 border-bottom d-flex flex-wrap justify-content-between align-items-center gap-2">
                  <span class="small fw-semibold"><i class="bi bi-table me-1 text-success" aria-hidden="true"></i>Spreadsheet Preview</span>
                  <div class="d-flex align-items-center gap-3 small text-muted">
                    <span>Rows: <strong id="epStatRows" class="text-dark">0</strong></span>
                    <span>Columns: <strong id="epStatCols" class="text-dark">0</strong></span>
                    <span>Sheets: <strong id="epStatSheets" class="text-dark">1</strong></span>
                  </div>
                </div>
                <div class="table-responsive" style="max-height: 360px;">
                  <table id="epTablePreview" class="table table-sm table-bordered table-hover mb-0 align-middle"></table>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Convert Excel (.XLSX) to PDF</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2"><strong>Step 1 — Select Your Spreadsheet:</strong> Drag and drop an Excel workbook (<code>.xlsx</code>) or comma-separated (<code>.csv</code>) file into the upload box, or click <em>Load Sample Excel (.XLSX)</em> to test immediately.</li>
              <li class="mb-2"><strong>Step 2 — Pick a Worksheet Tab:</strong> If your workbook contains multiple sheets (e.g., Monthly Sales, Inventory, Summary), choose the sheet you want to export from the <em>Active Worksheet Tab</em> dropdown.</li>
              <li class="mb-2"><strong>Step 3 — Customize Page Layout &amp; Theme:</strong> Choose <strong>A4</strong> or <strong>Letter</strong> paper size, <strong>Landscape</strong> (recommended for wide tables) or <strong>Portrait</strong> orientation, and your preferred header color theme.</li>
              <li><strong>Step 4 — Download Vector PDF:</strong> Click <strong>Download PDF</strong> to generate a crisp, searchable multi-page PDF document with repeating table headers and page numbers.</li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Creating Clean, Printable PDF Reports from Excel Workbooks</h2>
            <p class="text-muted">Sharing raw <code>.xlsx</code> or <code>.csv</code> files with clients, auditors, or suppliers often leads to accidental formula edits, broken column widths on mobile phones, or exposed hidden worksheets. Converting your worksheet into a standardized <strong>A4 Landscape PDF</strong> locks in your rows and columns so the table looks identical on every desktop, tablet, and printer.</p>
            <p class="text-muted">Our browser-based <strong>MS Excel to PDF Converter</strong> unpacks OpenXML <code>.xlsx</code> archives directly in memory using <code>JSZip</code>, resolves shared string tables and inline cell values, and draws crisp vector gridlines and typography using <code>pdf-lib</code>. For spreadsheets containing Bangla Unicode text or complex international scripts, you can also click <strong>Print / Save Unicode PDF</strong> to use your browser's native print-to-PDF engine.</p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-columns-gap text-primary me-1" aria-hidden="true"></i> Smart Proportional Column Widths</h3>
                  <p class="small text-muted mb-0">Automatically measures cell lengths across your dataset so wide product descriptions get more space than short ID columns.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-table text-primary me-1" aria-hidden="true"></i> Repeating Table Headers</h3>
                  <p class="small text-muted mb-0">Multi-page spreadsheets automatically repeat the colored header row at the top of every page for easy reading.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="epFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="epFaqH1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#epFaq1" aria-expanded="true" aria-controls="epFaq1">
                    1. Are my financial Excel spreadsheets uploaded to any server?
                  </button>
                </h3>
                <div id="epFaq1" class="accordion-collapse collapse show" aria-labelledby="epFaqH1" data-bs-parent="#epFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. This Excel to PDF Converter runs 100% locally in your browser using <code>JSZip</code> and <code>pdf-lib</code>. Your accounting sheets, payroll tables, and sales reports never leave your device.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="epFaqH2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#epFaq2" aria-expanded="false" aria-controls="epFaq2">
                    2. Can I choose which worksheet tab to export from a multi-sheet .xlsx file?
                  </button>
                </h3>
                <div id="epFaq2" class="accordion-collapse collapse" aria-labelledby="epFaqH2" data-bs-parent="#epFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. When you upload a multi-sheet Excel workbook, the converter lists every worksheet tab in a dropdown selector so you can preview and export any specific sheet to PDF.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="epFaqH3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#epFaq3" aria-expanded="false" aria-controls="epFaq3">
                    3. Does the table header repeat automatically on every PDF page?
                  </button>
                </h3>
                <div id="epFaq3" class="accordion-collapse collapse" aria-labelledby="epFaqH3" data-bs-parent="#epFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. When the <em>Repeating Header Row</em> option is checked, the top header row is automatically styled and repeated at the top of every new PDF page.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="epFaqH4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#epFaq4" aria-expanded="false" aria-controls="epFaq4">
                    4. Should I choose Landscape or Portrait orientation for wide spreadsheets?
                  </button>
                </h3>
                <div id="epFaq4" class="accordion-collapse collapse" aria-labelledby="epFaqH4" data-bs-parent="#epFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>Landscape</strong> orientation is selected by default because spreadsheets with 5 or more columns fit much more comfortably across a wide page without truncating cell values.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="epFaqH5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#epFaq5" aria-expanded="false" aria-controls="epFaq5">
                    5. Does this tool also convert CSV and TSV files to PDF?
                  </button>
                </h3>
                <div id="epFaq5" class="accordion-collapse collapse" aria-labelledby="epFaqH5" data-bs-parent="#epFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. In addition to Microsoft Excel (<code>.xlsx</code>) workbooks, you can upload comma-separated (<code>.csv</code>) and tab-separated (<code>.tsv</code>) files and export them to styled PDF tables.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_excel_to_pdf', 'tn_excel_to_pdf_shortcode');

function tn_image_alt_text_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="AI Image Alt-Text and Caption Generator Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side Vision AI &bull; Photos Are Analyzed Locally in Your Browser
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Upload Image</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Add Optional SEO Context</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Generate &amp; Copy Alt-Text</div>
            </div>

            <!-- 1. Drag & Drop Upload Zone -->
            <div id="tn-alt-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop an image">
              <i class="bi bi-eye-fill tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop a Photo Here, or Click to Browse</h2>
              <p class="small text-muted mb-3">Supports JPEG, PNG, and WebP up to 20 MB (16 MP max).</p>
              <div class="d-flex flex-wrap justify-content-center gap-2">
                <label for="tn-alt-file" class="btn tn-btn--primary mb-0">
                  <i class="bi bi-upload" aria-hidden="true"></i> Choose Image
                </label>
                <button type="button" id="tn-alt-sample" class="btn tn-btn--outline">
                  <i class="bi bi-magic" aria-hidden="true"></i> Load Sample Image
                </button>
              </div>
              <input id="tn-alt-file" class="d-none" type="file" accept="image/jpeg,image/png,image/webp">
            </div>

            <!-- 2. Optional SEO Keyword & Context Controls -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <div class="row g-3">
                <div class="col-md-7">
                  <label for="tn-alt-keyword" class="form-label fw-bold small mb-1">
                    Optional Target SEO Keyword / Brand / Product Name
                  </label>
                  <input type="text" id="tn-alt-keyword" class="form-control" placeholder="e.g. Handcrafted leather laptop bag, Dhaka cafe...">
                </div>
                <div class="col-md-5">
                  <label for="tn-alt-context" class="form-label fw-bold small mb-1">
                    Content Style / Purpose
                  </label>
                  <select id="tn-alt-context" class="form-select">
                    <option value="seo" selected>SEO &amp; Blog Article (Balanced)</option>
                    <option value="ecommerce">E-Commerce Product Listing</option>
                    <option value="wcag">WCAG Screen Reader (Strict)</option>
                    <option value="editorial">Editorial &amp; Social Media</option>
                  </select>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <button id="tn-alt-run" class="btn tn-btn--primary px-4" type="button" disabled>
                <i class="bi bi-stars" aria-hidden="true"></i> Generate AI Alt-Text &amp; Captions
              </button>
              <button id="tn-alt-clear" class="btn tn-btn--outline text-danger ms-auto" type="button" disabled>
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear
              </button>
            </div>

            <p id="tn-alt-status" class="small text-muted mb-3" role="status" aria-live="polite">
              Choose a photo to get started.
            </p>

            <!-- AI Model Progress Bar -->
            <div id="tn-alt-progress-wrap" class="mb-3 d-none" aria-live="polite">
              <div class="d-flex justify-content-between small text-muted mb-1">
                <span id="tn-alt-progress-label">Loading AI vision model...</span>
              </div>
              <div class="progress" style="height: 0.65rem;">
                <div id="tn-alt-progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="width: 0%;"></div>
              </div>
            </div>

            <!-- Image Preview & Detected Visual Metadata -->
            <div id="tn-alt-preview-section" class="p-3 rounded-3 border bg-light mb-3 d-none">
              <div class="row g-3 align-items-center">
                <div class="col-sm-5 text-center">
                  <img id="tn-alt-preview-img" class="img-fluid rounded border bg-white" alt="Selected photo preview" style="max-height: 200px; object-fit: contain;">
                </div>
                <div class="col-sm-7">
                  <h3 class="h6 fw-bold mb-2">Detected Image Attributes</h3>
                  <div class="d-flex flex-wrap gap-2 mb-2">
                    <span id="tn-alt-meta-dims" class="badge bg-primary">0 &times; 0 px</span>
                    <span id="tn-alt-meta-orient" class="badge bg-secondary-subtle text-dark border">Landscape</span>
                  </div>
                  <div class="small text-muted mb-1">Dominant Color Palette:</div>
                  <div id="tn-alt-palette" class="d-flex flex-wrap gap-1"></div>
                </div>
              </div>
            </div>

            <!-- Generated Alt-Text & Caption Results -->
            <div id="tn-alt-results" class="d-none">
              <div class="p-3 rounded-3 border bg-primary-subtle border-primary-subtle mb-3">
                <div class="small fw-bold text-primary mb-1">
                  <i class="bi bi-cpu me-1" aria-hidden="true"></i> Raw AI Vision Detection:
                </div>
                <div id="tn-alt-raw-caption" class="fw-semibold text-dark"></div>
              </div>

              <!-- 1. Concise WCAG Alt-Text -->
              <div class="p-3 rounded-3 border bg-white mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                  <div>
                    <label for="tn-alt-wcag-output" class="fw-bold small mb-0">
                      1. Concise WCAG Screen-Reader Alt-Text
                    </label>
                    <span id="tn-alt-wcag-count" class="badge bg-success-subtle text-success border border-success-subtle ms-1">0 / 125 chars</span>
                  </div>
                  <button type="button" id="tn-alt-copy-wcag" class="btn btn-sm tn-btn--outline">
                    <i class="bi bi-clipboard" aria-hidden="true"></i> Copy Alt-Text
                  </button>
                </div>
                <textarea id="tn-alt-wcag-output" class="form-control form-control-sm" rows="2"></textarea>
              </div>

              <!-- 2. SEO-Enriched Alt-Text -->
              <div class="p-3 rounded-3 border bg-white mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                  <label for="tn-alt-seo-output" class="fw-bold small mb-0">
                    2. SEO-Optimized Alt-Text (With Keyword &amp; Color Context)
                  </label>
                  <button type="button" id="tn-alt-copy-seo" class="btn btn-sm tn-btn--outline">
                    <i class="bi bi-clipboard" aria-hidden="true"></i> Copy SEO Alt
                  </button>
                </div>
                <textarea id="tn-alt-seo-output" class="form-control form-control-sm" rows="2"></textarea>
              </div>

              <!-- 3. Ready-to-Paste HTML <img> Snippet -->
              <div class="p-3 rounded-3 border bg-white mb-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                  <label for="tn-alt-html-output" class="fw-bold small mb-0">
                    3. Ready-to-Paste HTML <code>&lt;img&gt;</code> Tag (CLS-Safe with Dimensions)
                  </label>
                  <button type="button" id="tn-alt-copy-html" class="btn btn-sm tn-btn--outline">
                    <i class="bi bi-code-slash" aria-hidden="true"></i> Copy HTML Tag
                  </button>
                </div>
                <textarea id="tn-alt-html-output" class="form-control form-control-sm font-monospace" rows="2" readonly></textarea>
              </div>

              <!-- 4. Detailed Caption & Extracted Keyword Tags -->
              <div class="p-3 rounded-3 border bg-white">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                  <label for="tn-alt-caption-output" class="fw-bold small mb-0">
                    4. Detailed Caption (<code>&lt;figcaption&gt;</code> / Social Media Post)
                  </label>
                  <button type="button" id="tn-alt-copy-caption" class="btn btn-sm tn-btn--outline">
                    <i class="bi bi-clipboard" aria-hidden="true"></i> Copy Caption
                  </button>
                </div>
                <textarea id="tn-alt-caption-output" class="form-control form-control-sm mb-2" rows="3"></textarea>
                <div class="small text-muted mb-1">Auto-Extracted Keyword Tags:</div>
                <div id="tn-alt-tags-wrap" class="d-flex flex-wrap gap-1"></div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Generate AI Image Alt-Text &amp; Captions</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Select Your Photo:</strong> Drag and drop a JPEG, PNG, or WebP image into the upload area (or click <em>Load Sample Image</em> to test).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Add Optional SEO Keyword &amp; Style:</strong> Enter your product name, brand, or target keyword and select whether the image is for a blog post, e-commerce product, or strict WCAG screen reader compliance.
              </li>
              <li>
                <strong>Step 3 — Generate &amp; Copy:</strong> Click <strong>Generate AI Alt-Text &amp; Captions</strong>. Copy the concise WCAG alt-text, SEO alt-text, complete HTML <code>&lt;img&gt;</code> snippet, or social caption with one click.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Boost Image SEO &amp; Web Accessibility Privately</h2>
            <p class="text-muted">
              Missing or poorly written <code>alt</code> attributes hurt both your Google Images rankings and your website's accessibility for visually impaired visitors using screen readers like NVDA, JAWS, or VoiceOver. ToolNest's <strong>AI Image Alt-Text &amp; Caption Generator</strong> combines an in-browser Vision-Language transformer model with pixel-level color palette analysis to craft accurate, human-friendly descriptions in seconds.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-universal-access-circle text-primary me-1" aria-hidden="true"></i> WCAG 2.1 Compliant Formatting</h3>
                  <p class="small text-muted mb-0">Automatically strips redundant phrases like "image of" and keeps screen-reader descriptions under the recommended 125-character threshold.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-search text-primary me-1" aria-hidden="true"></i> Natural Keyword Integration</h3>
                  <p class="small text-muted mb-0">Blends your target SEO keyword or product title with the actual visual contents and color palette of the photo.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="altFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="altFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#altFaqCol1" aria-expanded="true" aria-controls="altFaqCol1">
                    1. How does this tool generate image captions without uploading my photo?
                  </button>
                </h3>
                <div id="altFaqCol1" class="accordion-collapse collapse show" aria-labelledby="altFaq1" data-bs-parent="#altFaqAccordion">
                  <div class="accordion-body text-muted">
                    It runs a quantized Vision-to-Text neural network (<code>Xenova/vit-gpt2-image-captioning</code>) directly inside your browser using WebAssembly. Once the model downloads on first use, it caches in your browser and processes images locally.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="altFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#altFaqCol2" aria-expanded="false" aria-controls="altFaqCol2">
                    2. Why is 125 characters recommended for WCAG alt-text?
                  </button>
                </h3>
                <div id="altFaqCol2" class="accordion-collapse collapse" aria-labelledby="altFaq2" data-bs-parent="#altFaqAccordion">
                  <div class="accordion-body text-muted">
                    Many screen readers pause or split announcements after roughly 125 characters. Keeping your primary <code>alt</code> attribute concise and placing longer descriptions in <code>&lt;figcaption&gt;</code> provides the best accessibility experience.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="altFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#altFaqCol3" aria-expanded="false" aria-controls="altFaqCol3">
                    3. Can I change my target keyword after the AI analyzes the photo?
                  </button>
                </h3>
                <div id="altFaqCol3" class="accordion-collapse collapse" aria-labelledby="altFaq3" data-bs-parent="#altFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Editing the <strong>Target SEO Keyword</strong> box or switching the <strong>Content Style</strong> dropdown immediately updates all four output boxes without re-running the AI model.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="altFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#altFaqCol4" aria-expanded="false" aria-controls="altFaqCol4">
                    4. Why does the HTML snippet include width and height attributes?
                  </button>
                </h3>
                <div id="altFaqCol4" class="accordion-collapse collapse" aria-labelledby="altFaqCol4" data-bs-parent="#altFaqAccordion">
                  <div class="accordion-body text-muted">
                    Including explicit <code>width</code> and <code>height</code> attributes lets browsers reserve the exact aspect ratio before the image loads, preventing Cumulative Layout Shift (CLS) and improving Core Web Vitals.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="altFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#altFaqCol5" aria-expanded="false" aria-controls="altFaqCol5">
                    5. Does this require an OpenAI or Google Cloud API key?
                  </button>
                </h3>
                <div id="altFaqCol5" class="accordion-collapse collapse" aria-labelledby="altFaq5" data-bs-parent="#altFaqAccordion">
                  <div class="accordion-body text-muted">
                    No API key, account, or subscription is required. It is 100% free and runs on your own device hardware.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_image_alt_text_generator', 'tn_image_alt_text_generator_shortcode');

function tn_image_compressor_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Image Compressor Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Photos Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Drop or Select Images</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Adjust Quality Slider</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Compare &amp; Download</div>
            </div>

            <!-- Compression Controls -->
            <div class="row g-3 align-items-end mb-4">
              <div class="col-md-5">
                <div class="d-flex justify-content-between mb-1">
                  <label for="tn-comp-quality" class="form-label fw-bold mb-0">Compression Quality</label>
                  <span id="tn-comp-quality-val" class="badge bg-primary">75%</span>
                </div>
                <input type="range" id="tn-comp-quality" class="form-range" min="10" max="95" step="5" value="75">
                <div class="d-flex justify-content-between small text-muted">
                  <span>Smaller File (10%)</span>
                  <span>Balanced (75%)</span>
                  <span>Max Quality (95%)</span>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <label for="tn-comp-maxw" class="form-label fw-bold">Max Width (Optional)</label>
                <select id="tn-comp-maxw" class="form-select">
                  <option value="0" selected>Keep Original Dimensions</option>
                  <option value="1920">Max 1920px (Full HD)</option>
                  <option value="1200">Max 1200px (Web / Blog)</option>
                  <option value="800">Max 800px (Email / Portal)</option>
                </select>
              </div>
              <div class="col-sm-6 col-md-3">
                <label for="tn-comp-format" class="form-label fw-bold">Output Format</label>
                <select id="tn-comp-format" class="form-select">
                  <option value="auto" selected>Auto (Best Savings)</option>
                  <option value="image/jpeg">JPEG (.jpg)</option>
                  <option value="image/webp">WebP (.webp)</option>
                </select>
              </div>
            </div>

            <!-- Drag and Drop Upload Box -->
            <div id="tn-comp-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop images to compress">
              <i class="bi bi-cloud-arrow-up-fill tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop JPG, PNG, or WebP Images Here</h2>
              <p class="small text-muted mb-3">Select one or multiple photos at once. Processed 100% locally in your browser.</p>
              <label for="tn-comp-file-input" class="btn tn-btn--primary mb-0">
                <i class="bi bi-folder2-open" aria-hidden="true"></i> Choose Image Files
              </label>
              <input type="file" id="tn-comp-file-input" class="d-none" accept="image/jpeg,image/png,image/webp" multiple>
            </div>

            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-comp-run-btn" class="btn tn-btn--primary">
                <i class="bi bi-sliders" aria-hidden="true"></i> Re-Compress Batch
              </button>
              <button type="button" id="tn-comp-sample-btn" class="btn tn-btn--outline">
                <i class="bi bi-magic" aria-hidden="true"></i> Load Sample Photo
              </button>
              <button type="button" id="tn-comp-reset-btn" class="btn tn-btn--outline text-danger">
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear All
              </button>
            </div>

            <!-- Progress Bar -->
            <div id="tn-comp-progress-wrap" class="mb-3 d-none">
              <div class="small fw-semibold mb-1">Compressing images in browser...</div>
              <div class="progress" style="height: 20px;">
                <div id="tn-comp-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;">0%</div>
              </div>
            </div>

            <!-- Results List -->
            <div id="tn-comp-results-wrap" class="d-none mt-4">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3 p-3 rounded-3 bg-success-subtle border border-success-subtle">
                <div id="tn-comp-total-summary" class="small text-dark"></div>
                <button type="button" id="tn-comp-download-all" class="btn tn-btn--success btn-sm">
                  <i class="bi bi-download" aria-hidden="true"></i> Download All
                </button>
              </div>
              <div id="tn-comp-list"></div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Compress Images Without Losing Quality</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Select or Drop Your Photos:</strong> Drag one or more JPG, PNG, or WebP files into the upload area, or click <em>Load Sample Photo</em> to see an instant demonstration.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Fine-Tune the Quality Slider:</strong> Move the <em>Compression Quality</em> slider between 10% and 95%. Every adjustment automatically recalculates the new file size in KB or MB.
              </li>
              <li>
                <strong>Step 3 — Compare &amp; Download:</strong> Check the before/after byte savings for each file and click <strong>Download</strong> on individual images or <strong>Download All</strong> for the entire batch.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Why Compress Images Client-Side on ToolNest?</h2>
            <p class="text-muted">
              Smartphone cameras routinely capture photos between 4 MB and 12 MB each. While large files are great for archival printing, they slow down WordPress websites, hurt Google Core Web Vitals (LCP) rankings, consume mobile data, and get rejected by online job and visa application forms that enforce strict 50 KB or 100 KB upload limits.
            </p>
            <p class="text-muted">
              Most online image compressors upload your personal family photos, NID scans, or product shots to remote third-party servers. ToolNest eliminates that privacy risk completely by performing perceptual quantization directly inside your web browser.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-layers text-primary me-1" aria-hidden="true"></i> Multi-File Batch Processing</h3>
                  <p class="small text-muted mb-0">Drop 10 or 20 product photos at once and compress the entire batch in seconds with zero server queue time.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-filetype-jpg text-primary me-1" aria-hidden="true"></i> Next-Gen WebP &amp; JPEG Output</h3>
                  <p class="small text-muted mb-0">Export compressed images as universal JPEG or modern WebP for maximum Core Web Vitals performance.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="compFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="cFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cFaqCol1" aria-expanded="true" aria-controls="cFaqCol1">
                    1. Are my personal photos uploaded to any cloud server during compression?
                  </button>
                </h3>
                <div id="cFaqCol1" class="accordion-collapse collapse show" aria-labelledby="cFaq1" data-bs-parent="#compFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. All image decoding and compression happen 100% locally in your browser using HTML5 Canvas APIs. Your photos never leave your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cFaqCol2" aria-expanded="false" aria-controls="cFaqCol2">
                    2. Can I compress multiple images at the same time?
                  </button>
                </h3>
                <div id="cFaqCol2" class="accordion-collapse collapse" aria-labelledby="cFaq2" data-bs-parent="#compFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Select or drag as many JPG, PNG, or WebP files as you need. You will see individual before/after sizes plus total batch savings.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cFaqCol3" aria-expanded="false" aria-controls="cFaqCol3">
                    3. What quality slider setting gives the best balance between size and clarity?
                  </button>
                </h3>
                <div id="cFaqCol3" class="accordion-collapse collapse" aria-labelledby="cFaq3" data-bs-parent="#compFaqAccordion">
                  <div class="accordion-body text-muted">
                    A setting between <strong>70% and 80%</strong> usually shrinks file size by 50%–75% without any noticeable visual degradation on screens.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cFaqCol4" aria-expanded="false" aria-controls="cFaqCol4">
                    4. How can I reduce a photo below 100 KB for government job portals?
                  </button>
                </h3>
                <div id="cFaqCol4" class="accordion-collapse collapse" aria-labelledby="cFaq4" data-bs-parent="#compFaqAccordion">
                  <div class="accordion-body text-muted">
                    Upload your photo, set <em>Max Width</em> to <code>800px</code> if it is a large camera photo, and adjust the quality slider to 65%–75% until the green "After" size shows under 100 KB.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="cFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cFaqCol5" aria-expanded="false" aria-controls="cFaqCol5">
                    5. Why does converting a PNG to JPEG or WebP save so much space?
                  </button>
                </h3>
                <div id="cFaqCol5" class="accordion-collapse collapse" aria-labelledby="cFaq5" data-bs-parent="#compFaqAccordion">
                  <div class="accordion-body text-muted">
                    Standard PNG files use lossless compression, which makes photographic images very heavy. Encoding in JPEG or WebP uses smart perceptual compression that removes invisible color redundancy.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_image_compressor', 'tn_image_compressor_shortcode');

function tn_image_format_converter_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Image Format Converter Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Photos &amp; HEIC Files Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Select JPG / PNG / WebP / HEIC</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Pick Output Format &amp; Quality</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download Files or .ZIP</div>
            </div>

            <!-- Conversion Controls -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <div class="row g-3 align-items-end">
                <div class="col-sm-6 col-md-4">
                  <label for="tn-ifc-format" class="form-label fw-bold small">Convert To Format</label>
                  <select id="tn-ifc-format" class="form-select">
                    <option value="image/jpeg" selected>JPEG (.jpg)</option>
                    <option value="image/webp">WebP (.webp)</option>
                    <option value="image/png">PNG (.png — Lossless)</option>
                  </select>
                </div>

                <div id="tn-ifc-quality-group" class="col-sm-6 col-md-5">
                  <div class="d-flex justify-content-between mb-1">
                    <label for="tn-ifc-quality" class="form-label fw-bold small mb-0">JPG / WebP Quality</label>
                    <span id="tn-ifc-quality-val" class="badge bg-primary">88%</span>
                  </div>
                  <input type="range" id="tn-ifc-quality" class="form-range" min="5" max="100" step="1" value="88">
                </div>

                <div class="col-sm-12 col-md-3">
                  <label for="tn-ifc-bg-color" class="form-label fw-bold small">Transparency Fill</label>
                  <input type="color" id="tn-ifc-bg-color" class="form-control form-control-color w-100" value="#FFFFFF" title="Background fill color for transparent PNGs">
                </div>
              </div>

              <div class="form-check mt-2">
                <input class="form-check-input" type="checkbox" id="tn-ifc-fill-white" checked>
                <label class="form-check-label small fw-semibold" for="tn-ifc-fill-white">
                  Fill transparent areas with solid background color (recommended when converting PNG/WebP to JPG)
                </label>
              </div>
            </div>

            <!-- Drag and Drop Upload Box -->
            <div id="tn-ifc-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop JPG, PNG, WebP, or HEIC images">
              <i class="bi bi-file-earmark-arrow-up tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop JPG, PNG, WebP, or HEIC Files Here</h2>
              <p class="small text-muted mb-3">Supports multiple files at once. HEIC decoder loads automatically on demand when a .heic file is chosen.</p>
              <label for="tn-ifc-file-input" class="btn tn-btn--primary mb-0">
                <i class="bi bi-folder2-open" aria-hidden="true"></i> Choose Image Files
              </label>
              <input type="file" id="tn-ifc-file-input" class="d-none" accept="image/jpeg,image/png,image/webp,image/heic,image/heif,.heic,.heif" multiple>
            </div>

            <!-- Queued Files Strip -->
            <div id="tn-ifc-queue-wrap" class="p-3 rounded border bg-light mb-3 d-none">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span id="tn-ifc-queue-count" class="badge bg-primary">0 Files Selected</span>
                <span class="small text-muted">Click &times; to remove any file</span>
              </div>
              <div id="tn-ifc-queue-list" class="d-flex flex-wrap gap-2"></div>
            </div>

            <!-- Friendly Error Alert -->
            <div id="tn-ifc-error-box" class="alert alert-danger py-2 px-3 small d-none mb-3" role="alert"></div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-ifc-convert-btn" class="btn tn-btn--primary">
                <i class="bi bi-arrow-repeat" aria-hidden="true"></i> Convert Selected Images
              </button>
              <button type="button" id="tn-ifc-sample-btn" class="btn tn-btn--outline">
                <i class="bi bi-magic" aria-hidden="true"></i> Load Sample PNG &amp; WebP
              </button>
              <button type="button" id="tn-ifc-reset-btn" class="btn tn-btn--outline text-danger">
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear All
              </button>
            </div>

            <!-- Progress Bar -->
            <div id="tn-ifc-progress-wrap" class="mb-3 d-none">
              <div id="tn-ifc-progress-text" class="small fw-semibold mb-1">Converting image formats...</div>
              <div class="progress" style="height: 20px;">
                <div id="tn-ifc-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;">0%</div>
              </div>
            </div>

            <!-- Results List & ZIP Export -->
            <div id="tn-ifc-results-wrap" class="d-none mt-4">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 mb-3 rounded-3 bg-success-subtle border border-success-subtle">
                <div id="tn-ifc-summary-text" class="small text-dark"></div>
                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-ifc-dl-zip" class="btn tn-btn--success btn-sm">
                    <i class="bi bi-file-earmark-zip-fill" aria-hidden="true"></i> Download All as .ZIP
                  </button>
                  <button type="button" id="tn-ifc-dl-each" class="btn tn-btn--outline btn-sm">
                    <i class="bi bi-download" aria-hidden="true"></i> Download Individually
                  </button>
                </div>
              </div>
              <div id="tn-ifc-results-list"></div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Convert Image Formats in Your Browser</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Choose Output Format &amp; Quality:</strong> Select whether you want to export your files as <em>JPEG (.jpg)</em>, <em>WebP (.webp)</em>, or lossless <em>PNG (.png)</em>, and set the quality slider.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Drop Your Images (Including iPhone HEIC):</strong> Drag and drop one or multiple JPG, PNG, WebP, or HEIC/HEIF files into the upload zone.
              </li>
              <li>
                <strong>Step 3 — Compare Sizes &amp; Export ZIP:</strong> Review the original vs. converted file sizes and click <strong>Download All as .ZIP</strong> or save individual files.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Why Convert Between HEIC, WebP, PNG, and JPG Locally?</h2>
            <p class="text-muted">
              Modern smartphones and web browsers use specialized image formats that are not always compatible with older government job portals, university admission forms, or desktop software. Apple iPhones capture photos in <strong>HEIC (High Efficiency Image Container)</strong> by default, while websites serve graphics in Google's <strong>WebP</strong> format. ToolNest's Image Format Converter bridges all of these formats right inside your browser without uploading private photos to any server.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-phone text-primary me-1" aria-hidden="true"></i> On-Demand HEIC / HEIF Support</h3>
                  <p class="small text-muted mb-0">Convert iPhone <code>.heic</code> and <code>.heif</code> photos into standard JPG or PNG files. The HEIC decoder loads only when needed so the page stays lightning fast.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-Speedometer2 text-primary me-1" aria-hidden="true"></i> PNG &amp; JPG to Next-Gen WebP</h3>
                  <p class="small text-muted mb-0">Cut website image payload by 30%–70% by batch-converting legacy PNG and JPEG assets into modern WebP images for higher Core Web Vitals scores.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-palette text-primary me-1" aria-hidden="true"></i> Smart Transparency Fill</h3>
                  <p class="small text-muted mb-0">Automatically fills transparent PNG alpha channels with clean white (or any custom color) when exporting to JPEG, avoiding ugly black backgrounds.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-file-earmark-zip text-primary me-1" aria-hidden="true"></i> Batch Processing &amp; ZIP Archive</h3>
                  <p class="small text-muted mb-0">Convert 20+ photos simultaneously with live progress tracking and download them in one organized <code>.zip</code> bundle.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="ifcFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="ifcFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ifcFaqCol1" aria-expanded="true" aria-controls="ifcFaqCol1">
                    1. Can I convert iPhone HEIC / HEIF photos to JPG or PNG?
                  </button>
                </h3>
                <div id="ifcFaqCol1" class="accordion-collapse collapse show" aria-labelledby="ifcFaq1" data-bs-parent="#ifcFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. As soon as you select a <code>.heic</code> or <code>.heif</code> photo, ToolNest loads the pinned client-side <code>heic2any</code> library and decodes the image directly in your browser.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ifcFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ifcFaqCol2" aria-expanded="false" aria-controls="ifcFaqCol2">
                    2. What happens to transparent areas when converting PNG to JPG?
                  </button>
                </h3>
                <div id="ifcFaqCol2" class="accordion-collapse collapse" aria-labelledby="ifcFaq2" data-bs-parent="#ifcFaqAccordion">
                  <div class="accordion-body text-muted">
                    JPEG does not support transparent pixels. With the <strong>Fill transparent areas with solid background color</strong> option checked, transparent regions are filled with crisp white (<code>#FFFFFF</code>) or your chosen color instead of turning black.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ifcFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ifcFaqCol3" aria-expanded="false" aria-controls="ifcFaqCol3">
                    3. Does the quality slider affect PNG output files?
                  </button>
                </h3>
                <div id="ifcFaqCol3" class="accordion-collapse collapse" aria-labelledby="ifcFaq3" data-bs-parent="#ifcFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. PNG is a lossless format that preserves every pixel and alpha channel intact. The quality slider applies when converting to JPEG or WebP.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ifcFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ifcFaqCol4" aria-expanded="false" aria-controls="ifcFaqCol4">
                    4. Can I convert multiple images at once and download a single ZIP?
                  </button>
                </h3>
                <div id="ifcFaqCol4" class="accordion-collapse collapse" aria-labelledby="ifcFaq4" data-bs-parent="#ifcFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Select as many files as you need and click <strong>Download All as .ZIP</strong> to get all converted images in a single archive.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ifcFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ifcFaqCol5" aria-expanded="false" aria-controls="ifcFaqCol5">
                    5. Are my HEIC or PNG photos uploaded to a cloud server?
                  </button>
                </h3>
                <div id="ifcFaqCol5" class="accordion-collapse collapse" aria-labelledby="ifcFaq5" data-bs-parent="#ifcFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All decoding, canvas rendering, and ZIP creation happen 100% locally on your device.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_image_format_converter', 'tn_image_format_converter_shortcode');

function tn_image_resizer_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Image Resizer Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Images Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Upload Image</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Pick Social Preset or Size</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download Resized File</div>
            </div>

            <!-- Upload Zone -->
            <div id="tn-resize-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop image to resize">
              <i class="bi bi-aspect-ratio tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop an Image Here or Click to Browse</h2>
              <p class="small text-muted mb-3">Supports JPG, PNG, WebP, and SVG. Processed locally in your browser.</p>
              <label for="tn-resize-file-input" class="btn tn-btn--primary mb-0">
                <i class="bi bi-upload" aria-hidden="true"></i> Select Image
              </label>
              <input type="file" id="tn-resize-file-input" class="d-none" accept="image/*">
            </div>

            <!-- One-Click Facebook Presets Bar -->
            <div class="mb-3">
              <div class="small fw-bold text-muted mb-2">One-Click Facebook &amp; Social Size Presets:</div>
              <div id="tn-resize-quick-chips" class="d-flex flex-wrap gap-2"></div>
            </div>

            <!-- Dimension & Fit Controls -->
            <div class="row g-3 mb-3">
              <div class="col-md-6">
                <label for="tn-resize-preset" class="form-label fw-bold">All Platform Size Presets</label>
                <select id="tn-resize-preset" class="form-select">
                  <option value="custom">Custom Pixel Dimensions</option>
                </select>
              </div>
              <div class="col-6 col-md-3">
                <label for="tn-resize-width" class="form-label fw-bold">Width (px)</label>
                <input type="number" id="tn-resize-width" class="form-control" value="1200" min="16" max="4096">
              </div>
              <div class="col-6 col-md-3">
                <label for="tn-resize-height" class="form-label fw-bold">Height (px)</label>
                <input type="number" id="tn-resize-height" class="form-control" value="630" min="16" max="4096">
              </div>
            </div>

            <div class="row g-3 align-items-end mb-4">
              <div class="col-sm-6 col-md-4">
                <label for="tn-resize-fit" class="form-label fw-bold">Resize / Fit Mode</label>
                <select id="tn-resize-fit" class="form-select">
                  <option value="cover" selected>Cover (Center Crop to Fill)</option>
                  <option value="contain">Contain (Fit + Background Pad)</option>
                  <option value="stretch">Stretch (Exact Width &times; Height)</option>
                </select>
              </div>
              <div class="col-6 col-sm-3 col-md-3">
                <label for="tn-resize-bg" class="form-label fw-bold">Pad Background</label>
                <input type="color" id="tn-resize-bg" class="form-control form-control-color w-100" value="#FFFFFF">
              </div>
              <div class="col-6 col-sm-3 col-md-3">
                <label for="tn-resize-format" class="form-label fw-bold">Output Format</label>
                <select id="tn-resize-format" class="form-select">
                  <option value="image/jpeg" selected>JPEG (.jpg)</option>
                  <option value="image/png">PNG (.png)</option>
                  <option value="image/webp">WebP (.webp)</option>
                </select>
              </div>
              <div class="col-md-2">
                <div class="form-check mb-2">
                  <input class="form-check-input" type="checkbox" id="tn-resize-lock">
                  <label class="form-check-label small fw-semibold" for="tn-resize-lock">Lock Ratio</label>
                </div>
              </div>
            </div>

            <!-- Live Canvas Preview -->
            <div class="tn-canvas-preview mb-2">
              <canvas id="tn-resize-canvas" width="1200" height="630" aria-label="Resized image live preview"></canvas>
            </div>
            <div id="tn-resize-meta" class="small text-muted text-center mb-3">Output: 1200 &times; 630 px</div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 justify-content-center">
              <button type="button" id="tn-resize-download-btn" class="btn tn-btn--success">
                <i class="bi bi-download" aria-hidden="true"></i> Download Resized Image
              </button>
              <button type="button" id="tn-resize-sample-btn" class="btn tn-btn--outline">
                <i class="bi bi-magic" aria-hidden="true"></i> Load Sample Graphic
              </button>
              <button type="button" id="tn-resize-reset-btn" class="btn tn-btn--outline text-danger">
                <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset Size
              </button>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Resize Images for Facebook &amp; Social Media</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload Your Photo:</strong> Drag and drop your image into the upload box or click <em>Select Image</em>.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Choose a Preset or Custom Size:</strong> Click any of the one-click Facebook buttons (Post, Cover, Story, Ad) or enter your own exact width and height in pixels.
              </li>
              <li>
                <strong>Step 3 — Pick Fit Mode &amp; Download:</strong> Choose between <em>Cover</em> (crops edges cleanly), <em>Contain</em> (adds clean background padding), or <em>Stretch</em>, then click <strong>Download Resized Image</strong>.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Complete Social Media &amp; Portal Image Size Reference</h2>
            <p class="text-muted">
              Every social network crops feed photos, cover banners, and vertical stories differently. If you upload an unformatted camera photo to a Facebook business page or an F-commerce ad campaign, key headlines and product details often get cut off on mobile screens.
            </p>
            <p class="text-muted">
              ToolNest keeps all current social media and Bangladesh job application sizes in one centralized preset selector so marketers, content creators, and job applicants can format visuals in seconds:
            </p>
            <div class="table-responsive">
              <table class="table table-bordered table-sm small mb-0">
                <thead class="table-light">
                  <tr>
                    <th>Platform / Use Case</th>
                    <th>Preset Name</th>
                    <th>Dimensions (px)</th>
                    <th>Aspect Ratio</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Facebook</td>
                    <td>Shared Link / Landscape Post</td>
                    <td>1200 &times; 630 px</td>
                    <td>1.91:1</td>
                  </tr>
                  <tr>
                    <td>Facebook</td>
                    <td>Square Post &amp; Feed Ad</td>
                    <td>1080 &times; 1080 px</td>
                    <td>1:1</td>
                  </tr>
                  <tr>
                    <td>Facebook</td>
                    <td>Page / Profile Cover Banner</td>
                    <td>820 &times; 312 px</td>
                    <td>2.63:1</td>
                  </tr>
                  <tr>
                    <td>Facebook / Instagram</td>
                    <td>Story &amp; Vertical Reel</td>
                    <td>1080 &times; 1920 px</td>
                    <td>9:16</td>
                  </tr>
                  <tr>
                    <td>YouTube</td>
                    <td>HD Video Thumbnail</td>
                    <td>1280 &times; 720 px</td>
                    <td>16:9</td>
                  </tr>
                  <tr>
                    <td>BD Job Portals</td>
                    <td>Applicant Photo &amp; Signature</td>
                    <td>300 &times; 300 px / 300 &times; 80 px</td>
                    <td>1:1 / 15:4</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="resizeFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="rFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#rFaqCol1" aria-expanded="true" aria-controls="rFaqCol1">
                    1. What are the recommended Facebook image sizes in 2026?
                  </button>
                </h3>
                <div id="rFaqCol1" class="accordion-collapse collapse show" aria-labelledby="rFaq1" data-bs-parent="#resizeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Use <strong>1200 &times; 630 px</strong> for landscape shared posts, <strong>1080 &times; 1080 px</strong> for square feed posts and ads, <strong>820 &times; 312 px</strong> for Facebook Page covers, and <strong>1080 &times; 1920 px</strong> for Stories and Reels.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="rFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rFaqCol2" aria-expanded="false" aria-controls="rFaqCol2">
                    2. What is the difference between Cover, Contain, and Stretch fit modes?
                  </button>
                </h3>
                <div id="rFaqCol2" class="accordion-collapse collapse" aria-labelledby="rFaq2" data-bs-parent="#resizeFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>Cover</strong> fills the entire target dimension by center-cropping excess edges. <strong>Contain</strong> keeps the whole image visible and fills empty margins with your selected background color. <strong>Stretch</strong> scales width and height independently.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="rFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rFaqCol3" aria-expanded="false" aria-controls="rFaqCol3">
                    3. Does this tool include Bangladesh Teletalk job application photo and signature sizes?
                  </button>
                </h3>
                <div id="rFaqCol3" class="accordion-collapse collapse" aria-labelledby="rFaq3" data-bs-parent="#resizeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Both <strong>300 &times; 300 px</strong> (Applicant Photo) and <strong>300 &times; 80 px</strong> (Applicant Signature) are built right into the preset dropdown.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="rFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rFaqCol4" aria-expanded="false" aria-controls="rFaqCol4">
                    4. Are my uploaded images sent to an external server?
                  </button>
                </h3>
                <div id="rFaqCol4" class="accordion-collapse collapse" aria-labelledby="rFaq4" data-bs-parent="#resizeFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Every resize operation runs 100% client-side inside your browser using HTML5 Canvas. Your images never leave your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="rFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rFaqCol5" aria-expanded="false" aria-controls="rFaqCol5">
                    5. Can I download the resized image as JPG, PNG, or WebP?
                  </button>
                </h3>
                <div id="rFaqCol5" class="accordion-collapse collapse" aria-labelledby="rFaq5" data-bs-parent="#resizeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Select JPEG, PNG, or WebP in the <em>Output Format</em> menu before clicking Download.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_image_resizer', 'tn_image_resizer_shortcode');

function tn_image_to_pdf_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Image to PDF Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Scanned Documents &amp; Photos Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Add Multiple Images</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Reorder, Rotate &amp; Page Setup</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Build &amp; Download PDF</div>
            </div>

            <!-- 1. Drag and Drop Upload Zone -->
            <div id="tn-i2p-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop images to convert to PDF">
              <i class="bi bi-file-earmark-pdf-fill tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop JPG, PNG, or WebP Images Here</h2>
              <p class="small text-muted mb-3">Add one or multiple photos. One image will be placed per PDF page in the exact order you arrange.</p>
              <label for="tn-i2p-file-input" class="btn tn-btn--primary mb-0">
                <i class="bi bi-images" aria-hidden="true"></i> Select Images
              </label>
              <input type="file" id="tn-i2p-file-input" class="d-none" accept="image/jpeg,image/png,image/webp" multiple>
            </div>

            <!-- 2. Reorderable & Rotatable Image Cards -->
            <div id="tn-i2p-list-wrap" class="p-3 rounded-3 border bg-light mb-3 d-none">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <span id="tn-i2p-count-badge" class="badge bg-primary">0 Pages</span>
                <span class="small text-muted">Drag cards or use arrow buttons to reorder pages; click <strong>90&deg;</strong> to rotate</span>
              </div>
              <div id="tn-i2p-items-grid" class="row g-3"></div>
            </div>

            <!-- 3. PDF Page Layout Options -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <h3 class="h6 fw-bold text-primary mb-3">
                <i class="bi bi-Sliders me-1" aria-hidden="true"></i> PDF Page Size, Orientation &amp; Margin Options (1 Image per Page)
              </h3>
              <div class="row g-3">
                <div class="col-sm-6 col-md-3">
                  <label for="tn-i2p-page-size" class="form-label fw-bold small">Page Size</label>
                  <select id="tn-i2p-page-size" class="form-select">
                    <option value="a4" selected>A4 (210 &times; 297 mm)</option>
                    <option value="letter">US Letter (8.5 &times; 11 in)</option>
                    <option value="fit">Fit to Image Dimensions</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-i2p-orientation" class="form-label fw-bold small">Page Orientation</label>
                  <select id="tn-i2p-orientation" class="form-select">
                    <option value="portrait" selected>Portrait (Vertical)</option>
                    <option value="landscape">Landscape (Horizontal)</option>
                    <option value="auto">Auto (Match Image)</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-i2p-margin" class="form-label fw-bold small">Page Margin</label>
                  <select id="tn-i2p-margin" class="form-select">
                    <option value="0">No Margin (Full Bleed)</option>
                    <option value="20" selected>Small Margin (20 pt)</option>
                    <option value="38">Standard Margin (38 pt)</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-i2p-filename" class="form-label fw-bold small">Output File Name</label>
                  <input type="text" id="tn-i2p-filename" class="form-control" value="toolnest-scanned-document.pdf" placeholder="document.pdf">
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-i2p-build-btn" class="btn tn-btn--primary px-4">
                <i class="bi bi-file-earmark-pdf" aria-hidden="true"></i> Create PDF
              </button>
              <button type="button" id="tn-i2p-sample-btn" class="btn tn-btn--outline">
                <i class="bi bi-magic" aria-hidden="true"></i> Load 3 Sample Pages
              </button>
              <button type="button" id="tn-i2p-clear-btn" class="btn tn-btn--outline text-danger">
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear All
              </button>
            </div>

            <!-- Progress Bar -->
            <div id="tn-i2p-progress-wrap" class="mb-3 d-none">
              <div class="small fw-semibold mb-1">Building multi-page PDF in browser...</div>
              <div class="progress" style="height: 20px;">
                <div id="tn-i2p-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;">0%</div>
              </div>
            </div>

            <!-- Ready PDF Result Card -->
            <div id="tn-i2p-result-card" class="tn-result-box border-success bg-success-subtle d-none mt-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div id="tn-i2p-result-summary" class="small text-dark"></div>
                <button type="button" id="tn-i2p-download-btn" class="btn tn-btn--success btn-sm">
                  <i class="bi bi-download" aria-hidden="true"></i> Download PDF Now
                </button>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Convert Images to PDF</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Select Your Images:</strong> Drag and drop your scanned pages, NID cards, receipts, or photos into the upload box.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Arrange Order &amp; Page Layout:</strong> Drag cards to reorder pages, rotate sideways photos by 90&deg;, and pick <em>A4</em>, <em>US Letter</em>, or <em>Fit to Image</em>.
              </li>
              <li>
                <strong>Step 3 — Create &amp; Download PDF:</strong> Enter your desired file name, click <strong>Create PDF</strong>, and save the finished PDF to your device.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Turn Phone Scans, Certificates &amp; Receipts into Clean PDFs Privately</h2>
            <p class="text-muted">
              Students submitting handwritten assignments, job applicants combining academic transcripts and National ID cards, and business owners archiving delivery receipts often need to turn multiple phone photos into a single, well-formatted PDF file. Uploading personal identity documents or financial statements to unknown cloud servers poses a serious privacy risk. ToolNest's Image to PDF converter builds your document 100% locally inside your browser using <code>pdf-lib</code>.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-arrows-move text-primary me-1" aria-hidden="true"></i> Drag-and-Drop Page Reordering</h3>
                  <p class="small text-muted mb-0">Easily rearrange page order by dragging thumbnail cards or clicking the left/right move buttons before generating the PDF.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-arrow-clockwise text-primary me-1" aria-hidden="true"></i> Per-Page 90&deg; Rotation</h3>
                  <p class="small text-muted mb-0">Fix upside-down or sideways smartphone scans individually with live visual rotation previews.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-aspect-ratio text-primary me-1" aria-hidden="true"></i> A4, Letter &amp; Fit-to-Image</h3>
                  <p class="small text-muted mb-0">Standardize mixed photos onto printable A4 or Letter sheets with clean margins, or match each page to the image's exact dimensions.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-shield-lock text-primary me-1" aria-hidden="true"></i> Zero Server Uploads</h3>
                  <p class="small text-muted mb-0">Your confidential certificates, contracts, and ID cards never leave your browser.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="i2pFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="i2pFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#i2pFaqCol1" aria-expanded="true" aria-controls="i2pFaqCol1">
                    1. How do I combine multiple JPG or PNG images into a single PDF?
                  </button>
                </h3>
                <div id="i2pFaqCol1" class="accordion-collapse collapse show" aria-labelledby="i2pFaq1" data-bs-parent="#i2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    Select or drag multiple JPG, PNG, or WebP files into the upload area. Arrange their order, select your page size, and click <strong>Create PDF</strong> to bundle all images into one PDF file (one image per page).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="i2pFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i2pFaqCol2" aria-expanded="false" aria-controls="i2pFaqCol2">
                    2. Can I reorder or rotate individual images before creating the PDF?
                  </button>
                </h3>
                <div id="i2pFaqCol2" class="accordion-collapse collapse" aria-labelledby="i2pFaq2" data-bs-parent="#i2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Drag any page card to a new position (or use the arrow buttons on mobile) and click the <strong>90&deg;</strong> button on any card to rotate that specific image.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="i2pFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i2pFaqCol3" aria-expanded="false" aria-controls="i2pFaqCol3">
                    3. What is the difference between A4, Letter, and Fit to Image page size?
                  </button>
                </h3>
                <div id="i2pFaqCol3" class="accordion-collapse collapse" aria-labelledby="i2pFaq3" data-bs-parent="#i2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>A4</strong> and <strong>US Letter</strong> scale and center every image onto a uniform printable sheet size, whereas <strong>Fit to Image Dimensions</strong> makes each PDF page the exact width and height of its photo.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="i2pFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i2pFaqCol4" aria-expanded="false" aria-controls="i2pFaqCol4">
                    4. Does this tool add watermarks or page limits?
                  </button>
                </h3>
                <div id="i2pFaqCol4" class="accordion-collapse collapse" aria-labelledby="i2pFaq4" data-bs-parent="#i2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. Your exported PDF is completely clean with zero watermarks and no page count restrictions.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="i2pFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i2pFaqCol5" aria-expanded="false" aria-controls="i2pFaqCol5">
                    5. Are my scanned ID cards or certificates uploaded to any server?
                  </button>
                </h3>
                <div id="i2pFaqCol5" class="accordion-collapse collapse" aria-labelledby="i2pFaq5" data-bs-parent="#i2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Everything happens 100% locally in your browser so your personal documents remain completely private.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_image_to_pdf', 'tn_image_to_pdf_shortcode');

function tn_image_upscaler_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="AI Image Upscaler Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              Your image stays in your browser. Only the AI model is downloaded.
            </span>
            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Choose an image</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Upscale 2x</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download PNG</div>
            </div>

            <div id="tn-upscale-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Choose or drop a JPEG, PNG, or WebP image">
              <i class="bi bi-cloud-arrow-up-fill tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drop a photo here</h2>
              <p class="small text-muted mb-3">JPEG, PNG, or WebP. Maximum 15 MB and 2 megapixels.</p>
              <label for="tn-upscale-file" class="btn tn-btn--primary mb-0">
                <i class="bi bi-folder2-open" aria-hidden="true"></i> Choose Image
              </label>
              <input type="file" id="tn-upscale-file" class="d-none" accept="image/jpeg,image/png,image/webp">
            </div>

            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-upscale-run" class="btn tn-btn--primary" disabled>
                <i class="bi bi-arrows-angle-expand" aria-hidden="true"></i> Upscale Image 2x
              </button>
              <button type="button" id="tn-upscale-download" class="btn tn-btn--success" disabled>
                <i class="bi bi-download" aria-hidden="true"></i> Download Upscaled PNG
              </button>
              <button type="button" id="tn-upscale-clear" class="btn tn-btn--outline" disabled>
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear
              </button>
            </div>

            <div id="tn-upscale-progress-wrap" class="mb-3 d-none">
              <div id="tn-upscale-progress-label" class="small fw-semibold mb-1">Preparing image upscaling...</div>
              <div class="progress" style="height: 18px;">
                <div id="tn-upscale-progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Image upscaling progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" style="width: 0%;"></div>
              </div>
            </div>
            <p id="tn-upscale-status" class="small text-muted mb-3" role="status" aria-live="polite">Choose an image to get started.</p>

            <div id="tn-upscale-results" class="row g-3 d-none">
              <div class="col-md-6">
                <h2 class="h6 fw-bold">Original image</h2>
                <p id="tn-upscale-original-dimensions" class="small text-muted mb-2"></p>
                <div class="tn-upscaler__preview border rounded-3 d-flex align-items-center justify-content-center overflow-hidden p-2">
                  <img id="tn-upscale-original-preview" alt="Original image before AI upscaling">
                </div>
              </div>
              <div class="col-md-6">
                <h2 class="h6 fw-bold">Upscaled image (2x)</h2>
                <p id="tn-upscale-result-dimensions" class="small text-muted mb-2"></p>
                <div class="tn-upscaler__preview border rounded-3 d-flex align-items-center justify-content-center overflow-hidden p-2">
                  <canvas id="tn-upscale-result-canvas" aria-label="AI-upscaled image preview"></canvas>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="tn-upscale-howto-heading">
            <h2 id="tn-upscale-howto-heading" class="tn-section-title">How to Upscale an Image</h2>
            <ol class="text-muted ps-3 mb-0">
              <li class="mb-2">Choose or drop one JPEG, PNG, or WebP image (up to 15 MB and 2 megapixels).</li>
              <li class="mb-2">Select <strong>Upscale Image 2x</strong>. On first use, the browser downloads the AI model before processing your image.</li>
              <li>Compare the original and enlarged preview, then download the upscaled result as a PNG.</li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="tn-upscale-about-heading">
            <h2 id="tn-upscale-about-heading" class="tn-section-title">Private, Browser-Based AI Upscaling</h2>
            <p class="text-muted mb-0">This tool uses the <a href="https://huggingface.co/Xenova/swin2SR-classical-sr-x2-64" target="_blank" rel="noopener noreferrer">Swin2SR classical 2x super-resolution model</a> through <a href="https://huggingface.co/docs/transformers.js" target="_blank" rel="noopener noreferrer">Transformers.js</a>. Processing runs locally in a browser worker; your image is not uploaded to ToolNest. The model files are downloaded the first time you use the feature. Upscaling estimates image detail rather than recovering guaranteed original pixels, so results vary by photo. The model is based on work released under the Apache 2.0 license.</p>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tn-upscale-faq-heading">
            <h2 id="tn-upscale-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="tnUpscaleFaq">
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnUpscaleFaqHeadingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tnUpscaleFaqOne" aria-expanded="true" aria-controls="tnUpscaleFaqOne">1. Does the AI image upscaler upload my photo?</button>
                </h3>
                <div id="tnUpscaleFaqOne" class="accordion-collapse collapse show" aria-labelledby="tnUpscaleFaqHeadingOne" data-bs-parent="#tnUpscaleFaq">
                  <div class="accordion-body text-muted">No. The AI model is downloaded to your browser, but your selected image is processed locally and is not uploaded to ToolNest.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnUpscaleFaqHeadingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tnUpscaleFaqTwo" aria-expanded="false" aria-controls="tnUpscaleFaqTwo">2. How much larger will my image be?</button>
                </h3>
                <div id="tnUpscaleFaqTwo" class="accordion-collapse collapse" aria-labelledby="tnUpscaleFaqHeadingTwo" data-bs-parent="#tnUpscaleFaq">
                  <div class="accordion-body text-muted">This is a 2x super-resolution model: it doubles the width and height, producing four times as many pixels.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnUpscaleFaqHeadingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tnUpscaleFaqThree" aria-expanded="false" aria-controls="tnUpscaleFaqThree">3. Which images can I upscale?</button>
                </h3>
                <div id="tnUpscaleFaqThree" class="accordion-collapse collapse" aria-labelledby="tnUpscaleFaqHeadingThree" data-bs-parent="#tnUpscaleFaq">
                  <div class="accordion-body text-muted">Upload one JPEG, PNG, or WebP image up to 15 MB and 2 megapixels. The enlarged image downloads as a PNG.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnUpscaleFaqHeadingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tnUpscaleFaqFour" aria-expanded="false" aria-controls="tnUpscaleFaqFour">4. Will upscaling restore every lost detail?</button>
                </h3>
                <div id="tnUpscaleFaqFour" class="accordion-collapse collapse" aria-labelledby="tnUpscaleFaqHeadingFour" data-bs-parent="#tnUpscaleFaq">
                  <div class="accordion-body text-muted">No. AI super-resolution estimates details while enlarging an image; it cannot guarantee recovery of the original detail. Results vary depending on image content and quality.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="tnUpscaleFaqHeadingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tnUpscaleFaqFive" aria-expanded="false" aria-controls="tnUpscaleFaqFive">5. Why does the first upscaling take longer?</button>
                </h3>
                <div id="tnUpscaleFaqFive" class="accordion-collapse collapse" aria-labelledby="tnUpscaleFaqHeadingFive" data-bs-parent="#tnUpscaleFaq">
                  <div class="accordion-body text-muted">The browser downloads the AI model the first time you use the tool. Processing time afterward depends on your device and image dimensions.</div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_image_upscaler', 'tn_image_upscaler_shortcode');

function tn_invoice_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Invoice and Courier Slip Generator Workspace">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
              <span class="tn-privacy-banner mb-0">
                <i class="bi bi-shield-check" aria-hidden="true"></i>
                100% Client-Side &bull; Customer Data Never Leaves Your Device
              </span>
              <div class="d-flex gap-2">
                <button type="button" id="tn-inv-sample-btn" class="btn tn-btn--outline btn-sm">
                  <i class="bi bi-magic" aria-hidden="true"></i> Load Sample COD Order
                </button>
                <button type="button" id="tn-inv-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                  <i class="bi bi-trash3" aria-hidden="true"></i> Clear Form
                </button>
              </div>
            </div>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Enter Store &amp; Customer</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Add Product Rows &amp; COD</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Print PDF or Save PNG</div>
            </div>

            <!-- Document Settings -->
            <div class="row g-3 mb-3">
              <div class="col-sm-6 col-md-3">
                <label for="tn-inv-mode" class="form-label fw-bold small">Document Type</label>
                <select id="tn-inv-mode" class="form-select form-select-sm">
                  <option value="courier" selected>COD Courier Parcel Slip</option>
                  <option value="invoice">Standard Invoice</option>
                </select>
              </div>
              <div class="col-sm-6 col-md-3">
                <label for="tn-inv-courier" class="form-label fw-bold small">Courier Service</label>
                <select id="tn-inv-courier" class="form-select form-select-sm">
                  <option value="Steadfast Courier" selected>Steadfast Courier</option>
                  <option value="Pathao Courier">Pathao Courier</option>
                  <option value="RedX Logistics">RedX Logistics</option>
                  <option value="Sundarban Courier">Sundarban Courier</option>
                  <option value="Paperfly">Paperfly</option>
                  <option value="Home Delivery">Own Rider / Direct</option>
                </select>
              </div>
              <div class="col-4 col-md-2">
                <label for="tn-inv-currency" class="form-label fw-bold small">Currency</label>
                <select id="tn-inv-currency" class="form-select form-select-sm">
                  <option value="৳" selected>BDT (৳)</option>
                  <option value="$">USD ($)</option>
                  <option value="₹">INR (₹)</option>
                  <option value="£">GBP (£)</option>
                  <option value="€">EUR (€)</option>
                </select>
              </div>
              <div class="col-4 col-md-2">
                <label for="tn-inv-number" class="form-label fw-bold small">Invoice / Order #</label>
                <input type="text" id="tn-inv-number" class="form-control form-control-sm" value="ORD-2026-101">
              </div>
              <div class="col-4 col-md-2">
                <label for="tn-inv-date" class="form-label fw-bold small">Date</label>
                <input type="date" id="tn-inv-date" class="form-control form-control-sm">
              </div>
            </div>

            <!-- Seller & Buyer Columns -->
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <div class="p-3 rounded border bg-light h-100">
                  <h2 class="h6 fw-bold text-primary mb-2">From (Merchant / Seller Details)</h2>
                  <div class="mb-2">
                    <label for="tn-inv-seller-name" class="visually-hidden">Store or Company Name</label>
                    <input type="text" id="tn-inv-seller-name" class="form-control form-control-sm" value="Dhaka Attire &amp; Lifestyle" placeholder="Store / Business Name">
                  </div>
                  <div class="mb-2">
                    <label for="tn-inv-seller-phone" class="visually-hidden">Merchant Phone</label>
                    <input type="text" id="tn-inv-seller-phone" class="form-control form-control-sm" value="01711-000000" placeholder="Merchant Phone Number">
                  </div>
                  <div>
                    <label for="tn-inv-seller-addr" class="visually-hidden">Merchant Address</label>
                    <input type="text" id="tn-inv-seller-addr" class="form-control form-control-sm" value="Dhanmondi, Dhaka-1209" placeholder="Pickup / Office Address">
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="p-3 rounded border bg-light h-100">
                  <h2 class="h6 fw-bold text-primary mb-2">To (Customer / Recipient Details)</h2>
                  <div class="mb-2">
                    <label for="tn-inv-buyer-name" class="visually-hidden">Customer Name</label>
                    <input type="text" id="tn-inv-buyer-name" class="form-control form-control-sm" value="Tanvir Ahmed" placeholder="Customer Full Name">
                  </div>
                  <div class="mb-2">
                    <label for="tn-inv-buyer-phone" class="visually-hidden">Customer Phone</label>
                    <input type="text" id="tn-inv-buyer-phone" class="form-control form-control-sm" value="01819-555555" placeholder="Customer Phone Number">
                  </div>
                  <div>
                    <label for="tn-inv-buyer-addr" class="visually-hidden">Customer Delivery Address</label>
                    <input type="text" id="tn-inv-buyer-addr" class="form-control form-control-sm" value="House 12, Road 3, Uttara Sector 7, Dhaka" placeholder="Full Delivery Address &amp; Thana">
                  </div>
                </div>
              </div>
            </div>

            <!-- Line Items Editor -->
            <div class="mb-3">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <h2 class="h6 fw-bold mb-0">Order Line Items</h2>
                <button type="button" id="tn-inv-add-item" class="btn tn-btn--outline btn-sm">
                  <i class="bi bi-plus-circle-fill text-primary" aria-hidden="true"></i> Add Item Row
                </button>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-sm align-middle mb-0">
                  <thead class="table-light small">
                    <tr>
                      <th>Item / Product Description</th>
                      <th class="text-center">Qty</th>
                      <th class="text-end">Unit Price</th>
                      <th class="text-end">Line Total</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody id="tn-inv-items-editor"></tbody>
                </table>
              </div>
            </div>

            <!-- Charges, Discount & Advance Inputs -->
            <div class="row g-2 mb-4">
              <div class="col-6 col-sm-3">
                <label for="tn-inv-discount" class="form-label fw-bold small">Discount (Flat)</label>
                <input type="number" id="tn-inv-discount" class="form-control form-control-sm" value="0" min="0">
              </div>
              <div class="col-6 col-sm-3">
                <label for="tn-inv-tax" class="form-label fw-bold small">Tax / VAT (%)</label>
                <input type="number" id="tn-inv-tax" class="form-control form-control-sm" value="0" min="0" max="100" step="0.5">
              </div>
              <div class="col-6 col-sm-3">
                <label for="tn-inv-delivery" class="form-label fw-bold small">Delivery Charge</label>
                <input type="number" id="tn-inv-delivery" class="form-control form-control-sm" value="80" min="0">
              </div>
              <div class="col-6 col-sm-3">
                <label for="tn-inv-advance" class="form-label fw-bold small">Advance Paid (bKash)</label>
                <input type="number" id="tn-inv-advance" class="form-control form-control-sm" value="100" min="0">
              </div>
              <div class="col-12 mt-2">
                <label for="tn-inv-notes" class="form-label fw-bold small mb-1">Delivery / Invoice Note</label>
                <input type="text" id="tn-inv-notes" class="form-control form-control-sm" value="Please call customer before delivery. Allow parcel check in front of rider.">
              </div>
            </div>

            <!-- Printable Live Preview Sheet -->
            <div class="tn-invoice-preview tn-printable-area mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-start border-bottom pb-3 mb-3 gap-2">
                <div>
                  <h3 id="tn-prev-seller-name" class="h4 fw-bold mb-1">Dhaka Attire &amp; Lifestyle</h3>
                  <div id="tn-prev-seller-phone" class="small fw-semibold">01711-000000</div>
                  <div id="tn-prev-seller-addr" class="small text-muted">Dhanmondi, Dhaka-1209</div>
                </div>
                <div class="text-sm-end">
                  <span id="tn-prev-title" class="badge bg-primary fs-6 px-3 py-2 mb-1 d-inline-block">COD COURIER PARCEL SLIP</span>
                  <div class="small"><strong>No:</strong> <span id="tn-prev-invno">ORD-2026-101</span> &bull; <strong>Date:</strong> <span id="tn-prev-date">2026-10-26</span></div>
                  <span id="tn-prev-courier-badge" class="badge bg-warning text-dark mt-1">Steadfast Courier</span>
                </div>
              </div>

              <!-- Recipient Details -->
              <div class="p-3 rounded bg-light border mb-3">
                <div class="small text-uppercase text-muted fw-bold mb-1">Deliver / Bill To:</div>
                <div id="tn-prev-buyer-name" class="fw-bold fs-5">Tanvir Ahmed</div>
                <div class="small fw-semibold">Phone: <span id="tn-prev-buyer-phone">01819-555555</span></div>
                <div id="tn-prev-buyer-addr" class="small text-muted">House 12, Road 3, Uttara Sector 7, Dhaka</div>
              </div>

              <!-- Preview Items Table -->
              <div class="table-responsive mb-3">
                <table class="table table-sm table-bordered mb-0 small">
                  <thead class="table-light">
                    <tr>
                      <th style="width:40px;">#</th>
                      <th>Description</th>
                      <th class="text-center" style="width:70px;">Qty</th>
                      <th class="text-end" style="width:120px;">Price</th>
                      <th class="text-end" style="width:130px;">Total</th>
                    </tr>
                  </thead>
                  <tbody id="tn-prev-items-body"></tbody>
                </table>
              </div>

              <div class="row g-3 align-items-center">
                <div class="col-md-6">
                  <div id="tn-prev-cod-banner" class="p-3 rounded bg-success-subtle border border-success text-success fw-bold text-center fs-5 mb-2">
                    COLLECTIBLE COD: ৳ 2,080.00
                  </div>
                  <p id="tn-prev-notes" class="small text-muted mb-0"></p>
                </div>
                <div class="col-md-6">
                  <ul class="list-unstyled small mb-0">
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span>Subtotal:</span>
                      <strong id="tn-prev-subtotal">৳ 2,100.00</strong>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span>Discount:</span>
                      <strong id="tn-prev-discount">- ৳ 0.00</strong>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span>Tax / VAT:</span>
                      <strong id="tn-prev-tax">৳ 0.00</strong>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span>Delivery Charge:</span>
                      <strong id="tn-prev-delivery">৳ 80.00</strong>
                    </li>
                    <li class="d-flex justify-content-between py-1 border-bottom">
                      <span>Advance Paid:</span>
                      <strong id="tn-prev-advance">- ৳ 100.00</strong>
                    </li>
                    <li class="d-flex justify-content-between pt-2 fs-6 fw-bold text-primary">
                      <span>Net Balance / COD Due:</span>
                      <span id="tn-prev-due">৳ 2,080.00</span>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- Export Buttons -->
            <div class="d-flex flex-wrap gap-2 justify-content-center tn-no-print">
              <button type="button" id="tn-inv-print-btn" class="btn tn-btn--primary">
                <i class="bi bi-printer-fill" aria-hidden="true"></i> Print / Save as PDF
              </button>
              <button type="button" id="tn-inv-dl-img-btn" class="btn tn-btn--success">
                <i class="bi bi-image" aria-hidden="true"></i> Download PNG Receipt (For Messenger/WhatsApp)
              </button>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Generate an Invoice or COD Courier Slip</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Fill Merchant &amp; Customer Info:</strong> Choose between <em>COD Courier Parcel Slip</em> or <em>Standard Invoice</em>, pick your courier service, and enter the sender and recipient details.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Add Products &amp; Charges:</strong> Add product rows, set quantities and prices, and enter delivery charges (e.g. 60 BDT Inside Dhaka / 120 BDT Outside Dhaka) and any advance bKash payment.
              </li>
              <li>
                <strong>Step 3 — Print PDF or Share PNG:</strong> Click <strong>Print / Save as PDF</strong> to print on A4/thermal paper or click <strong>Download PNG Receipt</strong> to send an instant order confirmation image in Messenger.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Built for Bangladesh F-Commerce Sellers &amp; Global Freelancers</h2>
            <p class="text-muted">
              Running a Facebook page shop (F-commerce) or small e-commerce business in Bangladesh means handling dozens of Cash-on-Delivery (COD) orders every day through Steadfast, Pathao, RedX, Sundarban, or Paperfly. Customers frequently pay the delivery fee in advance via bKash or Nagad and pay the remaining balance in cash to the delivery rider.
            </p>
            <p class="text-muted">
              Standard western invoice templates lack fields for courier names, delivery charges, and partial advance deductions—leading to confusion when the courier rider collects cash at the doorstep. ToolNest's Invoice &amp; Courier Slip Generator calculates the exact <strong>Collectible COD Balance</strong> automatically and displays it in a bold banner.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-truck text-primary me-1" aria-hidden="true"></i> Courier-Ready COD Banner</h3>
                  <p class="small text-muted mb-0">Clearly shows riders whether an order is Paid in Full (৳ 0 COD) or the exact Taka amount to collect.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-whatsapp text-primary me-1" aria-hidden="true"></i> Instant Messenger PNG Receipt</h3>
                  <p class="small text-muted mb-0">Export a clean PNG receipt image in one click so you can send order confirmation bills directly in chat.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="invFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="iFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#iFaqCol1" aria-expanded="true" aria-controls="iFaqCol1">
                    1. Can I use this tool for Bangladesh F-commerce Cash on Delivery (COD) parcels?
                  </button>
                </h3>
                <div id="iFaqCol1" class="accordion-collapse collapse show" aria-labelledby="iFaq1" data-bs-parent="#invFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Select <em>COD Courier Parcel Slip</em>, choose your courier (Steadfast, Pathao, RedX, Sundarban, Paperfly), enter the delivery charge and any bKash advance, and the slip highlights the exact COD amount to collect.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="iFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#iFaqCol2" aria-expanded="false" aria-controls="iFaqCol2">
                    2. How do I save the invoice as a PDF or send it on Messenger/WhatsApp?
                  </button>
                </h3>
                <div id="iFaqCol2" class="accordion-collapse collapse" aria-labelledby="iFaq2" data-bs-parent="#invFaqAccordion">
                  <div class="accordion-body text-muted">
                    Click <strong>Print / Save as PDF</strong> to print only the clean invoice box (all website menus and ads are hidden automatically when printing), or click <strong>Download PNG Receipt</strong> to get an image file for chat apps.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="iFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#iFaqCol3" aria-expanded="false" aria-controls="iFaqCol3">
                    3. Are my customer phone numbers and order details stored on your server?
                  </button>
                </h3>
                <div id="iFaqCol3" class="accordion-collapse collapse" aria-labelledby="iFaq3" data-bs-parent="#invFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. Everything runs 100% locally in your web browser. Your customer database and sales figures stay completely private on your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="iFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#iFaqCol4" aria-expanded="false" aria-controls="iFaqCol4">
                    4. Can I add multiple product rows, discounts, and partial advances?
                  </button>
                </h3>
                <div id="iFaqCol4" class="accordion-collapse collapse" aria-labelledby="iFaq4" data-bs-parent="#invFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Click <strong>+ Add Item Row</strong> to add as many products as needed, and use the Discount, Tax %, Delivery Charge, and Advance Paid fields to calculate the net balance automatically.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="iFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#iFaqCol5" aria-expanded="false" aria-controls="iFaqCol5">
                    5. Does the invoice generator support currencies other than BDT Taka?
                  </button>
                </h3>
                <div id="iFaqCol5" class="accordion-collapse collapse" aria-labelledby="iFaq5" data-bs-parent="#invFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Switch the Currency selector between BDT (৳), USD ($), INR (₹), GBP (£), and EUR (€) at any time.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_invoice_generator', 'tn_invoice_generator_shortcode');

function tn_json_formatter_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="JSON Formatter Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; JSON Payloads Never Leave Your Browser
            </span>

            <div class="row g-3 mb-3">
              <div class="col-12">
                <label for="jf-input" class="form-label small mb-2 fw-bold">Input JSON</label>
                <textarea id="jf-input" class="form-control font-monospace" rows="6" placeholder='Paste JSON here... e.g. {"name":"ToolNest","tools":["converter","generator"]}'></textarea>
              </div>
            </div>

            <div class="d-flex gap-2">
              <button id="jf-format" class="btn btn-primary flex-grow-1" type="button"><i class="bi bi-braces me-1" aria-hidden="true"></i> Format JSON</button>
              <button id="jf-minify-btn" class="btn btn-outline-secondary flex-grow-1" type="button"><i class="bi bi-arrows-angle-down-up me-1" aria-hidden="true"></i> Minify JSON</button>
            </div>

            <div class="mt-3">
              <label for="jf-output" class="form-label small mb-2 fw-bold">Output JSON</label>
              <textarea id="jf-output" class="form-control font-monospace" rows="6" readonly></textarea>
            </div>

            <div class="mt-3 d-flex gap-2">
              <button id="jf-copy" class="btn btn-sm btn-outline-primary" type="button">Copy Output</button>
              <button id="jf-reset" class="btn btn-sm btn-secondary" type="button">Reset</button>
            </div>

            <div class="mt-3 small text-muted">
              <span>Status: <span id="jf-status">Ready</span></span>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Format or Minify JSON</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Paste Your JSON:</strong> Enter or paste any raw JSON object or array into the <em>Input JSON</em> box.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Choose Format or Minify:</strong> Click <strong>Format JSON</strong> for clean 2-space indentation, or click <strong>Minify JSON</strong> to compact it into a single line.
              </li>
              <li>
                <strong>Step 3 — Copy the Output:</strong> Check the status line for validation feedback and click <strong>Copy Output</strong> to copy the result to your clipboard.
              </li>
            </ol>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="jfFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="jfFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#jfFaqCol1" aria-expanded="true" aria-controls="jfFaqCol1">
                    1. Does this JSON Formatter upload my API payloads to a server?
                  </button>
                </h3>
                <div id="jfFaqCol1" class="accordion-collapse collapse show" aria-labelledby="jfFaq1" data-bs-parent="#jfFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. All JSON parsing, formatting, and minifying runs 100% locally in your browser using JavaScript's native <code>JSON.parse</code> and <code>JSON.stringify</code> functions.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="jfFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#jfFaqCol2" aria-expanded="false" aria-controls="jfFaqCol2">
                    2. What is the difference between Format JSON and Minify JSON?
                  </button>
                </h3>
                <div id="jfFaqCol2" class="accordion-collapse collapse" aria-labelledby="jfFaq2" data-bs-parent="#jfFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>Format JSON</strong> adds 2-space indentation and line breaks so nested objects and arrays are easy to read. <strong>Minify JSON</strong> strips all unnecessary whitespace to reduce size.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="jfFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#jfFaqCol3" aria-expanded="false" aria-controls="jfFaqCol3">
                    3. Will the tool tell me if my JSON is invalid?
                  </button>
                </h3>
                <div id="jfFaqCol3" class="accordion-collapse collapse" aria-labelledby="jfFaq3" data-bs-parent="#jfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. If there is a syntax error such as a trailing comma, missing quote, or unclosed bracket, the status indicator displays the exact parser error message.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="jfFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#jfFaqCol4" aria-expanded="false" aria-controls="jfFaqCol4">
                    4. Can I format JSON containing Bangla or Unicode characters?
                  </button>
                </h3>
                <div id="jfFaqCol4" class="accordion-collapse collapse" aria-labelledby="jfFaq4" data-bs-parent="#jfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. UTF-8 strings including Bangla text and emojis are preserved accurately when formatting or minifying.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="jfFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#jfFaqCol5" aria-expanded="false" aria-controls="jfFaqCol5">
                    5. Why do single quotes or trailing commas cause an error in JSON?
                  </button>
                </h3>
                <div id="jfFaqCol5" class="accordion-collapse collapse" aria-labelledby="jfFaq5" data-bs-parent="#jfFaqAccordion">
                  <div class="accordion-body text-muted">
                    The official JSON standard (RFC 8259) requires double quotes around all keys and string values and does not allow trailing commas after the last element in an object or array.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_json_formatter', 'tn_json_formatter_shortcode');

function tn_land_area_converter_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Land Area Converter Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Instant Land Measurement Calculations
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Enter Land Value &amp; Unit</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Pick Regional Standard</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> View &amp; Copy All 8 Units</div>
            </div>

            <!-- Regional Notice Banner -->
            <div class="alert alert-warning d-flex align-items-center gap-2 py-2 px-3 mb-3 small" role="note">
              <i class="bi bi-exclamation-triangle-fill text-warning fs-5" aria-hidden="true"></i>
              <div>
                <strong>Regional Note:</strong> Katha and bigha values vary by region. Check your local deed or survey record.
              </div>
            </div>

            <!-- Region Standard Selector & Custom Inputs -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <label for="tn-land-region" class="form-label fw-bold small mb-1">Region Standard (for Katha &amp; Bigha)</label>
              <select id="tn-land-region" class="form-select mb-2"></select>

              <div id="tn-land-custom-group" class="row g-3 mt-1 d-none">
                <div class="col-sm-6">
                  <label for="tn-land-custom-katha" class="form-label fw-bold small">Custom Sq Ft per 1 Katha</label>
                  <input type="number" id="tn-land-custom-katha" class="form-control" value="720" min="1" step="0.1">
                </div>
                <div class="col-sm-6">
                  <label for="tn-land-custom-bigha" class="form-label fw-bold small">Custom Sq Ft per 1 Bigha</label>
                  <input type="number" id="tn-land-custom-bigha" class="form-control" value="14400" min="1" step="0.1">
                </div>
              </div>
            </div>

            <!-- Main Conversion Controls -->
            <div class="row g-3 align-items-end mb-3">
              <div class="col-md-4">
                <label for="tn-land-value" class="form-label fw-bold">Area Value</label>
                <input type="number" id="tn-land-value" class="form-control form-control-lg fw-bold" value="5" min="0" step="any" placeholder="Enter area...">
              </div>
              <div class="col-md-3">
                <label for="tn-land-from" class="form-label fw-bold">From Unit</label>
                <select id="tn-land-from" class="form-select"></select>
              </div>
              <div class="col-md-2 text-center">
                <button type="button" id="tn-land-swap-btn" class="btn tn-btn--outline w-100" title="Swap From and To units">
                  <i class="bi bi-arrow-left-right" aria-hidden="true"></i> Swap
                </button>
              </div>
              <div class="col-md-3">
                <label for="tn-land-to" class="form-label fw-bold">To Unit</label>
                <select id="tn-land-to" class="form-select"></select>
              </div>
            </div>

            <!-- Quick Presets & Bangla Digits Toggle -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
              <div class="d-flex flex-wrap align-items-center gap-1">
                <span class="small text-muted me-1">Quick Examples:</span>
                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-land-preset data-land-val="5" data-land-from="katha" data-land-to="sqft">5 Katha &rarr; Sq Ft</button>
                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-land-preset data-land-val="10" data-land-from="decimal" data-land-to="katha">10 Decimal &rarr; Katha</button>
                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-land-preset data-land-val="1" data-land-from="bigha" data-land-to="decimal">1 Bigha &rarr; Decimal</button>
                <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-land-preset data-land-val="1" data-land-from="acre" data-land-to="sqft">1 Acre &rarr; Sq Ft</button>
              </div>

              <div class="form-check form-switch mb-0">
                <input class="form-check-input" type="checkbox" role="switch" id="tn-land-bn-digits">
                <label class="form-check-label small fw-semibold tn-bangla-text" for="tn-land-bn-digits">
                  Show Bangla Digits (বাংলা সংখ্যা ০-৯)
                </label>
              </div>
            </div>

            <!-- Primary Result Card -->
            <div class="tn-result-box border-primary bg-primary-subtle mb-4">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div>
                  <div class="small fw-bold text-uppercase text-primary">Converted Area Result</div>
                  <div id="tn-land-result-val" class="h3 fw-bold text-dark mb-1">3,600 Square Feet (sq ft)</div>
                  <div id="tn-land-result-sub" class="small text-muted">5 Katha (কাঠা) = 3,600 Square Feet (sq ft)</div>
                </div>
                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-land-copy-btn" class="btn tn-btn--primary btn-sm">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Result
                  </button>
                  <button type="button" id="tn-land-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>
              </div>
            </div>

            <!-- All Units Simultaneous Conversion Table -->
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h2 class="h6 fw-bold mb-0"><i class="bi bi-table text-primary me-1" aria-hidden="true"></i> All 8 Land Units at a Glance</h2>
              <button type="button" id="tn-land-copy-table-btn" class="btn tn-btn--outline btn-sm py-1">
                <i class="bi bi-files" aria-hidden="true"></i> Copy Full Table
              </button>
            </div>
            <div class="table-responsive border rounded-3 bg-white">
              <table class="table table-hover align-middle mb-0 small">
                <thead class="table-light">
                  <tr>
                    <th scope="col">Unit Name (English)</th>
                    <th scope="col">Bangla Name</th>
                    <th scope="col">Equivalent Value</th>
                    <th scope="col">Standard Factor</th>
                  </tr>
                </thead>
                <tbody id="tn-land-table-body"></tbody>
              </table>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Convert Land Area Units</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Select Your Regional Standard:</strong> Keep the default <em>Common Standard (1 Katha = 720 sq ft, 1 Bigha = 20 Katha)</em> or select <em>Custom Regional Standard</em> if your local land survey uses a different Katha or Bigha size.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Enter Area &amp; Choose Units:</strong> Type your land area value and select your starting unit (e.g., <em>Decimal / Shatak</em>) and target unit (e.g., <em>Katha</em> or <em>Square Feet</em>).
              </li>
              <li>
                <strong>Step 3 — Review All Units &amp; Copy:</strong> Check the primary conversion box or inspect all 8 units simultaneously in the comparison table, toggle Bangla digits if preparing a Bangla document, and click <strong>Copy Result</strong>.
              </li>
            </ol>
          </section>

          <!-- Detailed Explanation of Units & 3 Worked Examples (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Understanding Land Measurement Units in Bangladesh &amp; South Asia</h2>
            <p class="text-muted">
              Whether you are buying an apartment plot in Dhaka, verifying a family land deed (<em>Dalil</em>) or <em>Khatian</em> record (CS, SA, RS, or BS survey), or calculating construction floor area, understanding how traditional South Asian units relate to statutory imperial and metric units prevents costly mistakes.
            </p>

            <h3 class="h6 fw-bold mt-3">What Each Land Area Unit Means</h3>
            <ul class="text-muted small">
              <li class="mb-1"><strong>Square Feet (sq ft / বর্গফুট):</strong> The fundamental unit used by architects, real estate developers, and RAJUK/CDA building plans.</li>
              <li class="mb-1"><strong>Square Meter (sq m / বর্গমিটার):</strong> The international metric standard where <code>1 sq m = 10.7639 sq ft</code>.</li>
              <li class="mb-1"><strong>Square Yard (sq yd / বর্গগজ):</strong> Equal to a square measuring 3 feet by 3 feet, so <code>1 sq yd = 9 sq ft</code>.</li>
              <li class="mb-1"><strong>Decimal / Shatak (শতক / ডেসিমেল):</strong> The primary legal land survey unit across Bangladesh. Exactly 1/100th of an acre: <code>1 Decimal = 435.6 sq ft</code>.</li>
              <li class="mb-1"><strong>Katha (কাঠা):</strong> Widely used for residential plots. Under the standard official definition, <code>1 Katha = 720 sq ft</code> (approx. <code>1.6529 Decimal</code>).</li>
              <li class="mb-1"><strong>Bigha (বিঘা):</strong> Traditional agricultural and estate unit equal to 20 standard Kathas: <code>1 Bigha = 14,400 sq ft</code> (approx. <code>33.0578 Decimal</code>).</li>
              <li class="mb-1"><strong>Acre (একর):</strong> Equals exactly <code>100 Decimals</code> or <code>43,560 sq ft</code> (approx. <code>3.025 Bigha</code>).</li>
              <li class="mb-0"><strong>Hectare (হেক্টর):</strong> Metric unit of 10,000 square meters, equal to <code>107,639 sq ft</code> or approximately <code>2.471 Acres</code>.</li>
            </ul>

            <h3 class="h6 fw-bold mt-4">3 Practical Worked Examples</h3>
            <div class="row g-3 mt-1">
              <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <div class="fw-bold text-primary small mb-1">Example 1: Katha to Sq Ft &amp; Decimal</div>
                  <p class="small text-muted mb-0">
                    A residential plot in Uttara measures <strong>5 Katha</strong>. Using the common standard (<code>1 Katha = 720 sq ft</code>):<br>
                    <code>5 &times; 720 = 3,600 sq ft</code>.<br>
                    In Decimals: <code>3,600 &divide; 435.6 = 8.2645 Decimal</code>.
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <div class="fw-bold text-primary small mb-1">Example 2: Decimal (Shatak) to Katha</div>
                  <p class="small text-muted mb-0">
                    A rural deed lists <strong>15 Decimal (শতক)</strong> of land.<br>
                    First convert to Square Feet: <code>15 &times; 435.6 = 6,534 sq ft</code>.<br>
                    Divide by 720 sq ft/Katha: <code>6,534 &divide; 720 = 9.075 Katha</code>.
                  </p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <div class="fw-bold text-primary small mb-1">Example 3: Acre to Bigha &amp; Sq Meter</div>
                  <p class="small text-muted mb-0">
                    An orchard covers <strong>2 Acres</strong>.<br>
                    In Square Feet: <code>2 &times; 43,560 = 87,120 sq ft</code>.<br>
                    In Bighas: <code>87,120 &divide; 14,400 = 6.05 Bigha</code>.<br>
                    In Sq Meters: <code>87,120 &divide; 10.7639 = 8,093.72 sq m</code>.
                  </p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="landFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="ldFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ldFaqCol1" aria-expanded="true" aria-controls="ldFaqCol1">
                    1. How many Square Feet are in 1 Decimal (Shatak) and 1 Katha?
                  </button>
                </h3>
                <div id="ldFaqCol1" class="accordion-collapse collapse show" aria-labelledby="ldFaq1" data-bs-parent="#landFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>1 Decimal (Shatak)</strong> is legally standardized across Bangladesh at exactly <strong>435.6 Square Feet</strong>. Under the standard official measurement, <strong>1 Katha</strong> equals <strong>720 Square Feet</strong> (which is <code>1.6529 Decimal</code>).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ldFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ldFaqCol2" aria-expanded="false" aria-controls="ldFaqCol2">
                    2. Why do Katha and Bigha sizes vary across different regions?
                  </button>
                </h3>
                <div id="ldFaqCol2" class="accordion-collapse collapse" aria-labelledby="ldFaq2" data-bs-parent="#landFaqAccordion">
                  <div class="accordion-body text-muted">
                    While <em>Decimal</em> and <em>Acre</em> are fixed by statute in government land registries, <em>Katha</em> and <em>Bigha</em> evolved from historical regional measurements. Always check your local deed or survey record, and select <strong>Custom Regional Standard</strong> if your district uses a local Katha size.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ldFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ldFaqCol3" aria-expanded="false" aria-controls="ldFaqCol3">
                    3. How many Decimals (Shatak) make 1 Acre and 1 Bigha?
                  </button>
                </h3>
                <div id="ldFaqCol3" class="accordion-collapse collapse" aria-labelledby="ldFaq3" data-bs-parent="#landFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>1 Acre</strong> equals exactly <strong>100 Decimals</strong> (<code>43,560 sq ft</code>). A standard 20-Katha <strong>Bigha</strong> (<code>14,400 sq ft</code>) equals approximately <strong>33.0578 Decimals</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ldFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ldFaqCol4" aria-expanded="false" aria-controls="ldFaqCol4">
                    4. Can I view converted land measurements in Bangla digits?
                  </button>
                </h3>
                <div id="ldFaqCol4" class="accordion-collapse collapse" aria-labelledby="ldFaq4" data-bs-parent="#landFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Turn on the <strong>Show Bangla Digits (বাংলা সংখ্যা ০-৯)</strong> toggle switch to format every number in Bengali numerals for deeds, notices, or reports.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ldFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ldFaqCol5" aria-expanded="false" aria-controls="ldFaqCol5">
                    5. Does this Land Area Converter run offline in my browser?
                  </button>
                </h3>
                <div id="ldFaqCol5" class="accordion-collapse collapse" aria-labelledby="ldFaq5" data-bs-parent="#landFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. All calculations run 100% locally in your browser with zero server calls.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_land_area_converter', 'tn_land_area_converter_shortcode');

function tn_loan_emi_fdr_dps_calculator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Loan EMI, FDR and DPS Calculator Workspace">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
              <span class="tn-privacy-banner mb-0">
                <i class="bi bi-shield-check" aria-hidden="true"></i>
                100% Client-Side &bull; Financial Figures Never Leave Your Browser
              </span>
            </div>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Choose Loan, FDR, or DPS</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Enter Amount, Rate &amp; Tenure</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> View Breakdown &amp; Schedule</div>
            </div>

            <!-- 3 Tabs Navigation -->
            <ul class="nav nav-pills nav-fill gap-2 p-2 bg-light rounded-3 border mb-4" id="loanTabs" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold" id="tab-emi-btn" data-bs-toggle="pill" data-bs-target="#pane-emi" type="button" role="tab" aria-controls="pane-emi" aria-selected="true">
                  <i class="bi bi-bank me-1" aria-hidden="true"></i> 1. Loan EMI
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="tab-fdr-btn" data-bs-toggle="pill" data-bs-target="#pane-fdr" type="button" role="tab" aria-controls="pane-fdr" aria-selected="false">
                  <i class="bi bi-safe me-1" aria-hidden="true"></i> 2. FDR Calculator
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold" id="tab-dps-btn" data-bs-toggle="pill" data-bs-target="#pane-dps" type="button" role="tab" aria-controls="pane-dps" aria-selected="false">
                  <i class="bi bi-piggy-bank me-1" aria-hidden="true"></i> 3. DPS Calculator
                </button>
              </li>
            </ul>

            <div class="tab-content" id="loanTabContent">
              <!-- TAB 1: LOAN EMI -->
              <div class="tab-pane fade show active" id="pane-emi" role="tabpanel" aria-labelledby="tab-emi-btn">
                <div class="row g-3 mb-4">
                  <div class="col-md-6">
                    <label for="tn-emi-principal" class="form-label fw-bold">Loan Amount (&#2547;)</label>
                    <input type="number" id="tn-emi-principal" class="form-control" value="500000" min="0" step="any">
                  </div>
                  <div class="col-md-6">
                    <label for="tn-emi-rate" class="form-label fw-bold">Annual Interest Rate (%)</label>
                    <input type="number" id="tn-emi-rate" class="form-control" value="9" min="0" step="any">
                    <div class="d-flex flex-wrap gap-2 mt-2">
                      <button type="button" class="btn btn-sm tn-btn--outline" data-emi-rate-preset="9">9% Personal</button>
                      <button type="button" class="btn btn-sm tn-btn--outline" data-emi-rate-preset="11">11% Home</button>
                      <button type="button" class="btn btn-sm tn-btn--outline" data-emi-rate-preset="13">13% SME</button>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="tn-emi-tenure" class="form-label fw-bold">Loan Tenure</label>
                    <input type="number" id="tn-emi-tenure" class="form-control" value="5" min="0" step="any">
                  </div>
                  <div class="col-md-6">
                    <label for="tn-emi-tenure-unit" class="form-label fw-bold">Tenure Unit</label>
                    <select id="tn-emi-tenure-unit" class="form-select">
                      <option value="years" selected>Years</option>
                      <option value="months">Months</option>
                    </select>
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-sm-4">
                    <div class="tn-stat-card border-primary bg-primary-subtle">
                      <div id="tn-emi-monthly" class="tn-stat-card__value">&#2547; 0.00</div>
                      <div class="tn-stat-card__label">Monthly EMI</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-emi-total-interest" class="tn-stat-card__value text-danger">&#2547; 0.00</div>
                      <div class="tn-stat-card__label">Total Interest</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-emi-total-payment" class="tn-stat-card__value">&#2547; 0.00</div>
                      <div class="tn-stat-card__label">Total Payable</div>
                    </div>
                  </div>
                </div>

                <div class="mb-2 small text-muted" id="tn-emi-ratio-text">0% Principal / 0% Interest</div>
                <div class="progress mb-3" style="height: 1.5rem;">
                  <div id="tn-emi-bar-principal" class="progress-bar bg-primary" role="progressbar" style="width: 50%;">Principal</div>
                  <div id="tn-emi-bar-interest" class="progress-bar bg-danger" role="progressbar" style="width: 50%;">Interest</div>
                </div>

                <div class="d-flex flex-wrap gap-2 mb-3">
                  <button type="button" id="tn-emi-copy-btn" class="btn tn-btn--primary btn-sm">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy EMI Summary
                  </button>
                  <button type="button" id="tn-emi-schedule-btn" class="btn tn-btn--outline btn-sm">Show Amortization Schedule</button>
                  <button type="button" id="tn-emi-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>

                <div id="tn-emi-schedule-wrap" class="d-none">
                  <div class="table-responsive border rounded-3" style="max-height: 360px;">
                    <table class="table table-sm table-striped mb-0">
                      <thead class="table-light sticky-top">
                        <tr>
                          <th>Month</th>
                          <th>EMI</th>
                          <th>Principal</th>
                          <th>Interest</th>
                          <th>Balance</th>
                        </tr>
                      </thead>
                      <tbody id="tn-emi-schedule-body"></tbody>
                    </table>
                  </div>
                  <p class="small text-muted mt-2 mb-0">Schedule is capped at 360 months. Reducing-balance EMI: each month interest is charged on the outstanding balance.</p>
                </div>
              </div>
              <!-- EMI_END -->
              <!-- TAB 2: FDR -->
              <div class="tab-pane fade" id="pane-fdr" role="tabpanel" aria-labelledby="tab-fdr-btn">
                <div class="row g-3 mb-4">
                  <div class="col-md-6"><label for="tn-fdr-principal" class="form-label fw-bold">Deposit Amount (&#2547;)</label><input type="number" id="tn-fdr-principal" class="form-control" value="100000" min="0" step="any"></div>
                  <div class="col-md-6"><label for="tn-fdr-rate" class="form-label fw-bold">Annual Interest Rate (%)</label><input type="number" id="tn-fdr-rate" class="form-control" value="7" min="0" step="any"></div>
                  <div class="col-md-4"><label for="tn-fdr-tenure" class="form-label fw-bold">Tenure</label><input type="number" id="tn-fdr-tenure" class="form-control" value="3" min="0" step="any"></div>
                  <div class="col-md-4"><label for="tn-fdr-tenure-unit" class="form-label fw-bold">Tenure Unit</label><select id="tn-fdr-tenure-unit" class="form-select"><option value="years" selected>Years</option><option value="months">Months</option></select></div>
                  <div class="col-md-4"><label for="tn-fdr-compound" class="form-label fw-bold">Compounding</label><select id="tn-fdr-compound" class="form-select"><option value="1">Yearly</option><option value="2">Half-Yearly</option><option value="4" selected>Quarterly</option><option value="12">Monthly</option></select></div>
                </div>
                <div class="row g-3 mb-3"><div class="col-sm-4"><div class="tn-stat-card border-primary bg-primary-subtle"><div id="tn-fdr-maturity" class="tn-stat-card__value">&#2547; 0.00</div><div class="tn-stat-card__label">Maturity Amount</div></div></div><div class="col-sm-4"><div class="tn-stat-card"><div id="tn-fdr-interest" class="tn-stat-card__value text-success">&#2547; 0.00</div><div class="tn-stat-card__label">Total Interest</div></div></div><div class="col-sm-4"><div class="tn-stat-card"><div id="tn-fdr-effective-rate" class="tn-stat-card__value">0%</div><div class="tn-stat-card__label">Effective Annual Rate</div></div></div></div>
                <div class="mb-2 small text-muted" id="tn-fdr-ratio-text">0% Deposit / 0% Interest</div><div class="progress mb-3" style="height:1.5rem"><div id="tn-fdr-bar-principal" class="progress-bar bg-primary" style="width:50%">Deposit</div><div id="tn-fdr-bar-interest" class="progress-bar bg-success" style="width:50%">Interest</div></div>
                <div class="d-flex flex-wrap gap-2 mb-3"><button type="button" id="tn-fdr-copy-btn" class="btn tn-btn--primary btn-sm">Copy FDR Summary</button><button type="button" id="tn-fdr-reset-btn" class="btn tn-btn--outline btn-sm text-danger">Reset</button></div>
                <div class="table-responsive border rounded-3"><table class="table table-sm table-striped mb-0"><thead class="table-light"><tr><th>Year</th><th>Opening</th><th>Interest</th><th>Closing</th></tr></thead><tbody id="tn-fdr-yearly-body"></tbody></table></div>
              </div>

              <!-- TAB 3: DPS -->
              <div class="tab-pane fade" id="pane-dps" role="tabpanel" aria-labelledby="tab-dps-btn">
                <div class="row g-3 mb-4"><div class="col-md-6"><label for="tn-dps-monthly" class="form-label fw-bold">Monthly Deposit (&#2547;)</label><input type="number" id="tn-dps-monthly" class="form-control" value="5000" min="0" step="any"></div><div class="col-md-6"><label for="tn-dps-rate" class="form-label fw-bold">Annual Interest Rate (%)</label><input type="number" id="tn-dps-rate" class="form-control" value="7" min="0" step="any"></div><div class="col-md-6"><label for="tn-dps-tenure" class="form-label fw-bold">Saving Period</label><input type="number" id="tn-dps-tenure" class="form-control" value="5" min="0" step="any"></div><div class="col-md-6"><label for="tn-dps-tenure-unit" class="form-label fw-bold">Period Unit</label><select id="tn-dps-tenure-unit" class="form-select"><option value="years" selected>Years</option><option value="months">Months</option></select></div></div>
                <div class="row g-3 mb-3"><div class="col-sm-4"><div class="tn-stat-card border-primary bg-primary-subtle"><div id="tn-dps-maturity" class="tn-stat-card__value">&#2547; 0.00</div><div class="tn-stat-card__label">Maturity Amount</div></div></div><div class="col-sm-4"><div class="tn-stat-card"><div id="tn-dps-total-deposit" class="tn-stat-card__value">&#2547; 0.00</div><div class="tn-stat-card__label">Total Deposited</div></div></div><div class="col-sm-4"><div class="tn-stat-card"><div id="tn-dps-interest" class="tn-stat-card__value text-success">&#2547; 0.00</div><div class="tn-stat-card__label">Interest Earned</div></div></div></div>
                <div class="mb-2 small text-muted" id="tn-dps-ratio-text">0% Deposit / 0% Interest</div><div class="progress mb-3" style="height:1.5rem"><div id="tn-dps-bar-deposit" class="progress-bar bg-primary" style="width:50%">Deposit</div><div id="tn-dps-bar-interest" class="progress-bar bg-success" style="width:50%">Interest</div></div>
                <div class="d-flex flex-wrap gap-2 mb-3"><button type="button" id="tn-dps-copy-btn" class="btn tn-btn--primary btn-sm">Copy DPS Summary</button><button type="button" id="tn-dps-reset-btn" class="btn tn-btn--outline btn-sm text-danger">Reset</button></div>
                <div class="table-responsive border rounded-3"><table class="table table-sm table-striped mb-0"><thead class="table-light"><tr><th>Period</th><th>Deposited This Year</th><th>Total Deposited</th><th>Interest</th><th>Balance</th></tr></thead><tbody id="tn-dps-yearly-body"></tbody></table></div>
              </div>

              <div class="tab-pane fade d-none" id="pane-discount" role="tabpanel" aria-labelledby="tab-disc-btn">
                <div class="row g-3 mb-4">
                  <div class="col-md-6">
                    <label for="tn-disc-orig" class="form-label fw-bold">Original Price</label>
                    <input type="number" id="tn-disc-orig" class="form-control" value="2500" min="0" step="any">
                  </div>
                  <div class="col-md-6">
                    <label for="tn-disc-type" class="form-label fw-bold">Primary Discount Type</label>
                    <select id="tn-disc-type" class="form-select">
                      <option value="percent" selected>Percentage Off (%)</option>
                      <option value="amount">Fixed Cash Discount Amount</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="tn-disc-val" class="form-label fw-bold">Primary Discount Value</label>
                    <input type="number" id="tn-disc-val" class="form-control" value="20" min="0" step="any">
                  </div>
                  <div class="col-md-6">
                    <label for="tn-disc-extra" class="form-label fw-bold">Optional 2nd Stacked Discount (%)</label>
                    <input type="number" id="tn-disc-extra" class="form-control" value="0" min="0" max="100" step="any" placeholder="e.g. 5 for extra coupon">
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-sm-4">
                    <div class="tn-stat-card border-primary bg-primary-subtle">
                      <div id="tn-disc-final" class="tn-stat-card__value">৳ 2,000.00</div>
                      <div class="tn-stat-card__label">Final Payable Price</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-disc-saved" class="tn-stat-card__value text-success">৳ 500.00</div>
                      <div class="tn-stat-card__label">Total Amount Saved</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-disc-eff" class="tn-stat-card__value">20%</div>
                      <div class="tn-stat-card__label">Effective Discount %</div>
                    </div>
                  </div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-disc-copy-btn" class="btn tn-btn--primary btn-sm">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Discount Result
                  </button>
                  <button type="button" id="tn-disc-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>
              </div>

              <!-- TAB 2: VAT CALCULATOR -->
              <div class="tab-pane fade" id="pane-vat" role="tabpanel" aria-labelledby="tab-vat-btn">
                <div class="alert alert-warning d-flex align-items-center gap-2 py-2 px-3 mb-3 small" role="note">
                  <i class="bi bi-info-circle-fill text-warning fs-5" aria-hidden="true"></i>
                  <div>
                    <strong>Official NBR Note:</strong> Check the current VAT rate and rules with the National Board of Revenue (NBR) before using this for official purposes.
                  </div>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label for="tn-vat-amount" class="form-label fw-bold">Price Amount</label>
                    <input type="number" id="tn-vat-amount" class="form-control" value="1000" min="0" step="any">
                  </div>
                  <div class="col-md-4">
                    <label for="tn-vat-rate" class="form-label fw-bold">VAT Rate (%) — Editable</label>
                    <div class="input-group">
                      <input type="number" id="tn-vat-rate" class="form-control" value="15" min="0" max="100" step="any">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <label for="tn-vat-mode" class="form-label fw-bold">Calculation Operation</label>
                    <select id="tn-vat-mode" class="form-select">
                      <option value="add" selected>Add VAT (Price is VAT-Exclusive)</option>
                      <option value="remove">Remove VAT (Price is VAT-Inclusive)</option>
                    </select>
                  </div>
                </div>

                <div class="d-flex flex-wrap align-items-center gap-1 mb-4">
                  <span class="small text-muted me-1">Quick VAT Rates:</span>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-vat-preset="5">5%</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-vat-preset="7.5">7.5%</button>
                  <button type="button" class="btn btn-outline-secondary btn-sm py-0 px-2" data-vat-preset="10">10%</button>
                  <button type="button" class="btn btn-outline-primary btn-sm py-0 px-2 fw-semibold" data-vat-preset="15">15% (Standard)</button>
                </div>

                <div class="row g-3 mb-3">
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-vat-net" class="tn-stat-card__value">৳ 1,000.00</div>
                      <div class="tn-stat-card__label">Net Price (Excl. VAT)</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card">
                      <div id="tn-vat-tax" class="tn-stat-card__value text-danger">৳ 150.00</div>
                      <div class="tn-stat-card__label">VAT Amount</div>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="tn-stat-card border-primary bg-primary-subtle">
                      <div id="tn-vat-gross" class="tn-stat-card__value">৳ 1,150.00</div>
                      <div class="tn-stat-card__label">Gross Price (Incl. VAT)</div>
                    </div>
                  </div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-vat-copy-btn" class="btn tn-btn--primary btn-sm">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy VAT Breakdown
                  </button>
                  <button type="button" id="tn-vat-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>
              </div>

              <!-- TAB 3: PROFIT MARGIN & F-COMMERCE NET PROFIT -->
              <div class="tab-pane fade" id="pane-profit" role="tabpanel" aria-labelledby="tab-prof-btn">
                <div class="row g-3 mb-3">
                  <div class="col-md-4">
                    <label for="tn-prof-mode" class="form-label fw-bold">Calculation Mode</label>
                    <select id="tn-prof-mode" class="form-select">
                      <option value="standard" selected>Cost + Selling &rarr; Margin %</option>
                      <option value="reverse">Reverse: Cost + Target Margin % &rarr; Selling Price</option>
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label for="tn-prof-cost" class="form-label fw-bold">Product Cost Price</label>
                    <input type="number" id="tn-prof-cost" class="form-control" value="600" min="0" step="any">
                  </div>
                  <div id="tn-prof-sell-wrap" class="col-md-4">
                    <label for="tn-prof-sell" class="form-label fw-bold">Selling Price</label>
                    <input type="number" id="tn-prof-sell" class="form-control" value="1100" min="0" step="any">
                  </div>
                  <div id="tn-prof-target-wrap" class="col-md-4 d-none">
                    <label for="tn-prof-target" class="form-label fw-bold">Target Gross Margin (%)</label>
                    <input type="number" id="tn-prof-target" class="form-control" value="40" min="0" max="99.9" step="any">
                  </div>
                </div>

                <!-- Optional F-Commerce Extra Cost Fields -->
                <div class="p-3 rounded-3 border bg-light mb-3">
                  <h2 class="h6 fw-bold text-primary mb-2">
                    <i class="bi bi-box-seam me-1" aria-hidden="true"></i> Optional F-Commerce / E-Commerce Per-Order Costs
                  </h2>
                  <div class="row g-3">
                    <div class="col-6 col-md-3">
                      <label for="tn-prof-delivery" class="form-label small fw-bold mb-1">Delivery / Courier</label>
                      <input type="number" id="tn-prof-delivery" class="form-control form-control-sm" value="80" min="0" step="any">
                    </div>
                    <div class="col-6 col-md-3">
                      <label for="tn-prof-pack" class="form-label small fw-bold mb-1">Packaging Cost</label>
                      <input type="number" id="tn-prof-pack" class="form-control form-control-sm" value="25" min="0" step="any">
                    </div>
                    <div class="col-6 col-md-3">
                      <label for="tn-prof-ad" class="form-label small fw-bold mb-1">Ad Cost / Order</label>
                      <input type="number" id="tn-prof-ad" class="form-control form-control-sm" value="90" min="0" step="any">
                    </div>
                    <div class="col-6 col-md-3">
                      <label for="tn-prof-return" class="form-label small fw-bold mb-1">Return Allowance</label>
                      <input type="number" id="tn-prof-return" class="form-control form-control-sm" value="35" min="0" step="any">
                    </div>
                  </div>
                </div>

                <!-- Profit Results Grid -->
                <div class="row g-3 mb-3">
                  <div class="col-6 col-md-3">
                    <div class="tn-stat-card py-2">
                      <div id="tn-prof-out-selling" class="tn-stat-card__value fs-5">৳ 1,100.00</div>
                      <div class="tn-stat-card__label">Selling Price</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="tn-stat-card py-2">
                      <div id="tn-prof-out-gross" class="tn-stat-card__value fs-5">৳ 500.00</div>
                      <div class="tn-stat-card__label">Gross Profit</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="tn-stat-card py-2">
                      <div id="tn-prof-out-margin" class="tn-stat-card__value fs-5">45.45%</div>
                      <div class="tn-stat-card__label">Gross Margin %</div>
                    </div>
                  </div>
                  <div class="col-6 col-md-3">
                    <div class="tn-stat-card py-2">
                      <div id="tn-prof-out-markup" class="tn-stat-card__value fs-5">83.33%</div>
                      <div class="tn-stat-card__label">Markup %</div>
                    </div>
                  </div>
                </div>

                <div class="tn-result-box border-success bg-success-subtle mb-3 text-center">
                  <div class="small fw-bold text-uppercase text-success">True F-Commerce Net Profit Per Order</div>
                  <div id="tn-prof-out-net" class="tn-stat-card__value text-success">৳ 270.00</div>
                  <div id="tn-prof-out-net-margin" class="small text-muted">Net Margin: 24.55% (Extra Costs: ৳ 230.00)</div>
                </div>

                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-prof-copy-btn" class="btn tn-btn--primary btn-sm">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Profit Summary
                  </button>
                  <button type="button" id="tn-prof-reset-btn" class="btn tn-btn--outline btn-sm text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Use the Loan, FDR &amp; DPS Calculator</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2"><strong>Step 1 — Choose a tab:</strong> Select Loan EMI, FDR, or DPS.</li>
              <li class="mb-2"><strong>Step 2 — Enter your figures:</strong> Provide the amount, annual rate, and tenure. Results update instantly in your browser.</li>
              <li><strong>Step 3 — Review or copy:</strong> Check the breakdown and amortization/growth table, then copy the summary for your records.</li>
            </ol>
          </section>

          <!-- Explanation of Each Formula & F-Commerce Guide (300+ Words) -->
          <section class="tn-card mb-4 d-none" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Formulas Explained: Discount, VAT Extraction, Margin vs. Markup &amp; F-Commerce Net Profit</h2>
            <p class="text-muted">
              Accurate pricing is the difference between a profitable online store and selling at a hidden loss. Many Facebook commerce (F-commerce) and Daraz/Shopify merchants calculate gross product profit (`Selling Price - Sourcing Cost`) without accounting for Steadfast/Pathao/RedX courier fees, bubble-wrap packaging, Facebook ad cost per conversion, and COD parcel return losses. ToolNest gives you transparent formulas for every scenario:
            </p>

            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-tag text-primary me-1" aria-hidden="true"></i> 1. Discount &amp; Stacked Discount Formula</h3>
                  <p class="small text-muted mb-0">
                    <code>Discount = Price &times; (Discount% &divide; 100)</code><br>
                    <code>After 1st = Price &minus; Discount</code><br>
                    <code>2nd Discount = After 1st &times; (Extra% &divide; 100)</code>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-percent text-primary me-1" aria-hidden="true"></i> 2. Add VAT vs. Remove Inclusive VAT</h3>
                  <p class="small text-muted mb-0">
                    <strong>Add VAT:</strong> <code>Gross = Net &times; (1 + Rate/100)</code><br>
                    <strong>Remove VAT:</strong> <code>Net = Gross &divide; (1 + Rate/100)</code><br>
                    <code>VAT Amount = Gross &minus; Net</code>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-calculator text-primary me-1" aria-hidden="true"></i> 3. Profit Margin % vs. Markup %</h3>
                  <p class="small text-muted mb-0">
                    <code>Gross Profit = Selling &minus; Cost</code><br>
                    <code>Margin % = (Gross Profit &divide; Selling) &times; 100</code><br>
                    <code>Markup % = (Gross Profit &divide; Cost) &times; 100</code><br>
                    <strong>Reverse Selling Price:</strong> <code>Cost &divide; (1 &minus; Target Margin%)</code>
                  </p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-truck text-primary me-1" aria-hidden="true"></i> 4. F-Commerce Net Profit Formula</h3>
                  <p class="small text-muted mb-0">
                    <code>Net Profit = Gross Profit &minus; (Delivery + Packaging + Ad Cost + Return Allowance)</code><br>
                    <code>Net Margin % = (Net Profit &divide; Selling) &times; 100</code>
                  </p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4 d-none" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="dvpFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol1" aria-expanded="true" aria-controls="dvpFaqCol1">
                    1. How do I remove VAT from a VAT-inclusive price?
                  </button>
                </h3>
                <div id="dvpFaqCol1" class="accordion-collapse collapse show" aria-labelledby="dvpFaq1" data-bs-parent="#dvpFaqAccordion">
                  <div class="accordion-body text-muted">
                    Select <strong>Remove VAT (Price is VAT-Inclusive)</strong> in the VAT tab. Instead of subtracting 15% directly, the tool divides the gross amount by <code>1 + (VAT Rate / 100)</code> (e.g., dividing <code>৳ 1,150</code> by <code>1.15</code> gives a net price of <code>৳ 1,000</code> and VAT of <code>৳ 150</code>).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol2" aria-expanded="false" aria-controls="dvpFaqCol2">
                    2. What is the difference between Profit Margin % and Markup %?
                  </button>
                </h3>
                <div id="dvpFaqCol2" class="accordion-collapse collapse" aria-labelledby="dvpFaq2" data-bs-parent="#dvpFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>Profit Margin %</strong> divides profit by the <em>Selling Price</em>, while <strong>Markup %</strong> divides profit by the <em>Cost Price</em>. For example, buying an item for ৳ 100 and selling it for ৳ 150 gives a <strong>50% Markup</strong> but a <strong>33.33% Profit Margin</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol3" aria-expanded="false" aria-controls="dvpFaqCol3">
                    3. How does the Reverse Target Margin mode work?
                  </button>
                </h3>
                <div id="dvpFaqCol3" class="accordion-collapse collapse" aria-labelledby="dvpFaq3" data-bs-parent="#dvpFaqAccordion">
                  <div class="accordion-body text-muted">
                    When you switch to <strong>Reverse: Cost + Target Margin % &rarr; Selling Price</strong>, enter your product cost and desired gross margin percentage (e.g. 40%). The calculator computes the exact selling price needed using <code>Cost &divide; (1 &minus; 0.40)</code>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol4" aria-expanded="false" aria-controls="dvpFaqCol4">
                    4. Why should F-commerce sellers enter a Return / Failure Allowance?
                  </button>
                </h3>
                <div id="dvpFaqCol4" class="accordion-collapse collapse" aria-labelledby="dvpFaq4" data-bs-parent="#dvpFaqFaqAccordion">
                  <div class="accordion-body text-muted">
                    In cash-on-delivery (COD) e-commerce, if 10% of parcels are returned uncollected, the seller still pays the courier charge for those failed deliveries. Adding a small per-order return allowance (e.g. ৳ 25–৳ 40) reveals your true sustainable net profit.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="dvpFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#dvpFaqCol5" aria-expanded="false" aria-controls="dvpFaqCol5">
                    5. Can I change the VAT rate to match specific NBR slabs?
                  </button>
                </h3>
                <div id="dvpFaqCol5" class="accordion-collapse collapse" aria-labelledby="dvpFaq5" data-bs-parent="#dvpFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. The VAT rate field is completely editable—type any rate (such as 5%, 7.5%, 10%, or 15%) or click the quick preset buttons. Always verify official NBR rules for your specific business sector.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_loan_emi_fdr_dps_calculator', 'tn_loan_emi_fdr_dps_calculator_shortcode');

function tn_lorem_ipsum_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Lorem Ipsum Generator Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Instant Placeholder Text Generation
            </span>
            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Configure</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Generate</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Copy &amp; Use</div>
            </div>

            <div class="row g-3 mb-4">
              <div class="col-sm-4">
                <label for="tn-lorem-paragraphs" class="form-label fw-bold">Paragraphs <span class="text-muted fw-normal">(1-20)</span></label>
                <input type="number" id="tn-lorem-paragraphs" class="form-control" value="3" min="1" max="20">
              </div>
              <div class="col-sm-4">
                <label for="tn-lorem-sentences" class="form-label fw-bold">Sentences per Paragraph</label>
                <input type="number" id="tn-lorem-sentences" class="form-control" value="5" min="1" max="20">
              </div>
              <div class="col-sm-4">
                <label for="tn-lorem-words" class="form-label fw-bold">Words per Sentence</label>
                <input type="number" id="tn-lorem-words" class="form-control" value="15" min="3" max="30">
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold mb-2">Output Format</label>
              <div class="btn-group btn-group-sm w-100" role="group" aria-label="Lorem Ipsum Format">
                <input type="radio" class="btn-check" name="tn-lorem-format" id="tn-lorem-html" autocomplete="off" checked>
                <label class="btn btn-outline-primary" for="tn-lorem-html">HTML Paragraphs</label>
                <input type="radio" class="btn-check" name="tn-lorem-format" id="tn-lorem-plain" autocomplete="off">
                <label class="btn btn-outline-primary" for="tn-lorem-plain">Plain Text</label>
                <input type="radio" class="btn-check" name="tn-lorem-format" id="tn-lorem-markdown" autocomplete="off">
                <label class="btn btn-outline-primary" for="tn-lorem-markdown">Markdown</label>
              </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
              <button id="tn-lorem-generate" class="btn btn-primary px-4">Generate Lorem Ipsum</button>
              <button id="tn-lorem-copy" class="btn btn-outline-primary px-4" disabled>Copy to Clipboard</button>
            </div>

            <div class="tn-result-box border rounded-3 p-3 mb-3" style="min-height: 300px;">
              <div class="small fw-bold text-uppercase text-muted mb-2">Generated Text</div>
              <div id="tn-lorem-output" class="text-muted small mb-2">
                Configure settings and click "Generate Lorem Ipsum" to create placeholder text.
              </div>
              <textarea id="tn-lorem-textarea" class="form-control" rows="12" style="display: none;" readonly></textarea>
            </div>

            <div class="text-muted small">
              <i class="bi bi-info-circle me-1" aria-hidden="true"></i> Lorem Ipsum text is generated using a standard algorithm based on classical Latin literature.
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Generate Lorem Ipsum Text</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Set Paragraphs, Sentences &amp; Words:</strong> Choose how many paragraphs (1–20), sentences per paragraph (1–20), and words per sentence (3–30) you want.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Pick Output Format:</strong> Select <strong>HTML Paragraphs</strong> (wrapped in <code>&lt;p&gt;</code> tags), <strong>Plain Text</strong>, or <strong>Markdown</strong>.
              </li>
              <li>
                <strong>Step 3 — Generate &amp; Copy:</strong> Click <strong>Generate Lorem Ipsum</strong> and then <strong>Copy to Clipboard</strong> to paste the dummy text into Figma, WordPress, or your code editor.
              </li>
            </ol>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="tn-lorem-faq">
              <div class="accordion-item">
                <h3 class="accordion-header" id="lFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tn-lorem-faq1" aria-expanded="true" aria-controls="tn-lorem-faq1">
                    1. What is Lorem Ipsum?
                  </button>
                </h3>
                <div id="tn-lorem-faq1" class="accordion-collapse collapse show" aria-labelledby="lFaq1" data-bs-parent="#tn-lorem-faq">
                  <div class="accordion-body text-muted">
                    Lorem Ipsum is placeholder text commonly used in the graphic design and publishing industries. It is derived from classical Latin literature and has been the standard dummy text since the 1500s.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="lFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tn-lorem-faq2" aria-expanded="false" aria-controls="tn-lorem-faq2">
                    2. Why use Lorem Ipsum?
                  </button>
                </h3>
                <div id="tn-lorem-faq2" class="accordion-collapse collapse" aria-labelledby="lFaq2" data-bs-parent="#tn-lorem-faq">
                  <div class="accordion-body text-muted">
                    Lorem Ipsum helps focus attention on design elements like typography, layout, and visual hierarchy without being distracted by meaningful content. It provides realistic text length and distribution without actual meaning.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="lFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tn-lorem-faq3" aria-expanded="false" aria-controls="tn-lorem-faq3">
                    3. What formats are supported?
                  </button>
                </h3>
                <div id="tn-lorem-faq3" class="accordion-collapse collapse" aria-labelledby="lFaq3" data-bs-parent="#tn-lorem-faq">
                  <div class="accordion-body text-muted">
                    You can generate Lorem Ipsum in three formats: <strong>HTML Paragraphs</strong> (with <code>&lt;p&gt;</code> tags), <strong>Plain Text</strong> (just the words), and <strong>Markdown</strong> (with paragraph breaks). Choose the format that best fits your project needs.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="lFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tn-lorem-faq4" aria-expanded="false" aria-controls="tn-lorem-faq4">
                    4. Can I control the number of paragraphs, sentences, and words?
                  </button>
                </h3>
                <div id="tn-lorem-faq4" class="accordion-collapse collapse" aria-labelledby="lFaq4" data-bs-parent="#tn-lorem-faq">
                  <div class="accordion-body text-muted">
                    Yes. You can configure 1 to 20 paragraphs, 1 to 20 sentences per paragraph, and 3 to 30 words per sentence to match your exact wireframe or card layout.
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="lFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tn-lorem-faq5" aria-expanded="false" aria-controls="tn-lorem-faq5">
                    5. Does the generator run offline in my browser?
                  </button>
                </h3>
                <div id="tn-lorem-faq5" class="accordion-collapse collapse" aria-labelledby="lFaq5" data-bs-parent="#tn-lorem-faq">
                  <div class="accordion-body text-muted">
                    Yes. All placeholder text is generated locally in your browser using JavaScript with zero server requests.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_lorem_ipsum_generator', 'tn_lorem_ipsum_generator_shortcode');

function tn_meta_tag_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Meta Tag Generator Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Website Metadata Is Generated in Your Browser
            </span>

            <div class="row g-4">
              <div class="col-lg-6">
                <div class="p-3 rounded bg-light h-100">
                  <h2 class="mb-2 h5">Generate Your Meta Tags</h2>
                  <p class="text-muted small mb-3">Enter your page details, generate the HTML, and paste the result inside that page's <code>&lt;head&gt;</code> element.</p>

                  <form id="mtg-form" class="row g-3">
                    <div class="col-12">
                      <label for="mtg-page-title" class="form-label small fw-bold">Page Title <span class="text-muted fw-normal">(required)</span></label>
                      <input id="mtg-page-title" class="form-control" placeholder="Example: Loan EMI Calculator — ToolNest">
                    </div>
                    <div class="col-12">
                      <label for="mtg-description" class="form-label small fw-bold">Meta Description</label>
                      <textarea id="mtg-description" class="form-control" rows="3" placeholder="A short, compelling summary (50–160 characters)."></textarea>
                    </div>
                    <div class="col-12">
                      <label for="mtg-keywords" class="form-label small fw-bold">Keywords <span class="text-muted fw-normal">(comma separated, optional)</span></label>
                      <input id="mtg-keywords" class="form-control" placeholder="loan, emi, calculator, bank">
                    </div>
                    <div class="col-12">
                      <label for="mtg-author" class="form-label small fw-bold">Author</label>
                      <input id="mtg-author" class="form-control" placeholder="ToolNest Team">
                    </div>
                    <div class="col-12">
                      <label for="mtg-website" class="form-label small fw-bold">Website Name</label>
                      <input id="mtg-website" class="form-control" value="ToolNest">
                    </div>
                    <div class="col-12">
                      <label for="mtg-url" class="form-label small fw-bold">Canonical / Page URL</label>
                      <input id="mtg-url" class="form-control" placeholder="https://toolnest.example/tools/loan-emi/index.html">
                    </div>
                    <div class="col-6">
                      <label for="mtg-image" class="form-label small fw-bold">Social Image URL</label>
                      <input id="mtg-image" class="form-control" placeholder="https://.../preview.jpg">
                    </div>
                    <div class="col-6">
                      <label for="mtg-type" class="form-label small fw-bold">OG Type</label>
                      <select id="mtg-type" class="form-select">
                        <option value="website" selected>website</option>
                        <option value="article">article</option>
                        <option value="product">product</option>
                        <option value="video">video</option>
                      </select>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mtg-twitter" checked>
                        <label class="form-check-label small" for="mtg-twitter">Include Twitter Card tags</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mtg-robots">
                        <label class="form-check-label small" for="mtg-robots">Include robots meta tag (index, follow)</label>
                      </div>
                    </div>
                    <div class="col-12 d-flex gap-2 mt-1">
                      <button id="mtg-generate" class="btn btn-primary" type="submit"><i class="bi bi-lightning-charge me-1" aria-hidden="true"></i>Generate</button>
                      <button id="mtg-reset" class="btn btn-outline-secondary" type="button">Reset</button>
                    </div>
                  </form>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="p-3 rounded bg-light h-100">
                  <h2 class="h5 mb-3">Generated Meta Tags</h2>
                  <textarea id="mtg-output" class="form-control mtg-output" rows="16" readonly placeholder="Your generated meta tags will appear here."></textarea>
                  <div class="d-flex gap-2 mt-3">
                    <button id="mtg-copy" class="btn btn-sm btn-outline-primary" type="button"><i class="bi bi-clipboard me-1" aria-hidden="true"></i>Copy Code</button>
                  </div>
                  <p id="mtg-status" class="small text-muted mt-2 mb-0">Status: Ready</p>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="meta-how-to-heading">
            <h2 id="meta-how-to-heading" class="tn-section-title">How to Use the Meta Tag Generator</h2>
            <ol class="text-muted ps-3 mb-0">
              <li class="mb-2"><strong>Enter your page title and description.</strong> Write a specific title and a clear, accurate summary of the page.</li>
              <li class="mb-2"><strong>Add optional page details.</strong> Provide the canonical URL, author, website name, and a publicly accessible social image URL where appropriate.</li>
              <li class="mb-2"><strong>Choose your tag options.</strong> Select an Open Graph type and decide whether to include Twitter Card and robots tags.</li>
              <li><strong>Generate and add the code.</strong> Copy the output into the page's <code>&lt;head&gt;</code>, then verify the published page and social sharing appearance with the relevant platform tools.</li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="meta-tags-guide-heading">
            <h2 id="meta-tags-guide-heading" class="tn-section-title">What These SEO and Social Meta Tags Do</h2>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 h-100">
                  <h3 class="h6 fw-bold">Page title and description</h3>
                  <p class="small text-muted mb-0">Describe the page with a useful title and summary. Search engines may use them when presenting results, but can choose different text.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 h-100">
                  <h3 class="h6 fw-bold">Canonical URL</h3>
                  <p class="small text-muted mb-0">Identify the preferred URL for a page when similar or duplicate versions exist. Use the full, correct URL for that page.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 h-100">
                  <h3 class="h6 fw-bold">Open Graph and Twitter Card</h3>
                  <p class="small text-muted mb-0">Supply page titles, descriptions, and image details that supported social platforms can use when displaying shared links.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 h-100">
                  <h3 class="h6 fw-bold">Robots directive</h3>
                  <p class="small text-muted mb-0">The optional setting outputs an “index, follow” directive. Only add it when that instruction is appropriate for the page.</p>
                </div>
              </div>
            </div>
            <p class="text-muted mt-3 mb-0">Meta tags support clear page information; they are not a substitute for helpful page content, crawlable links, or a sound technical SEO setup. The optional keywords tag is included for compatibility, but major search engines generally do not use it to determine rankings.</p>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="meta-faq-heading">
            <h2 id="meta-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="metaFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="metaFaqHeadingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#metaFaqOne" aria-expanded="true" aria-controls="metaFaqOne">
                    1. What does this meta tag generator create?
                  </button>
                </h3>
                <div id="metaFaqOne" class="accordion-collapse collapse show" aria-labelledby="metaFaqHeadingOne" data-bs-parent="#metaFaqAccordion">
                  <div class="accordion-body text-muted">It creates HTML for a page title, meta description, optional keywords and author, canonical URL, Open Graph tags, optional Twitter Card tags, and an optional robots directive.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="metaFaqHeadingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#metaFaqTwo" aria-expanded="false" aria-controls="metaFaqTwo">
                    2. Where do I put the generated meta tags?
                  </button>
                </h3>
                <div id="metaFaqTwo" class="accordion-collapse collapse" aria-labelledby="metaFaqHeadingTwo" data-bs-parent="#metaFaqAccordion">
                  <div class="accordion-body text-muted">Copy the generated HTML into the <code>&lt;head&gt;</code> section of the page you are describing, then save and publish that page.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="metaFaqHeadingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#metaFaqThree" aria-expanded="false" aria-controls="metaFaqThree">
                    3. Do meta tags guarantee higher search rankings?
                  </button>
                </h3>
                <div id="metaFaqThree" class="accordion-collapse collapse" aria-labelledby="metaFaqHeadingThree" data-bs-parent="#metaFaqAccordion">
                  <div class="accordion-body text-muted">No. Accurate titles and descriptions help search engines understand and present a page, but meta tags cannot guarantee rankings or a particular search snippet.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="metaFaqHeadingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#metaFaqFour" aria-expanded="false" aria-controls="metaFaqFour">
                    4. What are Open Graph and Twitter Card tags for?
                  </button>
                </h3>
                <div id="metaFaqFour" class="accordion-collapse collapse" aria-labelledby="metaFaqHeadingFour" data-bs-parent="#metaFaqAccordion">
                  <div class="accordion-body text-muted">They provide titles, descriptions, image, and page information that social platforms can use when someone shares a link. The final appearance depends on each platform.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="metaFaqHeadingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#metaFaqFive" aria-expanded="false" aria-controls="metaFaqFive">
                    5. Does this tool escape special HTML characters in my title and description?
                  </button>
                </h3>
                <div id="metaFaqFive" class="accordion-collapse collapse" aria-labelledby="metaFaqHeadingFive" data-bs-parent="#metaFaqAccordion">
                  <div class="accordion-body text-muted">Yes. Ampersands, quotes, and angle brackets are automatically escaped so the generated meta tags remain valid HTML.</div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_meta_tag_generator', 'tn_meta_tag_generator_shortcode');

function tn_passport_photo_maker_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Passport Photo Maker Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Portrait Photos Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Upload Portrait</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Crop &amp; Pick Background</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download Single or Sheet</div>
            </div>

            <!-- Upload Box -->
            <div id="tn-pass-dropzone" class="tn-dropzone mb-4" role="button" tabindex="0" aria-label="Upload portrait photo">
              <i class="bi bi-person-bounding-box tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Upload Your Portrait Photo (JPG, PNG, or WebP)</h2>
              <p class="small text-muted mb-3">Use a well-lit front-facing photo against a plain wall or transparent PNG.</p>
              <label for="tn-pass-file-input" class="btn tn-btn--primary mb-0">
                <i class="bi bi-camera-fill" aria-hidden="true"></i> Select Portrait Photo
              </label>
              <input type="file" id="tn-pass-file-input" class="d-none" accept="image/*">
            </div>

            <!-- Controls Grid -->
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label for="tn-pass-preset" class="form-label fw-bold">1. Official Country / Size Preset</label>
                <select id="tn-pass-preset" class="form-select"></select>
              </div>
              <div class="col-md-6">
                <label for="tn-pass-sheet" class="form-label fw-bold">2. Printable Sheet Paper Size</label>
                <select id="tn-pass-sheet" class="form-select">
                  <option value="4r" selected>4R Photo Paper (4 &times; 6 inch — 8 Photos)</option>
                  <option value="a4">A4 Sheet (210 &times; 297 mm — 20 Photos)</option>
                </select>
              </div>

              <!-- Crop / Zoom / Pan Sliders -->
              <div class="col-md-4">
                <label for="tn-pass-zoom" class="form-label fw-semibold small mb-1">Zoom Scale (%)</label>
                <input type="range" id="tn-pass-zoom" class="form-range" min="60" max="220" value="100">
              </div>
              <div class="col-md-4">
                <label for="tn-pass-panx" class="form-label fw-semibold small mb-1">Horizontal Position (X)</label>
                <input type="range" id="tn-pass-panx" class="form-range" min="-200" max="200" value="0">
              </div>
              <div class="col-md-4">
                <label for="tn-pass-pany" class="form-label fw-semibold small mb-1">Vertical Position (Y)</label>
                <input type="range" id="tn-pass-pany" class="form-range" min="-200" max="200" value="0">
              </div>

              <!-- Background Color & Smart Replacer -->
              <div class="col-md-7">
                <label class="form-label fw-bold d-block mb-1">Background Color (One-Click Studio Presets)</label>
                <div class="d-flex flex-wrap align-items-center gap-2">
                  <button type="button" class="btn tn-btn--outline btn-sm" data-pass-bg="#FFFFFF">Pure White</button>
                  <button type="button" class="btn tn-btn--outline btn-sm" data-pass-bg="#D0E7FF">Studio Sky Blue</button>
                  <button type="button" class="btn tn-btn--outline btn-sm" data-pass-bg="#F1F5F9">Light Gray</button>
                  <button type="button" class="btn tn-btn--outline btn-sm" data-pass-bg="#1D4ED8">Royal Blue</button>
                  <input type="color" id="tn-pass-bgcolor" class="form-control form-control-color" value="#D0E7FF" aria-label="Custom background color">
                </div>
              </div>
              <div class="col-md-5">
                <label for="tn-pass-tolerance" class="form-label fw-semibold small mb-1">Smart Plain-Wall Color Replace</label>
                <input type="range" id="tn-pass-tolerance" class="form-range" min="0" max="50" value="0">
                <div class="small text-muted">Slide right if replacing a solid wall behind you</div>
              </div>
            </div>

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
              <div class="d-flex flex-wrap gap-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="tn-pass-guide" checked>
                  <label class="form-check-label small fw-semibold" for="tn-pass-guide">Show Head Alignment Guide</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="tn-pass-border" checked>
                  <label class="form-check-label small fw-semibold" for="tn-pass-border">Add Cut Border Line</label>
                </div>
              </div>
              <div class="d-flex gap-2">
                <button type="button" id="tn-pass-sample-btn" class="btn tn-btn--outline btn-sm">Load Sample</button>
                <button type="button" id="tn-pass-reset-btn" class="btn tn-btn--outline btn-sm text-danger">Reset Crop</button>
              </div>
            </div>

            <!-- Dual Live Previews: Single Photo & Printable Sheet -->
            <div class="row g-4 align-items-start">
              <div class="col-md-5 text-center">
                <h3 class="h6 fw-bold mb-2">Single Photo Preview</h3>
                <div class="tn-canvas-preview mb-2">
                  <canvas id="tn-pass-single-canvas" width="413" height="531" aria-label="Single passport photo preview"></canvas>
                </div>
                <div id="tn-pass-single-meta" class="small text-muted mb-3">413 &times; 531 px (300 DPI)</div>
                <button type="button" id="tn-pass-dl-single" class="btn tn-btn--primary w-100">
                  <i class="bi bi-download" aria-hidden="true"></i> Download Single Photo
                </button>
              </div>

              <div class="col-md-7 text-center">
                <h3 class="h6 fw-bold mb-2">Printable Multi-Photo Sheet Preview</h3>
                <div class="tn-canvas-preview mb-2">
                  <canvas id="tn-pass-sheet-canvas" width="1800" height="1200" aria-label="Printable multi-photo sheet preview"></canvas>
                </div>
                <div class="small text-muted mb-3">Ready for 4R lab printing or A4 home color printer</div>
                <button type="button" id="tn-pass-dl-sheet" class="btn tn-btn--success w-100">
                  <i class="bi bi-printer-fill" aria-hidden="true"></i> Download Printable Sheet (JPG)
                </button>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Make a Passport Photo &amp; Printable Sheet</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload Your Portrait:</strong> Choose a front-facing photo taken in even lighting against a plain wall, or upload a transparent-background PNG.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Select Country Size &amp; Align Face:</strong> Choose <em>Bangladesh Passport (35 &times; 45 mm)</em>, <em>US Visa (2 &times; 2 inch)</em>, or <em>Stamp Size</em>. Use the Zoom and Position sliders so your head fits neatly inside the blue oval guide.
              </li>
              <li>
                <strong>Step 3 — Pick Background &amp; Download:</strong> Click Pure White or Studio Sky Blue, then download either the <strong>Single Photo</strong> for online portals or the <strong>Printable 4R / A4 Sheet</strong> to print 8 to 20 copies for pennies at any local photo lab.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Official Passport, Visa &amp; Stamp Size Specifications</h2>
            <p class="text-muted">
              Getting passport and visa photos printed at a studio often costs 150 to 300 BDT for just four copies, and digital copies frequently have the wrong pixel dimensions for online visa portals. With ToolNest's Passport &amp; Visa Photo Maker, you can prepare compliant 300 DPI digital photos and multi-copy 4R sheets in under a minute from your phone or laptop.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-rulers text-primary me-1" aria-hidden="true"></i> Exact 300 DPI Calibration</h3>
                  <p class="small text-muted mb-0">Outputs exact 413&times;531 px for 35&times;45mm (Bangladesh, UK, Schengen) and 600&times;600 px for 2&times;2 inch (US &amp; Indian Visa).</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-grid-3x2-gap text-primary me-1" aria-hidden="true"></i> Automatic 4R &amp; A4 Tiling</h3>
                  <p class="small text-muted mb-0">Arranges 8 photos on a 4&times;6 inch (4R) sheet or up to 20 photos on A4 paper with crisp scissor cut lines.</p>
                </div>
              </div>
            </div>
            <p class="text-muted mb-0 mt-2">
              Note that the blue dashed head alignment oval is only a visual helper on your screen—it is automatically hidden when you click Download so your final JPEG is 100% clean.
            </p>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="passFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="pFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pFaqCol1" aria-expanded="true" aria-controls="pFaqCol1">
                    1. What is the official Bangladesh passport photo size in mm and pixels?
                  </button>
                </h3>
                <div id="pFaqCol1" class="accordion-collapse collapse show" aria-labelledby="pFaq1" data-bs-parent="#passFaqAccordion">
                  <div class="accordion-body text-muted">
                    Bangladesh passport and e-Visa applications require a <strong>35 mm wide &times; 45 mm high</strong> photo. At standard 300 DPI print resolution, that equals <strong>413 &times; 531 pixels</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pFaqCol2" aria-expanded="false" aria-controls="pFaqCol2">
                    2. How many passport photos fit on a 4R or A4 printable sheet?
                  </button>
                </h3>
                <div id="pFaqCol2" class="accordion-collapse collapse" aria-labelledby="pFaq2" data-bs-parent="#passFaqAccordion">
                  <div class="accordion-body text-muted">
                    A standard <strong>4R (4 &times; 6 inch)</strong> lab print holds <strong>8 passport photos</strong> (4 columns &times; 2 rows). An <strong>A4 sheet</strong> holds up to <strong>20 passport photos</strong> (5 columns &times; 4 rows).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pFaqCol3" aria-expanded="false" aria-controls="pFaqCol3">
                    3. Can I change the background color of my passport photo?
                  </button>
                </h3>
                <div id="pFaqCol3" class="accordion-collapse collapse" aria-labelledby="pFaq3" data-bs-parent="#passFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Select Pure White, Studio Sky Blue, Light Gray, or any custom color. If your photo was taken against a uniform wall, move the <em>Smart Plain-Wall Color Replace</em> slider to blend your new background color behind you.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pFaqCol4" aria-expanded="false" aria-controls="pFaqCol4">
                    4. Are my biometric portrait photos uploaded to any server?
                  </button>
                </h3>
                <div id="pFaqCol4" class="accordion-collapse collapse" aria-labelledby="pFaq4" data-bs-parent="#passFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. Everything runs 100% client-side in your browser using HTML5 Canvas. Your personal or family photos never leave your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pFaqCol5" aria-expanded="false" aria-controls="pFaqCol5">
                    5. Will the blue oval alignment guide appear on my downloaded photo?
                  </button>
                </h3>
                <div id="pFaqCol5" class="accordion-collapse collapse" aria-labelledby="pFaq5" data-bs-parent="#passFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. The blue oval guide is only displayed on screen to help you center your face. It is automatically removed when generating both single photos and printable sheets.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_passport_photo_maker', 'tn_passport_photo_maker_shortcode');

function tn_password_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Password Generator Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Generated Passwords Never Leave Your Browser
            </span>

            <div class="mb-4">
              <label for="pg-output" class="form-label small mb-2 fw-bold">Generated Password</label>
              <div class="input-group">
                <input id="pg-output" type="text" class="form-control font-monospace" readonly aria-label="Generated password">
                <button id="pg-copy" class="btn btn-primary" type="button"><i class="bi bi-clipboard me-1" aria-hidden="true"></i>Copy</button>
              </div>
              <div id="pg-strength" class="mt-2">
                <div class="row g-2 align-items-center">
                  <div class="col-6 col-sm-8">
                    <div class="progress" style="height: 8px;">
                      <div id="pg-strength-bar" class="progress-bar" role="progressbar" style="width: 0%;" aria-hidden="true"></div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-4">
                    <span id="pg-strength-label" class="small text-muted">Strength: —</span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row g-3 mb-3">
              <div class="col-12">
                <label for="pg-length" class="form-label small mb-2 fw-bold">
                  Length: <span id="pg-length-value">16</span>
                </label>
                <input id="pg-length" type="range" class="form-range" min="6" max="64" value="16">
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="pg-upper" checked>
                  <label class="form-check-label small" for="pg-upper">Uppercase (A–Z)</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="pg-lower" checked>
                  <label class="form-check-label small" for="pg-lower">Lowercase (a–z)</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="pg-numbers" checked>
                  <label class="form-check-label small" for="pg-numbers">Numbers (0–9)</label>
                </div>
              </div>
              <div class="col-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="pg-symbols" checked>
                  <label class="form-check-label small" for="pg-symbols">Symbols (!@#$…)</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="pg-no-ambiguous">
                  <label class="form-check-label small" for="pg-no-ambiguous">Avoid ambiguous characters (0 O 1 l I)</label>
                </div>
              </div>
            </div>

            <div class="d-flex gap-2">
              <button id="pg-generate" class="btn btn-outline-secondary flex-grow-1" type="button"><i class="bi bi-arrow-repeat me-1" aria-hidden="true"></i> Regenerate</button>
            </div>

            <div class="mt-3 small text-muted">
              <span>Status: <span id="pg-status">Ready</span></span>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="password-guide-heading">
            <h2 id="password-guide-heading" class="tn-section-title">Create a Strong Password That Fits Your Needs</h2>
            <p class="text-muted">Use this free password maker to create a different password for each account. Set the length with the slider, then choose uppercase and lowercase letters, numbers, and symbols. If a website or device makes similar characters difficult to read, turn on the option to avoid ambiguous characters.</p>
            <h3 class="h5 fw-bold mt-4">How to use the password generator</h3>
            <ol class="text-muted ps-3 mb-0">
              <li class="mb-2">Choose a password length between 6 and 64 characters. Longer passwords are generally harder to guess.</li>
              <li class="mb-2">Select the character groups required by the account. The generator includes at least one character from each selected group when the chosen length allows it.</li>
              <li class="mb-2">Select <strong>Avoid ambiguous characters</strong> if you want to exclude visually similar characters such as 0, O, 1, l, and I.</li>
              <li>Generate or adjust the password, then use <strong>Copy</strong> and save it in a trusted password manager.</li>
            </ol>
            <h3 class="h5 fw-bold mt-4">Privacy and password safety</h3>
            <p class="text-muted mb-0">Password generation happens in your browser; the generated value is not sent to ToolNest. The strength indicator is a basic estimate based on length and character variety, not a security audit. For better account security, use a unique password for every service, avoid sharing it, and enable multi-factor authentication when available.</p>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="password-faq-heading">
            <h2 id="password-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="passwordFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="passwordFaqHeadingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#passwordFaqOne" aria-expanded="true" aria-controls="passwordFaqOne">
                    1. How do I create a strong password?
                  </button>
                </h3>
                <div id="passwordFaqOne" class="accordion-collapse collapse show" aria-labelledby="passwordFaqHeadingOne" data-bs-parent="#passwordFaqAccordion">
                  <div class="accordion-body text-muted">Choose a longer password and include a mix of character types where the service allows them. Use a unique password for each account and store it in a trusted password manager.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="passwordFaqHeadingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#passwordFaqTwo" aria-expanded="false" aria-controls="passwordFaqTwo">
                    2. Can I choose the password length and character types?
                  </button>
                </h3>
                <div id="passwordFaqTwo" class="accordion-collapse collapse" aria-labelledby="passwordFaqHeadingTwo" data-bs-parent="#passwordFaqAccordion">
                  <div class="accordion-body text-muted">Yes. Choose a length from 6 to 64 characters and toggle uppercase letters, lowercase letters, numbers, and symbols. You can also exclude ambiguous characters.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="passwordFaqHeadingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#passwordFaqThree" aria-expanded="false" aria-controls="passwordFaqThree">
                    3. Are generated passwords sent to a server?
                  </button>
                </h3>
                <div id="passwordFaqThree" class="accordion-collapse collapse" aria-labelledby="passwordFaqHeadingThree" data-bs-parent="#passwordFaqAccordion">
                  <div class="accordion-body text-muted">No. The password is generated in your browser and is not sent to ToolNest. Copy and save it somewhere secure before leaving the page.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="passwordFaqHeadingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#passwordFaqFour" aria-expanded="false" aria-controls="passwordFaqFour">
                    4. Is the strength meter a guarantee that my password is secure?
                  </button>
                </h3>
                <div id="passwordFaqFour" class="accordion-collapse collapse" aria-labelledby="passwordFaqHeadingFour" data-bs-parent="#passwordFaqAccordion">
                  <div class="accordion-body text-muted">No. It is a basic estimate based on length and character variety. It cannot tell whether a password is reused or has appeared in a data breach.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h3 class="accordion-header" id="passwordFaqHeadingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#passwordFaqFive" aria-expanded="false" aria-controls="passwordFaqFive">
                    5. What does "Avoid ambiguous characters" do?
                  </button>
                </h3>
                <div id="passwordFaqFive" class="accordion-collapse collapse" aria-labelledby="passwordFaqHeadingFive" data-bs-parent="#passwordFaqAccordion">
                  <div class="accordion-body text-muted">It excludes look-alike characters such as <code>0</code> (zero), <code>O</code> (uppercase o), <code>1</code> (one), <code>l</code> (lowercase L), and <code>I</code> (uppercase i) so the password is easier to read and type.</div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_password_generator', 'tn_password_generator_shortcode');

function tn_pdf_merge_split_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="PDF Merge and Split Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; PDFs Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Add One or More PDFs</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Reorder or Enter Range</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download New PDF</div>
            </div>

            <!-- Upload Zone -->
            <div id="tn-pdf-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop PDF files">
              <i class="bi bi-file-earmark-pdf-fill tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop One or Multiple PDF Files Here</h2>
              <p class="small text-muted mb-3">You can keep adding more PDF files to append their pages to the list below.</p>
              <label for="tn-pdf-file-input" class="btn tn-btn--primary mb-0">
                <i class="bi bi-file-earmark-plus" aria-hidden="true"></i> Select PDF Files
              </label>
              <input type="file" id="tn-pdf-file-input" class="d-none" accept="application/pdf,.pdf" multiple>
            </div>

            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-pdf-sample-btn" class="btn tn-btn--outline btn-sm">
                <i class="bi bi-magic" aria-hidden="true"></i> Load Sample 5-Page PDFs
              </button>
              <button type="button" id="tn-pdf-clear-btn" class="btn tn-btn--outline btn-sm text-danger">
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear All Pages
              </button>
            </div>

            <!-- Progress Bar -->
            <div id="tn-pdf-progress-wrap" class="mb-3 d-none">
              <div class="progress" style="height: 22px;">
                <div id="tn-pdf-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 30%;">Working...</div>
              </div>
            </div>

            <!-- Loaded Pages & Split/Merge Controls -->
            <div id="tn-pdf-workspace-panel" class="d-none mt-4">
              <div class="row g-3 mb-3">
                <!-- Merge Card -->
                <div class="col-md-6">
                  <div class="tn-result-box h-100 d-flex flex-column justify-content-between">
                    <div>
                      <h3 class="h6 fw-bold text-primary mb-1">
                        <i class="bi bi-files me-1" aria-hidden="true"></i> Option A: Merge &amp; Export All Listed Pages
                      </h3>
                      <p class="small text-muted mb-3">Exports all pages below in their current reordered sequence into a single PDF.</p>
                    </div>
                    <button type="button" id="tn-pdf-merge-btn" class="btn tn-btn--primary w-100">
                      <i class="bi bi-download" aria-hidden="true"></i> Download Merged PDF
                    </button>
                  </div>
                </div>

                <!-- Split / Page Range Card -->
                <div class="col-md-6">
                  <div class="tn-result-box h-100 d-flex flex-column justify-content-between">
                    <div>
                      <h3 class="h6 fw-bold text-primary mb-1">
                        <i class="bi bi-scissors me-1" aria-hidden="true"></i> Option B: Split / Extract Page Range
                      </h3>
                      <label for="tn-pdf-range-input" class="small text-muted mb-1 d-block">Enter page numbers or ranges (e.g. <code>1-3, 5</code>):</label>
                      <input type="text" id="tn-pdf-range-input" class="form-control form-control-sm mb-2" value="1-2, 4" placeholder="e.g. 1-3, 5">
                    </div>
                    <button type="button" id="tn-pdf-split-btn" class="btn tn-btn--accent w-100">
                      <i class="bi bi-file-earmark-arrow-down" aria-hidden="true"></i> Extract Page Range PDF
                    </button>
                  </div>
                </div>
              </div>

              <!-- Page Reorder List -->
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span id="tn-pdf-total-badge" class="badge bg-primary-subtle text-primary px-3 py-2">0 Pages</span>
                <button type="button" id="tn-pdf-reverse-btn" class="btn tn-btn--outline btn-sm">
                  <i class="bi bi-sort-numeric-down-alt" aria-hidden="true"></i> Reverse Page Order
                </button>
              </div>
              <div id="tn-pdf-pages-list" class="p-3 rounded border bg-light" style="max-height: 360px; overflow-y: auto;"></div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Merge, Reorder, or Split PDF Files</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload One or More PDFs:</strong> Drag and drop your PDF files into the upload zone (or click <em>Load Sample 5-Page PDFs</em> to test immediately).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Arrange Pages or Specify a Range:</strong> Use the Up (<i class="bi bi-arrow-up" aria-hidden="true"></i>), Down (<i class="bi bi-arrow-down" aria-hidden="true"></i>), and Remove (<i class="bi bi-x-lg" aria-hidden="true"></i>) buttons to customize page sequence, or type a page range like <code>1-3, 5</code> in the Split box.
              </li>
              <li>
                <strong>Step 3 — Download Your New PDF:</strong> Click <strong>Download Merged PDF</strong> to combine everything or <strong>Extract Page Range PDF</strong> to save only your chosen pages.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Why Local Browser PDF Merging Is Safer for Confidential Documents</h2>
            <p class="text-muted">
              Whether you are assembling bank statements, TIN tax certificates, trade licenses, academic transcripts, or property deeds, your PDF files contain sensitive personal and financial records. Traditional cloud PDF mergers upload your documents to remote servers where files may be cached or logged.
            </p>
            <p class="text-muted">
              ToolNest uses the open-source <code>pdf-lib</code> engine inside your web browser. When you select PDF files on this page, your browser reads the binary page streams directly from your device's memory and constructs the new PDF locally—zero bytes are ever uploaded over the internet.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-arrow-down-up text-primary me-1" aria-hidden="true"></i> Page-Level Reordering</h3>
                  <p class="small text-muted mb-0">Unlike basic file-level mergers, you can move or delete individual pages from any loaded PDF before saving.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-Funnel text-primary me-1" aria-hidden="true"></i> Flexible Range Extraction</h3>
                  <p class="small text-muted mb-0">Extract single pages, ranges (<code>2-6</code>), or custom sequences (<code>5, 1-2</code>) in one click.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="pdfFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="pdfFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pdfFaqCol1" aria-expanded="true" aria-controls="pdfFaqCol1">
                    1. Are my confidential PDF documents uploaded to any server?
                  </button>
                </h3>
                <div id="pdfFaqCol1" class="accordion-collapse collapse show" aria-labelledby="pdfFaq1" data-bs-parent="#pdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All PDF merging, reordering, and page extraction happen 100% locally in your browser. Your documents never leave your computer or phone.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pdfFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pdfFaqCol2" aria-expanded="false" aria-controls="pdfFaqCol2">
                    2. How do I reorder pages across multiple PDF files?
                  </button>
                </h3>
                <div id="pdfFaqCol2" class="accordion-collapse collapse" aria-labelledby="pdfFaq2" data-bs-parent="#pdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Every page from every uploaded PDF is listed in the page queue (#1, #2, #3...). Click the Up or Down arrow next to any page to move it, or click the red X button to remove an unwanted page.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pdfFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pdfFaqCol3" aria-expanded="false" aria-controls="pdfFaqCol3">
                    3. How do I write page ranges when splitting or extracting pages?
                  </button>
                </h3>
                <div id="pdfFaqCol3" class="accordion-collapse collapse" aria-labelledby="pdfFaq3" data-bs-parent="#pdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Use commas to separate single pages and hyphens for ranges—for example, <code>1-3, 5</code> extracts pages 1, 2, 3, and 5 into a clean new PDF.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pdfFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pdfFaqCol4" aria-expanded="false" aria-controls="pdfFaqCol4">
                    4. Is there a watermark or daily limit on merged PDFs?
                  </button>
                </h3>
                <div id="pdfFaqCol4" class="accordion-collapse collapse" aria-labelledby="pdfFaq4" data-bs-parent="#pdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. ToolNest adds zero watermarks and imposes no daily limits. Your exported PDF preserves full vector text and image quality.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pdfFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pdfFaqCol5" aria-expanded="false" aria-controls="pdfFaqCol5">
                    5. Can I combine academic certificates for a scholarship or job application?
                  </button>
                </h3>
                <div id="pdfFaqCol5" class="accordion-collapse collapse" aria-labelledby="pdfFaq5" data-bs-parent="#pdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Select all your scanned certificate PDFs at once, arrange them in the exact sequence required by the portal, and click <em>Download Merged PDF</em>.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_pdf_merge_split', 'tn_pdf_merge_split_shortcode');

function tn_pdf_to_excel_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START (No Ads Inside) -->
          <section class="tn-tool-workspace" aria-label="PDF to Excel Converter Workspace">
            <!-- Upload Dropzone -->
            <div id="tn-p2e-dropzone" class="tn-dropzone mb-3" tabindex="0" role="button" aria-label="Upload a PDF file to convert to Excel">
              <i class="bi bi-file-earmark-excel tn-dropzone__icon text-success" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drop a Tabular PDF File Here or Click to Browse</h2>
              <p class="small text-muted mb-3">Detects rows &amp; columns by X/Y coordinates and exports to .XLSX or .CSV</p>
              <label for="tn-p2e-file-input" class="btn tn-btn--primary">
                <i class="bi bi-folder2-open" aria-hidden="true"></i> Choose PDF File
              </label>
              <input type="file" id="tn-p2e-file-input" class="d-none" accept="application/pdf,.pdf">
            </div>

            <!-- Selected File Bar -->
            <div id="tn-p2e-file-info" class="d-none p-3 rounded-3 bg-primary-subtle border border-primary border-opacity-25 mb-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-pdf-fill text-danger fs-4" aria-hidden="true"></i>
                <span id="tn-p2e-file-name" class="fw-bold text-dark">statement.pdf</span>
              </div>
              <span id="tn-p2e-page-badge" class="badge bg-primary px-3 py-2">0 Pages</span>
            </div>

            <!-- Extraction Settings -->
            <div class="p-3 rounded-3 bg-light border mb-3">
              <div class="row g-3 align-items-end">
                <div class="col-sm-6 col-md-4">
                  <label for="tn-p2e-sheet-mode" class="form-label fw-bold small mb-1">Workbook Layout (.XLSX)</label>
                  <select id="tn-p2e-sheet-mode" class="form-select">
                    <option value="single" selected>Combine All Pages into 1 Sheet</option>
                    <option value="multi">Separate Worksheet Tab per Page</option>
                  </select>
                </div>

                <div class="col-sm-6 col-md-4">
                  <label for="tn-p2e-col-gap" class="form-label fw-bold small mb-1">Column Detection Sensitivity</label>
                  <select id="tn-p2e-col-gap" class="form-select">
                    <option value="8">Tight Columns (8pt Gap)</option>
                    <option value="14" selected>Standard Table (14pt Gap)</option>
                    <option value="24">Wide Columns (24pt Gap)</option>
                  </select>
                </div>

                <div class="col-sm-6 col-md-4">
                  <label for="tn-p2e-range-mode" class="form-label fw-bold small mb-1">Pages to Extract</label>
                  <select id="tn-p2e-range-mode" class="form-select">
                    <option value="all" selected>All Pages</option>
                    <option value="custom">Custom Page Range</option>
                  </select>
                </div>

                <div id="tn-p2e-range-wrap" class="col-sm-6 col-md-4 d-none">
                  <label for="tn-p2e-range-input" class="form-label fw-bold small mb-1">Page Range</label>
                  <input type="text" id="tn-p2e-range-input" class="form-control" placeholder="e.g. 1-3, 5">
                </div>
              </div>

              <div class="d-flex flex-wrap gap-2 mt-3 pt-3 border-top">
                <button type="button" id="tn-p2e-extract-btn" class="btn tn-btn--primary">
                  <i class="bi bi-table" aria-hidden="true"></i> Extract PDF to Excel
                </button>
                <button type="button" id="tn-p2e-sample-btn" class="btn tn-btn--outline">
                  <i class="bi bi-magic" aria-hidden="true"></i> Load Sample Sales Table PDF
                </button>
                <button type="button" id="tn-p2e-reset-btn" class="btn tn-btn--outline ms-auto">
                  <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                </button>
              </div>
            </div>

            <!-- Progress Bar -->
            <div id="tn-p2e-progress-wrap" class="d-none mb-3">
              <div class="d-flex justify-content-between small fw-semibold mb-1">
                <span id="tn-p2e-progress-text">Extracting table rows...</span>
              </div>
              <div class="progress" style="height: 10px;">
                <div id="tn-p2e-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%"></div>
              </div>
            </div>

            <!-- Error Alert -->
            <div id="tn-p2e-error-box" class="alert alert-danger d-none py-2 small mb-3" role="alert"></div>

            <!-- Live Spreadsheet Preview & Download Buttons -->
            <div id="tn-p2e-results-wrap" class="d-none mt-3">
              <div class="tn-result-box">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                  <div>
                    <h3 class="h6 fw-bold mb-0">
                      <i class="bi bi-grid-3x3-gap-fill text-success me-1" aria-hidden="true"></i> Live Spreadsheet Preview
                    </h3>
                  </div>
                  <span id="tn-p2e-stats-badge" class="badge bg-success-subtle text-success px-3 py-2">0 Rows Ready</span>
                </div>

                <div class="d-flex flex-wrap gap-2 mb-3">
                  <button type="button" id="tn-p2e-dl-xlsx" class="btn tn-btn--success">
                    <i class="bi bi-file-earmark-excel-fill" aria-hidden="true"></i> Download MS Excel (.XLSX)
                  </button>
                  <button type="button" id="tn-p2e-dl-csv" class="btn tn-btn--primary">
                    <i class="bi bi-filetype-csv" aria-hidden="true"></i> Download .CSV
                  </button>
                  <button type="button" id="tn-p2e-copy-btn" class="btn tn-btn--outline ms-sm-auto">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Table (for Excel Paste)
                  </button>
                </div>

                <div class="table-responsive border rounded bg-white" style="max-height: 360px; overflow: auto;">
                  <table class="table table-bordered table-sm align-middle mb-0 small">
                    <thead id="tn-p2e-table-head" class="sticky-top"></thead>
                    <tbody id="tn-p2e-table-body"></tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Convert a PDF Table to Microsoft Excel (.XLSX)</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload Your Tabular PDF:</strong> Drop your PDF statement, invoice, or report into the upload area (or click <em>Load Sample Sales Table PDF</em> to test immediately).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Adjust Column Sensitivity &amp; Sheet Layout:</strong> Inspect the live spreadsheet preview grid. If needed, switch <em>Column Detection Sensitivity</em> between Tight (8pt), Standard (14pt), and Wide (24pt), or choose whether to combine all pages into one sheet or create a separate worksheet tab per page.
              </li>
              <li>
                <strong>Step 3 — Download .XLSX, .CSV, or Copy:</strong> Click <strong>Download MS Excel (.XLSX)</strong> for a native Excel workbook with numeric cells ready for <code>=SUM()</code> formulas, or click <strong>Copy Table</strong> to paste directly into Excel or Google Sheets.
              </li>
            </ol>
          </section>

          <!-- Detailed SEO Guide (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="guide-heading">
            <h2 id="guide-heading" class="tn-section-title">Why Local Browser PDF-to-Excel Extraction Is Ideal for Financial Data</h2>
            <p class="text-muted">
              Accountants, business owners, auditors, and operations teams frequently receive vendor price lists, courier COD settlement reports, tax schedules, and bank statements locked inside PDF files. Re-typing hundreds of numbers by hand is slow and prone to human error, while uploading confidential financial PDFs to unknown online converters exposes sensitive business numbers.
            </p>
            <p class="text-muted">
              ToolNest solves both problems by running 100% inside your browser. Using Mozilla's <code>pdf.js</code> engine, the converter reads the exact horizontal (<code>X</code>) and vertical (<code>Y</code>) coordinates of every text item on each page, clusters items on the same horizontal baseline into rows, and separates columns based on spatial gaps. Finally, it constructs a genuine <strong>Office Open XML (<code>.xlsx</code>)</strong> workbook using <code>JSZip</code> with automatic numeric cell typing.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-123 text-success me-1" aria-hidden="true"></i> Formula-Ready Numeric Cells</h3>
                  <p class="small text-muted mb-0">Numbers are stored as true Excel numeric values (<code>t="n"</code>) rather than plain text strings so <code>SUM</code> and <code>AVERAGE</code> work immediately.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-layers text-success me-1" aria-hidden="true"></i> Single Sheet or Multi-Tab Export</h3>
                  <p class="small text-muted mb-0">Merge a 10-page statement into one continuous table, or place each PDF page onto its own dedicated Excel worksheet tab.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="tn-card mb-4" aria-labelledby="faq-heading">
            <h2 id="faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="p2eFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="peFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#peFaqCol1" aria-expanded="true" aria-controls="peFaqCol1">
                    1. Does this tool generate a genuine Microsoft Excel (.xlsx) workbook?
                  </button>
                </h3>
                <div id="peFaqCol1" class="accordion-collapse collapse show" aria-labelledby="peFaq1" data-bs-parent="#p2eFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. ToolNest builds a standards-compliant Office Open XML (<code>.xlsx</code>) workbook directly in your browser using JSZip, complete with numeric cell types so you can run <code>SUM</code> and <code>AVERAGE</code> formulas immediately in Microsoft Excel, Google Sheets, or LibreOffice Calc.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="peFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#peFaqCol2" aria-expanded="false" aria-controls="peFaqCol2">
                    2. Are my bank statements or financial PDFs uploaded to any server?
                  </button>
                </h3>
                <div id="peFaqCol2" class="accordion-collapse collapse" aria-labelledby="peFaq2" data-bs-parent="#p2eFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All table extraction and Excel (<code>.xlsx</code>) file creation happen 100% locally inside your web browser. Your confidential financial statements, invoices, and payroll sheets never leave your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="peFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#peFaqCol3" aria-expanded="false" aria-controls="peFaqCol3">
                    3. Can I export each PDF page as a separate Excel worksheet tab?
                  </button>
                </h3>
                <div id="peFaqCol3" class="accordion-collapse collapse" aria-labelledby="peFaq3" data-bs-parent="#p2eFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Use the <strong>Workbook Layout (.XLSX)</strong> dropdown to choose between <em>Combine All Pages into 1 Sheet</em> or <em>Separate Worksheet Tab per Page</em> (<code>Page_1</code>, <code>Page_2</code>, etc.).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="peFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#peFaqCol4" aria-expanded="false" aria-controls="peFaqCol4">
                    4. How does the Column Detection Sensitivity setting help with wide or narrow tables?
                  </button>
                </h3>
                <div id="peFaqCol4" class="accordion-collapse collapse" aria-labelledby="peFaq4" data-bs-parent="#p2eFaqAccordion">
                  <div class="accordion-body text-muted">
                    PDF files do not store HTML table tags—they store text fragments at X/Y coordinates. If adjacent columns are merging together, select <strong>Tight Columns (8pt Gap)</strong>. If words inside a single column are splitting apart, select <strong>Wide Columns (24pt Gap)</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="peFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#peFaqCol5" aria-expanded="false" aria-controls="peFaqCol5">
                    5. Can I copy the extracted table and paste it directly into Excel or Google Sheets?
                  </button>
                </h3>
                <div id="peFaqCol5" class="accordion-collapse collapse" aria-labelledby="peFaq5" data-bs-parent="#p2eFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Click <strong>Copy Table (for Excel Paste)</strong> to copy the extracted rows in Tab-Separated Values (TSV) format, then press <code>Ctrl+V</code> directly inside any Excel or Google Sheets cell.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_pdf_to_excel', 'tn_pdf_to_excel_shortcode');

function tn_pdf_to_jpg_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="PDF to JPG Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; PDF Pages Rendered Privately in Your Browser
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Select PDF Document</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Pick Resolution &amp; Page Range</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Save JPG/PNG or .ZIP</div>
            </div>

            <!-- 1. Upload PDF Zone -->
            <div id="tn-p2j-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop a PDF file to convert to JPG">
              <i class="bi bi-file-earmark-image tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop Your PDF File Here</h2>
              <p class="small text-muted mb-3">Renders pages sequentially in your browser so even multi-page PDFs convert smoothly.</p>
              <label for="tn-p2j-file-input" class="btn tn-btn--primary mb-0">
                <i class="bi bi-folder2-open" aria-hidden="true"></i> Choose PDF File
              </label>
              <input type="file" id="tn-p2j-file-input" class="d-none" accept="application/pdf,.pdf">
            </div>

            <!-- Selected PDF Info Bar -->
            <div id="tn-p2j-file-info" class="p-3 rounded-3 border bg-white d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3 d-none">
              <div class="small fw-bold text-break">
                <i class="bi bi-file-earmark-pdf-fill text-danger me-1" aria-hidden="true"></i>
                <span id="tn-p2j-file-name">document.pdf</span>
              </div>
              <span id="tn-p2j-page-count" class="badge bg-primary">0 Pages</span>
            </div>

            <!-- 2. Resolution, Quality & Page Range Options -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <div class="row g-3 align-items-end">
                <div class="col-sm-6 col-md-3">
                  <label for="tn-p2j-format" class="form-label fw-bold small">Output Image Format</label>
                  <select id="tn-p2j-format" class="form-select">
                    <option value="image/jpeg" selected>JPEG (.jpg)</option>
                    <option value="image/png">PNG (.png — Lossless)</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-p2j-scale" class="form-label fw-bold small">Resolution / Scale</label>
                  <select id="tn-p2j-scale" class="form-select">
                    <option value="1">1x Standard (~72 DPI)</option>
                    <option value="2" selected>2x High-Res (~144 DPI)</option>
                    <option value="3">3x Ultra Print (~216 DPI)</option>
                  </select>
                </div>
                <div class="col-sm-6 col-md-3">
                  <div class="d-flex justify-content-between mb-1">
                    <label for="tn-p2j-quality" class="form-label fw-bold small mb-0">JPG Quality</label>
                    <span id="tn-p2j-quality-val" class="badge bg-primary">90%</span>
                  </div>
                  <input type="range" id="tn-p2j-quality" class="form-range" min="30" max="100" step="5" value="90">
                </div>
                <div class="col-sm-6 col-md-3">
                  <label for="tn-p2j-range-mode" class="form-label fw-bold small">Pages to Convert</label>
                  <select id="tn-p2j-range-mode" class="form-select">
                    <option value="all" selected>All Pages</option>
                    <option value="custom">Custom Page Range</option>
                  </select>
                </div>
              </div>

              <div id="tn-p2j-range-wrap" class="mt-3 d-none">
                <label for="tn-p2j-range-input" class="form-label fw-bold small mb-1">Enter Page Numbers or Ranges (e.g. <code>1-3, 5</code>)</label>
                <input type="text" id="tn-p2j-range-input" class="form-control" value="1-2" placeholder="e.g. 1-3, 5">
              </div>
            </div>

            <!-- Friendly Error / Password Protected Alert -->
            <div id="tn-p2j-error-alert" class="alert alert-danger py-2 px-3 small d-none mb-3" role="alert"></div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-p2j-convert-btn" class="btn tn-btn--primary">
                <i class="bi bi-images" aria-hidden="true"></i> Render PDF Pages to Images
              </button>
              <button type="button" id="tn-p2j-sample-btn" class="btn tn-btn--outline">
                <i class="bi bi-magic" aria-hidden="true"></i> Load Sample 3-Page PDF
              </button>
              <button type="button" id="tn-p2j-reset-btn" class="btn tn-btn--outline text-danger">
                <i class="bi bi-trash3" aria-hidden="true"></i> Clear PDF
              </button>
            </div>

            <!-- Sequential Progress Bar -->
            <div id="tn-p2j-progress-wrap" class="mb-3 d-none">
              <div id="tn-p2j-progress-text" class="small fw-semibold mb-1">Rendering PDF pages...</div>
              <div class="progress" style="height: 20px;">
                <div id="tn-p2j-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;">0%</div>
              </div>
            </div>

            <!-- Rendered Page Thumbnails & ZIP Download -->
            <div id="tn-p2j-results-wrap" class="d-none mt-4">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-3 mb-3 rounded-3 bg-success-subtle border border-success-subtle">
                <div id="tn-p2j-summary-text" class="small text-dark"></div>
                <button type="button" id="tn-p2j-dl-zip" class="btn tn-btn--success btn-sm">
                  <i class="bi bi-file-earmark-zip-fill" aria-hidden="true"></i> Download All Pages as .ZIP
                </button>
              </div>
              <div id="tn-p2j-pages-grid" class="row g-3"></div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Convert PDF Pages to JPG or PNG</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload Your PDF:</strong> Drag and drop your PDF document into the upload box (or click <em>Load Sample 3-Page PDF</em> to test immediately).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Choose Scale &amp; Page Range:</strong> Select <em>JPEG</em> or <em>PNG</em>, pick <em>1x</em>, <em>2x</em>, or <em>3x</em> resolution scale, and choose whether to render all pages or a custom range like <code>1-3, 5</code>.
              </li>
              <li>
                <strong>Step 3 — Download Individual Pages or ZIP:</strong> Preview each rendered page thumbnail and click <strong>Download Page</strong> or <strong>Download All Pages as .ZIP</strong>.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Crisp, Private PDF-to-Image Extraction in Your Browser</h2>
            <p class="text-muted">
              Online application portals, social media platforms, and presentation slides frequently require JPG or PNG images rather than PDF attachments. Taking low-resolution screenshots of a PDF leaves text blurry and pixelated. ToolNest's PDF to JPG Converter uses Mozilla's industry-standard <code>pdf.js</code> engine to rasterize vector text and graphics at up to <strong>3x resolution (~216 DPI)</strong> directly on your device.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-zoom-in text-primary me-1" aria-hidden="true"></i> 1x, 2x &amp; 3x Resolution Scaling</h3>
                  <p class="small text-muted mb-0">Keep small text and fine diagrams razor-sharp by choosing 2x (144 DPI) or 3x (216 DPI) rendering scale.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-list-ol text-primary me-1" aria-hidden="true"></i> Custom Page Range Filter</h3>
                  <p class="small text-muted mb-0">Need only page 1 or pages 3–6 from a 100-page eBook? Enter a custom page range to render only the pages you want.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-cpu text-primary me-1" aria-hidden="true"></i> Sequential Memory-Safe Rendering</h3>
                  <p class="small text-muted mb-0">Pages render one at a time with a real-time progress bar so large multi-page PDFs never freeze your browser tab.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-file-earmark-zip text-primary me-1" aria-hidden="true"></i> Instant Thumbnail Grid &amp; ZIP</h3>
                  <p class="small text-muted mb-0">Inspect every page thumbnail before downloading single pages or bundling all pages into a single <code>.zip</code> file.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="p2jFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="p2jFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#p2jFaqCol1" aria-expanded="true" aria-controls="p2jFaqCol1">
                    1. How do I convert a PDF file into high-resolution JPG or PNG images?
                  </button>
                </h3>
                <div id="p2jFaqCol1" class="accordion-collapse collapse show" aria-labelledby="p2jFaq1" data-bs-parent="#p2jFaqAccordion">
                  <div class="accordion-body text-muted">
                    Upload your PDF file, select <strong>2x High-Res</strong> or <strong>3x Ultra Print</strong> under Resolution, and click <strong>Render PDF Pages to Images</strong>. You can then save individual pages or download all pages as a ZIP.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="p2jFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#p2jFaqCol2" aria-expanded="false" aria-controls="p2jFaqCol2">
                    2. What is the difference between 1x, 2x, and 3x resolution scale?
                  </button>
                </h3>
                <div id="p2jFaqCol2" class="accordion-collapse collapse" aria-labelledby="p2jFaq2" data-bs-parent="#p2jFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>1x</strong> renders at standard 72 DPI for small file sizes; <strong>2x</strong> doubles pixel width and height (~144 DPI) for sharp reading on modern displays; and <strong>3x</strong> triples dimensions (~216 DPI) for printing and fine text documents.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="p2jFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#p2jFaqCol3" aria-expanded="false" aria-controls="p2jFaqCol3">
                    3. Can I convert only specific pages from a large PDF?
                  </button>
                </h3>
                <div id="p2jFaqCol3" class="accordion-collapse collapse" aria-labelledby="p2jFaq3" data-bs-parent="#p2jFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Select <strong>Custom Page Range</strong> and enter page numbers or ranges separated by commas (for example, <code>1-3, 7</code>) to convert only those pages.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="p2jFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#p2jFaqCol4" aria-expanded="false" aria-controls="p2jFaqCol4">
                    4. What happens if I upload a password-protected PDF?
                  </button>
                </h3>
                <div id="p2jFaqCol4" class="accordion-collapse collapse" aria-labelledby="p2jFaq4" data-bs-parent="#p2jFaqAccordion">
                  <div class="accordion-body text-muted">
                    If a PDF is encrypted with a password, the tool detects the lock immediately and displays a clear message prompting you to remove the password first.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="p2jFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#p2jFaqCol5" aria-expanded="false" aria-controls="p2jFaqCol5">
                    5. Are my PDF documents uploaded to any external server?
                  </button>
                </h3>
                <div id="p2jFaqCol5" class="accordion-collapse collapse" aria-labelledby="p2jFaq5" data-bs-parent="#p2jFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All PDF parsing and image rendering happen 100% locally inside your web browser.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_pdf_to_jpg', 'tn_pdf_to_jpg_shortcode');

function tn_pdf_to_word_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START (No Ads Inside) -->
          <section class="tn-tool-workspace" aria-label="PDF to Word Converter Workspace">
            <!-- Upload Dropzone -->
            <div id="tn-p2w-dropzone" class="tn-dropzone mb-3" tabindex="0" role="button" aria-label="Upload a PDF file to convert to Word">
              <i class="bi bi-file-earmark-word tn-dropzone__icon text-primary" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drop a PDF File Here or Click to Browse</h2>
              <p class="small text-muted mb-3">Extracts headings &amp; paragraphs into genuine Microsoft Word (.DOCX) format</p>
              <label for="tn-p2w-file-input" class="btn tn-btn--primary">
                <i class="bi bi-folder2-open" aria-hidden="true"></i> Choose PDF File
              </label>
              <input type="file" id="tn-p2w-file-input" class="d-none" accept="application/pdf,.pdf">
            </div>

            <!-- Selected File Bar -->
            <div id="tn-p2w-file-info" class="d-none p-3 rounded-3 bg-primary-subtle border border-primary border-opacity-25 mb-3 d-flex flex-wrap justify-content-between align-items-center gap-2">
              <div class="d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-pdf-fill text-danger fs-4" aria-hidden="true"></i>
                <span id="tn-p2w-file-name" class="fw-bold text-dark">document.pdf</span>
              </div>
              <span id="tn-p2w-page-badge" class="badge bg-primary px-3 py-2">0 Pages</span>
            </div>

            <!-- Conversion Settings -->
            <div class="p-3 rounded-3 bg-light border mb-3">
              <div class="row g-3 align-items-end">
                <div class="col-sm-6 col-md-4">
                  <label for="tn-p2w-mode" class="form-label fw-bold small mb-1">Text Reconstruction Mode</label>
                  <select id="tn-p2w-mode" class="form-select">
                    <option value="paragraphs" selected>Smart Paragraphs (Flowing)</option>
                    <option value="lines">Line-by-Line (Strict)</option>
                  </select>
                </div>

                <div class="col-sm-6 col-md-4">
                  <label for="tn-p2w-range-mode" class="form-label fw-bold small mb-1">Pages to Convert</label>
                  <select id="tn-p2w-range-mode" class="form-select">
                    <option value="all" selected>All Pages</option>
                    <option value="custom">Custom Page Range</option>
                  </select>
                </div>

                <div id="tn-p2w-range-wrap" class="col-sm-6 col-md-4 d-none">
                  <label for="tn-p2w-range-input" class="form-label fw-bold small mb-1">Page Range</label>
                  <input type="text" id="tn-p2w-range-input" class="form-control" placeholder="e.g. 1-3, 5">
                </div>

                <div class="col-sm-6 col-md-4">
                  <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" role="switch" id="tn-p2w-page-breaks" checked>
                    <label class="form-check-label fw-semibold small" for="tn-p2w-page-breaks">
                      Insert Word Page Breaks
                    </label>
                  </div>
                </div>
              </div>

              <div class="d-flex flex-wrap gap-2 mt-3 pt-3 border-top">
                <button type="button" id="tn-p2w-extract-btn" class="btn tn-btn--primary">
                  <i class="bi bi-gear-wide-connected" aria-hidden="true"></i> Convert PDF to Word
                </button>
                <button type="button" id="tn-p2w-sample-btn" class="btn tn-btn--outline">
                  <i class="bi bi-magic" aria-hidden="true"></i> Load Sample 2-Page PDF
                </button>
                <button type="button" id="tn-p2w-reset-btn" class="btn tn-btn--outline ms-auto">
                  <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                </button>
              </div>
            </div>

            <!-- Progress Bar -->
            <div id="tn-p2w-progress-wrap" class="d-none mb-3">
              <div class="d-flex justify-content-between small fw-semibold mb-1">
                <span id="tn-p2w-progress-text">Extracting text from PDF...</span>
              </div>
              <div class="progress" style="height: 10px;">
                <div id="tn-p2w-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%"></div>
              </div>
            </div>

            <!-- Error Alert -->
            <div id="tn-p2w-error-box" class="alert alert-danger d-none py-2 small mb-3" role="alert"></div>

            <!-- Editable Preview & Word Export Buttons -->
            <div id="tn-p2w-results-wrap" class="d-none mt-3">
              <div class="tn-result-box">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                  <label for="tn-p2w-preview-text" class="fw-bold mb-0">
                    <i class="bi bi-file-earmark-word-fill text-primary me-1" aria-hidden="true"></i> Editable Document Preview
                  </label>
                  <span id="tn-p2w-stats-badge" class="badge bg-success-subtle text-success px-3 py-2">0 Words Ready</span>
                </div>

                <textarea id="tn-p2w-preview-text" class="form-control mb-3" rows="10" placeholder="Extracted document text will appear here. You can edit it before downloading as .DOCX..."></textarea>

                <div class="d-flex flex-wrap gap-2">
                  <button type="button" id="tn-p2w-dl-docx" class="btn tn-btn--success">
                    <i class="bi bi-download" aria-hidden="true"></i> Download MS Word (.DOCX)
                  </button>
                  <button type="button" id="tn-p2w-dl-doc" class="btn tn-btn--primary">
                    <i class="bi bi-file-earmark-richtext" aria-hidden="true"></i> Download Word 97-2003 (.DOC)
                  </button>
                  <button type="button" id="tn-p2w-dl-txt" class="btn tn-btn--outline">
                    <i class="bi bi-filetype-txt" aria-hidden="true"></i> Download .TXT
                  </button>
                  <button type="button" id="tn-p2w-copy-btn" class="btn tn-btn--outline ms-sm-auto">
                    <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy All Text
                  </button>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Convert a PDF to Microsoft Word (.DOCX)</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Select Your PDF Document:</strong> Drag and drop your PDF into the upload box above (or click <em>Load Sample 2-Page PDF</em> to test immediately).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Review &amp; Edit the Extracted Text:</strong> Choose between <em>Smart Paragraphs</em> and <em>Line-by-Line</em> reconstruction. You can also make quick text edits directly inside the preview box.
              </li>
              <li>
                <strong>Step 3 — Download as .DOCX or .DOC:</strong> Click <strong>Download MS Word (.DOCX)</strong> to save a genuine Office Open XML document that opens in Microsoft Word, Google Docs, and LibreOffice.
              </li>
            </ol>
          </section>

          <!-- Detailed SEO Guide (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="guide-heading">
            <h2 id="guide-heading" class="tn-section-title">How Client-Side PDF to Word Conversion Protects Your Privacy</h2>
            <p class="text-muted">
              Most online PDF-to-Word converters require you to upload your PDF to a remote cloud server, wait in a processing queue, and download the result. When you are working with legal agreements, employment contracts, academic theses, government circulars, or financial statements, uploading files to third-party servers creates unnecessary privacy risks.
            </p>
            <p class="text-muted">
              ToolNest performs the entire conversion inside your web browser. Using Mozilla's <code>pdf.js</code> engine, the tool reads the X/Y coordinates and font heights of every text element on each page, reconstructs flowing paragraphs and headings, and packages them into a standards-compliant <strong>Office Open XML (<code>.docx</code>)</strong> archive using <code>JSZip</code>.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-file-earmark-word text-primary me-1" aria-hidden="true"></i> True OpenXML .DOCX Output</h3>
                  <p class="small text-muted mb-0">Generates a real ZIP-packaged <code>word/document.xml</code> and <code>word/styles.xml</code> structure so modern MS Word opens your file cleanly.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-pencil-square text-primary me-1" aria-hidden="true"></i> Pre-Download Live Editor</h3>
                  <p class="small text-muted mb-0">Fix typos, strip unwanted headers, or copy specific sections before exporting your final Word document.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="tn-card mb-4" aria-labelledby="faq-heading">
            <h2 id="faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="p2wFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="pwFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#pwFaqCol1" aria-expanded="true" aria-controls="pwFaqCol1">
                    1. Does this tool generate a real Microsoft Word (.docx) file?
                  </button>
                </h3>
                <div id="pwFaqCol1" class="accordion-collapse collapse show" aria-labelledby="pwFaq1" data-bs-parent="#p2wFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. ToolNest builds a genuine Office Open XML (<code>.docx</code>) package directly in your browser using JSZip. The downloaded <code>.docx</code> file opens natively in Microsoft Word, Google Docs, LibreOffice Writer, and WPS Office.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pwFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pwFaqCol2" aria-expanded="false" aria-controls="pwFaqCol2">
                    2. Are my confidential PDF contracts or reports uploaded to any server?
                  </button>
                </h3>
                <div id="pwFaqCol2" class="accordion-collapse collapse" aria-labelledby="pwFaq2" data-bs-parent="#p2wFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. Both text extraction and Word document packaging happen 100% locally inside your browser memory. Your PDF files never leave your computer or phone.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pwFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pwFaqCol3" aria-expanded="false" aria-controls="pwFaqCol3">
                    3. Can I edit the extracted text before downloading the Word document?
                  </button>
                </h3>
                <div id="pwFaqCol3" class="accordion-collapse collapse" aria-labelledby="pwFaq3" data-bs-parent="#p2wFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! After extraction finishes, the full text appears in an interactive preview editor. Any edits or corrections you make in the preview box are automatically included when you click <strong>Download MS Word (.DOCX)</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pwFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pwFaqCol4" aria-expanded="false" aria-controls="pwFaqCol4">
                    4. What is the difference between Smart Paragraphs and Line-by-Line mode?
                  </button>
                </h3>
                <div id="pwFaqCol4" class="accordion-collapse collapse" aria-labelledby="pwFaq4" data-bs-parent="#p2wFaqAccordion">
                  <div class="accordion-body text-muted">
                    <strong>Smart Paragraphs</strong> merges wrapped lines that belong to the same sentence or paragraph so you can edit flowing text naturally in Word. <strong>Line-by-Line</strong> mode preserves every visual PDF line as its own separate paragraph.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="pwFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pwFaqCol5" aria-expanded="false" aria-controls="pwFaqCol5">
                    5. What if my PDF contains financial tables instead of paragraphs?
                  </button>
                </h3>
                <div id="pwFaqCol5" class="accordion-collapse collapse" aria-labelledby="pwFaq5" data-bs-parent="#p2wFaqAccordion">
                  <div class="accordion-body text-muted">
                    For bank statements, price lists, and tabular PDF reports, use our <a href="../../tools/pdf-to-excel/index.html">PDF to MS Excel (.XLSX) Converter</a> to extract rows and columns directly into a spreadsheet.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_pdf_to_word', 'tn_pdf_to_word_shortcode');

function tn_protect_pdf_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Protect PDF Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-lock-fill" aria-hidden="true"></i>
              100% Client-Side Encryption &bull; Files &amp; Passwords Never Leave Your Device
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Select PDF File</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Set Password &amp; Permissions</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Encrypt &amp; Download PDF</div>
            </div>

            <!-- 1. Drag and Drop PDF Upload Zone -->
            <div id="tn-ppdf-dropzone" class="tn-dropzone mb-3" role="button" tabindex="0" aria-label="Upload or drag and drop a PDF file to protect">
              <i class="bi bi-file-earmark-lock2-fill tn-dropzone__icon d-block" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drag &amp; Drop Your PDF File Here</h2>
              <p class="small text-muted mb-3">Protect contracts, bank statements, salary slips, and academic certificates locally.</p>
              <div class="d-flex flex-wrap justify-content-center gap-2">
                <label for="tn-ppdf-file-input" class="btn tn-btn--primary mb-0">
                  <i class="bi bi-folder2-open" aria-hidden="true"></i> Select PDF File
                </label>
                <button type="button" id="tn-ppdf-sample-btn" class="btn tn-btn--outline">
                  <i class="bi bi-magic" aria-hidden="true"></i> Load Sample PDF
                </button>
              </div>
              <input type="file" id="tn-ppdf-file-input" class="d-none" accept=".pdf,application/pdf">
            </div>

            <!-- Selected File Summary Card -->
            <div id="tn-ppdf-file-card" class="p-3 rounded-3 border bg-light mb-3 d-none">
              <div class="d-flex flex-wrap align-items-center gap-3">
                <div class="tn-ppdf-preview-box">
                  <img id="tn-ppdf-thumb" src="" alt="First page thumbnail">
                </div>
                <div class="flex-grow-1">
                  <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                    <h3 id="tn-ppdf-file-name" class="h6 fw-bold mb-0">document.pdf</h3>
                    <span id="tn-ppdf-page-badge" class="badge bg-primary">1 Page</span>
                    <span id="tn-ppdf-size-badge" class="badge bg-secondary-subtle text-dark border">0 KB</span>
                    <span id="tn-ppdf-status-badge" class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">
                      <i class="bi bi-unlock" aria-hidden="true"></i> Unprotected
                    </span>
                  </div>
                  <p class="small text-muted mb-2">Ready for 128-bit Standard PDF Security encryption.</p>
                  <button type="button" id="tn-ppdf-change-file-btn" class="btn btn-sm tn-btn--outline">
                    <i class="bi bi-arrow-repeat" aria-hidden="true"></i> Change PDF File
                  </button>
                </div>
              </div>
            </div>

            <!-- 2. Password Configuration Panel -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <h3 class="h6 fw-bold text-primary mb-0">
                  <i class="bi bi-key-fill me-1" aria-hidden="true"></i> Step 2: Set Document Open &amp; Owner Passwords
                </h3>
                <button type="button" id="tn-ppdf-gen-pwd-btn" class="btn btn-sm tn-btn--outline">
                  <i class="bi bi-lightning-charge" aria-hidden="true"></i> Generate Strong Password
                </button>
              </div>

              <div class="row g-3">
                <!-- User Password (Open Password) -->
                <div class="col-md-6">
                  <label for="tn-ppdf-user-pwd" class="form-label fw-bold small mb-1">
                    Document Open Password (Required to View) <span class="text-danger">*</span>
                  </label>
                  <div class="input-group">
                    <input type="password" id="tn-ppdf-user-pwd" class="form-control" placeholder="Enter password to open PDF" autocomplete="new-password">
                    <button type="button" id="tn-ppdf-toggle-user-pwd" class="btn btn-outline-secondary" aria-label="Show or hide password" title="Show/Hide Password">
                      <i class="bi bi-eye" aria-hidden="true"></i>
                    </button>
                    <button type="button" id="tn-ppdf-copy-user-pwd" class="btn btn-outline-secondary" aria-label="Copy password" title="Copy Password">
                      <i class="bi bi-clipboard" aria-hidden="true"></i>
                    </button>
                  </div>
                  <div class="mt-2">
                    <div class="tn-ppdf-strength-bar">
                      <div id="tn-ppdf-strength-fill" class="tn-ppdf-strength-fill"></div>
                    </div>
                    <div id="tn-ppdf-strength-label" class="small text-muted mt-1">Enter a password to check strength</div>
                  </div>
                </div>

                <!-- Confirm User Password -->
                <div class="col-md-6">
                  <label for="tn-ppdf-confirm-pwd" class="form-label fw-bold small mb-1">
                    Confirm Document Open Password <span class="text-danger">*</span>
                  </label>
                  <input type="password" id="tn-ppdf-confirm-pwd" class="form-control" placeholder="Re-enter open password" autocomplete="new-password">
                  <div id="tn-ppdf-match-feedback" class="small text-muted mt-1">Must match the Document Open Password</div>
                </div>

                <!-- Optional Separate Owner Password -->
                <div class="col-12">
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="tn-ppdf-use-owner-chk">
                    <label class="form-check-label small fw-semibold" for="tn-ppdf-use-owner-chk">
                      Set a separate <strong>Owner Password (Permissions Password)</strong> for editing security settings
                    </label>
                  </div>
                  <div id="tn-ppdf-owner-wrap" class="d-none">
                    <label for="tn-ppdf-owner-pwd" class="form-label fw-bold small mb-1">Owner / Permissions Password</label>
                    <input type="password" id="tn-ppdf-owner-pwd" class="form-control" placeholder="Enter owner password (controls permissions &amp; restrictions)" autocomplete="new-password">
                    <div class="form-text small">If left blank, a strong owner key is automatically derived so restrictions remain enforced.</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- 3. Document Permissions & Restrictions (Adobe Acrobat Style) -->
            <div class="p-3 rounded-3 border bg-light mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <h3 class="h6 fw-bold text-primary mb-0">
                  <i class="bi bi-shield-check me-1" aria-hidden="true"></i> Step 3: Document Restrictions &amp; Permissions
                </h3>
                <div class="btn-group btn-group-sm" role="group" aria-label="Permission presets">
                  <button type="button" id="tn-ppdf-preset-strict" class="btn btn-outline-secondary">Strict (View Only)</button>
                  <button type="button" id="tn-ppdf-preset-print" class="btn btn-outline-secondary">Allow Print Only</button>
                  <button type="button" id="tn-ppdf-preset-all" class="btn btn-outline-secondary">Allow All</button>
                </div>
              </div>

              <div class="row g-3 align-items-center">
                <div class="col-md-6">
                  <label for="tn-ppdf-print-perm" class="form-label fw-bold small mb-1">Printing Allowed</label>
                  <select id="tn-ppdf-print-perm" class="form-select">
                    <option value="high" selected>High Resolution Printing</option>
                    <option value="low">Low Resolution Only (150 dpi)</option>
                    <option value="none">Not Allowed (Block Printing)</option>
                  </select>
                </div>

                <div class="col-md-6">
                  <label for="tn-ppdf-filename" class="form-label fw-bold small mb-1">Output File Name</label>
                  <input type="text" id="tn-ppdf-filename" class="form-control" value="document-protected.pdf" placeholder="document-protected.pdf">
                </div>

                <div class="col-sm-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tn-ppdf-perm-copy">
                    <label class="form-check-label small" for="tn-ppdf-perm-copy">
                      Allow copying of text, images, and other content
                    </label>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tn-ppdf-perm-modify">
                    <label class="form-check-label small" for="tn-ppdf-perm-modify">
                      Allow modifying document contents
                    </label>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tn-ppdf-perm-annot" checked>
                    <label class="form-check-label small" for="tn-ppdf-perm-annot">
                      Allow commenting and filling in form fields
                    </label>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tn-ppdf-perm-assemble">
                    <label class="form-check-label small" for="tn-ppdf-perm-assemble">
                      Allow page assembly (insert, rotate, delete pages)
                    </label>
                  </div>
                </div>

                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="tn-ppdf-perm-access" checked>
                    <label class="form-check-label small" for="tn-ppdf-perm-access">
                      Enable text access for screen reader devices for the visually impaired
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex flex-wrap gap-2 mb-3">
              <button type="button" id="tn-ppdf-protect-btn" class="btn tn-btn--primary px-4">
                <i class="bi bi-lock-fill" aria-hidden="true"></i> Protect &amp; Download PDF
              </button>
              <button type="button" id="tn-ppdf-clear-btn" class="btn tn-btn--outline text-danger ms-auto">
                <i class="bi bi-trash3" aria-hidden="true"></i> Reset
              </button>
            </div>

            <!-- Progress Bar -->
            <div id="tn-ppdf-progress-wrap" class="mb-3 d-none">
              <div id="tn-ppdf-progress-text" class="small fw-semibold text-primary mb-1">Encrypting PDF objects...</div>
              <div class="progress" style="height: 18px;">
                <div id="tn-ppdf-progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%;">0%</div>
              </div>
            </div>

            <!-- Ready Protected PDF Result Card -->
            <div id="tn-ppdf-result-card" class="tn-result-box border-success bg-success-subtle d-none mt-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div id="tn-ppdf-result-summary" class="small text-dark"></div>
                <button type="button" id="tn-ppdf-download-btn" class="btn tn-btn--success btn-sm">
                  <i class="bi bi-download" aria-hidden="true"></i> Download Protected PDF
                </button>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Password-Protect a PDF</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload Your PDF:</strong> Drag and drop your PDF document into the box above (or click <em>Load Sample PDF</em> to test).
              </li>
              <li class="mb-2">
                <strong>Step 2 — Set Your Open Password &amp; Permissions:</strong> Type a strong Document Open Password (or click <strong>Generate Strong Password</strong>), confirm it, and choose whether recipients can print, copy text, or modify pages.
              </li>
              <li>
                <strong>Step 3 — Encrypt &amp; Download:</strong> Click <strong>Protect &amp; Download PDF</strong>. Your browser encrypts every stream and text object locally and downloads the locked PDF immediately.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Why Encrypt Confidential PDFs Locally in Your Browser?</h2>
            <p class="text-muted">
              When sending bank statements, salary slips, tax returns, legal contracts, or NID/passport scans over email or WhatsApp, leaving the PDF unencrypted means anyone who intercepts or forwards the file can read and copy your private data. However, uploading sensitive PDFs and passwords to an unknown online server defeats the entire purpose of security. ToolNest's <strong>Protect PDF</strong> utility performs <strong>128-bit Standard Security Handler encryption</strong> directly inside your browser.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-lock text-primary me-1" aria-hidden="true"></i> Document Open Password</h3>
                  <p class="small text-muted mb-0">Requires the exact user password before Adobe Acrobat, Chrome, Edge, or mobile PDF viewers can decrypt and display any page.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-printer text-primary me-1" aria-hidden="true"></i> Granular Permission Controls</h3>
                  <p class="small text-muted mb-0">Configure the standard PDF permission bitmask (<code>/P</code>) to block printing, prevent text copying, or lock page modifications.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-shield-check text-primary me-1" aria-hidden="true"></i> Zero-Knowledge Privacy</h3>
                  <p class="small text-muted mb-0">Neither your PDF file nor your password is ever transmitted over the internet. Everything stays in your device RAM.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-file-earmark-check text-primary me-1" aria-hidden="true"></i> Universal Viewer Compatibility</h3>
                  <p class="small text-muted mb-0">Uses the ISO 32000-1 Standard Security specification supported across desktop and smartphone PDF readers worldwide.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="ppdfFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="ppdfFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ppdfFaqCol1" aria-expanded="true" aria-controls="ppdfFaqCol1">
                    1. What is the difference between a Document Open Password and an Owner Password?
                  </button>
                </h3>
                <div id="ppdfFaqCol1" class="accordion-collapse collapse show" aria-labelledby="ppdfFaq1" data-bs-parent="#ppdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    The <strong>Document Open Password (User Password)</strong> is required to open and view the file. The <strong>Owner Password (Permissions Password)</strong> controls document restrictions (such as printing, copying text, and editing pages) so recipients who open the PDF with the User Password still cannot bypass your restrictions without the Owner Password.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ppdfFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ppdfFaqCol2" aria-expanded="false" aria-controls="ppdfFaqCol2">
                    2. Are my PDF files or passwords uploaded to any server?
                  </button>
                </h3>
                <div id="ppdfFaqCol2" class="accordion-collapse collapse" aria-labelledby="ppdfFaq2" data-bs-parent="#ppdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. All key derivation and object encryption happen 100% locally in your browser using JavaScript. Your files and passwords never leave your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ppdfFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ppdfFaqCol3" aria-expanded="false" aria-controls="ppdfFaqCol3">
                    3. Can I prevent people from copying text or printing my PDF?
                  </button>
                </h3>
                <div id="ppdfFaqCol3" class="accordion-collapse collapse" aria-labelledby="ppdfFaq3" data-bs-parent="#ppdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Use the <strong>Strict (View Only)</strong> preset or uncheck <em>Allow copying of text, images, and other content</em> and set <em>Printing Allowed</em> to <strong>Not Allowed</strong> before encrypting.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ppdfFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ppdfFaqCol4" aria-expanded="false" aria-controls="ppdfFaqCol4">
                    4. Will the protected PDF open on mobile phones and browsers?
                  </button>
                </h3>
                <div id="ppdfFaqCol4" class="accordion-collapse collapse" aria-labelledby="ppdfFaq4" data-bs-parent="#ppdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. The encrypted PDF follows the official ISO 32000-1 Standard Security Handler format, which is natively supported by Adobe Acrobat, Google Chrome, Microsoft Edge, Apple Preview, iOS Files, and Android PDF viewers.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="ppdfFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ppdfFaqCol5" aria-expanded="false" aria-controls="ppdfFaqCol5">
                    5. What happens if I forget the password I set?
                  </button>
                </h3>
                <div id="ppdfFaqCol5" class="accordion-collapse collapse" aria-labelledby="ppdfFaq5" data-bs-parent="#ppdfFaqAccordion">
                  <div class="accordion-body text-muted">
                    Because ToolNest never transmits or stores your password, we cannot recover a forgotten password. Always copy and save your password in a secure password manager before sharing the encrypted PDF.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_protect_pdf', 'tn_protect_pdf_shortcode');

function tn_qr_code_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="QR Code Generator Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Permanent Static QR (Never Expires)
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Choose QR Content</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Customize Color &amp; Logo</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download PNG or SVG</div>
            </div>

            <div class="row g-4">
              <div class="col-md-7">
                <!-- Content Type Selector -->
                <div class="btn-group w-100 mb-3" role="group" aria-label="QR Code Content Type">
                  <input type="radio" class="btn-check" name="tn-qr-mode" id="tn-qr-mode-url" value="url" checked>
                  <label class="btn tn-btn--outline" for="tn-qr-mode-url"><i class="bi bi-link-45deg" aria-hidden="true"></i> URL</label>

                  <input type="radio" class="btn-check" name="tn-qr-mode" id="tn-qr-mode-text" value="text">
                  <label class="btn tn-btn--outline" for="tn-qr-mode-text"><i class="bi bi-card-text" aria-hidden="true"></i> Text</label>

                  <input type="radio" class="btn-check" name="tn-qr-mode" id="tn-qr-mode-wifi" value="wifi">
                  <label class="btn tn-btn--outline" for="tn-qr-mode-wifi"><i class="bi bi-wifi" aria-hidden="true"></i> WiFi</label>
                </div>

                <!-- Panel 1: URL -->
                <div id="tn-qr-panel-url" class="mb-3">
                  <label for="tn-qr-url" class="form-label fw-bold">Website URL / Facebook Page / Link</label>
                  <input type="url" id="tn-qr-url" class="form-control" value="https://toolnest.com" placeholder="https://example.com">
                </div>

                <!-- Panel 2: Text -->
                <div id="tn-qr-panel-text" class="mb-3 d-none">
                  <label for="tn-qr-text" class="form-label fw-bold">Plain Text / Contact Info / বাংলা নোট</label>
                  <textarea id="tn-qr-text" class="form-control" rows="3" placeholder="Enter any text, phone number, or Bangla message..."></textarea>
                </div>

                <!-- Panel 3: WiFi -->
                <div id="tn-qr-panel-wifi" class="mb-3 d-none">
                  <div class="row g-2">
                    <div class="col-sm-6">
                      <label for="tn-qr-wifi-ssid" class="form-label fw-bold small">WiFi Network Name (SSID)</label>
                      <input type="text" id="tn-qr-wifi-ssid" class="form-control" placeholder="e.g. ToolNest_Office_5G">
                    </div>
                    <div class="col-sm-6">
                      <label for="tn-qr-wifi-pass" class="form-label fw-bold small">WiFi Password</label>
                      <input type="text" id="tn-qr-wifi-pass" class="form-control" placeholder="Enter WiFi password">
                    </div>
                    <div class="col-sm-6">
                      <label for="tn-qr-wifi-enc" class="form-label fw-bold small">Security Type</label>
                      <select id="tn-qr-wifi-enc" class="form-select">
                        <option value="WPA" selected>WPA / WPA2 / WPA3</option>
                        <option value="WEP">WEP</option>
                        <option value="nopass">None (Open WiFi)</option>
                      </select>
                    </div>
                    <div class="col-sm-6 d-flex align-items-end">
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="tn-qr-wifi-hidden">
                        <label class="form-check-label small fw-semibold" for="tn-qr-wifi-hidden">Hidden Network</label>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Color, Size & Error Correction -->
                <div class="row g-2 mb-3">
                  <div class="col-6 col-sm-3">
                    <label for="tn-qr-fg" class="form-label fw-bold small">QR Color</label>
                    <input type="color" id="tn-qr-fg" class="form-control form-control-color w-100" value="#0F172A">
                  </div>
                  <div class="col-6 col-sm-3">
                    <label for="tn-qr-bg" class="form-label fw-bold small">Background</label>
                    <input type="color" id="tn-qr-bg" class="form-control form-control-color w-100" value="#FFFFFF">
                  </div>
                  <div class="col-6 col-sm-3">
                    <label for="tn-qr-size" class="form-label fw-bold small">Size (px)</label>
                    <select id="tn-qr-size" class="form-select">
                      <option value="300">300 &times; 300</option>
                      <option value="400" selected>400 &times; 400</option>
                      <option value="600">600 &times; 600</option>
                      <option value="1000">1000 &times; 1000</option>
                    </select>
                  </div>
                  <div class="col-6 col-sm-3">
                    <label for="tn-qr-ecc" class="form-label fw-bold small">Error Level</label>
                    <select id="tn-qr-ecc" class="form-select">
                      <option value="L">Low (7%)</option>
                      <option value="M" selected>Medium (15%)</option>
                      <option value="Q">Quartile (25%)</option>
                      <option value="H">High (30%)</option>
                    </select>
                  </div>
                </div>

                <!-- Optional Center Logo -->
                <div class="p-3 rounded border bg-light mb-3">
                  <label for="tn-qr-logo-input" class="form-label fw-bold small mb-1">Optional Center Logo (PNG/SVG/JPG)</label>
                  <input type="file" id="tn-qr-logo-input" class="form-control form-control-sm mb-2" accept="image/*">
                  <div class="d-flex flex-wrap gap-2">
                    <button type="button" id="tn-qr-brand-logo-btn" class="btn tn-btn--outline btn-sm">
                      <i class="bi bi-stars" aria-hidden="true"></i> Test Sample Icon
                    </button>
                    <button type="button" id="tn-qr-clear-logo-btn" class="btn tn-btn--outline btn-sm text-danger">
                      Remove Logo
                    </button>
                  </div>
                </div>

                <div class="small text-muted text-break">
                  Encoded String: <code id="tn-qr-payload-preview">https://toolnest.com</code>
                </div>
              </div>

              <!-- Live Preview & Download Column -->
              <div class="col-md-5 text-center">
                <div class="tn-canvas-preview mb-3">
                  <canvas id="tn-qr-canvas" width="400" height="400" aria-label="Generated QR Code Preview"></canvas>
                </div>
                <div class="d-grid gap-2">
                  <button type="button" id="tn-qr-dl-png" class="btn tn-btn--primary">
                    <i class="bi bi-download" aria-hidden="true"></i> Download PNG Image
                  </button>
                  <button type="button" id="tn-qr-dl-svg" class="btn tn-btn--success">
                    <i class="bi bi-filetype-svg" aria-hidden="true"></i> Download Vector SVG
                  </button>
                  <button type="button" id="tn-qr-reset-btn" class="btn tn-btn--outline text-danger">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset QR Settings
                  </button>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Create a Custom QR Code</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Pick Your QR Type:</strong> Select <em>URL</em> for websites and Facebook pages, <em>Text</em> for contact notes or IDs, or <em>WiFi</em> to generate an instant network login code.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Style Colors &amp; Logo:</strong> Pick high-contrast foreground and background colors, and optionally upload your brand icon in the center.
              </li>
              <li>
                <strong>Step 3 — Download PNG or SVG:</strong> Click <strong>Download PNG Image</strong> for digital sharing or <strong>Download Vector SVG</strong> for razor-sharp commercial printing.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">Why Static, No-Expiry QR Codes Protect Your Business</h2>
            <p class="text-muted">
              Have you ever printed thousands of product boxes, restaurant table tents, or visiting cards with a "free" QR code, only to discover two weeks later that the QR code stopped working unless you pay a monthly subscription? Many QR websites secretly replace your URL with their own short redirect link so they can deactivate it after a trial period.
            </p>
            <p class="text-muted">
              ToolNest never uses redirect middleman links. Our QR Code Generator encodes your exact URL, plain text, or WiFi credentials directly into the ISO/IEC 18004 QR matrix inside your browser. Once you download your PNG or SVG file, it is <strong>100% permanent, works offline, and will never expire</strong>.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-infinity text-primary me-1" aria-hidden="true"></i> Lifetime Validity &amp; Unlimited Scans</h3>
                  <p class="small text-muted mb-0">Direct data encoding ensures your printed packaging, invoices, and banners scan reliably forever.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-bezier2 text-primary me-1" aria-hidden="true"></i> Print-Ready Vector SVG</h3>
                  <p class="small text-muted mb-0">Scale your QR code from a 2cm sticker to a highway billboard without any pixelation.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="qrFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="qFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#qFaqCol1" aria-expanded="true" aria-controls="qFaqCol1">
                    1. Do QR codes created on ToolNest ever expire?
                  </button>
                </h3>
                <div id="qFaqCol1" class="accordion-collapse collapse show" aria-labelledby="qFaq1" data-bs-parent="#qrFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All QR codes generated here are static and encode your data directly into the pattern. They have no scan limits and never expire.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="qFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#qFaqCol2" aria-expanded="false" aria-controls="qFaqCol2">
                    2. How does a WiFi QR code work when scanned by a guest?
                  </button>
                </h3>
                <div id="qFaqCol2" class="accordion-collapse collapse" aria-labelledby="qFaq2" data-bs-parent="#qrFaqAccordion">
                  <div class="accordion-body text-muted">
                    When someone points their Android or iOS camera at the WiFi QR code, their phone reads the standard <code>WIFI:T:WPA;S:...</code> payload and offers a one-tap "Connect to Network" prompt.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="qFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#qFaqCol3" aria-expanded="false" aria-controls="qFaqCol3">
                    3. Why does the QR code still scan even with a logo in the center?
                  </button>
                </h3>
                <div id="qFaqCol3" class="accordion-collapse collapse" aria-labelledby="qFaq3" data-bs-parent="#qrFaqAccordion">
                  <div class="accordion-body text-muted">
                    QR codes include Reed-Solomon mathematical error correction. When you add a center logo, our tool automatically switches to Level H (30% redundancy) so camera scanners reconstruct the covered center modules effortlessly.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="qFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#qFaqCol4" aria-expanded="false" aria-controls="qFaqCol4">
                    4. Should I download PNG or SVG for printing?
                  </button>
                </h3>
                <div id="qFaqCol4" class="accordion-collapse collapse" aria-labelledby="qFaq4" data-bs-parent="#qrFaqAccordion">
                  <div class="accordion-body text-muted">
                    Download <strong>PNG</strong> for websites, social posts, and Word documents. Download <strong>SVG</strong> for graphic design software (Illustrator, CorelDRAW, Canva) and high-resolution commercial printing.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="qFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#qFaqCol5" aria-expanded="false" aria-controls="qFaqCol5">
                    5. Are my WiFi passwords or private links sent to any server?
                  </button>
                </h3>
                <div id="qFaqCol5" class="accordion-collapse collapse" aria-labelledby="qFaq5" data-bs-parent="#qrFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Everything runs 100% locally inside your web browser. Your WiFi password and URLs never leave your device.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_qr_code_generator', 'tn_qr_code_generator_shortcode');

function tn_robots_txt_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Robots.txt Generator Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Crawler Rules Are Built Locally in Your Browser
            </span>

            <div class="row g-4">
              <div class="col-lg-7">
                <div class="p-3 rounded bg-light h-100">
                  <form id="rtg-form" class="row g-3">
                    <div class="col-12">
                      <label for="rtg-user-agent" class="form-label small fw-bold">User-Agent <span class="text-muted fw-normal">(required)</span></label>
                      <input id="rtg-user-agent" class="form-control" value="*">
                    </div>
                    <div class="col-12">
                      <label for="rtg-disallow" class="form-label small fw-bold">Disallow <span class="text-muted fw-normal">(paths to block, one per line)</span></label>
                      <textarea id="rtg-disallow" class="form-control" rows="3" placeholder="/admin /private /temp /wp-admin "></textarea>
                    </div>
                    <div class="col-12">
                      <label for="rtg-allow" class="form-label small fw-bold">Allow <span class="text-muted fw-normal">(paths to allow, optional)</span></label>
                      <textarea id="rtg-allow" class="form-control" rows="3" placeholder="/images /css /js"></textarea>
                    </div>
                    <div class="col-12">
                      <label for="rtg-crawl-delay" class="form-label small fw-bold">Crawl-Delay <span class="text-muted fw-normal">(seconds, optional)</span></label>
                      <input id="rtg-crawl-delay" class="form-control" type="number" min="0" value="">
                    </div>
                    <div class="col-12">
                      <label for="rtg-sitemap" class="form-label small fw-bold">Sitemap <span class="text-muted fw-normal">(optional, add your sitemap URL)</span></label>
                      <input id="rtg-sitemap" class="form-control" placeholder="https://example.com/sitemap.xml">
                    </div>
                    <hr class="my-3">
                    <h2 class="mb-2 small fw-bold">Presets</h2>
                    <div class="d-flex gap-2 flex-wrap" id="rtg-presets">
                      <button class="preset-btn active" data-preset="basic">Basic (Disallow /)</button>
                      <button class="preset-btn" data-preset="images">Block Admin Only</button>
                      <button class="preset-btn" data-preset="wp">WordPress Default</button>
                      <button class="preset-btn" data-preset="seo">SEO Friendly</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-5">
                <div class="p-3 rounded bg-light h-100">
                  <h2 class="mb-3 h6 fw-bold">Generated robots.txt</h2>
                  <textarea id="rtg-output" class="generated-text" rows="8" readonly>User-agent: *\nDisallow: \n</textarea>
                  <div class="d-flex gap-2 mt-3 flex-wrap">
                    <button id="rtg-copy" class="btn btn-sm btn-outline-primary" type="button"><i class="bi bi-clipboard me-1" aria-hidden="true"></i>Copy</button>
                    <button id="rtg-download" class="btn btn-sm btn-outline-success" type="button"><i class="bi bi-download me-1" aria-hidden="true"></i>Download</button>
                    <button id="rtg-reset" class="btn btn-sm btn-outline-secondary" type="button">Reset</button>
                  </div>
                  <p id="rtg-status" class="small text-muted mt-2 mb-0">Status: Ready</p>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Create a robots.txt File</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Pick a Preset or User-Agent:</strong> Choose one of the quick presets (such as <em>Block Admin Only</em>, <em>WordPress Default</em>, or <em>SEO Friendly</em>) or enter a specific crawler User-agent like <code>*</code> or <code>Googlebot</code>.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Add Disallow, Allow &amp; Sitemap Rules:</strong> Enter the folder paths you want crawlers to skip or allow, and paste your full XML sitemap URL.
              </li>
              <li>
                <strong>Step 3 — Copy &amp; Upload to Your Site Root:</strong> Click <strong>Copy</strong> and save the text as <code>robots.txt</code> in your website's root folder (e.g., <code>https://yourdomain.com/robots.txt</code>).
              </li>
            </ol>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="rtgFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="rtgFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#rtgFaqCol1" aria-expanded="true" aria-controls="rtgFaqCol1">
                    1. Where should I place the generated robots.txt file?
                  </button>
                </h3>
                <div id="rtgFaqCol1" class="accordion-collapse collapse show" aria-labelledby="rtgFaq1" data-bs-parent="#rtgFaqAccordion">
                  <div class="accordion-body text-muted">
                    Upload your <code>robots.txt</code> file to the root directory of your domain (for example, <code>https://example.com/robots.txt</code>) so search engine crawlers can find it automatically.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="rtgFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rtgFaqCol2" aria-expanded="false" aria-controls="rtgFaqCol2">
                    2. What does User-agent: * mean in robots.txt?
                  </button>
                </h3>
                <div id="rtgFaqCol2" class="accordion-collapse collapse" aria-labelledby="rtgFaq2" data-bs-parent="#rtgFaqAccordion">
                  <div class="accordion-body text-muted">
                    The asterisk (<code>*</code>) wildcard applies the Allow and Disallow rules to all web crawlers, including Googlebot and Bingbot.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="rtgFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rtgFaqCol3" aria-expanded="false" aria-controls="rtgFaqCol3">
                    3. What is the difference between Disallow: / and an empty Disallow:?
                  </button>
                </h3>
                <div id="rtgFaqCol3" class="accordion-collapse collapse" aria-labelledby="rtgFaq3" data-bs-parent="#rtgFaqAccordion">
                  <div class="accordion-body text-muted">
                    <code>Disallow: /</code> blocks crawlers from the entire website, whereas an empty <code>Disallow:</code> line allows crawlers to access all public pages.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="rtgFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rtgFaqCol4" aria-expanded="false" aria-controls="rtgFaqCol4">
                    4. Should I include my XML sitemap URL in robots.txt?
                  </button>
                </h3>
                <div id="rtgFaqCol4" class="accordion-collapse collapse" aria-labelledby="rtgFaq4" data-bs-parent="#rtgFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Adding a <code>Sitemap:</code> line with your full XML sitemap URL helps search engines discover and crawl your important pages faster.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="rtgFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#rtgFaqCol5" aria-expanded="false" aria-controls="rtgFaqCol5">
                    5. Does Disallow in robots.txt keep private pages secure?
                  </button>
                </h3>
                <div id="rtgFaqCol5" class="accordion-collapse collapse" aria-labelledby="rtgFaq5" data-bs-parent="#rtgFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. <code>robots.txt</code> is a public file and only gives instructions to cooperative crawlers. Always protect sensitive admin areas with proper authentication.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_robots_txt_generator', 'tn_robots_txt_generator_shortcode');

function tn_signature_maker_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Signature Maker Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-lock-fill" aria-hidden="true"></i>
              100% Browser-Based &bull; Your Signature Stays Private
            </span>
            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Draw</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Adjust</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Download PNG</div>
            </div>
            <div class="row g-3 align-items-end mb-3">
              <div class="col-sm-4">
                <label for="tn-signature-color" class="form-label fw-bold">Ink Color</label>
                <input type="color" id="tn-signature-color" class="form-control form-control-color" value="#111827">
              </div>
              <div class="col-sm-5">
                <label for="tn-signature-width" class="form-label fw-bold">Pen Width <span id="tn-signature-width-value" class="text-muted fw-normal">4 px</span></label>
                <input type="range" id="tn-signature-width" class="form-range" min="1" max="16" value="4">
              </div>
              <div class="col-sm-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="tn-signature-transparent" checked>
                  <label class="form-check-label" for="tn-signature-transparent">Transparent</label>
                </div>
              </div>
            </div>
            <div class="tn-canvas-preview border rounded-3 p-2 mb-3">
              <canvas id="tn-signature-canvas" width="1200" height="420" aria-label="Signature drawing canvas"></canvas>
            </div>
            <p class="small text-muted">Draw inside the canvas using your mouse, finger, or stylus.</p>
            <div class="d-flex flex-wrap gap-2">
              <button type="button" id="tn-signature-sample" class="btn tn-btn--outline">Load Sample</button>
              <button type="button" id="tn-signature-undo" class="btn tn-btn--outline">Undo</button>
              <button type="button" id="tn-signature-clear" class="btn tn-btn--outline text-danger">Clear</button>
              <button type="button" id="tn-signature-download" class="btn tn-btn--primary">Download PNG</button>
              <button type="button" id="tn-signature-download-jpg" class="btn btn-success">Download JPG</button>
            </div>
            <p class="small text-muted mt-2 mb-0">JPG downloads use a white background because JPEG does not support transparency.</p>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Make a Digital Signature</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2"><strong>Step 1 — Choose Ink &amp; Pen Width:</strong> Pick black, blue, or custom ink color and adjust the stroke thickness from 1 px to 16 px.</li>
              <li class="mb-2"><strong>Step 2 — Draw Your Signature:</strong> Sign inside the pad using your mouse, trackpad, finger, or stylus. Use <strong>Undo</strong> or <strong>Clear</strong> if you want to retry.</li>
              <li><strong>Step 3 — Download PNG or JPG:</strong> Keep <em>Transparent</em> enabled and click <strong>Download PNG</strong> for documents, or click <strong>Download JPG</strong> for a white-background image.</li>
            </ol>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="sigFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="sigFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#sigFaqCol1" aria-expanded="true" aria-controls="sigFaqCol1">
                    1. Is my handwritten signature uploaded or stored anywhere?
                  </button>
                </h3>
                <div id="sigFaqCol1" class="accordion-collapse collapse show" aria-labelledby="sigFaq1" data-bs-parent="#sigFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Your signature is drawn on an HTML5 canvas locally inside your browser and never leaves your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="sigFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sigFaqCol2" aria-expanded="false" aria-controls="sigFaqCol2">
                    2. Should I download PNG or JPG for PDF documents and job portals?
                  </button>
                </h3>
                <div id="sigFaqCol2" class="accordion-collapse collapse" aria-labelledby="sigFaq2" data-bs-parent="#sigFaqAccordion">
                  <div class="accordion-body text-muted">
                    Use <strong>PNG</strong> with <em>Transparent</em> checked when placing your signature over PDF or Word documents. Use <strong>JPG</strong> when an online job portal requires a white-background JPEG signature.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="sigFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sigFaqCol3" aria-expanded="false" aria-controls="sigFaqCol3">
                    3. How do I resize my signature to 300&times;80 pixels for Bangladesh job applications?
                  </button>
                </h3>
                <div id="sigFaqCol3" class="accordion-collapse collapse" aria-labelledby="sigFaq3" data-bs-parent="#sigFaqAccordion">
                  <div class="accordion-body text-muted">
                    Download your signature as a JPG, then open our <a href="../../tools/image-resizer/index.html">Image Resizer</a> tool to resize it to 300&times;80 pixels under 60 KB.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="sigFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sigFaqCol4" aria-expanded="false" aria-controls="sigFaqCol4">
                    4. Can I undo a single stroke without clearing the entire signature?
                  </button>
                </h3>
                <div id="sigFaqCol4" class="accordion-collapse collapse" aria-labelledby="sigFaq4" data-bs-parent="#sigFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Click the <strong>Undo</strong> button to remove the most recent stroke while keeping the rest of your signature intact.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="sigFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sigFaqCol5" aria-expanded="false" aria-controls="sigFaqCol5">
                    5. Does the signature pad work on mobile touchscreens and tablets?
                  </button>
                </h3>
                <div id="sigFaqCol5" class="accordion-collapse collapse" aria-labelledby="sigFaq5" data-bs-parent="#sigFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. The drawing canvas supports mouse, touchscreen finger input, and digital stylus pens.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_signature_maker', 'tn_signature_maker_shortcode');

function tn_text_tools_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="Text Tools Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-check" aria-hidden="true"></i>
              100% Client-Side &bull; Text Never Leaves Your Browser
            </span>

            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Paste or Type Text</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Click Any Transform</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Copy or Download .txt</div>
            </div>

            <!-- Live Stats Grid -->
            <div class="row g-2 mb-3">
              <div class="col-4 col-sm-2">
                <div class="tn-stat-card p-2">
                  <div id="tn-stat-words" class="tn-stat-card__value fs-4">0</div>
                  <div class="tn-stat-card__label small">Words</div>
                </div>
              </div>
              <div class="col-4 col-sm-2">
                <div class="tn-stat-card p-2">
                  <div id="tn-stat-chars" class="tn-stat-card__value fs-4">0</div>
                  <div class="tn-stat-card__label small">Chars</div>
                </div>
              </div>
              <div class="col-4 col-sm-2">
                <div class="tn-stat-card p-2">
                  <div id="tn-stat-chars-nospace" class="tn-stat-card__value fs-4">0</div>
                  <div class="tn-stat-card__label small">No Spaces</div>
                </div>
              </div>
              <div class="col-4 col-sm-2">
                <div class="tn-stat-card p-2">
                  <div id="tn-stat-lines" class="tn-stat-card__value fs-4">0</div>
                  <div class="tn-stat-card__label small">Lines</div>
                </div>
              </div>
              <div class="col-4 col-sm-2">
                <div class="tn-stat-card p-2">
                  <div id="tn-stat-sentences" class="tn-stat-card__value fs-4">0</div>
                  <div class="tn-stat-card__label small">Sentences</div>
                </div>
              </div>
              <div class="col-4 col-sm-2">
                <div class="tn-stat-card p-2">
                  <div id="tn-stat-readtime" class="tn-stat-card__value fs-5">0 sec</div>
                  <div class="tn-stat-card__label small">Read Time</div>
                </div>
              </div>
            </div>

            <div id="tn-text-feedback" class="alert alert-success py-2 small fw-semibold d-none mb-2" role="status"></div>

            <!-- Main Textarea -->
            <div class="mb-3">
              <label for="tn-text-input" class="visually-hidden">Enter or paste your text</label>
              <textarea id="tn-text-input" class="form-control" rows="8" placeholder="Paste or type your English or Bangla text, email list, or article here..."></textarea>
            </div>

            <!-- Case Conversion Toolbar -->
            <div class="mb-3">
              <div class="small fw-bold text-muted mb-1">1. Case Converter:</div>
              <div class="d-flex flex-wrap gap-2">
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="upper">UPPERCASE</button>
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="lower">lowercase</button>
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="title">Title Case</button>
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="sentence">Sentence case</button>
              </div>
            </div>

            <!-- Line & Whitespace Tools Toolbar -->
            <div class="mb-4">
              <div class="small fw-bold text-muted mb-1">2. Line Sorter, Deduplicator &amp; Cleaner:</div>
              <div class="d-flex flex-wrap gap-2">
                <button type="button" class="btn tn-btn--primary btn-sm" data-tn-text-action="dedupe">
                  <i class="bi bi-funnel-fill" aria-hidden="true"></i> Remove Duplicate Lines
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="sort-asc">
                  <i class="bi bi-sort-alpha-down" aria-hidden="true"></i> Sort Lines (A &rarr; Z)
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="sort-desc">
                  <i class="bi bi-sort-alpha-up" aria-hidden="true"></i> Sort Lines (Z &rarr; A)
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="remove-empty">
                  Remove Empty Lines
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="clean-spaces">
                  Clean Extra Spaces
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm" data-tn-text-action="number-lines">
                  Number Lines
                </button>
              </div>
            </div>

            <!-- Output & Utility Actions -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-3 border-top">
              <div class="d-flex flex-wrap gap-2">
                <button type="button" id="tn-text-copy-btn" class="btn tn-btn--success">
                  <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Text
                </button>
                <button type="button" id="tn-text-download-btn" class="btn tn-btn--primary">
                  <i class="bi bi-download" aria-hidden="true"></i> Download .txt
                </button>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <button type="button" id="tn-text-undo-btn" class="btn tn-btn--outline btn-sm" disabled>
                  <i class="bi bi-arrow-90deg-left" aria-hidden="true"></i> Undo
                </button>
                <button type="button" id="tn-text-sample-btn" class="btn tn-btn--outline btn-sm">
                  <i class="bi bi-magic" aria-hidden="true"></i> Load Sample List
                </button>
                <button type="button" id="tn-text-clear-btn" class="btn tn-btn--outline btn-sm text-danger">
                  <i class="bi bi-trash3" aria-hidden="true"></i> Clear
                </button>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Use the Text Tools &amp; Word Counter</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Paste Your Text or List:</strong> Enter any blog draft, student essay, phone number list, or keyword sheet into the editor. Word, character, line, and sentence counters update immediately.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Apply One-Click Transformations:</strong> Click <em>UPPERCASE</em>, <em>Title Case</em>, <em>Remove Duplicate Lines</em>, or <em>Sort Lines (A &rarr; Z)</em>. Made a mistake? Click <strong>Undo</strong> to revert.
              </li>
              <li>
                <strong>Step 3 — Copy or Export:</strong> Click <strong>Copy Text</strong> to copy the cleaned result to your clipboard or <strong>Download .txt</strong> to save it as a plain text file.
              </li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">All-in-One Text Formatting for Writers, Marketers &amp; Developers</h2>
            <p class="text-muted">
              Content writers, SEO specialists, data entry freelancers, and e-commerce managers spend hours cleaning up messy spreadsheets, fixing accidentally capitalized paragraphs, and counting characters for Google meta titles or SMS marketing campaigns.
            </p>
            <p class="text-muted">
              Instead of opening heavy spreadsheet software just to deduplicate a list of customer phone numbers or sort product SKUs alphabetically, ToolNest's Text Tools suite handles all common string operations in one lightweight workspace:
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-list-check text-primary me-1" aria-hidden="true"></i> Instant List Deduplication</h3>
                  <p class="small text-muted mb-0">Clean thousands of duplicate email addresses, coupon codes, or delivery names in a single click while preserving original order.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-type text-primary me-1" aria-hidden="true"></i> Smart Title &amp; Sentence Case</h3>
                  <p class="small text-muted mb-0">Automatically capitalizes major headline words while keeping short prepositions (<em>in, of, to, for</em>) lowercase.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="textFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="tFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tFaqCol1" aria-expanded="true" aria-controls="tFaqCol1">
                    1. Does the Word Counter work with both English and Bangla text?
                  </button>
                </h3>
                <div id="tFaqCol1" class="accordion-collapse collapse show" aria-labelledby="tFaq1" data-bs-parent="#textFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! The counter supports English, Bangla Unicode (including the Bangla full stop <code>।</code> for sentence counting), and all international scripts.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="tFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tFaqCol2" aria-expanded="false" aria-controls="tFaqCol2">
                    2. How does the Remove Duplicate Lines tool work?
                  </button>
                </h3>
                <div id="tFaqCol2" class="accordion-collapse collapse" aria-labelledby="tFaq2" data-bs-parent="#textFaqAccordion">
                  <div class="accordion-body text-muted">
                    It checks every line in your text box, keeps the first unique appearance of each line, removes any repeated lines further down, and reports the exact number of duplicates removed.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="tFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tFaqCol3" aria-expanded="false" aria-controls="tFaqCol3">
                    3. Can I undo a text transformation if I click the wrong button?
                  </button>
                </h3>
                <div id="tFaqCol3" class="accordion-collapse collapse" aria-labelledby="tFaq3" data-bs-parent="#textFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Every button click saves your previous text into a 20-step history stack. Click <strong>Undo</strong> to step back safely.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="tFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tFaqCol4" aria-expanded="false" aria-controls="tFaqCol4">
                    4. Is my pasted article or customer list sent to any remote server?
                  </button>
                </h3>
                <div id="tFaqCol4" class="accordion-collapse collapse" aria-labelledby="tFaq4" data-bs-parent="#textFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All text analysis and sorting run 100% locally in your browser. Your private drafts and contact lists never leave your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="tFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tFaqCol5" aria-expanded="false" aria-controls="tFaqCol5">
                    5. How does Natural Alphabetical Sorting handle numbers inside lines?
                  </button>
                </h3>
                <div id="tFaqCol5" class="accordion-collapse collapse" aria-labelledby="tFaq5" data-bs-parent="#textFaqAccordion">
                  <div class="accordion-body text-muted">
                    Our sorter uses natural numeric collation, meaning <code>Item 2</code> is sorted before <code>Item 10</code> just as you would expect.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_text_tools', 'tn_text_tools_shortcode');

function tn_utm_link_builder_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START (No Ads Inside) -->
          <section class="tn-tool-workspace" aria-label="UTM Link Builder Workspace">
            <!-- Quick Channel Presets -->
            <div class="mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                <span class="small fw-bold text-uppercase text-muted">
                  <i class="bi bi-lightning-charge-fill text-warning me-1" aria-hidden="true"></i> One-Click Marketing Channel Presets
                </span>
                <div class="d-flex gap-2">
                  <button type="button" id="tn-utm-sample-btn" class="btn tn-btn--outline btn-sm py-1 px-2">
                    <i class="bi bi-magic" aria-hidden="true"></i> Load Sample
                  </button>
                  <button type="button" id="tn-utm-reset-btn" class="btn tn-btn--outline btn-sm py-1 px-2">
                    <i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset
                  </button>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-utm-preset="fb_ads">
                  <i class="bi bi-facebook text-primary" aria-hidden="true"></i> Facebook Ads
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-utm-preset="fb_organic">
                  Facebook Post
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-utm-preset="ig_ads">
                  <i class="bi bi-instagram text-danger" aria-hidden="true"></i> Instagram Reel Ad
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-utm-preset="google_cpc">
                  <i class="bi bi-google text-success" aria-hidden="true"></i> Google CPC
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-utm-preset="youtube">
                  <i class="bi bi-youtube text-danger" aria-hidden="true"></i> YouTube
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-utm-preset="newsletter">
                  <i class="bi bi-envelope-fill text-primary" aria-hidden="true"></i> Email Newsletter
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-utm-preset="sms">
                  <i class="bi bi-chat-dots-fill text-warning" aria-hidden="true"></i> Bulk SMS
                </button>
                <button type="button" class="btn tn-btn--outline btn-sm py-1 px-3" data-utm-preset="whatsapp">
                  <i class="bi bi-whatsapp text-success" aria-hidden="true"></i> WhatsApp
                </button>
              </div>
            </div>

            <!-- Destination Website URL -->
            <div class="mb-3">
              <label for="tn-utm-url" class="form-label fw-bold mb-1">
                Destination Website URL <span class="text-danger">*</span>
              </label>
              <input type="url" id="tn-utm-url" class="form-control" value="https://dhakafashion.com/eid-collection" placeholder="https://yourwebsite.com/landing-page">
              <div class="form-text small">Full landing page URL where visitors will arrive after clicking your link.</div>
            </div>

            <!-- Core UTM Parameters -->
            <div class="row g-3 mb-3">
              <div class="col-md-4">
                <label for="tn-utm-source" class="form-label fw-bold small mb-1">
                  Campaign Source (<code>utm_source</code>) <span class="text-danger">*</span>
                </label>
                <input type="text" id="tn-utm-source" class="form-control" value="facebook" placeholder="e.g. facebook, google, newsletter">
                <div class="form-text small">Platform sending traffic.</div>
              </div>
              <div class="col-md-4">
                <label for="tn-utm-medium" class="form-label fw-bold small mb-1">
                  Campaign Medium (<code>utm_medium</code>) <span class="text-danger">*</span>
                </label>
                <input type="text" id="tn-utm-medium" class="form-control" value="paid_social" placeholder="e.g. paid_social, cpc, email, sms">
                <div class="form-text small">Marketing channel type.</div>
              </div>
              <div class="col-md-4">
                <label for="tn-utm-campaign" class="form-label fw-bold small mb-1">
                  Campaign Name (<code>utm_campaign</code>) <span class="text-danger">*</span>
                </label>
                <input type="text" id="tn-utm-campaign" class="form-control" value="eid_sale_2026" placeholder="e.g. eid_sale_2026, winter_launch">
                <div class="form-text small">Promo or product campaign.</div>
              </div>
            </div>

            <!-- Optional UTM Parameters -->
            <div class="row g-3 mb-3">
              <div class="col-md-4">
                <label for="tn-utm-id" class="form-label fw-bold small mb-1">
                  Campaign ID (<code>utm_id</code>) <span class="text-muted fw-normal">(Optional)</span>
                </label>
                <input type="text" id="tn-utm-id" class="form-control" placeholder="e.g. cmp_104">
                <div class="form-text small">GA4 ad campaign identifier.</div>
              </div>
              <div class="col-md-4">
                <label for="tn-utm-term" class="form-label fw-bold small mb-1">
                  Campaign Term (<code>utm_term</code>) <span class="text-muted fw-normal">(Optional)</span>
                </label>
                <input type="text" id="tn-utm-term" class="form-control" value="dhaka_shoppers" placeholder="e.g. buy_shoes, lookalike_1pct">
                <div class="form-text small">Paid keyword or ad set name.</div>
              </div>
              <div class="col-md-4">
                <label for="tn-utm-content" class="form-label fw-bold small mb-1">
                  Campaign Content (<code>utm_content</code>) <span class="text-muted fw-normal">(Optional)</span>
                </label>
                <input type="text" id="tn-utm-content" class="form-control" value="video_reel_a" placeholder="e.g. video_reel_a, banner_top">
                <div class="form-text small">Differentiates ad creatives/CTAs.</div>
              </div>
            </div>

            <!-- Formatting Preferences Bar -->
            <div class="p-3 rounded-3 bg-light border mb-4">
              <div class="row g-3 align-items-center">
                <div class="col-md-6">
                  <div class="form-check form-switch mb-0">
                    <input class="form-check-input" type="checkbox" role="switch" id="tn-utm-lowercase" checked>
                    <label class="form-check-label fw-semibold small" for="tn-utm-lowercase">
                      Force lowercase parameters (Recommended for GA4)
                    </label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="d-flex align-items-center justify-content-md-end gap-2">
                    <label for="tn-utm-space-rule" class="small fw-semibold text-nowrap mb-0">Spaces in tags:</label>
                    <select id="tn-utm-space-rule" class="form-select form-select-sm" style="max-width: 220px;">
                      <option value="underscore" selected>Replace with underscore (_)</option>
                      <option value="hyphen">Replace with hyphen (-)</option>
                      <option value="encode">URL encode (%20 / +)</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <!-- Generated Output Box -->
            <div class="tn-result-box mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                <label for="tn-utm-output" class="fw-bold mb-0">
                  <i class="bi bi-link-45deg text-primary fs-5 me-1" aria-hidden="true"></i> Generated Campaign Tracking URL
                </label>
                <span id="tn-utm-status-badge" class="badge bg-success-subtle text-success px-3 py-2">
                  <i class="bi bi-check-circle-fill me-1" aria-hidden="true"></i> Valid GA4 &amp; Meta Ads Tracking Link Ready
                </span>
              </div>

              <textarea id="tn-utm-output" class="form-control font-monospace small mb-2" rows="3" readonly aria-label="Generated UTM URL"></textarea>

              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
                <div id="tn-utm-breakdown" class="d-flex flex-wrap gap-1"></div>
                <span id="tn-utm-char-count" class="small text-muted">0 characters</span>
              </div>

              <div class="d-flex flex-wrap gap-2">
                <button type="button" id="tn-utm-copy-btn" class="btn tn-btn--primary">
                  <i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy UTM URL
                </button>
                <button type="button" id="tn-utm-save-btn" class="btn tn-btn--accent">
                  <i class="bi bi-plus-circle-fill" aria-hidden="true"></i> Add to Campaign Batch List
                </button>
                <a href="#" id="tn-utm-test-btn" target="_blank" rel="noopener noreferrer" class="btn tn-btn--outline">
                  <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i> Test Link in New Tab
                </a>
              </div>
            </div>

            <!-- Saved Batch Campaign List (with CSV Export) -->
            <div id="tn-utm-history-wrap" class="d-none mt-4">
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-2">
                <h2 class="h6 fw-bold mb-0">
                  <i class="bi bi-table text-primary me-1" aria-hidden="true"></i> Saved Campaign Batch List
                </h2>
                <div class="d-flex gap-2">
                  <button type="button" id="tn-utm-export-csv" class="btn tn-btn--success btn-sm">
                    <i class="bi bi-file-earmark-spreadsheet" aria-hidden="true"></i> Export CSV
                  </button>
                  <button type="button" id="tn-utm-clear-history" class="btn tn-btn--outline btn-sm text-danger">
                    Clear List
                  </button>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle mb-0 bg-white">
                  <thead class="table-light small">
                    <tr>
                      <th>Campaign / Source</th>
                      <th>Generated UTM Link</th>
                      <th class="text-end">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="tn-utm-history-body"></tbody>
                </table>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Build a UTM Tracking Link in 3 Steps</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Enter Your Landing Page URL:</strong> Paste the destination website or product page URL (for example, <code>https://yourstore.com/eid-sale</code>) into the top box, or click a <em>One-Click Channel Preset</em> such as <strong>Facebook Ads</strong> or <strong>Google CPC</strong>.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Fill in Your UTM Tags:</strong> Enter your traffic source (<code>utm_source</code>), marketing medium (<code>utm_medium</code>), and campaign name (<code>utm_campaign</code>). Optionally add <code>utm_term</code> for audience targeting and <code>utm_content</code> to compare different video or banner creatives.
              </li>
              <li>
                <strong>Step 3 — Copy or Export CSV:</strong> Click <strong>Copy UTM URL</strong> to paste the link directly into Meta Ads Manager, Google Ads, or your SMS panel, or click <strong>Add to Campaign Batch List</strong> to build multiple links and download them as a spreadsheet (<code>.CSV</code>).
              </li>
            </ol>
          </section>

          <!-- Detailed SEO Guide & Reference Table (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="guide-heading">
            <h2 id="guide-heading" class="tn-section-title">Complete Guide to UTM Parameters for GA4 &amp; E-Commerce</h2>
            <p class="text-muted">
              When you run Facebook boosts, Instagram Reel ads, YouTube sponsorships, or bulk SMS campaigns in Bangladesh or globally, visitors often land on your website without clear attribution. Social apps like Facebook Messenger, WhatsApp, and Instagram frequently strip referrer headers when opening links inside in-app browsers—causing paid traffic to appear as "Direct" traffic inside <strong>Google Analytics 4 (GA4)</strong>.
            </p>
            <p class="text-muted">
              By attaching standardized <strong>UTM (Urchin Tracking Module)</strong> parameters to your destination URLs, you guarantee that every click carries explicit source, medium, and campaign metadata directly into your analytics reports and Shopify, WooCommerce, or custom checkout dashboards.
            </p>

            <div class="table-responsive my-3">
              <table class="table table-bordered table-sm small mb-0">
                <thead class="table-light">
                  <tr>
                    <th>Parameter</th>
                    <th>Status</th>
                    <th>Purpose</th>
                    <th>Real-World Examples</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><code>utm_source</code></td>
                    <td><span class="badge bg-primary-subtle text-primary">Required</span></td>
                    <td>Identifies the platform or referrer sending traffic.</td>
                    <td><code>facebook</code>, <code>google</code>, <code>instagram</code>, <code>newsletter</code></td>
                  </tr>
                  <tr>
                    <td><code>utm_medium</code></td>
                    <td><span class="badge bg-primary-subtle text-primary">Required</span></td>
                    <td>Identifies the marketing channel category for GA4 channel grouping.</td>
                    <td><code>paid_social</code>, <code>cpc</code>, <code>social</code>, <code>email</code>, <code>sms</code></td>
                  </tr>
                  <tr>
                    <td><code>utm_campaign</code></td>
                    <td><span class="badge bg-primary-subtle text-primary">Required</span></td>
                    <td>Names the specific promotion, seasonal sale, or product launch.</td>
                    <td><code>eid_sale_2026</code>, <code>boishakh_offer</code>, <code>winter_drop</code></td>
                  </tr>
                  <tr>
                    <td><code>utm_id</code></td>
                    <td><span class="badge bg-secondary-subtle text-secondary">Optional</span></td>
                    <td>Links cost data imports in Google Analytics 4.</td>
                    <td><code>cmp_bd_104</code>, <code>fb_q4_01</code></td>
                  </tr>
                  <tr>
                    <td><code>utm_term</code></td>
                    <td><span class="badge bg-secondary-subtle text-secondary">Optional</span></td>
                    <td>Tracks paid search keywords or Meta ad-set audience segments.</td>
                    <td><code>buy_panjabi_bd</code>, <code>dhaka_women_22_35</code></td>
                  </tr>
                  <tr>
                    <td><code>utm_content</code></td>
                    <td><span class="badge bg-secondary-subtle text-secondary">Optional</span></td>
                    <td>Differentiates A/B ad creatives, hooks, or button placements.</td>
                    <td><code>video_reel_a</code>, <code>carousel_slide_2</code>, <code>footer_link</code></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <h3 class="h6 fw-bold mt-3">3 Golden Rules for Clean UTM Tracking</h3>
            <ul class="text-muted small mb-0">
              <li class="mb-1"><strong>Always use lowercase:</strong> GA4 treats <code>Facebook</code>, <code>facebook</code>, and <code>FB</code> as three separate sources. Keep the <em>Force lowercase</em> switch enabled.</li>
              <li class="mb-1"><strong>Avoid spaces in parameter values:</strong> Use underscores (<code>eid_sale_2026</code>) or hyphens (<code>eid-sale-2026</code>) so URLs never break when pasted into SMS messages or chat apps.</li>
              <li><strong>Never use UTM tags on internal website links:</strong> Adding UTM parameters to links between pages on your own site overwrites the original visitor source and resets their session attribution.</li>
            </ul>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="tn-card mb-4" aria-labelledby="faq-heading">
            <h2 id="faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="utmFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="uFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#uFaqCol1" aria-expanded="true" aria-controls="uFaqCol1">
                    1. What are UTM parameters and why do I need them?
                  </button>
                </h3>
                <div id="uFaqCol1" class="accordion-collapse collapse show" aria-labelledby="uFaq1" data-bs-parent="#utmFaqAccordion">
                  <div class="accordion-body text-muted">
                    UTM (Urchin Tracking Module) parameters are short query tags added to the end of a URL (such as <code>utm_source</code>, <code>utm_medium</code>, and <code>utm_campaign</code>). They tell Google Analytics 4 (GA4) and e-commerce dashboards exactly which Facebook ad, email newsletter, or SMS blast brought a visitor to your website.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="uFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#uFaqCol2" aria-expanded="false" aria-controls="uFaqCol2">
                    2. Which UTM parameters are required vs. optional?
                  </button>
                </h3>
                <div id="uFaqCol2" class="accordion-collapse collapse" aria-labelledby="uFaq2" data-bs-parent="#utmFaqAccordion">
                  <div class="accordion-body text-muted">
                    The three core parameters are <code>utm_source</code> (who sent the traffic, e.g. <code>facebook</code>), <code>utm_medium</code> (the marketing channel, e.g. <code>paid_social</code> or <code>cpc</code>), and <code>utm_campaign</code> (the promotion name, e.g. <code>eid_sale_2026</code>). Optional parameters include <code>utm_id</code>, <code>utm_term</code> (target keyword or audience), and <code>utm_content</code> (specific ad creative or button).
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="uFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#uFaqCol3" aria-expanded="false" aria-controls="uFaqCol3">
                    3. Why should UTM parameters always be lowercase?
                  </button>
                </h3>
                <div id="uFaqCol3" class="accordion-collapse collapse" aria-labelledby="uFaq3" data-bs-parent="#utmFaqAccordion">
                  <div class="accordion-body text-muted">
                    Google Analytics is strictly case-sensitive. It treats <code>utm_source=Facebook</code> and <code>utm_source=facebook</code> as two separate traffic sources. ToolNest includes an automatic <em>Force lowercase</em> toggle enabled by default so your analytics reports stay clean and unified.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="uFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#uFaqCol4" aria-expanded="false" aria-controls="uFaqCol4">
                    4. What happens if my destination URL already has query parameters or a #hash?
                  </button>
                </h3>
                <div id="uFaqCol4" class="accordion-collapse collapse" aria-labelledby="uFaq4" data-bs-parent="#utmFaqAccordion">
                  <div class="accordion-body text-muted">
                    ToolNest parses your URL using the native browser URL API. If your link already has parameters like <code>?product=12</code> or a section anchor like <code>#pricing</code>, the builder preserves them and appends the UTM parameters in the proper position before the hash.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="uFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#uFaqCol5" aria-expanded="false" aria-controls="uFaqCol5">
                    5. Can I turn my generated UTM link into a QR code for print flyers?
                  </button>
                </h3>
                <div id="uFaqCol5" class="accordion-collapse collapse" aria-labelledby="uFaq5" data-bs-parent="#utmFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Copy your generated UTM URL and paste it into our <a href="../../tools/qr-code-generator/index.html">QR Code Generator</a>. Every time someone scans your printed flyer or product packaging QR code, Google Analytics will record the scan under your custom UTM source and campaign.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_utm_link_builder', 'tn_utm_link_builder_shortcode');

function tn_whatsapp_link_generator_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START -->
          <section class="tn-tool-workspace" aria-label="WhatsApp Link Generator Workspace">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-lock-fill" aria-hidden="true"></i>
              100% Browser-Based &bull; Nothing Is Uploaded
            </span>
            <div class="tn-step-bar">
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">1</span> Enter phone</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">2</span> Add message</div>
              <div class="tn-step-bar__item"><span class="tn-step-bar__num">3</span> Copy or open</div>
            </div>
            <div class="d-flex justify-content-end gap-2 mb-3">
              <button type="button" id="tn-wa-sample" class="btn tn-btn--outline btn-sm"><i class="bi bi-magic" aria-hidden="true"></i> Load Sample</button>
              <button type="button" id="tn-wa-reset" class="btn tn-btn--outline btn-sm text-danger"><i class="bi bi-arrow-counterclockwise" aria-hidden="true"></i> Reset</button>
            </div>
            <div class="row g-3 mb-4">
              <div class="col-sm-4">
                <label for="tn-wa-country" class="form-label fw-bold">Country Code</label>
                <div class="input-group">
                  <span class="input-group-text">+</span>
                  <input type="tel" id="tn-wa-country" class="form-control" value="880" inputmode="numeric" maxlength="4">
                </div>
              </div>
              <div class="col-sm-8">
                <label for="tn-wa-phone" class="form-label fw-bold">Phone Number</label>
                <input type="tel" id="tn-wa-phone" class="form-control" placeholder="1711000000" inputmode="tel">
              </div>
              <div class="col-12">
                <div class="form-text">Use the country code without + and the phone number without spaces or a leading local zero.</div>
              </div>
              <div class="col-12">
                <label for="tn-wa-message" class="form-label fw-bold">Prefilled Message <span class="text-muted fw-normal">(optional)</span></label>
                <textarea id="tn-wa-message" class="form-control" rows="4" placeholder="Hello, I would like to know more about your product."></textarea>
              </div>
            </div>
            <div class="tn-result-box border-success bg-success-subtle mb-3">
              <div class="small fw-bold text-uppercase text-success mb-2">Generated WhatsApp Link</div>
              <div id="tn-wa-status" class="small text-muted mb-2">Enter a phone number to generate a link.</div>
              <textarea id="tn-wa-output" class="form-control bg-white" rows="3" readonly aria-label="Generated WhatsApp link"></textarea>
            </div>
            <div class="d-flex flex-wrap gap-2">
              <button type="button" id="tn-wa-copy" class="btn tn-btn--primary" disabled><i class="bi bi-clipboard-check" aria-hidden="true"></i> Copy Link</button>
              <a id="tn-wa-open" class="btn btn-success" href="#" target="_blank" rel="noopener" aria-disabled="true"><i class="bi bi-whatsapp" aria-hidden="true"></i> Open WhatsApp</a>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Create a WhatsApp Click-to-Chat Link</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2"><strong>Step 1 — Enter Country Code &amp; Phone Number:</strong> Type your country code (e.g., <code>880</code> for Bangladesh) and phone number without the leading zero (e.g., <code>1711000000</code>).</li>
              <li class="mb-2"><strong>Step 2 — Add a Prefilled Greeting:</strong> Write an optional welcome or product inquiry message in English or Bangla.</li>
              <li><strong>Step 3 — Copy or Test Your Link:</strong> Click <strong>Copy Link</strong> to paste the <code>https://wa.me/...</code> URL into your Facebook page, Instagram bio, or website button.</li>
            </ol>
          </section>

          <!-- Features & Detailed SEO Content (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="features-heading">
            <h2 id="features-heading" class="tn-section-title">How WhatsApp Links Work</h2>
            <p class="text-muted mb-0">This tool creates a standard <code>wa.me</code> URL using your international number. The message is URL-encoded so punctuation and Bangla or other Unicode text work correctly. Use the result in a website button, social bio, email, QR code, or online store.</p>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="mb-4" aria-labelledby="tool-faq-heading">
            <h2 id="tool-faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="waFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="waFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#waFaqCol1" aria-expanded="true" aria-controls="waFaqCol1">
                    1. How do I format a Bangladesh phone number for a WhatsApp link?
                  </button>
                </h3>
                <div id="waFaqCol1" class="accordion-collapse collapse show" aria-labelledby="waFaq1" data-bs-parent="#waFaqAccordion">
                  <div class="accordion-body text-muted">
                    Enter <code>880</code> in the Country Code field and enter the 10-digit mobile number without the leading zero (for example, <code>1711000000</code>) in the Phone Number field.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="waFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#waFaqCol2" aria-expanded="false" aria-controls="waFaqCol2">
                    2. Can I include Bangla text and emojis in the prefilled message?
                  </button>
                </h3>
                <div id="waFaqCol2" class="accordion-collapse collapse" aria-labelledby="waFaq2" data-bs-parent="#waFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. The generator automatically URL-encodes Bangla Unicode characters, emojis, spaces, and line breaks so they appear properly inside WhatsApp.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="waFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#waFaqCol3" aria-expanded="false" aria-controls="waFaqCol3">
                    3. Are phone numbers or messages saved on any server?
                  </button>
                </h3>
                <div id="waFaqCol3" class="accordion-collapse collapse" aria-labelledby="waFaq3" data-bs-parent="#waFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Your phone number and message are processed 100% locally in your browser and are never transmitted or stored.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="waFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#waFaqCol4" aria-expanded="false" aria-controls="waFaqCol4">
                    4. Does the wa.me link work on both mobile and WhatsApp Web?
                  </button>
                </h3>
                <div id="waFaqCol4" class="accordion-collapse collapse" aria-labelledby="waFaq4" data-bs-parent="#waFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Official <code>wa.me</code> links open the WhatsApp app on Android and iOS phones and open WhatsApp Desktop or WhatsApp Web on computers.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="waFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#waFaqCol5" aria-expanded="false" aria-controls="waFaqCol5">
                    5. Can I turn my WhatsApp link into a printable QR code?
                  </button>
                </h3>
                <div id="waFaqCol5" class="accordion-collapse collapse" aria-labelledby="waFaq5" data-bs-parent="#waFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Copy your generated <code>wa.me</code> link and paste it into our <a href="../../tools/qr-code-generator/index.html">QR Code Generator</a> to download a scannable QR code for flyers or product packaging.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_whatsapp_link_generator', 'tn_whatsapp_link_generator_shortcode');

function tn_word_to_pdf_shortcode() {
    ob_start();
    ?>
<!-- TOOL AREA START (No Ads Inside) -->
          <section class="tn-tool-workspace" aria-label="Word to PDF Converter Workspace">
            <!-- Upload Dropzone -->
            <div id="tn-w2p-dropzone" class="tn-dropzone mb-3" tabindex="0" role="button" aria-label="Upload a Word file to convert to PDF">
              <i class="bi bi-file-earmark-word tn-dropzone__icon text-primary" aria-hidden="true"></i>
              <h2 class="h5 fw-bold mb-1">Drop Your MS Word (.DOCX, .DOC) File Here or Click to Browse</h2>
              <p class="small text-muted mb-3">Automatically converts your Word document to PDF preserving its layout, headings, fonts, and tables</p>
              <div class="d-flex flex-wrap justify-content-center gap-2">
                <label for="tn-w2p-file-input" class="btn tn-btn--primary">
                  <i class="bi bi-folder2-open" aria-hidden="true"></i> Upload Word File
                </label>
                <button type="button" id="tn-w2p-sample-btn" class="btn tn-btn--outline">
                  <i class="bi bi-magic" aria-hidden="true"></i> Try Sample Word (.DOCX)
                </button>
              </div>
              <input type="file" id="tn-w2p-file-input" class="d-none" accept=".docx,.doc,.txt,.rtf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,text/plain">
            </div>

            <!-- Converting Progress State -->
            <div id="tn-w2p-progress" class="d-none p-4 rounded-3 bg-light border text-center mb-3">
              <div class="spinner-border text-primary mb-2" role="status" aria-hidden="true"></div>
              <div class="fw-bold">Converting Word document to PDF...</div>
              <div class="small text-muted">Preserving document page setup, headings, paragraphs, and tables</div>
            </div>

            <!-- Error Alert -->
            <div id="tn-w2p-error-box" class="alert alert-danger d-none py-2 small mb-3" role="alert"></div>

            <!-- Conversion Complete & Download Box -->
            <div id="tn-w2p-results-wrap" class="d-none mt-3">
              <div class="tn-result-box">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 p-3 rounded-3 bg-white border mb-3">
                  <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 bg-danger-subtle text-danger d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                      <i class="bi bi-file-earmark-pdf-fill fs-3" aria-hidden="true"></i>
                    </div>
                    <div>
                      <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span id="tn-w2p-file-name" class="fw-bold text-dark">document.pdf</span>
                        <span class="badge bg-success-subtle text-success">Converted</span>
                      </div>
                      <div id="tn-w2p-file-meta" class="small text-muted">PDF Document &bull; 1 Page</div>
                    </div>
                  </div>

                  <div class="d-flex flex-wrap gap-2">
                    <button type="button" id="tn-w2p-dl-pdf" class="btn tn-btn--success px-4">
                      <i class="bi bi-download me-1" aria-hidden="true"></i> Download PDF
                    </button>
                    <button type="button" id="tn-w2p-reset-btn" class="btn tn-btn--outline">
                      <i class="bi bi-arrow-counterclockwise me-1" aria-hidden="true"></i> Convert Another
                    </button>
                  </div>
                </div>

                <!-- Visual Document Preview -->
                <div class="border rounded-3 bg-white overflow-hidden">
                  <div class="bg-light px-3 py-2 border-bottom d-flex justify-content-between align-items-center">
                    <span class="small fw-semibold text-secondary"><i class="bi bi-eye me-1 text-primary" aria-hidden="true"></i> Document Preview</span>
                    <span id="tn-w2p-para-badge" class="badge bg-secondary-subtle text-secondary-emphasis">1 Page</span>
                  </div>
                  <div id="tn-w2p-preview" class="p-4" style="max-height: 380px; overflow-y: auto; background: #fff;"></div>
                </div>
              </div>
            </div>
          </section>
          <!-- TOOL AREA END -->

          <!-- In-Content Ad Slot -->
          <?php toolnest_render_incontent_ad_slot(); ?>

          <!-- How to Use Steps -->
          <section class="tn-card mb-4" aria-labelledby="how-to-heading">
            <h2 id="how-to-heading" class="tn-section-title">How to Convert MS Word (.DOCX) to PDF</h2>
            <ol class="mb-0 ps-3">
              <li class="mb-2">
                <strong>Step 1 — Upload Your Word Document:</strong> Drag and drop your <code>.docx</code>, <code>.doc</code>, or <code>.rtf</code> file into the upload box above, or click <strong>Upload Word File</strong>.
              </li>
              <li class="mb-2">
                <strong>Step 2 — Automatic Conversion:</strong> The converter immediately reads your Word document's page dimensions, margins, headings, bold/italic styles, alignments, lists, and tables and converts it into a matching PDF file.
              </li>
              <li>
                <strong>Step 3 — Download Your PDF:</strong> Click <strong>Download PDF</strong> to save the converted PDF file directly to your device.
              </li>
            </ol>
          </section>

          <!-- Detailed SEO Guide (300+ Words) -->
          <section class="tn-card mb-4" aria-labelledby="guide-heading">
            <h2 id="guide-heading" class="tn-section-title">Why Convert Word Documents to PDF Locally in Your Browser?</h2>
            <p class="text-muted">
              Sending a raw <code>.docx</code> file to a client, recruiter, or government portal often leads to broken layouts when the recipient opens the file on a different operating system or without your installed fonts. Converting your Word document into a standardized <strong>PDF (Portable Document Format)</strong> locks in your pagination, margins, and typography across every phone, tablet, and desktop.
            </p>
            <p class="text-muted">
              With ToolNest, you never have to upload confidential employment contracts, legal drafts, or academic papers to a third-party server. Our browser engine unpacks the OpenXML structure of your <code>.docx</code> file locally using <code>JSZip</code>, reads the document's original page setup, styles, and tables, and builds an exact multi-page vector PDF using <code>pdf-lib</code>.
            </p>
            <div class="row g-3 my-2">
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-file-earmark-lock2 text-primary me-1" aria-hidden="true"></i> 100% Private &amp; Instant</h3>
                  <p class="small text-muted mb-0">Zero upload wait times and zero cloud storage—your Word files remain strictly inside your browser's local RAM.</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="p-3 border rounded-3 bg-light h-100">
                  <h3 class="h6 fw-bold"><i class="bi bi-file-earmark-check text-primary me-1" aria-hidden="true"></i> Matches Word Formatting</h3>
                  <p class="small text-muted mb-0">Automatically preserves your Word file's page size, margins, headings, bold/italic text, alignments, lists, and tables.</p>
                </div>
              </div>
            </div>
          </section>

          <!-- 5-Question FAQ Section -->
          <section class="tn-card mb-4" aria-labelledby="faq-heading">
            <h2 id="faq-heading" class="tn-section-title">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="w2pFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="wpFaq1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#wpFaqCol1" aria-expanded="true" aria-controls="wpFaqCol1">
                    1. How does ToolNest convert Word (.docx) to PDF without uploading my file?
                  </button>
                </h3>
                <div id="wpFaqCol1" class="accordion-collapse collapse show" aria-labelledby="wpFaq1" data-bs-parent="#w2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    ToolNest reads the internal XML structure (<code>word/document.xml</code>) of your <code>.docx</code> file directly inside your browser using JSZip, formats the headings and paragraphs, and builds a vector PDF file using <code>pdf-lib</code>—all 100% locally on your device.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="wpFaq2">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wpFaqCol2" aria-expanded="false" aria-controls="wpFaqCol2">
                    2. Can I edit my Word document before saving it as a PDF?
                  </button>
                </h3>
                <div id="wpFaqCol2" class="accordion-collapse collapse" aria-labelledby="wpFaq2" data-bs-parent="#w2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! Once you select a <code>.docx</code>, <code>.doc</code>, or <code>.txt</code> file, the extracted content loads into an editable live preview box so you can fix typos or update dates before clicking <strong>Download PDF</strong>.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="wpFaq3">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wpFaqCol3" aria-expanded="false" aria-controls="wpFaqCol3">
                    3. Which page sizes and margins are supported?
                  </button>
                </h3>
                <div id="wpFaqCol3" class="accordion-collapse collapse" aria-labelledby="wpFaq3" data-bs-parent="#w2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    You can choose between <strong>A4 (210 &times; 297 mm)</strong> and <strong>US Letter (8.5 &times; 11 in)</strong> in Portrait or Landscape orientation, with Narrow (0.5 in), Normal (0.75 in), or Wide (1.0 in) margins.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="wpFaq4">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wpFaqCol4" aria-expanded="false" aria-controls="wpFaqCol4">
                    4. How do I convert a Word document that contains Bangla Unicode text?
                  </button>
                </h3>
                <div id="wpFaqCol4" class="accordion-collapse collapse" aria-labelledby="wpFaq4" data-bs-parent="#w2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    For documents containing Bangla Unicode or complex scripts, click the <strong>Print / Save Unicode PDF</strong> button. It uses your browser's native Hind Siliguri font renderer to save a crisp Bangla PDF.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="wpFaq5">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wpFaqCol5" aria-expanded="false" aria-controls="wpFaqCol5">
                    5. Can I convert a PDF back into an editable Word document?
                  </button>
                </h3>
                <div id="wpFaqCol5" class="accordion-collapse collapse" aria-labelledby="wpFaq5" data-bs-parent="#w2pFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Use our companion <a href="../../tools/pdf-to-word/index.html">PDF to MS Word (.DOCX) Converter</a> to extract text and paragraphs from any PDF back into a Word file.
                  </div>
                </div>
              </div>
            </div>
          </section>
    <?php
    return ob_get_clean();
}
add_shortcode('tool_word_to_pdf', 'tn_word_to_pdf_shortcode');
