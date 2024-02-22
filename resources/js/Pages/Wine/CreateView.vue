<template>
    <Head title="Create Wine" />
    <div>
      <main class="column_40">
            <GoBackButton :color="'cream'" class="button_back"/>
            <header>
            <h1 class="index_title">{{ __('cellar.create_custom') }}</h1>
            </header>
            
            <form @submit.prevent="submit" class="form-create-wine">
                <section class="column_25">
                    <header>
                        <h2 class="disp_subtitle">{{ __('cellar.tell_us') }}</h2>
                    </header>

                    <!-- <legend class="legend cream">Tell us about your wine</legend> -->
                    <fieldset class="fieldset_1">
                    <legend>{{ __('cellar.wine_name') }}</legend>
                    <label for="name" hidden></label>
                    <input
                        id="name"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="what is the wine's name"
                        />
                    <InputError class="msg input_err" :message="form.errors.name" />
                    </fieldset>

                    <fieldset class="fieldset_1">
                    <legend>{{ __('cellar.wine_type') }}</legend>
                    <label for="type" hidden></label>
                    <input
                        id="type"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.type"
                        autofocus
                        autocomplete="type"
                        placeholder="what type of wine is it?"
                        />
                    <InputError class="msg input_err" :message="form.errors.type" />
                    </fieldset>

                    <fieldset class="fieldset_1">
                    <legend>{{ __('cellar.wine_country') }}</legend>
                    <label for="country" hidden></label>
                    <input
                        id="country"
                        type="text"
                        class="mt-1 block w-full"
                        v-model="form.country"
                        autofocus
                        autocomplete="country"
                        placeholder="where is your wine from?"
                        />
                    <InputError class="msg input_err" :message="form.errors.country" />
                    </fieldset>

                    <fieldset class="fieldset_1">
                        <legend>{{ __('cellar.wine_size') }}</legend>
                        <label for="size" hidden></label>
                        <input
                            id="size"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="form.size"
                            autofocus
                            autocomplete="size"
                            placeholder="what size is your wine?"
                            />
                        <InputError class="msg input_err" :message="form.errors.size" />
                    </fieldset>

                    <fieldset class="fieldset_1">
                        <legend>{{ __('cellar.wine_price') }}</legend>
                        <label for="price" hidden></label>
                        <input
                            id="price"
                            type="number"
                            min="0"
                            step="0.01"
                            class="mt-1 block w-full"
                            v-model="form.price"
                            autofocus
                            autocomplete="price"
                            placeholder="how much is your wine?"
                            />
                        <InputError class="msg input_err" :message="form.errors.price" />
                    </fieldset>
                </section>

                <section class="card_cellar w_sections">
                    <h2 class="disp_subtitle">{{ __('cellar.what_to_do') }}</h2>
                    <div class="column_15">
                        <!-- <h5 class="legend_small cream">Store in a cellar</h5> -->
                        <h3 class="fs_5 burg-lt block-font">{{ __('cellar.store') }}</h3>
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
                                <label class="block-font fs_5" :for=cellar.id>{{ cellar.name }}</label>
                            </div>
                        </div>
                        <p v-if="form.errors.cellar_id">{{ form.errors.cellar_id }}</p>

                        <!-- <label for="cellar_qty" class="legend_small cream">How many bottles do you want to store</label> -->
                        <fieldset class="fieldset_1 fs_burg">
                            <legend>{{ __('cellar.how_many') }}</legend>
                            <!-- <label for="cellar_qty" class="legend_small cream">How many bottles do you want to store</label> -->
                            <label for="cellar_qty" hidden></label>
                            <input
                                id="cellar_qty"
                                type="number"
                                min="0"
                                v-model="form.cellar_qty"
                                autofocus
                                placeholder="please choose a number"
                                />
                            <InputError class="msg input_err" :message="form.errors.price" />
                        </fieldset>
                    </div>

                    <div class="column_15">
                        <!-- <h5 class="legend cream">Add to your buy list</h5> -->
                        <h3 class="fs_5 burg-lt block-font">{{ __('cellar.add_buylist') }}</h3>
                        
                        <fieldset class="fieldset_1 fs_burg">
                            <legend>{{ __('cellar.how_many') }}</legend>
                            <label for="buyList_qty" hidden></label>
                            <!-- <label for="buyList_qty" class="legend_small cream">How many bottles do you want to buy?</label> -->
                        <input 
                            id="buyList_qty" 
                            type="number" 
                            min="0"
                            v-model="form.buyList_qty"
                            />
                        <p v-if="form.errors.buyList_qty">{{ form.errors.buyList_qty }}</p>
                        </fieldset>
                    </div>
                </section>
                <button class="button">{{ __('cellar.save_wine') }}</button>
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
          cellar_qty: '0',
          buyList_qty: '',
        }),
      }
    },
    layout: MainLayout,
    methods: {
      submit () {
        this.form.post(route('wine.store'), {
          onSuccess: () => {
            this.$parent.openDialog(`Great ! Your wine has been added`);
          }
      });
      }
    },
    props: ['cellars']
  }
  </script>