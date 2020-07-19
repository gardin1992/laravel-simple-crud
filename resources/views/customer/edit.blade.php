@extends('layouts.main')

@section('title', 'Clientes')
@section('content')

<div class="header">
    <div class="btn-toolbar">
        <a href="/" class="btn btn-default" title="Voltar"><i class="fas fa-long-arrow-alt-left"></i> Voltar</a>
    </div>
    <div class="title">
        @if($action == 'create' )
        <h3 class="h3">Novo Cliente</h3>
        @elseif($action == 'show')
        <h3 class="h3">Visualizando {{$customer['name']}}</h3>
        @else
        <h3 class="h3">Editar {{$customer['name']}}</h3>
        @endif
    </div>
</div>

<div class="dashboard">
    @if ($action == 'create')
    <form method="POST" id="formPost" action="/">
        @elseif ($action == 'edit')
        <form method="POST" id="formPost" action="{{ '/' . $customer['id'] }}">
            <input name="_method" type="hidden" value="PUT">
            @elseif ($action == 'show')
            <form>
                @endif
                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" id="name" 
                        value="{{ isset($customer['name']) ? $customer['name'] : ( empty(old('name')) ? '' : old('name')) }}" 
                        placeholder="Dino da Silva Sauro" />
                </div>
                <div class="flex-row">
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" name="phone" id="phone" 
                        value="{{isset($customer['phone']) ? $customer['phone'] : (empty(old('phone')) ? '' : old('phone')) }}" placeholder="(11)999999999" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" id="email" value="{{isset($customer['email']) ? $customer['email'] : (empty(old('email')) ? '' : old('email'))}}" placeholder="dinosauro@email.com" />
                    </div>
                    <div class="form-group">
                        <label>Cpf</label>
                        <input type="text" name="cpf" id="cpf" value="{{isset($customer['cpf']) ? $customer['cpf'] : (empty(old('cpf')) ? '' : old('cpf'))}}" placeholder="111.222.333-00" />
                    </div>
                </div>
                <h4 class="h4">Endereço</h3>
                    <div class="form-group">
                        <label>CEP</label>
                        <input type="text" name="address[postalcode]" id="postalcode" value="{{isset($customer['address']) && isset($customer['address']['postalcode']) ? $customer['address']['postalcode'] : (empty(old('address.postalcode')) ? '' : old('address.postalcode'))}}" placeholder="19523-158" />
                    </div>

                    <div class="flex-row">
                        <div class="form-group">
                            <label>Logradouro</label>
                            <input type="text" name="address[address]" id="address" value="{{isset($customer['address']) && isset($customer['address']['address']) ? $customer['address']['address'] : ( empty( old('address.address') ) ? '' : old('address.address') ) }}" placeholder="Rua 30" />
                        </div>
                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" name="address[number]" id="number" value="{{isset($customer['address']) && isset($customer['address']['number']) ? $customer['address']['number'] : (empty(old('address.number')) ? '' : old('address.number'))}}" placeholder="100" />
                        </div>
                        <div class="form-group">
                            <label>Complemento</label>
                            <input type="text" name="address[complement]" id="complement" value="{{isset($customer['address']) && isset($customer['address']['complement']) ? $customer['address']['complement'] : (empty(old('address.complement')) ? '' : old('address.complement'))}}" placeholder="Apto. 32" />
                        </div>
                    </div>
                    <div class="flex-row">
                        <div class="form-group">
                            <label>Bairro</label>
                            <input type="text" name="address[district]" id="district" value="{{isset($customer['address']) && isset($customer['address']['district']) ? $customer['address']['district'] : (empty(old('address.district')) ? '' : old('address.district'))}}" placeholder="Distrito industrial" />
                        </div>
                        <div class="form-group">
                            <label>Cidade</label>
                            <input type="text" name="address[city]" id="city" value="{{isset($customer['address']) && isset($customer['address']['city']) ? $customer['address']['city'] : (empty(old('address.city')) ? '' : old('address.city'))}}" placeholder="São Paulo" />
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <input type="text" name="address[uf]" id="uf" value="{{isset($customer['address']) && isset($customer['address']['uf']) ? $customer['address']['uf'] : (empty(old('address.uf')) ? '' : old('address.uf'))}}" placeholder="SP" />
                        </div>
                    </div>

                    @if ($action != 'show')
                    <div class="btn-toolbar">
                        <button type="submit" class="btn btn-success" title="Enviar formulário"><i class="fas fa-save"></i> Enviar</button>
                    </div>
                    @endif
            </form>
</div>
@endsection

@section('scripts')
<script>
    var action = '<?php echo $action ?>';

    $(document).ready(function() {

        if (action == 'show') {
            $('input').attr('disabled', 'disabled')
        }
        jQuery.validator.setDefaults({
            // debug: true,
            success: "valid",
        });

        var $phone = $('#phone');
        var $cpf = $('#cpf');
        var $postalcode = $('#postalcode');

        $phone.on('keypress', function(e) {
            $(this).phoneMask();
        })
        $cpf.on('keypress', function(e) {
            $(this).cpfMask();
        })

        $postalcode.on('keyup', function(e) {
            var cep = $(this).val().replace('-', '');
            if (/^[0-9]{8}$/.test(cep)) {
                $.debounce(function() {
                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#address").val("...");
                    $("#district").val("...");
                    $("#city").val("...");
                    $("#uf").val("...");
                    $("#complement").val("...");
                    $("#number").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {
                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#address").val(dados.logradouro);
                            $("#district").val(dados.bairro);
                            $("#city").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#complement").val(dados.complemento);
                            $("#number").val(dados.unidade);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            alert("CEP não encontrado.");
                        }
                    });
                }, 500)
            }
        });

        $('#formPost').validate({
            submitHandler: function(form) {
                // do other things for a valid form
                form.submit();
            },
            rules: {
                name: {
                    required: true,
                    minlength: 8,
                    maxlength: 200
                },
                email: {
                    required: true,
                    maxlength: 100,
                    email: true
                },
                phone: {
                    required: true,
                    maxlength: 100,
                    phoneBR: true
                },
                cpf: {
                    required: true,
                    cpfBR: true,
                    normalizer: function(value) {
                        return $.onlyNumbers(value);
                    }
                },
                // address
                'address[postalcode]': {
                    required: true,
                    postalcodeBR: true,
                    normalizer: function(value) {
                        return $.onlyNumbers(value);
                    }
                },
                'address[address]': {
                    required: true,
                    minlength: 3,
                    maxlength: 200
                },
                'address[number]': {
                    required: true,
                    number: true
                },
                'address[district]': {
                    maxlength: 50
                },
                'address[city]': {
                    required: true,
                    maxlength: 50
                },
                'address[uf]': {
                    required: true,
                    minlength: 2,
                    maxlength: 2
                },
            }
        })
    });
</script>
@endsection