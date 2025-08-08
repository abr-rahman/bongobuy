@extends('frontend.layouts.master_frontend')
@section('pageTitle')
    {{ __('Refund Policy') }}
@endsection
@section('section')
<div class="font-exo font-light text-slate-700">
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h2 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                Refund Policy</h2>
        </div>
    </div>
    <div class="mx-auto w-full xl:container px-6 py-10">
        <div class="grid gap-10">
            {{-- {!! $policy->refund_policy !!} --}}
            <style>
                 h1 {
                    text-align: center;
                    font-size: 17px !important;
                    color: rgb(58 58 58);
                    font-weight: 600;
                    padding-bottom: 2px;
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

                }
            </style>
            <div class="">
                <h2>বিক্রয়কৃত পণ্যের ফেরতের নীতি </h2>
                <strong>
                    www.salamatinnovation.com থেকে কেনার জন্য আপনাকে ধন্যবাদ। আপনার কোন উদ্বেগ থাকলে বা আপনার ক্রয়ের সাথে সম্পূর্ণরূপে সন্তুষ্ট না হলে আমরা আপনাকে সহায়তা করতে এখানে আছি।
                </strong> <br> <br>
                <h1>১। প্রত্যাবর্তন:</h1>
                <p>
                    &#9997; পণ্যটি গত 3 দিনে কেনা হয়েছে। <br>
                    &#9997; পণ্যটি তার আসল প্যাকেজিংয়ে রয়েছে (অক্ষত) এবং কোনও সীল ভাঙা হয়নি (খোলা হয়নি)। <br>
                    &#9997; রিটার্নের কারণ বৈধ হতে হবে এবং রিটার্ন গ্রহণের শর্ত পূরণ করতে হবে (নীচে চেক করুন) <br>
                    &#9997; ভুল আইটেম ডেলিভারি <br>
                    &#9997; ত্রুটিপূর্ণ পণ্য ডেলিভারি <br>
                    &#9997; অনুপস্থিত অংশ সঙ্গে পণ্য ডেলিভারি <br>

                    &#9997; একটি রিটার্ন পেতে, আমাদের সাথে যোগাযোগ করুন <br>
                    &#9997; ফোন নম্বর দ্বারা: +8801897715225 <br>
                    &#9997; ইমেল দ্বারা: support@salamatinnovation.com <br>

                </p>
                <h1>২। পণ্যের অনুপলব্ধতার কারণে বাতিলকরণ এবং ফেরত:</h1>
                <p>

        অর্ডারকৃত আইটেমগুলির ডেলিভারি আমাদের গুদাম/স্টোরে পণ্যের প্রাপ্যতা সাপেক্ষে। www.salamatinnovation.com কর্তৃপক্ষ ২৫ কার্যদিবসের মধ্যে যেকোনো অর্ডার বাতিল করতে পারে যদি অর্ডারকৃত আইটেমগুলি এর স্টক সাময়িকভাবে অনুপলব্ধ হয়।
        যদি গ্রাহক পণ্যগুলো স্টকের জন্য অপেক্ষা করতে সম্মত হন তবে অর্ডারটি সর্বোচ্চ ৩০ দিনের জন্য খোলা/প্রসেসিং/হোল্ড অবস্থায় থাকতে পারে। ধারা (ক) এর ক্ষেত্রে, যদি গ্রাহক ইতিমধ্যেই অর্ডারের বিপরীতে অগ্রিম অর্থ প্রদান করে থাকেন, তাহলে গ্রাহক ৭ থেকে ১০ কার্যদিবসের মধ্যে কোনো ক্যাশব্যাক না পেলে সম্পূর্ণ অর্থ ফেরত পাবেন। প্রাপ্ত ক্যাশব্যাকের পরিমাণ রিফান্ডের পরিমাণের সাথে সমন্বয় করা হবে।
        যেকোনো অর্ডার নিশ্চিত করার পর, যদি গ্রাহক অর্ডারটি বাতিল করেন এবং গ্রাহক ইতিমধ্যেই সেই অর্ডারের বিপরীতে একটি অনলাইন অর্থপ্রদান করেন, তাহলে www.salamatinnovation.com রিফান্ডের পরিমাণ বিতরণ করার সময় একটি অনলাইন গেটওয়ে লেনদেন ফি চার্জ করবে।

                </p>
                <h1>৩। প্রত্যাবর্তন/প্রতিস্থাপন গ্যারান্টি নিম্নোক্ত শর্তাবলীর মধ্যে প্রযোজ্য নাও হতে পারে:</h1>
                <p>
                    পণ্যের অপব্যবহারের কারণে ক্ষতি <br>
                    পণ্যের ত্রুটির কারণে আনুষঙ্গিক ক্ষতি <br>
                    ব্যবহার করা বা ইনস্টল করা হয়েছে যে কোনো ভোগ্য আইটেম <br>
                    টেম্পারড বা অনুপস্থিত সিরিয়াল / QR কোড সহ পণ্য <br>
                    কোন ক্ষতি/ত্রুটি যা প্রস্তুতকারকের ওয়ারেন্টির আওতায় নেই <br>
                    যে কোনো পণ্য যা সমস্ত আসল প্যাকেজিং এবং আনুষাঙ্গিক ছাড়াই ফেরত দেওয়া হয়, বাক্স সহ, প্রস্তুতকারকের প্যাকেজিং যদি থাকে, এবং অন্যান্য সমস্ত আইটেম যা মূলত সরবরাহ করা পণ্য(গুলি) এর সাথে অন্তর্ভুক্ত থাকে। <br>

                </p>
                <p>
                    দ্রষ্টব্য: পণ্যের প্রতিস্থাপন www.salamatinnovation.com-এ একই উপলব্ধতার উপর নির্ভরশীল।
                </p>
                <h1>৪। ক্ষতিগ্রস্থ আইটেম: </h1>
                <p>
                    আপনি যদি একটি ক্ষতিগ্রস্থ পণ্য পান, সহায়তার জন্য অবিলম্বে আমাদের জানান।
                </p>
                <h1>৫। ডিসকাউন্ট অফার আইটেম: </h1>
                <p>
                    দুঃখজনকভাবে,ডিসকাউন্ট অফার আইটেম একটি ফেরত জন্য যোগ্য নয়। রিফান্ড শুধুমাত্র নিয়মিত-মূল্যের আইটেমগুলির জন্য প্রযোজ্য।
                </p>
                <h1>৬। শিপিং চার্জ: </h1>
                <p>
                    পণ্য ফেরত দেওয়ার সাথে সম্পর্কিত শিপিং খরচ ফেরত পাওয়ার যোগ্য নয়। www.salamatinnovation.com থেকে ট্রানজিট চলাকালীন খরচ কভার করা এবং পণ্যটির ক্ষতি বা ক্ষতির ঝুঁকি অনুমান করার জন্য আপনি দায়ী।
                </p>
                <p>
                    যোগাযোগ করুন <br>
                    ইমেল দ্বারা: support@salamatinnovation.com <br>
                    ফোন নম্বর দ্বারা: +8801897715225 <br>
                </p> <br> <br>


                <h2>Thank you for purchasing www.salamatinnovation.com. We are here to assist you if you have any concerns or are not completely satisfied with your purchase.</h2>
                <h1>1. Return:</h1>
                <p>
                    -The Product was purchased in the last 3 days. <br>
                    -The Product is in its original packaging (intact) and no seal is broken (unopened). <br>
                    -The reason for the return has to be valid and the return acceptance conditions met ( check on below ) <br>
                    -Delivery of the wrong item <br>
                    -Delivery of faulty Product <br>
                    -Delivery of products with missing parts <br>
                    -To obtain a Return, contact us <br>

                    By phone number: +8801897715225 <br>
                    By email: support@salamatinnovation.com <br>
                </p>

                <h1>2. CANCELLATION & REFUND DUE TO PRODUCT UNAVAILABILITY:</h1>
                <p>
                    Delivery of the ordered items is subject to the availability of the products at our warehouse/store. www.salamatinnovation.com authority may cancel any order within 25 working days if the stock of the ordered item(s) is temporarily unavailable.
                    If the customer agrees to wait for the stock of the product (s), the order may remain in open/processing/hold status for a maximum of 30 days.
                    In the case of clause (a), if the customer has already made an advance payment against the order, the customer will receive a full refund, if not received any cashback, within 7 to 10 working days. The received Cashback amount will be adjusted with the refund amount.
                    After confirming any Order, if the customer cancels the order and the customer already makes an online payment against that order, www.salamatinnovation.com will charge an Online Gateway Transaction fee while disbursing the refund amount.
                </p>
                <h1>3. RETURN/REPLACEMENT  GUARANTEE MAY NOT APPLY IN ANY OF THE FOLLOWING CONDITIONS:</h1>
                <p>
                    Damages due to misuse of the product <br>
                    Incidental damage due to malfunctioning of the product <br>
                    Any consumable item that has been used or installed <br>
                    Products with tampered or missing serial / QR Codes <br>
                    Any damage/defect that is not covered under the manufacturer's warranty <br>
                    Any product that is returned without all original packaging and accessories, including the box, manufacturer's packaging if any, and all other items originally included with the product(s) delivered. <br>
                </p> <br>
                <p>
                    Note: The replacement of the product is contingent upon the availability of the same on www.salamatinnovation.com.</p>
                <h1>4. Damaged items: </h1>
                <p>
                    If you receive a damaged product, please inform us promptly for assistance.
                </p>
                <h1>5. Sale items: </h1>
                <p>
                    Regrettably, sale items are not eligible for a refund. Refunds are only applicable to regular-priced items.
                </p>
                <h1>6. Shipping charges: </h1>
                <p>
                    The shipping costs associated with returning a product are not eligible for a refund. You are responsible for covering the expenses and assuming the risk of loss or damage to the product during its transit to and from www.salamatinnovation.com
                    Contact Us

                    By email: support@salamatinnovation.com
                    By phone number: +8801897715225
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
