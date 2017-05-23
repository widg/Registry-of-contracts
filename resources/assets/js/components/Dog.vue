<template>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="btn-group pull-right">
                            <a href="/dog/create" class="btn btn-success">Создать договор</a>
                            <a href="/dog/create" class="btn btn-primary">Создать дополнительное соглашение</a>
                        </div>
                     <h4>Все документы</h4> 
                     </div>

                    <div class="panel-body">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Дата документа</th>
                              <th>Рег. №</th>
                              <th>Вид документа</th>
                              <th>Содержание</th>
                              <th>Контрагент</th>
                              <th>Сумма</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="reg in regs" v-if="status.indexOf(reg.status) != -1 &&  doc.indexOf(reg.document) != -1">
                              <th scope="row">{{reg.id}}</th>
                              <td>{{reg.created_at}} </td>
                              <td>{{reg.id}} </td>
                              <td>{{reg.document}} </td>
                              <td>{{reg.note}} </td>
                              <td>{{reg.counterparty}} </td>
                              <td>{{reg.price}} </td>
                            </tr>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4>Фильтр</h4> 
                </div>
                <div class="panel-body">
                  <form role="form">
                    <div class="form-group">
                      <label >Состояние</label> 
                      <div class="checkbox">
                        <label><input type="checkbox" value="1" v-model="status">В разработке</label>
                      </div>
                      <div class="checkbox">
                        <label><input type="checkbox" value="2" v-model="status">Действующий</label>
                      </div>
                      <div class="checkbox ">
                        <label><input type="checkbox" value="3" v-model="status">Исполнен</label>
                      </div>
                      <div class="checkbox ">
                        <label><input type="checkbox" value="4" v-model="status">Расторгнут</label>
                      </div>
                      <div class="checkbox ">
                        <label><input type="checkbox" value="5" v-model="status">Аннулирован</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label >Типы документов</label>
                      <div class="checkbox ">
                        <label><input type="checkbox" value="1" v-model="doc">Договоры</label>
                      </div>
                      <div class="checkbox ">
                        <label><input type="checkbox" value="2" v-model="doc">Доп. соглашения</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label >Основное</label>
                    </div>
                      <select class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                        <option selected>Вид документа</option>
                        <option value="1">Договор доходный</option>
                        <option value="2">Договор расходный</option>
                        <option value="3">Дополнительное соглашение</option>
                      </select>
                      <select class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                        <option selected>Категория</option>
                        <option value="1">Административно-хозяйственные расходы</option>
                        <option value="2">Закупка оборудования, комплектующих</option>
                        <option value="3">Сервисное обслуживание</option>
                      </select>
                      <select class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                        <option selected>Контрагент</option>
                        <option value="1">Административно-хозяйственные расходы</option>
                        <option value="2">Закупка оборудования, комплектующих</option>
                        <option value="3">Сервисное обслуживание</option>
                      </select>
                      <select class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                        <option selected>Наша организация</option>
                        <option value="1">Административно-хозяйственные расходы</option>
                        <option value="2">Закупка оборудования, комплектующих</option>
                        <option value="3">Сервисное обслуживание</option>
                      </select>
                      <select class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                        <option selected>Подразделения</option>
                        <option value="1">Административно-хозяйственные расходы</option>
                        <option value="2">Закупка оборудования, комплектующих</option>
                        <option value="3">Сервисное обслуживание</option>
                      </select>
                    <div class="form-group">
                      <label >Дата документа</label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                              Последние 30 дней
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                              Последние 365 дней
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                              Произвольный период
                      </label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    //import moment from 'moment';
    export default {
        data() {
            return {
                regs: {},
                status: [],
                doc: [],
                post: null,
                type: 1
            }
        },
        mounted() {
            this.getAll();
        },
        filters: {
            ago(date) {
                return moment(date).fromNow();
            }
        },
        methods: {
            getAll: function () {
                axios.get('/reg')
                .then(response => {
                    console.log(response);
                    this.regs = response.data.regs;
                });
            },
            publish: function () {
                axios.post('/post/store', {
                    post: this.post,
                    type: this.type
                })
                .then(response => {
                    this.posts.unshift(response.data);
                    this.post = null;
                    this.type = 1;
                });
            },
            toogle: function (type) {
                this.type = type;
            }
        }
    }
</script>