<!DOCTYPE html>
<html class="h-full bg-[#F9F9F9]" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@section('title')
    Invoice
@endsection

@extends("Common.head")
<body class="h-full">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>

<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow-sm my-6" id="invoice">

    <div class="grid grid-cols-2 items-center">
        <div>
            <!--  Company logo  -->
            <img src="{{asset("img/bankz-log.svg")}}" alt="company-logo" height="100" width="200">
        </div>

        <div class="text-right">
            <p>
               Bankz Ewallet
            </p>
            <p class="text-gray-500 text-sm">
                sales@bankz.eu
            </p>
            <p class="text-gray-500 text-sm mt-1">
                +41-442341232
            </p>
            <p class="text-gray-500 text-sm mt-1">
                VAT: 8657671212
            </p>
        </div>
    </div>

    <!-- Client info -->
    <div class="grid grid-cols-2 items-center mt-8">
        <div>
            <p class="font-bold text-gray-800">
                Bill to :
            </p>
            <p class="text-gray-500">
                @php
                    $user = \App\Models\User::find($invoice->user_id);
                 @endphp
                {{ucfirst($user->name)}}


            </p>
            <p class="text-gray-500">
                {{ucfirst($user->email)}}
            </p>
        </div>

        <div class="text-right">
            <p class="">
                Transaction number:
                <span class="text-gray-500">TRX-{{$invoice->id}}</span>
            </p>
            <p>
                Transaction date: <span class="text-gray-500">{{$invoice->created_at->format("D, d M Y H:i:s")}}</span>
                <br />
                Due date:<span class="text-gray-500">{{$invoice->created_at->format("D, d M Y H:i:s")}}</span>
            </p>
        </div>
    </div>
@php
    $t = $invoice;
@endphp
    <!-- Invoice Items -->
    <div class="-mx-4 mt-8 flow-root sm:mx-0">
        <div class=' '>
            <h1 class=" font-bold text-purple-900 text-lg leading-tight border-b pb-4">
                Transaction Details
            </h1>
            <div class="flex flex-col gap-3 border-b py-6  ">
                <p class="flex justify-between">
                    <span class="text-gray-400">Transaction ID.:</span>
                    <span>#{{$t->id}}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400">Transaction Status:</span>
                    <span>{{ucfirst($t->status)}}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400">Created By:</span>
                    <span>{{ucfirst((\App\Models\User::find($t->user_id))->name)}}</span>
                </p>
                <p class="flex justify-between">
                    <span class="text-gray-400">Created At:</span>
                    <span>{{$t->created_at->format("D, d M Y H:i A")}}</span>
                </p>
            </div>
            <div class="flex flex-col gap-3 pb-6 pt-2 ">
                <table class="w-full text-left">
                    <thead>
                    <tr class="flex">
                        <th class="w-full py-2">Payment Details</th>
                        <th class="min-w-[44px] py-2"></th>
                        <th class="min-w-[44px] py-2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="flex">
                        <td class="flex-1 py-1">Amount To Convert</td>
                        <td class="min-w-[44px]">{{$t->base_currency}}</td>
                        <td class="min-w-[44px]">{{$t->amount_to_send}}</td>
                    </tr>

                    <tr class="flex">
                        <td class="flex-1 py-1">Exchange Rate</td>
                        <td class="min-w-[44px]"></td>
                        <td class="min-w-[44px]">{{$t->exchange_rate}}</td>
                    </tr>
                    <tr class="flex">
                        <td class="flex-1 py-1">Amount To Receive</td>
                        <td class="min-w-[44px]">{{$t->target_currency}}</td>
                        <td class="min-w-[44px]">{{$t->final_amount}}</td>
                    </tr>

                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <!--  Footer  -->
    <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
        Please pay the invoice before the due date. You can pay the invoice by logging in to your account from our client portal.
    </div>

</div>

{{--  <button type="button" id="btn" class="">Print</button>--}}
</body>
</html>
