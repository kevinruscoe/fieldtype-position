<template>

    <div class="position-fieldtype-selector">
        <a
            v-on:click.prevent="toggleModalVisibility()"
            v-bind:class="modalToggleButtonClass"
            href="#open-modal">
            Set Position
        </a>

        <div
            v-show="modalIsOpen"
            class="position-fieldtype-selector__modal">
            <div class="position-fieldtype-selector__modal__content">

                <div class="position-fieldtype-selector__compass">
                    <a
                        v-for="(position, index) in positions"
                        v-on:click.prevent="updatePosition(position)"
                        v-bind:key="index"
                        v-bind:class="compassButtonClass(position)"
                        href="#select-position">{{ position }}</a>
                </div>

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
            compassButtonClass(position) {
                let cssClasses = [
                    'btn',
                    'position-fieldtype-selector__compass__button',
                    `position-fieldtype-selector__compass__button--${position}`
                ];

                if (position == this.value) {
                    cssClasses.push('active');
                }

                return cssClasses;
            },
            updatePosition(position) {
                this.update(position);

                this.modalIsOpen = false;
            }
        },
        computed: {
            modalToggleButtonClass() {
                return [
                    'btn',
                    'position-fieldtype-selector__toggle-button',
                    `position-fieldtype-selector__button--${this.value}`
                ];
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
