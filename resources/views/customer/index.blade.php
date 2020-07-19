@extends('layouts.main')

@section('title', 'Clientes')
@section('content')

<div class="header">
    <div class="btn-toolbar">
        <a href="/novo" class="btn btn-success" title="Novo Cliente"><i class="fas fa-plus"></i> Novo Cliente</a>
    </div>
    <div class="title">
        <h3 class="h3">Listagem de Clientes</h3>
    </div>
   
</div>

<div class="dashboard">
    <div class="search">
        <input id="search" class="form-control" type="text" placeholder="Pesquiar Cliente..." aria-label="Search" value="{{ isset($query['name']) ? $query['name'] : '' }}">
    </div>
    <div class="table-responsive">
        <div class="table">
            <div class="tr th thead">
                <div class="td" name="id">
                    #
                </div>
                <div class="td">
                    Nome
                </div>
                <div class="td" name="phone">
                    Telefone
                </div>
                <div class="td" name="email">
                    Email
                </div>
                <div class="td" name="cpf">
                    Cpf
                </div>
                <div class="td actions" name="actions"></div>
            </div>
            @foreach ($customers as $customer)
            <div class="tr table-total tbody">
                <div class="td" name="id">
                    {{ $customer->getId() }}
                </div>
                <div class="td">
                    {{ $customer->getName() }}
                </div>
                <div class="td" name="phone">
                    <span>{{ $customer->getPhone() }}</span>
                </div>
                <div class="td" name="email">
                    {{ $customer->getEmail() }}
                </div>
                <div class="td" name="cpf">
                    <span>{{ $customer->getCpf() }}</span>
                </div>
                <div class="td actions" name="actions">
                    <a href="{{url('/'.$customer->getId().'/visualizar')}}" class="show" title="Visualizar"><i class="fas fa-eye"></i></a>
                    <a href="{{url('/'.$customer->getId().'/editar')}}" class="edit" title="Editar"><i class="fas fa-edit"></i></a>
                    <a href="#" name="remove" class="remove" title="Remover" data-id="{{ $customer->getId() }}">
                        @if ($customer->getEnable())
                        <i class="fas fa-lock"></i>
                        @else
                        <i class="fas fa-unlock"></i>
                        @endif
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Pagination -->
    <div role="navigation" class="pagination">
        <button class="btn previous" data-page="previous" />Anterior</button>

        <div class="pages">
        @for($i = 1; $i <= $pager['pageCount']; $i++) 
            @if($i == $pager['page'])
                <button class="btn pager-item active" data-page="{{ $i }}"/>{{ $i }}</button>
            @else
                <button class="btn pager-item" data-page="{{ $i }}"/>{{ $i }}</button>
            @endif
        @endfor
        </div>

        <button class="btn next" data-page="next"/>Próximo</button>
    </div>
</div>

<div id="modal-remove" class="modal">
    <div class="modal-content">
        <button class="btn modal-close"><i class="fas fa-plus"></i></button>
        <div class="modal-header">
            Remover Cliente
        </div>
        <div class="modal-body">
            Deseja mesmo remover o cliente <span id="remove-customer-id"></span>?
        </div>
        <div class="modal-footer">
            <button class="btn btn-default" id="remove-cancel" title="Cancelar"><i class="fas fa-cancel"></i> Cancelar</button>
            <button class="btn btn-danger" id="remove-confirm" title="Confirmar"><i class="fas fa-cancel"></i> Confirmar</button>
        </div>
    </div>
</div>

<div id="modal-remove-success" class="modal">
    <div class="modal-content">
        <button class="btn modal-close"><i class="fas fa-plus"></i></button>
        <div class="modal-header">
            Remover Cliente
        </div>
        <div class="modal-body">
            Deseja mesmo remover o cliente <span id="remove-customer-id"></span>?
        </div>
        <div class="modal-footer">
            <button class="btn btn-default" id="remove-cancel" title="Cancelar"><i class="fas fa-cancel"></i> Cancelar</button>
            <button class="btn btn-danger" id="remove-confirm" title="Confirmar"><i class="fas fa-cancel"></i> Confirmar</button>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        var id;
        
        var $modalRemove = $('#modal-remove');
        var $modalRemoveSuccess = $('#modal-remove-success');

        $('[name="phone"] span').phoneMask();
        $('[name="cpf"] span').cpfMask();

        $('#search').on('keyup', function(e) {
            e.preventDefault();

            var name = $(this).val()

            $.debounce(function() {
                var url = $.findName(name);
                window.location = url;
            }, 500)
        });

        $('[name="remove"]').on('click', function(e) {
            e.preventDefault();

            $modalRemove.modalShow();

            id = $(this).data('id');
            $('#remove-customer-id').text(id);
        });

        $('#remove-cancel').on('click', function(e) {
            e.preventDefault();
            $modalRemove.modalClose();
        });

        $('#remove-confirm').on('click', function(e) {
            e.preventDefault();

            var $form = $('<form>')
                .attr({
                    method: 'POST',
                    action: '/' + id
                })
                .append('<input type="hidden" name="_method" value="delete" />')
                .appendTo($modalRemove);

            $form.submit();
        });

        var pageCount = '<?php echo $pager['pageCount']; ?>';
        var currentPage = $.getCurrentPage();

        if (!currentPage || currentPage <= 1)
            $('[data-page="previous"]').attr('disabled', 'disabled');

        if (currentPage == pageCount)
            $('[data-page="next"]').attr('disabled', 'disabled');

        $('[data-page]').on('click', function (e) {
            e.preventDefault();

            var page = $(this).data('page');
    
            switch(page) {
                case 'previous':
                    var url = $.paginator(currentPage-1);
                    window.location = url;
                    break;
                
                case 'next':
                    console.log(currentPage+1)
                    var url = $.paginator(currentPage+1);
                    window.location = url;
                    break;
                default: 
                    var url = $.paginator(page);
                    window.location = url;
            }

        })
    });
</script>
@endsection