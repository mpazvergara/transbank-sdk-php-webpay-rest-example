<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <style>
        .webpay_form input {
            font-size: 20px;
            display: flex;
            flex-direction:column;
            width:50%;
        }


    </style>

</head>
<body>

<h3>Parametros recibidos:</h3>
<pre>
    {{ print_r($req) }}
</pre>


<h3>Respuesta:</h3>
<pre>
    {{ print_r($res)  }}
</pre>



<h1>Confirmar transacción</h1>
<form class="transaccion_completa_form" action="/transaccion_completa/mall_commit" method="post" style="display: flex; flex-direction:column; width:50%;font-size: 20px;">
    @csrf
    <label for="token">Token</label>
    <input name="token" value="{{ $req['token_ws'] }}">

    <h3>Comercio 1</h3>
    <hr>

    <label for="etails_commerce_code_1">Codigo de comercio (comercio hijo)</label>
    <input id="details_commerce_code_1" name="details[0][commerce_code]" value="{{ $details[0]['commerce_code'] }}">

    <label for="details_buy_order_1">Orden de compra (comercio hijo)</label>
    <input id="details_buy_order_1" name="details[0][buy_order]" value="{{ $details[0]['buy_order'] }}"/>

    <label for="id_query_installments_1">Id query installments</label>
    <input id="id_query_installments_1" name="details[0][id_query_installments]" value="{{ $res[0]->getIdQueryInstallments()  }}">

    <label for="deferred_period_index_1">Deferred period index</label>
    <select name="details[0][deferred_period_index]" id="deferred_period_index_1">
        <option value="" selected></option>
        @foreach ($res[0]->getDeferredPeriods() as $per)
            <option selected value="{{ $per }}">{{ $per }}</option>
        @endforeach
    </select>

    <label for="grace_period_1">Periodo de gracia</label>
    <select name="details[0][grace_period]">
        <option value="true">true</option>
        <option selected value="false">false</option>
    </select>

    <h3>Comercio 2</h3>
    <hr>

    <label for="etails_commerce_code_2">Codigo de comercio (comercio hijo)</label>
    <input id="details_commerce_code_2" name="details[1][commerce_code]" value="{{ $details[1]['commerce_code'] }}">

    <label for="details_buy_order_2">Orden de compra (comercio hijo)</label>
    <input id="details_buy_order_2" name="details[1][buy_order]" value="{{ $details[1]['buy_order'] }}"/>


    <label for="id_query_installments">Id query installments</label>
    <input id="id_query_installments_2" name="details[1][id_query_installments]" value="{{ $res[1]->getIdQueryInstallments() }}">

    <label for="deferred_period_index_2">Deferred period index</label>
    <select name="details[1][deferred_period_index]" id="deferred_period_index_2">
        <option value="" selected></option>
        @foreach ($res[1]->getDeferredPeriods() as $per)
            <option selected value="{{ $per }}">{{ $per }}</option>
        @endforeach
    </select>

    <label for="grace_period_2">Periodo de gracia</label>
    <select id="grace_period_2" name="details[1][grace_period]">
        <option value="true">true</option>
        <option selected value="false">false</option>
    </select>

    <button type="submit">Enviar</button>

</form>




{{--




<h1>Confirmar transacción</h1>
<form class="transaccion_completa_form" action="/transaccion_completa/mall_commit" method="post" style="display: flex; flex-direction:column; width:50%;font-size: 20px;">

    <label for="token">Token</label>
    <input name="token" value="{{ $req['token'] }}">

    <h3>Comercio 1</h3>
    <hr>

    <label for="etails_commerce_code_1">Codigo de comercio (comercio hijo)</label>
    <input id="details_commerce_code_1" name="detail[details][][commerce_code]" value="{{ $details[0]['commerce_code'] }}">

    <label for="details_buy_order_1">Orden de compra (comercio hijo)</label>
    <input id="details_buy_order_1" name="detail[details][][buy_order]" value="{{ $details[0]['buy_order'] }}"/>

    <label for="id_query_installments_1">Id query installments</label>
    <input id="id_query_installments_1" name="detail[details][][id_query_installments]" value="{{ $res[0]->getIdQueryInstallments()  }}">

    <label for="deferred_period_index_1">Deferred period index</label>
    <select name="detail[details][][deferred_period_index]" id="deferred_period_index_1">
        <option value="" selected></option>
        @foreach ($res[0]->getDeferredPeriods() as $per)
            <option selected value="{{ $per }}">{{ $per }}</option>
        @endforeach
    </select>

    <label for="grace_period_1">Periodo de gracia</label>
    <select name="detail[details][][grace_period]">
        <option value="true">true</option>
        <option selected value="false">false</option>
    </select>

    <h3>Comercio 2</h3>
    <hr>

    <label for="etails_commerce_code_2">Codigo de comercio (comercio hijo)</label>
    <input id="details_commerce_code_2" name="detail[details][][commerce_code]" value="{{ $details[1]['commerce_code'] }}">

    <label for="details_buy_order_2">Orden de compra (comercio hijo)</label>
    <input id="details_buy_order_2" name="detail[details][][buy_order]" value="{{ $details[1]['buy_order'] }}"/>


    <label for="id_query_installments">Id query installments</label>
    <input id="id_query_installments_2" name="detail[details][][id_query_installments]" value="{{ $res[0]->getIdQueryInstallments() }}">

    <label for="deferred_period_index_2">Deferred period index</label>
    <select name="detail[details][][deferred_period_index]" id="deferred_period_index_2">
        @foreach ($res[1]->getDeferredPeriods() as $per)
            <option selected value="{{ $per }}">{{ $per }}</option>
        @endforeach
    </select>

    <label for="grace_period_2">Periodo de gracia</label>
    <select id="grace_period_2" name="detail[details][][grace_period]">
        <option value="true">true</option>
        <option selected value="false">false</option>
    </select>

    <button type="submit">Enviar</button>

</form>



































<form action="/transaccion_completa/mall_commit" method="post" class="webpay_form">
    @csrf
    <label for="token_ws">
        Token
    </label>
    <input type="text" name="token_ws" value={{ $req["token_ws"] }}>
    <label for="merchant_1_commerce_code">Codigo de comercio hijo 1</label>
    <input type="text" name="details[0][commerce_code]" value="597026008913">

    <label for="merchant_1_buy_order"> Orden de compra hijo 1</label>
    <input type="text" name="details[0][buy_order]" value="ordenCompra1234" />

    <label for="merchant_1_id_query_installments">Id de cuotas</label>
    <input type="text" name="details[0][id_query_installments]" value={{ $res->getIdQueryInstallments() }} />

    <label for="merchant_1_deferred_period_index">Cantidad de periodo diferido</label>
    <input type="number" name="details[0][deferred_period_index]" value="1" />

    <label for="merchant_1_grace_period">Periodo de Gracia</label>
    <input type="text" name="details[0][grace_period]" value="false">

    <label for="merchant_2_commerce_code">Codigo de comercio hijo 2</label>
    <input type="text" name="details[1][commerce_code]" value="597026008913">

    <label for="merchant_2_buy_order"> Orden de compra hijo 2</label>
    <input type="text" name="details[1][buy_order]" value="ordenCompra1234" />

    <label for="merchant_2_id_query_installments">Id de cuotas</label>
    <input type="text" name="details[1][id_query_installments]" value={{ $res->getIdQueryInstallments() }} />

    <label for="merchant_2_deferred_period_index">Cantidad de periodo diferido</label>
    <input type="number" name="details[1][deferred_period_index]" value="1" />

    <label for="merchant_2_grace_period">Periodo de Gracia</label>
    <input type="text" name="details[1][grace_period]" value="false">

    <button type="submit">Enviar datos</button>

</form>

</body>
--}}
