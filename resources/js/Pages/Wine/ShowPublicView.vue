<template>
      <div class="bckgd bckgd-white cont_float_up">
        <!-- ----- * DÉCOR BACKGROUND * ----- -->
        <section class="blobs_bckgd">
            <figure class="fig_bg blob_bottom">
                <img src="@/../assets/img/bott_cream_fiche.svg" alt="" />
            </figure>
            <figure class="fig_bg blob_bottom">
                <img
                    src="@/../assets/img/bott_coral_fiche.svg"
                    class="blob_coral_bg"
                    alt=""
                />
            </figure>
        </section>
        <header class="basic-header">
            <figure>
                <img src="@/../assets/logos/VINO_lt.svg" alt="VNO logo">
            </figure>
        </header>        
        <main>
            <!-- ----- * FICHE * ----- -->
            <h1 class="title_index">{{ user.first_name }} {{__('actions.sharing')}}</h1>
            <article class="fiche_wine" @click="getImage">
                <figure>
                    <img :src="wine.photo" :alt="wine.name"/>
                </figure>

                <!-- ----- * TEXTE * ----- -->
                <section>
                    
                    <header class="column_10">
                        <span class="row_gap_10">
                            <ColorDrop :color="wine.type" />
                            <h3 class="title_disp_subt ds_smllst burg-lt">
                                {{ wine.country != null ? wine.country : "n/a" }}
                            </h3>
                        </span>
                        <h1 class="typo-block-font fiche_wine_title burg">
                            {{ wine.name }}
                        </h1>
                    </header>

                    <ul class="burg-lt">
                        <li>
                            <small v-if="wine.user_id">{{
                                __("cellar.custom")
                            }}</small>
                            <small v-else
                                >{{ __("cellar.code") }}:
                                {{ wine.code_saq }}</small
                            >
                        </li>
                        <li>{{ wine.type != null ? wine.type : "n/a" }}</li>
                        <li>{{ wine.size ? wine.size : "n/a" }}</li>
                    </ul>

                    <span class="typo-semibold burg-lt"
                        >{{ __("cellar.price") }}:
                        {{ wine.price ? wine.price + " $" : "n/a" }}</span
                    >
                </section>
            </article>
            <Link :href="route('wine.show', { wine:wine.id})" class="button btn-burgundy">
              {{__('actions.go-to')}}
            </Link>
        </main>
    </div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
import ColorDrop from '@/Components/ButtonsIcons/ColorDrop.vue';
export default {
  components: {Link, ColorDrop},
  props: ['wine', 'user']
}
</script>