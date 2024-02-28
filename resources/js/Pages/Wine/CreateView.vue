<template>
    <Head title="Create Wine" />
    <div>
      <main class="column_40">
            <GoBackButton :color="'cream'"/>
            <header>
            <h1 class="title_index">{{ __('cellar.create_custom') }}</h1>
            </header>
            
            <form @submit.prevent="submit" class="form-create-wine">
                <section class="column_25">
                    <header>
                        <h2 class="title_disp_subt">{{ __('cellar.tell_us') }}</h2>
                    </header>

                    <div class="form_wrapper_2">
                    <label aria-labelledby="name" for="name">{{ __('cellar.wine_name') }}</label>
                    <input
                        id="name"
                        type="text"
                        class=""
                        v-model="form.name"
                        autofocus
                        autocomplete="name"
                        :placeholder="__('cellar.wine_name')"
                    />
                    <InputError class="auto_msg auto_msg_input_err" :message="form.errors.name" />
                    </div>

                    <fieldset class="fieldset_3">
                        <legend>{{ __('cellar.wine_type') }}</legend>
                        <div>
                            <span class="radio-round radio-red">
                                <input
                                    id="type-red"
                                    type="radio"
                                    
                                    v-model="form.type"
                                    value='{"fr":"Vin rouge ","en":"Red wine "}'
                                    checked
                                >
                                <label for="type-red">{{ __('words.red') }}</label>
                            </span>
                            <span class="radio-round radio.white">
                                <input
                                    id="type-white"
                                    type="radio"
                                    
                                    v-model="form.type"
                                    value='{"fr":"Vin blanc ","en":"White wine "}'
                                >
                                <label for="type-white">{{ __('words.white') }}</label>
                            </span>
                            <span class="radio-round radio-rose">
                                <input
                                    id="type-rose"
                                    type="radio"
                                    
                                    v-model="form.type"
                                    value='{"fr":"Vin ros\u00e9 ","en":"Ros\u00e9 "}'
                                >
                                <label for="type-rose">{{ __('words.rose') }}</label>
                            </span>
                        </div>
                        <InputError class="auto_msg auto_msg_input_err" :message="form.errors.type" />
                    </fieldset>

                    <div class="form_wrapper_2">
                        <label aria-labelledby="country" for="country">{{__('cellar.wine_country')}}</label>
                        <input
                            id="country"
                            type="text"
                            class=""
                            v-model="form.country"
                            autofocus
                            autocomplete="country"
                            :placeholder="__('cellar.wine_country')"
                            />
                        <InputError class="auto_msg auto_msg_input_err" :message="form.errors.country" />
                    </div>

                    <div class="form_wrapper_2">
                        <label  aria-labelledby="size" for="size">{{ __('cellar.wine_size') }}</label>
                        <input
                            id="size"
                            type="text"
                            class=""
                            v-model="form.size"
                            autofocus
                            autocomplete="size"
                            :placeholder=" __('cellar.wine_size')"
                            />
                        <InputError class="auto_msg auto_msg_input_err" :message="form.errors.size" />
                    </div>

                    <div class="form_wrapper_2">
                        <label aria-labelledby="price" for="price">{{ __('cellar.wine_price') }}</label>
                        <input
                            id="price"
                            type="number"
                            min="0"
                            step="0.01"
                            class=""
                            v-model="form.price"
                            autofocus
                            autocomplete="price"
                            :placeholder="__('cellar.wine_price')"
                            />
                        <InputError class="auto_msg auto_msg_input_err" :message="form.errors.price" />
                    </div>
                </section>

                <section class="card_cellar card_cell_w_sections">
                    <h2 class="title_disp_subt cream_lt">{{ __('cellar.what_to_do') }}</h2>
                    <div class="column_15">
                        <!-- <h5 class="legend_small cream">Store in a cellar</h5> -->
                        <h3 class="typo-fs-5 burg-lt typo-block-font">{{ __('cellar.store') }}</h3>
                        <div class="grid_square_horiz">
                            <div v-for="(cellar, i) in cellars"  class="grid_sq_insert">
                                <input
                                    :key="i"
                                    :id=cellar.id
                                    type="radio"
                                    class="radio"
                                    v-model="form.cellar_id"
                                    :value="cellar.id"
                                >
                                <label class="typo-block-font typo-fs-5" :for=cellar.id>{{ cellar.name }}</label>
                            </div>
                        </div>
                        <p v-if="form.errors.cellar_id">{{ form.errors.cellar_id }}</p>

                        <div class="form_wrapper_2">
                            <label class="burg" for="cellar_qty">{{ __('cellar.how_many') }}</label>
                            <input
                                id="cellar_qty"
                                type="number"
                                min="0"
                                v-model="form.cellar_qty"
                                autofocus
                                :placeholder=" __('cellar.how_many')"
                                />
                            <InputError class="auto_msg auto_msg_input_err" :message="form.errors.price" />
                        </div>
                    </div>

                    <div class="column_15">
                        <!-- <h5 class="legend cream">Add to your buy list</h5> -->
                        <h3 class="typo-fs-5 burg-lt typo-block-font">{{ __('cellar.add_buylist') }}</h3>
                        
                        <div class="form_wrapper_2">
                            <label class="burg" for="buyList_qty">{{ __('cellar.how_many') }}</label>
                            <input 
                                id="buyList_qty" 
                                type="number" 
                                min="0"
                                v-model="form.buyList_qty"
                                :placeholder=" __('cellar.how_many')"

                                />
                            <p v-if="form.errors.buyList_qty">{{ form.errors.buyList_qty }}</p>
                        </div>
                    </div>
                </section>
                <button class="button btn-cream">{{ __('cellar.save_wine') }}</button>
            </form>
        </main>
     </div>
</template>
  
  <script>
  import { Head, Link } from '@inertiajs/inertia-vue3';
  import { useForm } from '@inertiajs/inertia-vue3';
  import GoBackButton from '@/Components/ButtonsIcons/GoBackButton.vue';
  import InputError from '@/Components/InputError.vue';
  import MainLayout from '@/Layouts/MainLayout.vue';
  export default {
    name: 'Wine.CreateView',
    components: {
        Head,
        Link,
        GoBackButton,
        InputError
    },
    data () {
      return {
        form : useForm({
          name : '',
          type : '',
          country: '',
          price: '',
          size: '',
          cellar_id: this.cellars[0].id || null,
          cellar_qty: '1',
          buyList_qty: '',
        }),
        wineDialog: this.trans.dialogue.wine_create
      }
    },
    layout: MainLayout,
    methods: {
      submit () {
        this.form.post(route('wine.store'), {
          onSuccess: () => {
            this.$parent.openDialog(this.wineDialog);
          }
      });
      }
    },
    props: ['cellars', 'trans']
  }
  </script>