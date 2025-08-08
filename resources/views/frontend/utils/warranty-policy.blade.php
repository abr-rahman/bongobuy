@extends('frontend.layouts.master_frontend')
@section('pageTitle')
    {{ __('Warranty Policy') }}
@endsection
@section('section')
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                Warranty Policy</h2>
        </div>
    </div>
    <div class="mx-auto w-full xl:container px-6 py-10">
        <div class="grid gap-10">
            <div class="">
                {{-- {!! $policy->warranty_policy !!} --}}
                {{-- {!! html_entity_decode($policy->warranty_policy) !!} --}}
                <style>
                    h1 {
                       text-align: center;
                       font-size: 17px !important;
                       color: rgb(58 58 58);
                       font-weight: 600;
                       padding-bottom: 8px;
                   }
                   h2 {
                       text-align: center;
                       font-size: 15px !important;
                       color: rgb(58 58 58);
                       font-weight: 550;
                       padding: 10px;
                   }
                   p {
                        font-size: 15px;
                        text-align: justify;
                        padding: 15px 20px 1px 20px;
                   }
               </style>
                     <h2>বিক্রয় পরবর্তী শর্তাবলী</h2>
                    <p><strong>১। </strong> পণ্যের ওয়ারেন্টি শুধুমাত্র মূল ক্রেতার জন্য সীমাবদ্ধ এবং হস্তান্তরযোগ্য নয়। ওয়ারেন্টি দাবি করার জন্য ক্রয়ের চালান/মানি রসিদ/সংশ্লিষ্ট মডেলের ক্রয়ের রসিদ এবং পণ্য/ইউনিট এর সিরিয়াল নম্বর অবশ্যই উপস্থাপন করতে হবে। </p>

                    <p><strong>২। </strong> পরিবর্তন/প্রতিস্থাপনের কাজ শুধুমাত্র Salamat Innovation/আমাদের অনুমোদিত পরিষেবা কেন্দ্রগুলির মাধ্যমে করা হয়। চালান কেনা পণ্য ছাড়া অন্য কোনো পণ্য কভার করা হবে না। </p>

                    <p><strong>৩। </strong> পণ্যটি অ্যাক্টিভেশন সার্ভারে সক্রিয় হওয়ার তারিখ থেকে ওয়ারেন্টি মেয়াদ শেষ না হওয়া পর্যন্ত ইউনিটের পরিবর্তন/প্রতিস্থাপনের জন্য চালান ব্যবহার করা যেতে পারে। এছাড়াও, ওয়ারেন্টির অধীনে পরিবর্তন/প্রতিস্থাপনের জন্য নেওয়া সময় ওয়ারেন্টি সময়কাল থেকে বাদ দেওয়া হবে না। </p>

                    <p><strong>৪। </strong> গ্রাহকের দ্বারা ট্রানজিট চলাকালীন কোনো ক্ষতির ক্ষেত্রে সংশ্লিষ্ট পরিষেবা কেন্দ্র চার্জযোগ্য ভিত্তিতে পরিবর্তন/প্রতিস্থাপনের পরিষেবা করবে এবং চালানটি সক্রিয় হওয়ার তারিখ থেকে মেয়াদ শেষ না হওয়া পর্যন্ত গণনা করা হবে। </p>

                    <p><strong>৫। </strong> পণ্য ক্রয় করার পর ওয়ারেন্টি সেবা পেতে গ্রাহককে আবশ্যক ভাবে পণ্যের সাথে থাকা “QR Code” স্ক্যান করে যথাযথ তথ্য দিয়ে ওয়ারেন্টি রিকুয়েস্ট সাবমিট করতে হবে। গ্রাহকের দেয়া তথ্য যাচাই করার পর Salamat Innovation উক্ত পণ্যের ওয়ারেন্টি এক্টিভেট করবে। </p>

                    <p><strong>৬। </strong> পণ্য ক্রয় বা রিসিভ করার ৭ দিনের মধ্যে আপানার পণ্যটি Salamat E-Warranty রেজিস্ট্রেশন করে নিন। নির্দিষ্ট সময়ের মধ্যে E-Warranty রেজিস্ট্রেশন না করলে পণ্যের ওয়ারেন্টি সুবিধা বাতিল হয়ে যাবে। </p>

                    <p><strong>৭। </strong> পণ্য রেজিস্ট্রেশন এ কোনো প্রকার সমস্যা হলে Salamat innovation কাস্টমার কেয়ার এ কল দিয়ে পণ্যটি রেজিস্ট্রেশন করে নিন। </p>

                    <p><strong>৮। </strong> পণ্য কুরিয়ার থেকে ডেলিভারি রিসিভ করার সময় ফিজিক্যালি ড্যামেজ, মিসিং থাকলে গ্রাহক কে কুরিয়ার থেকে পণ্য রিসিভ না করার জন্য অনুরোধ করা হচ্ছে। এ ছাড়া রিসিভ করার পর মিসিং থাকলে বা ড্যামেজ পাওয়া গেলে গ্রাহক কে উপযুক্ত প্রমাণ সহ অভিযোগ করতে হবে। অন্যথায় কোন অভিযোগ গ্রহন করা হবে না । </p>

                    <p><strong>৯। </strong> শুধু মাত্র পণ্যে সমস্যা থাকলে ওয়ারেন্টি সুবিধা পাওয়া যাবে। পণ্যের সমস্যা ব্যাতিত কোনো ওয়ারেন্টি ক্লেইম গ্রহন করা হবে না। </p>

                    <p><strong>১০। </strong> ওয়ারেন্টিতে আসা পণ্যের স্টক সাপেক্ষে রিফান্ড করা হবে না। তবে স্টক না থাকলে সমমূল্যের অন্য প্রোডাক্ট পরিবর্তন করে নিতে পারবেন। </p>

                    <p><strong>১১। </strong> পণ্যের ওয়ারেন্টির জন্য রিটেইল শপে বক্স ও ওয়ারেন্টি কার্ড ক্রয় রশিদ সহ পণ্যটি জমা দিবেন। জমা দেয়ার পরবর্তী সাত দিনের মধ্যে আপনার পণ্যের রিপ্লেস পাবেন। তবে অবশ্যই পণ্যের E-Warranty একটিভ থাকতে হবে। </p>

                    <p><strong>১২। </strong> ক্রেতা সরাসরি Salamat innovation কাস্টমার কেয়ারে এসেও তাৎক্ষণিক ওয়ারেন্টি সুবিধা নিতে পারবেন। </p>

                    <p><strong>১৩। </strong> ঢাকার বাহিরে ওয়ারেন্টির জন্য ক্রেতাকে পণ্যটি Salamat innovation কাস্টমার কেয়ারে নিজ খরচে কুরিয়ার করতে হবে। ওয়ারেন্টি সেবা প্রদানের পর পণ্যটি গ্রাহক পর্যন্ত পাঠানোর খরচ Salamat innovation বহন করবে। </p>

                    <p><strong>১৪। </strong> ওয়ারেন্টি সময়কালে পন্যের ত্রুটিগুলি লক্ষ্য করা গেলে শুধুমাত্র আমাদের অনুমোদিত পরিষেবা কেন্দ্র তাদের বিবেচনার ভিত্তিতে পরিষেবা কেন্দ্রে পরিবর্তন/প্রতিস্থাপনের অধিকার সংরক্ষণ করে৷ </p>

                    <p><strong>১৫। </strong> পরিবর্তন/প্রতিস্থাপন সম্পূর্ণরূপে কোম্পানির নিজস্ব বিবেচনার ভিত্তিতে হবে, সমগ্র ইউনিট পরিবর্তন/প্রতিস্থাপনের ক্ষেত্রে (কোম্পানীর একক বিবেচনার সাপেক্ষে), একই মডেলের সাথে পরিবর্তন/প্রতিস্থাপন এবং, যদি মডেলটি বন্ধ করা হয়, একটি সমতুল্য মডেলের সাথে কোম্পানি দ্বারা বিবেচিত হিসাবে. Salamat Innovation অনুমোদিত কর্মী/টেকনিশিয়ান/ডেলিভারিম্যান দ্বারা পণ্যের বাক্স খুলতে হবে অন্যথায় ওয়ারেন্টি বা অন্য কোনো দাবি বাতিল হয়ে যাবে। কোনো অপ্রত্যাশিত পরিস্থিতিতে পাওয়া না গেলে, কোম্পানির প্রচলিত অবচয় বিধি গ্রাহককে মেরামতের পরিবর্তে একটি বাণিজ্যিক সমাধান গ্রহণ করতে বাধ্য করবে। নির্দিষ্ট সময় অনুযায়ী চালান স্বয়ংক্রিয়ভাবে শেষ হয়ে যাবে। </p>

                    <p><strong>১৬। </strong> কোনো পরিবেশক/বিক্রেতা/খুচরা বিক্রেতাকে উপরের ওয়ারেন্টি শর্তাবলী পরিবর্তন করার অনুমতি নেই। </p>

                    <p><strong>১৭। </strong> ওয়ারেন্টির অধীনে যেকোনো দাবি, বিরোধ এবং নিষ্পত্তির এখতিয়ার শুধুমাত্র বাংলাদেশের আইনের থাকবে। </p>

                    <p><strong>১৮। </strong> ওয়ারেন্টি শুধুমাত্র বাংলাদেশে কেনা পণ্যের জন্য প্রযোজ্য। বাংলাদেশের বাইরে কেনা পণ্যের জন্য প্রযোজ্য নয়। </p>

                    <p><strong>১৯। </strong> মেরামত, অননুমোদিত পরিবর্তন, শারীরিক ক্ষতি, জলের ক্ষতি, কোম্পানির দ্বারা অনুমোদিত নয় এমন সরঞ্জামের সাথে পণ্যের সংযোগের কারণে ক্ষতিগুলি ওয়ারেন্টি দ্বারা কভার করা হবে না। ক্রমিক নম্বর এবং শনাক্তকরণ লেবেল সহ এর যেকোন উপাদানের বেআইনি পরিবর্তন বা পরিবর্তন করা হলে চালানটি বাতিল/অকার্যকর হিসাবে গণ্য হবে। </p>

                    <p><strong>২০। </strong> ওয়ারেন্টি সময়কালে, শারীরিকভাবে ক্ষতিগ্রস্ত যে কোনো পণ্য (যেমন: ইঁদুরের কামড়, জলের ক্ষতি, আগুনের ঝুঁকি ইত্যাদি) পরিশোধ করা হবে না। </p>

                    <p><strong>২১। </strong> ওয়ারেন্টি মেয়াদ শেষ হয়ে গেলে পণ্যটি আর ওয়ারেন্টির আওতায় থাকবে না, সক্রিয়করণের পরে ব্যবহার করা হোক বা না হোক। </p>

                    <p><strong>২২। </strong> নির্দিষ্ট সময়ের মধ্যে পণ্য ব্যবহার না করলে ওয়ারেন্টি বাতিল হয়ে যাবে। </p>

                    <p><strong>২৩। </strong> সম্পত্তি বা জীবনের কোনো ক্ষতির জন্য কোম্পানি প্রত্যক্ষ বা পরোক্ষভাবে দায়ী থাকবে না। কোম্পানীর দ্বারা করা সর্বোচ্চ দাবিটি হবে ক্রয়কৃত পণ্যের সর্বোচ্চ খুচরা মূল্য বা ক্রয় মূল্য, যেটি তুলনামূলকভাবে কম হবে। </p>

                    <p><strong>২৪। </strong> বজ্রপাত, অস্বাভাবিক ভোল্টেজ, প্রাকৃতিক দুর্যোগ বা পরিষেবা কেন্দ্র বা গ্রাহকের বাসভবনে ট্রানজিটের সময় নিয়ন্ত্রণের বাইরের কারণে সৃষ্ট সমস্যাগুলি ওয়ারেন্টি পরিষেবার আওতায় আসবে না। পণ্যের কোনো শারীরিক ক্ষতির ক্ষেত্রে, গ্রাহককে ডেলিভারির সময় থেকে 24 ঘন্টার মধ্যে কল সেন্টারে যোগাযোগ করতে হবে। </p>

                    <p><strong>২৫। </strong> ওয়ারেন্টি দাবির ক্ষেত্রে পণ্যের বক্সে Salamat Innovation অফিসিয়াল ওয়ারেন্টি স্টিকার থাকা বাধ্যতামূলক এবং বক্সটি সংরক্ষণ করুন। </p>

                    <p><strong>২৬। </strong> যেকোনো পন্য রিপ্লেসমেন্ট ক্লেইম করতে হলে অবশই পন্যটির ক্রয় ভাউচার/ Invoice থাকতে হবে। ইনভয়েস ছাড়া কেউই রিপ্লেসমেন্ট অথবা অন্য কোনো সার্ভিস পাবে না। </p>

                    <p><strong>২৭। </strong> পন্যের বক্স ড্যামেজ থাকলে রিপ্লেসমেন্ট পাবে না।
                        <h2>সালামত ইনোভেশন কি করবে?</h2>
                    <p>সালামত ইনোভেশন টেলিফোন, ই-মেইল বা অনলাইন চ্যাটের মাধ্যমে আপনার সমস্যা নির্ণয় ও সমাধান করার চেষ্টা করবে। আপনার সমস্যা টেলিফোনের মাধ্যমে সমাধান করা না গেলে, আপনাকে আরও পরীক্ষার জন্য সালামত ইনোভেশন সহায়তা কেন্দ্রে পণ্যটি সরবরাহ করতে হতে পারে। সমস্যাটি এই সীমিত ওয়ারেন্টির আওতায় পড়লে সালামত ইনোভেশন কোনো খরচ ছাড়াই পরিবর্তন/প্রতিস্থাপনের ব্যবস্থা করবে।</p>

                    <h2>পণ্য বিতরণ নীতি</h2>
                    <div style="padding-left: 42px;">
                        <ul style="list-style: disc;">
                            <li>সহজে রিটার্ন সহ সারা দেশে ফ্রি ডেলিভারি।</li>
                            <li>আনুমানিক ডেলিভারি দিন (ঢাকার বাইরে): ৩ থেকে ৫ কার্যদিবস।</li>
                            <li>আনুমানিক ডেলিভারি দিন (ঢাকার ভিতরে): ১ থেকে ৩ কার্যদিবস।</li>
                        </ul>
                    </div>

                    <h2>কিভাবে ওয়ারেন্টি সেবা পেতে হয়?</h2><div class="link-responsive">
                    ওয়্যারেন্টি সময়কালে কোনো পণ্য ওয়ারেন্টি অনুযায়ী আপনি <a href="https://www.salamatinnovation.com/warranty/activation" target="_blank" style="color: blue">Warranty Activation</a> ওয়ারেন্টি পরিষেবার জন্য আপনাকে ক্রয়ের বৈধ প্রমাণ বা রসিদ প্রদান করতে হবে। </div>

                    <h2>কিভাবে ই-ওয়ারেন্টি দাবি করবেনঃ</h2>
                    <div class="text-center"><a href="https://www.salamatinnovation.com/claim/warranty" target="_blank" style="color: blue;">এখানে ক্লিক করুন</a></div>

                    <br> <br>
                    <h1>Post-Sale Terms</h1>
                    <p><strong>1.  </strong> A product warranty is limited to the original purchaser only and is non-transferable. The purchase invoice, money receipt, or receipt of purchase of the concerned model and the serial number of the product or unit must be presented to claim the warranty.</p>
                    <p><strong>2.  </strong> Alterations or replacements are done only through Salamat Innovation or our authorized service centers. Any products other than consignment-purchased products will not be covered.</p>
                    <p><strong>3.  </strong> The invoice can be used for the exchange or replacement of the unit from the date the product is activated on the activation server until the expiration of the warranty period. Also, the time taken for modification or replacement under warranty shall not be excluded from the warranty period.</p>
                    <p><strong>4.  </strong> In case of any damage in transit by the customer, the concerned service center will perform the change or replacement service on a chargeable basis, which will be calculated from the date of activation of the invoice until its expiration.</p>
                    <p><strong>5.  </strong> After purchasing the product, to get the warranty service, the customer must submit the warranty request with the appropriate information by scanning the "QR Code" with the product. After verifying the information provided by the customer, Salamat Innovation will activate the product warranty.</p>
                    <p><strong>6.  </strong> Register your product for Salamat E-Warranty within 7 days of purchasing or receiving the product. Failure to register E-Warranty within the specified period will void the warranty benefits of the product.</p>
                    <p><strong>7.  </strong> If there is any problem with product registration, register the product by calling Salamat Innovation Customer Care.</p>
                    <p><strong>8.  </strong> If the product is physically damaged or missing while receiving delivery from the courier, the customer is requested not to receive the product from the courier. Apart from this, if any missing or damaged items are found after being received, the customer has to complain with proper evidence. Otherwise, no complaint will be entertained.</p>
                    <p><strong>9.  </strong> Warranty benefits are available only if there is a problem with the product. No warranty claims will be entertained except for product defects.</p>
                    <p><strong>10. </strong>  Refunds will not be made subject to the stock of products coming under warranty. But if there is no stock, you can buy another product at the same price.</p>
                    <p><strong>11. </strong>  Submit the product, along with the box and warranty card purchase receipt, to the retail shop for a product warranty. You will receive a replacement for your product within seven days of submission. But the product must have an e-warranty active.</p>
                    <p><strong>12. </strong>  Buyers can also avail immediate warranty benefits by contacting Salamat Innovation Customer Care directly.</p>
                    <p><strong>13. </strong>  For warranty outside Dhaka, the buyer has to courier the product to Salamat Innovation Customer Care at his own expense. Salamat Innovation will bear the cost of shipping the product to the customer after providing the warranty service.</p>
                    <p><strong>14. </strong>  Only our authorized service center reserves the right to alter or replace at the service center at their discretion if product defects are noticed during the warranty period.</p>
                    <p><strong>15. </strong>  Modification or replacement shall be entirely at the sole discretion of the company; in the case of modification or replacement of the entire unit (subject to the company's sole discretion), modification or replacement with the same model; and, if the model is discontinued, with an equivalent model as deemed by the company. The product box must be opened by Salamat Innovation authorized personnel, technicians, and deliverymen; otherwise, any warranty or any other claim will be void. Unless any unforeseen circumstances are found, the company's customary depreciation rules will force the customer to accept a commercial solution rather than a repair. The invoice will expire automatically as per the specified time.</p>
                    <p><strong>16. </strong>  No distributor, dealer, or retailer is allowed to modify the above warranty terms.</p>
                    <p><strong>17. </strong>  Any claim, dispute, and settlement under the warranty shall governed by the laws of Bangladesh only.</p>
                    <p><strong>18. </strong>  The warranty is applicable only for products purchased in Bangladesh. It is not applicable for products purchased outside Bangladesh.</p>
                    <p><strong>19. </strong>  Damages caused by repair, unauthorized modification, physical damage, water damage, or connection of the product with equipment not approved by the company will not be covered by the warranty. Illegal alteration or modification of any of its components, including the serial number and identification label, shall render the shipment void.</p>
                    <p><strong>20. </strong>  During the warranty period, any product physically damaged (i.e., rat bite, water damage, fire hazard, etc.) will not be reimbursed.</p>
                    <p><strong>21. </strong>  Once the warranty period has expired, the product will no longer covered by the warranty, whether used after activation or not.</p>
                    <p><strong>22. </strong>  Failure to use the product within the specified period will void the warranty.</p>
                    <p><strong>23. </strong>  The company shall not be liable directly or indirectly for any loss of property or life. The maximum claim made by the company will be the maximum retail value or purchase price of the product purchased, whichever is lower.</p>
                    <p><strong>24. </strong>  Problems caused by lightning, abnormal voltage, natural calamities, or uncontrollable causes during transit to the service center or customer's residence will not be covered under warranty service. In the event of any physical damage to the product, the customer should contact the call center within 24 hours of the time of delivery.</p>
                    <p><strong>25. </strong>  In cases of warranty claims, it is mandatory to have the Salamat Innovation official warranty sticker on the product box and save the box.</p>
                    <p><strong>26. </strong>  In order to claim the replacement of any product, you must have the purchase voucher or invoice for the product. No one will receive a replacement or any other service without an invoice.</p>
                    <p><strong>27. </strong>  If the product box is damaged, you will not receive a replacement.</p>
                    <h1>What will Salamat Innovation do?</h1>
                    <p>Salamat Innovations will attempt to diagnose and resolve your problem by telephone, e-mail, or online chat. If your problem cannot be resolved over the telephone, you may need to return the product to a Salamat Innovations support center for further testing. If the problem is covered by this limited warranty, Salamat Innovations will provide modifications or replacements at no cost.</p>
                    <h1>Product Distribution Policy</h1>
                    <div style="padding-left: 42px;">
                        <ul style="list-style: disc;">
                            <li>Free nationwide delivery with easy returns</li>
                            <li>Estimated Delivery Days (Outside Dhaka): 3 to 5 working days</li>
                            <li>Estimated Delivery Days (within Dhaka): 1 to 3 working days</li>
                        </ul>
                    </div>
                    <h1>How do I get warranty service?</h1>
                    You must provide valid proof of purchase or receipt for warranty service, <a href="https://www.salamatinnovation.com/warranty/activation" target="_blank" style="color: blue">Warranty Activation</a>, pursuant to any product warranty during the warranty period.
                    <h1>How to Claim an E-Warranty?</h1>
                    <div class="text-center">
                    <a href="https://www.salamatinnovation.com/claim/warranty" target="_blank" style="color: blue;">Click Here</a> </div>

            </div>
        </div>
    </div>
@endsection
