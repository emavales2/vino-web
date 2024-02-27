<template>
    <div class="bckgd bckgd-white cont_float_up">
        <!-- ----- * DÉCOR BACKGROUND * ----- -->
        <section class="blobs_bckgd">
            <figure class="fig_bg blob_bottom">
                <img src="@/../assets/img/bott_cream_fiche.svg" alt="" />
            </figure>
            <figure class="fig_bg blob_bottom">
                <img src="@/../assets/img/bott_coral_fiche.svg" class="blob_coral_bg" alt=""
                />
            </figure>
        </section>

        <main>
            <!-- ----- * BACK BUTTON * ----- -->
            <!-- --- * Si la dernière pg visité n'est pas /wine-create, le bouton apparaît * --- -->
            <span v-if = "prevPage !== '/wine-create'">
                <GoBackButton :color="'coral'"/>
            </span>

            <!-- ----- * FICHE * ----- -->
            <article class="fiche_wine">
                <figure>
                    <img :src="wine.photo" :alt="wine.name">
                </figure>
                
                <!-- ----- * TEXTE * ----- -->
                <section>
                    <header class="column_10">
                        <span class="row_gap_10">
                            <ColorDrop :color="wine.type"/>
                            <h3 class="title_disp_subt ds_smllst burg-lt">{{ wine.country != null ? wine.country : 'n/a' }}</h3>
                        </span>
                        <h1 class="typo-block-font fiche_wine_title coral">{{ wine.name }}</h1>
                    </header>
        
                    <ul class="burg-lt">
                        <li>                     
                            <small v-if="wine.user_id">{{ __('cellar.custom') }}</small>
                            <small v-else>{{ __('cellar.code') }}: {{ wine.code_saq }}</small>
                        </li>
                        <li>{{ wine.type != null ? wine.type : 'n/a' }}</li>
                        <li>{{ wine.size ? wine.size : 'n/a' }}</li>
                    </ul>                        
                     
                    <span class="typo-semibold burg-lt">{{ __('cellar.price') }}: {{ wine.price ? wine.price + ' $' : 'n/a' }}</span>   
                    <button @click="shareOnFacebook">Partage sur Facebook</button>               
                </section>
            </article>
            <aside class="row_els_apart row_els_line" v-if="!exists">
            <Link class="button--icon" :href="route('buylist.create', { wine: wine.id })">
                <figure>
                    <svg width="42" height="42" fill="var(--coral)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58.63 57.77"><path class="cls-1" d="m42.74,19.27h-5.91c-.98,0-1.77.79-1.77,1.77s.79,1.77,1.77,1.77h5.91c.98,0,1.77-.79,1.77-1.77s-.79-1.77-1.77-1.77Z"/><path class="cls-1" d="m42.74,28.5h-5.91c-.98,0-1.77.79-1.77,1.77s.79,1.77,1.77,1.77h5.91c.98,0,1.77-.79,1.77-1.77s-.79-1.77-1.77-1.77Z"/><path class="cls-1" d="m42.74,40.8h-21.35c-.98,0-1.77-.79-1.77-1.77s.79-1.77,1.77-1.77h21.35c.98,0,1.77.79,1.77,1.77s-.79,1.77-1.77,1.77Z"/><path class="cls-1" d="m31.05,19.27h-10.14c-.71,0-1.28.57-1.28,1.28v10.14c0,.71.57,1.28,1.28,1.28h10.14c.71,0,1.28-.57,1.28-1.28v-10.14c0-.71-.57-1.28-1.28-1.28Zm-.87,4.67l-3.61,5.04c-.28.39-.72.6-1.17.6-.29,0-.58-.09-.83-.27l-2.74-1.96c-.64-.46-.79-1.35-.33-2,.46-.64,1.35-.79,2-.33l1.58,1.13,2.77-3.87c.46-.64,1.36-.79,2-.33s.79,1.36.33,2Z"/><path class="cls-1" d="m32.13,4.77c-1.93,0-3.81.21-5.63.61C23.75,2.09,19.62,0,15,0,6.72,0,0,6.72,0,15c0,4.89,2.35,9.23,5.98,11.97-.23,1.4-.35,2.84-.35,4.3,0,14.61,11.89,26.5,26.5,26.5s26.5-11.89,26.5-26.5S46.74,4.77,32.13,4.77ZM6.2,14.96c0-.83.67-1.5,1.5-1.5h5.8v-5.8c0-.83.67-1.5,1.5-1.5s1.5.67,1.5,1.5v5.8h5.8c.83,0,1.5.67,1.5,1.5s-.67,1.5-1.5,1.5h-5.8v5.8c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5v-5.8h-5.8c-.83,0-1.5-.67-1.5-1.5Zm25.93,39.8c-12.96,0-23.5-10.54-23.5-23.5,0-.89.05-1.77.15-2.63,1.9.87,4,1.36,6.22,1.36,8.28,0,15-6.72,15-15,0-2.5-.62-4.85-1.7-6.92,1.25-.2,2.52-.32,3.83-.32,12.96,0,23.5,10.54,23.5,23.5s-10.54,23.5-23.5,23.5Z"/></svg>
                    <figcaption>Ajouter à la liste d'achat</figcaption>
                </figure>
            </Link> 
            <Link class="button--icon" :href="route('cellar-wine.create', { wine: wine.id })">
                <figure>
                    <svg width="42" height="42" fill="var(--coral)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58.63 57.77"><path class="cls-1" d="m42.76,19.27h-21.25c-1.04,0-1.88.84-1.88,1.88v21.25c0,1.03.84,1.87,1.88,1.87h21.25c1.03,0,1.87-.84,1.87-1.87v-21.25c0-1.04-.84-1.88-1.87-1.88Zm-1.13,22h-19v-19h19v19Z"/><circle class="cls-1" cx="32.05" cy="25.52" r="1.94"/><circle class="cls-1" cx="25.58" cy="25.52" r="1.94"/><circle class="cls-1" cx="38.53" cy="25.52" r="1.94"/><path class="cls-1" d="m39.62,28.73c-.07,0-.14,0-.2.02-.05,0-.18.05-.18.05,0,0-.03,0-.07.02-.9.21-1.92-.01-2.6-.69-.02-.03-.04-.06-.07-.09-.21-.44-.65-.75-1.17-.75s-.97.31-1.17.75h-.01s-.04.06-.07.09c-.52.52-1.23.77-1.94.77s-1.42-.26-1.94-.77c-.03-.03-.04-.06-.07-.09h-.01c-.2-.44-.64-.75-1.17-.75s-.96.31-1.17.75c-.03.03-.05.06-.07.09-.68.67-1.7.9-2.6.69-.04-.01-.07-.02-.07-.02,0,0-.13-.04-.18-.05-.06-.01-.13-.02-.2-.02-.56,0-1.02.45-1.02,1.02,0,.42.25.77.61.93.01,0,.16.06.23.07.42.13.84.18,1.3.18,1.19,0,2.31-.45,3.18-1.25.88.8,2,1.25,3.19,1.25s2.31-.45,3.19-1.25c.87.8,1.99,1.25,3.18,1.25.46,0,.88-.05,1.3-.18.07,0,.22-.07.23-.07.36-.16.61-.51.61-.93,0-.57-.46-1.02-1.02-1.02Z"/><circle class="cls-1" cx="32.05" cy="34.54" r="1.94"/><circle class="cls-1" cx="25.58" cy="34.54" r="1.94"/><circle class="cls-1" cx="38.53" cy="34.54" r="1.94"/><path class="cls-1" d="m39.62,37.76c-.07,0-.14,0-.2.02-.05,0-.18.05-.18.05,0,0-.03,0-.07.02-.9.21-1.92-.01-2.6-.69-.02-.03-.04-.06-.07-.09-.21-.44-.65-.75-1.17-.75s-.97.31-1.17.75h-.01s-.04.06-.07.09c-.52.52-1.23.77-1.94.77s-1.42-.26-1.94-.77c-.03-.03-.04-.06-.07-.09h-.01c-.2-.44-.64-.75-1.17-.75s-.96.31-1.17.75c-.03.03-.05.06-.07.09-.68.67-1.7.9-2.6.69-.04-.01-.07-.02-.07-.02,0,0-.13-.04-.18-.05-.06-.01-.13-.02-.2-.02-.56,0-1.02.45-1.02,1.02,0,.42.25.77.61.93.01,0,.16.06.23.07.42.13.84.18,1.3.18,1.19,0,2.31-.45,3.18-1.25.88.8,2,1.25,3.19,1.25s2.31-.45,3.19-1.25c.87.8,1.99,1.25,3.18,1.25.46,0,.88-.05,1.3-.18.07,0,.22-.07.23-.07.36-.16.61-.51.61-.93,0-.57-.46-1.02-1.02-1.02Z"/><path class="cls-1" d="m32.13,4.77c-1.93,0-3.81.21-5.63.61C23.75,2.09,19.62,0,15,0,6.72,0,0,6.72,0,15c0,4.89,2.35,9.23,5.98,11.97-.23,1.4-.35,2.84-.35,4.3,0,14.61,11.89,26.5,26.5,26.5s26.5-11.89,26.5-26.5S46.74,4.77,32.13,4.77ZM6.2,14.96c0-.83.67-1.5,1.5-1.5h5.8v-5.8c0-.83.67-1.5,1.5-1.5s1.5.67,1.5,1.5v5.8h5.8c.83,0,1.5.67,1.5,1.5s-.67,1.5-1.5,1.5h-5.8v5.8c0,.83-.67,1.5-1.5,1.5s-1.5-.67-1.5-1.5v-5.8h-5.8c-.83,0-1.5-.67-1.5-1.5Zm25.93,39.8c-12.96,0-23.5-10.54-23.5-23.5,0-.89.05-1.77.15-2.63,1.9.87,4,1.36,6.22,1.36,8.28,0,15-6.72,15-15,0-2.5-.62-4.85-1.7-6.92,1.25-.2,2.52-.32,3.83-.32,12.96,0,23.5,10.54,23.5,23.5s-10.54,23.5-23.5,23.5Z"/></svg>
                    <figcaption>Ajouter à une cellier</figcaption>
                </figure>
            </Link>
            <button @click="shareOnFacebook">
                Partage sur Facebook
            </button>
            
            <!-- Mettre btn de partage sur facebook -->           
        </aside>            
        
        <section class="notes-box">
            <header>
                <div>
                    <h2 class="typo-display-font">tasting notes</h2>
                    <small v-if="notes.length > 0">click on a note for more options</small>
                </div>
                <Link class="button--icon" :href="route('note.create', { wine: wine.id })">
                    <figure>
                        <svg width="42" height="42" viewBox="0 0 59 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M32.13 4.77C30.2 4.77 28.32 4.98 26.5 5.38C23.75 2.09 19.62 0 15 0C6.72 0 0 6.72 0 15C0 19.89 2.35 24.23 5.98 26.97C5.75 28.37 5.63 29.81 5.63 31.27C5.63 45.88 17.52 57.77 32.13 57.77C46.74 57.77 58.63 45.88 58.63 31.27C58.63 16.66 46.74 4.77 32.13 4.77ZM6.2 14.96C6.2 14.13 6.87 13.46 7.7 13.46H13.5V7.66C13.5 6.83 14.17 6.16 15 6.16C15.83 6.16 16.5 6.83 16.5 7.66V13.46H22.3C23.13 13.46 23.8 14.13 23.8 14.96C23.8 15.79 23.13 16.46 22.3 16.46H16.5V22.26C16.5 23.09 15.83 23.76 15 23.76C14.17 23.76 13.5 23.09 13.5 22.26V16.46H7.7C6.87 16.46 6.2 15.79 6.2 14.96ZM32.13 54.76C19.17 54.76 8.63 44.22 8.63 31.26C8.63 30.37 8.68 29.49 8.78 28.63C10.68 29.5 12.78 29.99 15 29.99C23.28 29.99 30 23.27 30 14.99C30 12.49 29.38 10.14 28.3 8.07C29.55 7.87 30.82 7.75 32.13 7.75C45.09 7.75 55.63 18.29 55.63 31.25C55.63 44.21 45.09 54.75 32.13 54.75V54.76Z" fill="#F95148"/>
                            <path d="M44.25 26.9109L44.25 43.3043C44.25 43.8211 44.0426 44.3163 43.6742 44.681C43.3059 45.0456 42.807 45.25 42.2872 45.25L22.7128 45.25C22.193 45.25 21.694 45.0456 21.3258 44.681C20.9574 44.3163 20.75 43.8211 20.75 43.3043L20.75 20.6957C20.75 20.1789 20.9574 19.6837 21.3258 19.319C21.6941 18.9544 22.193 18.75 22.7128 18.75L36.0095 18.75L44.25 26.9109ZM44.25 26.9109C44.2505 26.6548 44.1998 26.4012 44.1009 26.1648C44.002 25.9284 43.8569 25.7139 43.6742 25.5336C43.6741 25.5335 43.6741 25.5335 43.674 25.5334L37.3973 19.3192L44.25 26.9104L44.25 26.9109ZM27.8902 38.6675C27.7054 38.4846 27.6011 38.2359 27.6011 37.976C27.6011 37.7162 27.7054 37.4674 27.8902 37.2845C28.0749 37.1016 28.3249 36.9993 28.5851 36.9993L36.4149 36.9993C36.6751 36.9993 36.9251 37.1016 37.1098 37.2845C37.2946 37.4674 37.3989 37.7162 37.3989 37.976C37.3989 38.2359 37.2946 38.4846 37.1098 38.6675C36.9251 38.8504 36.6751 38.9527 36.4149 38.9527L28.5851 38.9527C28.3249 38.9527 28.0749 38.8504 27.8902 38.6675ZM28.4475 31.3494L36.2772 31.3494C36.5374 31.3494 36.7874 31.4517 36.9722 31.6346C37.157 31.8176 37.2613 32.0663 37.2613 32.3262C37.2613 32.586 37.157 32.8347 36.9722 33.0177C36.7874 33.2006 36.5374 33.3029 36.2772 33.3029L28.4475 33.3029C28.1873 33.3029 27.9373 33.2006 27.7525 33.0177C27.5677 32.8347 27.4634 32.586 27.4634 32.3262C27.4634 32.0663 27.5677 31.8176 27.7525 31.6346C27.9373 31.4517 28.1873 31.3494 28.4475 31.3494ZM32.5 27.4863L28.5851 27.4863C28.3249 27.4863 28.0749 27.384 27.8902 27.2011C27.7054 27.0181 27.6011 26.7694 27.6011 26.5095C27.6011 26.2497 27.7054 26.001 27.8902 25.818C28.0749 25.6351 28.3249 25.5328 28.5851 25.5328L32.5 25.5328C32.7602 25.5328 33.0102 25.6351 33.1949 25.818C33.3798 26.001 33.484 26.2497 33.484 26.5095C33.484 26.7694 33.3798 27.0181 33.1949 27.2011C33.0102 27.384 32.7602 27.4863 32.5 27.4863ZM35.4308 26.5095L35.4309 20.7035L22.7181 20.7035L22.7181 43.2965L42.2819 43.2965L42.2819 27.4863L36.4149 27.4863C36.1547 27.4863 35.9047 27.384 35.72 27.2011C35.5351 27.0181 35.4308 26.7694 35.4308 26.5095ZM37.3989 25.5328L40.8866 25.5328L37.3989 22.0799L37.3989 25.5328Z" fill="#F95148" stroke="#F95148" stroke-width="0.5"/>
                        </svg>
                    </figure>
                </Link>
            </header>
            <div v-if="notes.length == 0">
                you have no notes yet for this wine
            </div>
            <div v-else>
                <NoteThumbnail v-for="(note, i) in notes"
                    :note="note"
                    :date="setDate(note.updated_at)"
                    @click="setNoteModal(note)"
                />
            </div>
            <Teleport to="body">
                <Modal v-if="showModal"
                    :toggleOff="toggleModal"
                >
                    <NoteModal v-if="showNoteModal"
                        :note="selectedNote"
                        :date="setDate(selectedNote.updated_at)"
                        :closeModal="toggleModal"
                        :showNoteModal="showNoteModal"
                        :openConfirm="toggleConfirm"
                        :wine="wine"
                    />
                    <ConfirmModal v-if="showConfirmModal"
                        :toggleModal="toggleModal"
                        :YesAction="deleteNote"
                        :action="'delete note'"
                        :actionMessage="'are you sure you want to delete this note?'"
                    />
                </Modal>
            </Teleport>
        </section> 
        
        </main>

        <!-- ----- * NAV SECTION : BOUTONS * ----- -->
    </div>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import Modal from "@/Components/Modal.vue";
import NoteModal from "@/Components/NoteModal.vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import ColorDrop from "@/Components/ButtonsIcons/ColorDrop.vue";
import GoBackButton from "@/Components/ButtonsIcons/GoBackButton.vue";
import NoteThumbnail from "@/Components/NoteThumbnail.vue";
import ConfirmModal from "@/Components/ConfirmModal.vue";
import { Inertia } from "@inertiajs/inertia";
export default {
    name: "Wine.ShowView",
    components: {
    Head,
    Link,
    ColorDrop,
    GoBackButton,
    NoteThumbnail,
    NoteModal,
    Modal,
    ConfirmModal
},
    data() {
        return {
            showNoteModal: false,
            showConfirmModal: false,
            selectedNote: null,
            showModal: false,
            testUrl: "https://thomasira.com/",
            currentUrl: window.location.href,
        };
    },
    layout: MainLayout,
    methods: {
        shareOnFacebook() {
            FB.ui({
                method: "share",
                href: this.currentUrl,
            });
        },
        loadFacebookSDK() {
            window.fbAsyncInit = function () {
                FB.init({
                    appId: "1213281232966329",  // Remplacez par votre ID d'application Facebook
                    xfbml: true,
                    version: "v19.0",
                });
            };
            // Chargez de manière asynchrone le SDK Facebook
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/fr_CA/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        },
        toggleModal () {
            this.showModal = !this.showModal
        },
        toggleConfirm () {
            this.showConfirmModal = true
            this.showNoteModal = false
        },
        setDate (date) {
            //setting pour date en francais
            let dateLang = 'fr-ca'
            //setting pour date en anglais(si locale est)
            if(this.$page.props.locale == 'en') dateLang = 'en-ca'
            //nouvel objet date construit avec la date passé en param
            const formatDate = new Date(date)
            //retourne un formatage 26 janvier 2023 / january 26, 2023
            return formatDate.toLocaleString(dateLang, { day:'numeric', month: 'long', year:'numeric' })
        },
        setNoteModal (note) {
            this.showNoteModal = true
            this.showConfirmModal = false
            this.selectedNote = note
            this.toggleModal()
        },
        deleteNote () {
            Inertia.delete(route('note.delete', {note: this.selectedNote}), {
                onSuccess: () => {
                    this.showModal = false
                    this.$parent.openDialog(
                        'vous avez supprimé la note'
                    );
                }
            })
        }
    },
    mounted() {
        this.loadFacebookSDK();
    },
    props: {
        wine: Object, 
        exists: Boolean,
        prevPage: String,
        notes: Array
    }
}
</script>
