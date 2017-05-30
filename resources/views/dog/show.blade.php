@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="btn-group pull-right">
              <a href="/dog" class="btn btn-danger">Отменить</a>
          </div>
          <h4>Добавить документ</h4>
        </div>

        <div class="panel-body">
            <div class="col-md-8">
                <div class="form-group">
                  <label >Основное</label>
                </div>
                      <p class="help-block">Вид документа</p>
                      <pre class="form-control">{{$reg->document}} </pre>
                      <p class="help-block">Категория</p>
                      <pre class="form-control">{{$reg->category}}</pre>
                      <p class="help-block">Контрагент</p>
                      <pre class="form-control">{{$reg->counterparty}}</pre>
                      <div class="form-group">

                      <p class="help-block">Подписал:</p>
                      <pre class="form-control">{{$reg->counterpartysigned}}</pre>
                      <label>Наша организация</label>

                      <p class="help-block">Подразделения</p>
                      <pre class="form-control">{{$reg->unit}}</pre>
                      <p class="help-block">Подписал:</p>
                      <pre class="form-control">{{$reg->companysigned}}</pre>
                      <label>Примечание:</label>
                      <textarea class="form-control" rows="3">{{$reg->note}}</textarea>
                  </div>
                </div>
                  <div class="col-md-4">
                      <label>Дата и номер:</label>
                      <p class="help-block">Рег. №:</p>
                      <pre class="form-control">{{$reg->created_at}}</pre>
                      <p class="help-block">Дата документа:</p>
                      <pre class="form-control">{{$reg->created_at}}</pre>
                      <div class="form-group">
                        <label>Условия</label>
                          <div class="form-group">
                              <p class="help-block">Действует с:</p>
                              <pre class="form-control">{{$reg->created_at}}</pre>
                          </div>
                          <div class="form-group">
                              <p class="help-block">Действует по:</p>
                              <pre class="form-control">{{$reg->created_at}}</pre>
                          </div>
                          <label>Сумма:</label>
                        <pre class="form-control">{{$reg->price}}</pre>
                        </div>
                      <label>Жизненый цикл:</label>
                      <p class="help-block">Состояние</p>
                      <pre class="form-control">{{$reg->status}}</pre>
                      <div class="btn-group pull-right">
                          
                      </div>
                  </div>
            </div>
        </div>

    </div>
  </div>
</div>

@endsection