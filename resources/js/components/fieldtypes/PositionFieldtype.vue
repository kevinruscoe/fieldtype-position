<template>

    <div class="position-fieldtype">
        <button
            v-on:click.prevent="toggleModalVisibility()"
            v-bind:class="toggleModalClass"
            type="button">
            <span class="position-fieldtype__toggle-modal__icon">
                <span v-if="value" v-bind:class="`img-arrow--${value}`" class="img-arrow"></span>
                <span v-else>?</span>
            </span>
            {{ value ? value : 'Set Position' }}
        </button>

        <div v-bind:class="modalClass">
            <div class="position-fieldtype__compass">
                <button
                    v-for="(position, index) in positions"
                    v-on:click.prevent="updatePosition(position)"
                    v-bind:key=index
                    v-bind:class="{ active: (value == position) }"
                    class="position-fieldtype__compass__button btn"
                    type="button">
                    <span class="hidden">{{ position }}</span>
                    <span v-bind:class="`img-arrow--${position}`" class="img-arrow"></span>
                </button>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        mixins: [Fieldtype],
        methods: {
            toggleModalVisibility(){
                this.modalIsOpen = ! this.modalIsOpen;
            },
            updatePosition(position) {
                this.update(position);

                this.modalIsOpen = false;
            }
        },
        computed: {
            toggleModalClass() {
                let cssClasses = [
                    'position-fieldtype__toggle-modal',
                    'btn'
                ];

                if (this.modalIsOpen) {
                    cssClasses.push('position-fieldtype__toggle-modal--inactive');
                }

                return cssClasses;
            },
            modalClass() {
                let cssClasses = [
                    'position-fieldtype__modal',
                ];

                if (this.modalIsOpen) {
                    cssClasses.push('position-fieldtype__modal--active');
                }

                return cssClasses;
            }
        },
        data() {
            return {
                modalIsOpen: false,
                positions: [
                    'top-left',
                    'top',
                    'top-right',
                    'left',
                    'center',
                    'right',
                    'bottom-left',
                    'bottom',
                    'bottom-right',
                ]
            }
        }
    }
</script>
