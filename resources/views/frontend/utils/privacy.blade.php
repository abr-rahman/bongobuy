@extends('frontend.layouts.master_frontend')
@section('pageTitle')
    {{ __('Privacy policy') }}
@endsection
@section('section')
<div class="font-exo font-light text-slate-700">
    <div class="relative">
        <img src="{{ asset('frontend/images/contact-about-bg.webp') }}" alt="img" class="min-h-[220px] object-cover">
        <div class="absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]">
            <h1 class="text-[18px] text-center sm:text-[30px] font-bold text-white bg-white/50 py-2 px-5 rounded uppercase">
                Privacy Policy</h1>
        </div>
    </div>
    <div class="mx-auto w-full xl:container px-6 py-10">
        <div class="grid gap-10">
            {{-- {!! $policy->privacy !!} --}}
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
                <h2>গোপনীয়তা নীতি</h2>
                <p style="text-align: center;">
                    সালামাত ইনোভেশন ("আমাদের", "আমরা", বা "আমাদের") www.salamatinnovation.com ওয়েবসাইট ("পরিষেবা") পরিচালনা করে। এই পৃষ্ঠাটি আপনি যখন আমাদের পরিষেবাটি ব্যবহার করেন তখন ব্যক্তিগত ডেটা সংগ্রহ, ব্যবহার এবং প্রকাশের বিষয়ে আমাদের নীতিগুলি রূপরেখা দেয়, সেই সাথে সেই ডেটা সম্পর্কিত আপনার কাছে উপলব্ধ বিকল্পগুলি। আমরা পরিষেবাটি অফার এবং উন্নত করতে আপনার ডেটা ব্যবহার করি। আপনার পরিষেবার ব্যবহার এই নীতিতে বর্ণিত তথ্য সংগ্রহ এবং ব্যবহারে আপনার সম্মতি বোঝায়। এই গোপনীয়তা নীতিতে অন্যথায় স্পষ্টভাবে সংজ্ঞায়িত না হলে, এখানে নিযুক্ত পদগুলি আমাদের শর্তাবলীর মতো একই অর্থ বহন করে, www.salamatinnovation.com-এ অ্যাক্সেসযোগ্য
                </p>
                <h2>তথ্য সংগ্রহ এবং ব্যবহার</h2>
                <p>
                    আমরা আমাদের পরিষেবাগুলিকে উন্নত এবং অপ্টিমাইজ করার জন্য বিভিন্ন কারণে বিভিন্ন ধরণের তথ্য সংগ্রহ করি।
                </p>
                <h2>
                    ব্যক্তিগত তথ্য সংগ্রহ করা ডেটার প্রকার
                </h2>
                <p>
                    আমাদের পরিষেবা ব্যবহার করার সময়, আমরা নির্দিষ্ট ব্যক্তিগতভাবে শনাক্তযোগ্য বিবরণের জন্য অনুরোধ করতে পারি যা আমাদের আপনার সাথে যোগাযোগ করতে বা চিনতে সক্ষম করে ("ব্যক্তিগত ডেটা")। এটি ইমেল ঠিকানা, প্রথম এবং শেষ নাম, ফোন নম্বর, ঠিকানা, রাজ্য, প্রদেশ, জিপ/পোস্টাল কোড এবং শহর, সেইসাথে কুকিজ এবং ব্যবহারের ডেটার মতো তথ্য অন্তর্ভুক্ত করতে পারে তবে এতে সীমাবদ্ধ নয়।
                </p>
                <h2>ব্যবহারের ডেটা</h2>
                <p>
উপরন্তু, আমরা পরিষেবাটি কীভাবে ব্যবহার করা হয় সে সম্পর্কে বিশদ সংগ্রহ করতে পারি ("ব্যবহারের ডেটা")। এই ডেটা আপনার কম্পিউটারের ইন্টারনেট প্রোটোকল (IP) ঠিকানা, ব্রাউজারের ধরন, ব্রাউজারের সংস্করণ, আমাদের পরিষেবার নির্দিষ্ট পৃষ্ঠাগুলি আপনার দ্বারা পরিদর্শন করা, আপনার দর্শনের তারিখ এবং সময়, সেই পৃষ্ঠাগুলিতে ব্যয় করা সময়কাল, অনন্য ডিভাইস শনাক্তকারী, ইত্যাদি তথ্য অন্তর্ভুক্ত করতে পারে। এবং অন্যান্য ডায়াগনস্টিক তথ্য।
                </p>
                <h2>ট্র্যাকিং এবং কুকিজ ডেটা</h2>
                <p>
                আমরা আমাদের পরিষেবার কার্যকলাপ নিরীক্ষণ করতে এবং নির্দিষ্ট তথ্য ধরে রাখতে কুকিজ এবং অনুরূপ ট্র্যাকিং প্রযুক্তি ব্যবহার করি। কুকি হল ছোট ডেটা ফাইল যাতে একটি বেনামী অনন্য শনাক্তকারী থাকে, একটি ওয়েবসাইট থেকে আপনার ব্রাউজারে পাঠানো হয় এবং আপনার ডিভাইসে সংরক্ষণ করা হয়। উপরন্তু, আমরা বীকন, ট্যাগ এবং স্ক্রিপ্টের মতো ট্র্যাকিং প্রযুক্তি ব্যবহার করি তথ্য সংগ্রহ এবং ট্রেস করতে, আমাদের পরিষেবার উন্নতি এবং বিশ্লেষণে অবদান রাখি। আপনার কাছে সমস্ত কুকি প্রত্যাখ্যান করার জন্য আপনার ব্রাউজারটি কনফিগার করার বিকল্প আছে বা যখন একটি কুকি পাঠানো হচ্ছে তখন আপনাকে অবহিত করতে হবে৷ যাইহোক, কুকিজ প্রত্যাখ্যান করা আমাদের পরিষেবার নির্দিষ্ট অংশগুলিতে আপনার অ্যাক্সেস সীমিত করতে পারে। আমরা যে কুকিজগুলি ব্যবহার করি তার উদাহরণগুলির মধ্যে রয়েছে:  <br>
                •	সেশন কুকিজ- আমরা আমাদের পরিষেবা পরিচালনা করতে সেশন কুকিজ ব্যবহার করি  <br>
                •	পছন্দ কুকিজ- আমরা আপনার পছন্দ এবং বিভিন্ন সেটিংস মনে রাখতে পছন্দ কুকি ব্যবহার করি।  <br>
                •	নিরাপত্তা কুকিজ- আমরা নিরাপত্তার উদ্দেশ্যে নিরাপত্তা কুকি ব্যবহার করি। <br>
                </p>
                <h2>ডেটা ব্যবহার</h2>
                <p>
                    সালামাত ইনোভেশন বিভিন্ন উদ্দেশ্যে সংগৃহীত ডেটা ব্যবহার করে: <br>

                    &#9997; -পরিষেবা প্রদান এবং বজায় রাখা। <br>
                    &#9997; -আমাদের পরিষেবার পরিবর্তন সম্পর্কে আপনাকে অবহিত করতে। <br>
                    &#9997; -আপনি যখন এটি করতে চান তখন আপনাকে আমাদের পরিষেবার ইন্টারেক্টিভ বৈশিষ্ট্যগুলিতে অংশগ্রহণ করার অনুমতি দিতে। <br>
                    &#9997; -গ্রাহক যত্ন এবং সহায়তা প্রদান করতে। <br>
                    &#9997; -বিশ্লেষণ বা মূল্যবান তথ্য প্রদান করতে যাতে আমরা পরিষেবা উন্নত করতে পারি। <br>
                    &#9997; -পরিষেবার ব্যবহার নিরীক্ষণ করতে। <br>
                    &#9997; -প্রযুক্তিগত সমস্যা সনাক্ত করতে, প্রতিরোধ করতে এবং সমাধান করতে। <br>

                </p>
                <h2>ডেটা স্থানান্তর</h2>
                <p>
                    আপনার ডেটা, ব্যক্তিগত ডেটা সহ, আপনার রাজ্য, প্রদেশ, দেশ বা অন্য সরকারি এখতিয়ারের বাইরে অবস্থিত কম্পিউটারগুলিতে স্থানান্তর এবং সংরক্ষণ করা হতে পারে। এই অবস্থানগুলির ডেটা সুরক্ষা আইনগুলি আপনার এখতিয়ারের থেকে আলাদা হতে পারে৷ আপনি যদি বাংলাদেশের বাইরে থাকেন এবং আমাদের তথ্য দেওয়ার সিদ্ধান্ত নেন, তাহলে অনুগ্রহ করে জেনে রাখুন যে আমরা বাংলাদেশে ব্যক্তিগত ডেটা সহ ডেটা স্থানান্তর ও প্রক্রিয়া করি।

এই গোপনীয়তা নীতিতে আপনার সম্মতি, এই ধরনের তথ্যের আপনার বিধানের সাথে, এই ডেটা স্থানান্তরের আপনার সম্মতি বোঝায়। সালামাত ইনোভেশন এই গোপনীয়তা নীতি অনুসারে আপনার ডেটার নিরাপদ চিকিৎসার গ্যারান্টি দেওয়ার জন্য যুক্তিসঙ্গতভাবে প্রয়োজনীয় সমস্ত ব্যবস্থা গ্রহণ করতে প্রতিশ্রুতিবদ্ধ। আপনার ডেটা এবং অন্যান্য ব্যক্তিগত তথ্যের নিরাপত্তা সহ পর্যাপ্ত নিয়ন্ত্রণ না থাকলে কোনও সংস্থা বা দেশে আপনার ব্যক্তিগত ডেটা স্থানান্তর করা হবে না।
                </p>
                <h2>তথ্য আইনগত প্রয়োজনীয়তা প্রকাশ</h2>
                <p>
                    সালামত ইনোভেশন আপনার ব্যক্তিগত ডেটা প্রকাশ করতে পারে এই বিশ্বাসে যে এই ধরনের পদক্ষেপের জন্য প্রয়োজনীয়: <br>

                    &#9997; -একটি আইনি বাধ্যবাধকতা মেনে চলা। <br>
                    &#9997; - সালামাত ইনোভেশন এর অধিকার বা সম্পত্তি রক্ষা ও রক্ষা করা। <br>
                    &#9997; -পরিষেবার সাথে সম্পর্কিত সম্ভাব্য অন্যায় প্রতিরোধ বা তদন্ত করতে। <br>
                    &#9997; -পরিষেবার ব্যবহারকারী বা জনসাধারণের ব্যক্তিগত নিরাপত্তা রক্ষা করতে। <br>
                    &#9997; -বিশ্লেষণ বা মূল্যবান তথ্য প্রদান করতে যাতে আমরা পরিষেবা উন্নত করতে পারি। <br>
                    &#9997; -আইনি দায় থেকে রক্ষা করতে। <br>

                </p>
                <h2>তথ্য নিরাপত্তা</h2>
                <p>
                    যদিও আপনার ডেটার নিরাপত্তা নিশ্চিত করা আমাদের জন্য একটি অগ্রাধিকার, এটি স্বীকার করা অত্যন্ত গুরুত্বপূর্ণ যে ইন্টারনেট বা ইলেকট্রনিক স্টোরেজের মাধ্যমে ট্রান্সমিশনের কোনো পদ্ধতিই সম্পূর্ণরূপে নির্বোধ নয়। যদিও আমরা আপনার ব্যক্তিগত ডেটা সুরক্ষিত করার জন্য বাণিজ্যিকভাবে গ্রহণযোগ্য ব্যবস্থা নিযুক্ত করার জন্য সর্বাত্মক প্রচেষ্টা করি, আমরা এর সম্পূর্ণ নিরাপত্তা নিশ্চিত করতে পারি না।
                </p>
                <h2>সেবা প্রদানকারী</h2>
                <p>
আমরা আমাদের পরিষেবার ব্যবহার সমর্থন, বিতরণ বা বিশ্লেষণ করতে "পরিষেবা প্রদানকারী" হিসাবে উল্লেখ করা তৃতীয়-পক্ষের কোম্পানি এবং ব্যক্তিদের সহায়তা তালিকাভুক্ত করতে পারি। এই পরিষেবা প্রদানকারীদের শুধুমাত্র আমাদের পক্ষ থেকে কাজগুলি সম্পাদনের উদ্দেশ্যে আপনার ব্যক্তিগত ডেটাতে অ্যাক্সেস দেওয়া হয়েছে এবং অন্য কোনও উদ্দেশ্যের জন্য এটি প্রকাশ বা ব্যবহার না করার জন্য বাধ্য।
                </p>
                <h2>অন্যান্য সাইটের লিঙ্ক</h2>
                <p>
                    আমাদের পরিষেবা আমাদের দ্বারা পরিচালিত নয় বহিরাগত সাইটের লিঙ্ক অন্তর্ভুক্ত করতে পারে. এই ধরনের তৃতীয় পক্ষের লিঙ্কগুলিতে ক্লিক করা আপনাকে তাদের নিজ নিজ সাইটে পুনঃনির্দেশিত করবে। এটি অত্যন্ত বাঞ্ছনীয় যে আপনি সাবধানে প্রতিটি সাইটের গোপনীয়তা নীতি পর্যালোচনা করুন. কোনো তৃতীয় পক্ষের সাইট বা পরিষেবার বিষয়বস্তু, গোপনীয়তা নীতি, বা অনুশীলনের জন্য আমাদের নিয়ন্ত্রণের অভাব রয়েছে এবং আমরা কোনো দায়িত্ব বহন করি না।
                </p>
                <h2>এই গোপনীয়তা নীতি পরিবর্তন</h2>
                <p>
                    আমরা পর্যায়ক্রমে আমাদের গোপনীয়তা নীতি আপডেট করার অধিকার সংরক্ষণ করি। কোন পরিবর্তন এই পৃষ্ঠায় সংশোধিত গোপনীয়তা নীতি পোস্ট করে যোগাযোগ করা হবে। পরিবর্তনগুলি কার্যকর হওয়ার আগে আমরা আপনাকে ইমেল অথবা আমাদের পরিষেবাতে একটি লক্ষণীয় নোটিশের মাধ্যমে অবহিত করব এবং আমরা এই গোপনীয়তা নীতির শীর্ষে "কার্যকর তারিখ" আপডেট করব। যেকোনো আপডেটের জন্য আপনি নিয়মিত এই গোপনীয়তা নীতি পর্যালোচনা করার পরামর্শ দেওয়া হচ্ছে। এই গোপনীয়তা নীতির পরিবর্তনগুলি এই পৃষ্ঠায় পোস্ট করার পরে কার্যকর বলে মনে করা হয়।
                </p>
                <h2>যোগাযোগ করুন</h2>
                <p>
                    এই গোপনীয়তা নীতি সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে <b >support@salamatinnovation.com</b> এ যোগাযোগ করুন।
                </p>
                <br> <br>
                <h1>Privacy Policy</h1>
                <p style="text-align: center;">
                    SALAMAT INNOVATION ("us", "we", or "our") operates the www.salamatinnovation.com website (the "Service"). This page outlines our policies concerning the gathering, utilization, and disclosure of personal data when you utilize our service, along with the options available to you regarding that data. We utilize your data to offer and enhance the service. Your use of the service implies your consent to the gathering and utilization of information as outlined in this policy. Unless explicitly defined otherwise in this Privacy Policy, terms employed here carry the same meanings as those in our Terms and Conditions, accessible at www.salamatinnovation.com
                </p>
                <h1>Information Collection and Use</h1>
                <p>
                    We gather diverse types of information for various reasons to enhance and optimize our services.
                </p>
                <h1>Types of Data Collected Personal Data</h1>
                <p>
                    When utilizing our service, we might request specific personally identifiable details that enable us to contact or recognize you ("Personal Data"). This may encompass, but is not restricted to, information such as email address, first and last name, phone number, address, state, province, ZIP/postal code, and city, as well as cookies and usage data.
                </p>
                <h1>Usage Data</h1>
                <p>
                    Additionally, we may gather details about the way the service is utilized (“Usage Data”). This data may encompass information like your computer’s Internet Protocol (IP) address, browser type, browser version, the specific pages of our service visited by you, the date and time of your visit, the duration spent on those pages, unique device identifiers, and other diagnostic information.
                </p>
                <h1>Tracking & Cookies Data</h1>
                <p>
                    We employ cookies and similar tracking technologies to monitor activity on our service and retain specific information. Cookies are small data files containing an anonymous unique identifier, sent to your browser from a website, and stored on your device. Additionally, we utilize tracking technologies like beacons, tags, and scripts to gather and trace information, contributing to the enhancement and analysis of our service. You have the option to configure your browser to reject all cookies or notify you when a cookie is being sent. However, declining cookies may limit your access to certain parts of our service. Examples of the cookies we use include: <br>

                •	Session Cookies. We use Session Cookies to operate our Service <br>
                •	Preference Cookies. We use Preference Cookies to remember your preferences and various settings. <br>
                •	Security Cookies. We use Security Cookies for security purposes <br>

                </p>
                <h1>Use of Data</h1>
                <p>
                    SALAMAT INNOVATION uses the collected data for various purposes: <br>
                    •	To provide and maintain the Service. <br>
                    •	To notify you about changes to our Service. <br>
                    •	To allow you to participate in interactive features of our Service when you choose to do so. <br>
                    •	To provide customer care and support. <br>
                    •	To provide analysis or valuable information so that we can improve the Service. <br>
                    •	To monitor the usage of the Service. <br>
                    •	To detect, prevent, and address technical issues. <br>
                </p>
                <h1>Transfer Of Data</h1>
                <p>
                    Your data, including Personal Data, may be transferred and stored on computers situated outside your state, province, country, or another governmental jurisdiction. The data protection laws in these locations may vary from those in your jurisdiction. If you are situated outside Bangladesh and decide to furnish us with information, kindly be aware that we transfer and process the data, including Personal Data, in Bangladesh. <br>
                    Your consent to this Privacy Policy, coupled with your provision of such information, signifies your acceptance of this data transfer. SALAMAT INNOVATION is committed to taking all reasonably necessary measures to guarantee the secure treatment of your data in accordance with this Privacy Policy. No transfer of your Personal Data will occur to any organization or country unless adequate controls, including the security of your data and other personal information, are in place
                </p>
                <h1>Disclosure Of Data Legal Requirement</h1>
                <p>
                    SALAMAT INNOVATION may disclose your Personal Data in the good faith belief that such action is necessary to: <br>
                    •	To comply with a legal obligation. <br>
                    •	To protect and defend the rights or property of SALAMAT INNOVATION. <br>
                    •	To prevent or investigate possible wrongdoing in connection with the Service. <br>
                    •	To protect the personal safety of users of the Service or the public. <br>
                    •	To provide analysis or valuable information so that we can improve the Service. <br>
                    •	To protect against legal liability. <br>
                </p>
                <h1>Security Of Data</h1>
                <p>
                    Although ensuring the security of your data is a priority for us, it's crucial to recognize that no method of transmission over the Internet or electronic storage is entirely foolproof. While we make every effort to employ commercially acceptable measures to safeguard your Personal Data, we cannot assure its absolute security.
                </p>
                <h1>Service Providers</h1>
                <p>
                    We might enlist the assistance of third-party companies and individuals, referred to as "Service Providers," to support, deliver, or analyse the usage of our Service. These Service Providers are granted access to your Personal Data solely for the purpose of executing tasks on our behalf and are obligated not to disclose or utilize it for any other intent.
                </p>
                <h1>Links To Other Sites</h1>
                <p>
                    Our Service may include links to external sites not managed by us. Clicking on such third-party links will redirect you to their respective sites. It is highly recommended that you carefully review the Privacy Policy of each site you visit. We lack control over and bear no responsibility for the content, privacy policies, or practices of any third-party sites or services.
                </p>
                <h1>Changes To This Privacy Policy</h1>
                <p>
                    We reserve the right to periodically update our Privacy Policy. Any modifications will be communicated by posting the revised Privacy Policy on this page. We will inform you through email and/or a noticeable notice on our Service before the changes take effect, and we will update the "effective date" at the top of this Privacy Policy. It is recommended that you regularly review this Privacy Policy for any updates. Changes to this Privacy Policy are deemed effective upon posting on this page.
                </p>
                <h1>Contact Us</h1>
                <p>
                    If you have any questions about this Privacy Policy, please contact us at support@salamatinnovation.com
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
