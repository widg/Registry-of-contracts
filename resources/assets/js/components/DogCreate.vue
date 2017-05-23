<template>
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
                              <select v-model="add.document" class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                                <option selected>Вид документа</option>
                                <option value="1">Договор доходный</option>
                                <option value="2">Договор расходный</option>
                                <option value="3">Дополнительное соглашение</option>
                              </select>
                              <p class="help-block">Категория</p>
                              <select v-model="add.category" class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                                <option selected>Категория</option>
                                <option value="1">Административно-хозяйственные расходы</option>
                                <option value="2">Закупка оборудования, комплектующих</option>
                                <option value="3">Сервисное обслуживание</option>
                              </select>
                              <p class="help-block">Контрагент</p>
                              <select v-model="add.counterparty" class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                                <option selected>Контрагент</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                              <a v-on:click="clickaddorganization" v-if="btnaddorganization" class="btn btn-success" id="save">Добавить организацию</a>
                              <div v-if="addorganization" class="form-group">
                              <label >Добавить организацию</label>
                                  <input v-model="addorganization1" type="text" class="form-control" placeholder="Наименование">
                                  <input v-model="addorganization2" type="text" class="form-control" placeholder="ИНН">
                                  <input v-model="addorganization3" type="text" class="form-control" placeholder="КПП">
                                  <input v-model="addorganization4" type="text" class="form-control" placeholder="ОГРН">
                                  <input v-model="addorganization5" type="text" class="form-control" placeholder="ОКПО">
                                  <input v-model="addorganization6" type="text" class="form-control" placeholder="ОКВЭД">
                                  <hr>
                                  <input v-model="addorganization7" type="text" class="form-control" placeholder="Юридический адресс">
                                  <input v-model="addorganization8" type="text" class="form-control" placeholder="Почтовый адресс">
                                  <input v-model="addorganization9" type="text" class="form-control" placeholder="Телефон">
                                  <input v-model="addorganization10" type="text" class="form-control" placeholder="Эл. почта">
                                  <input v-model="addorganization11" type="text" class="form-control" placeholder="Сайт">
                                  <textarea v-model="addorganization12" class="form-control" rows="3" placeholder="Примечание"></textarea>
                              </div>
                              <a v-on:click="clickaddperson" v-if="btnaddperson" class="btn btn-success" id="save">Добавить персону</a>
                              <div v-if="addperson" class="form-group">
                              <label >Добавить персону</label>
                                  <input v-model="addperson1" type="text" class="form-control" placeholder="Фимилия">
                                  <input v-model="addperson2" type="text" class="form-control" placeholder="Имя">
                                  <input v-model="addperson3" type="text" class="form-control" placeholder="Отчество">
                                  <input v-model="addperson4" type="text" class="form-control" placeholder="ИНН">
                                  <input v-model="addperson5" type="text" class="form-control" placeholder="СНИЛС">
                                  <hr>
                                  <input v-model="addperson7" type="text" class="form-control" placeholder="Адрес регистрации">
                                  <input v-model="addperson8" type="text" class="form-control" placeholder="Адрес Проживания">
                                  <input v-model="addperson9" type="text" class="form-control" placeholder="Телефон">
                                  <input v-model="addperson10" type="text" class="form-control" placeholder="Эл. почта">
                                  <input v-model="addperson11" type="text" class="form-control" placeholder="Сайт">
                                  <hr>
                                  <input v-model="addperson11" type="text" class="form-control" placeholder="Номер счёта">
                                  <input v-model="addperson11" type="text" class="form-control" placeholder="Банк">
                                  <textarea v-model="addperson12" class="form-control" rows="3" placeholder="Примечание"></textarea>
                              </div>
                              <p class="help-block">Подписал:</p>
                              <input v-model="add.counterpartysigned" type="text" class="form-control" placeholder="Подписал">
                              <label>Наша организация</label>
                              <select v-model="add.company" class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                                <option selected>Наша организация</option>
                                <option value="1">ССТ</option>
                                <option value="2">ЮИСП</option>
                                <option value="3">3</option>
                              </select>
                              <p class="help-block">Подразделения</p>
                              <select v-model="add.unit" class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                                <option selected>Подразделения</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                              <p class="help-block">Подписал:</p>
                              <input v-model="add.companysigned" type="text" class="form-control" placeholder="Подписал">
                              <label>Примечание:</label>
                              <textarea v-model="add.note" class="form-control" rows="3"></textarea>
                          </div>
                        <div class="col-md-4">
                            <label>Дата и номер:</label>
                            <p class="help-block">Рег. №:</p>
                            <pre v-model="add.registration" class="form-control">{{registration}}</pre>
                            <p class="help-block">Дата документа:</p>
                            <pre v-model="add.documentdate" class="form-control">{{now}}</pre>
                            <div class="form-group">
                              <label>Условия</label>
                                <div class="form-group">
                                    <p class="help-block">Действует с:</p>
                                    <datepicker language="ru" v-on:selected="disableTo"></datepicker>
                                </div>
                                <div class="form-group">
                                    <p class="help-block">Действует по:</p>
                                    <datepicker language="ru" v-on:selected="disableFrom"></datepicker>
                                </div>
                                <label>Сумма:</label>
                              <input v-model="add.price" type="text" class="form-control" placeholder="Сумма">
                              </div>
                            <label>Жизненый цикл:</label>
                            <p class="help-block">Состояние</p>
                              <select v-model="add.status" class="form-control custom-select mb-3 mr-sm-3 mb-sm-0" id="inlineFormCustomSelect">
                                <option selected>Состояние</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                              </select>
                            <div class="btn-group pull-right">
                                <a v-on:click="publish" class="btn btn-success" id="save">Сохранить</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    export default {
        props:['now', 'user_id', 'registration'],
        components:{ Datepicker },
        data(){
            return {
                    add: {},
                    disabled: {},
                    dt: [],
                    errors: [],
                    addorganization: false,
                    btnaddorganization: true,
                    addperson: false,
                    btnaddperson: true
                }
        },
        methods: {
            publish: function () {
                var add = this.add;
                axios.post('/reg', {
                    add
                })
                .then(response => {
                    //this.posts.unshift(response.data);
                    //this.post = null;
                    //this.type = 1;
                });
            },
            clickaddorganization(){
                this.addorganization = true;
                this.btnaddorganization = false;
            },
            clickaddperson(){
                this.addperson = true;
                this.btnaddperson = false;
            },
            disableTo (val) {
             console.log(val)
             if (typeof this.disabled.to === 'undefined') {
               this.disabled = {
                 to: null,
                 from: this.disabled.from
               };
             }
             this.disabled.to = val;
            },
            disableFrom (val) {
             if (typeof this.disabled.from === 'undefined') {
               this.disabled = {
                 to: this.disabled.to,
                 from: null
               };
             }
             this.disabled.from = val;
            }
        }
    }
</script>