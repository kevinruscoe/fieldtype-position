<template>

    <div class="position-fieldtype-selector">
        <a
            v-on:click.prevent="toggleSelectorModal()"
            href="#open-position-fieldtype-modal"
            v-bind:class="selectorModalButtonClass"
            class="position-fieldtype-selector__button btn">
            Set Position
        </a>

        <div
            v-show="selectorModalOpen"
            class="position-fieldtype-selector__modal">
            <div class="position-fieldtype-selector__modal__selector">
                <div class="position-fieldtype-selector__modal__selector__compass">
                    <a
                        v-for="(position, index) in positions"
                        v-bind:key="index"
                        v-bind:class="{ active: (position == value) }"
                        class="position-fieldtype-selector__modal__selector__compass__button btn"
                        v-on:click.prevent="updatePosition(position)"
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
            toggleSelectorModal(){
                this.selectorModalOpen = ! this.selectorModalOpen;
            },
            updatePosition(position) {
                this.update(position);

                this.selectorModalOpen = false;
            }
        },
        computed: {
            selectorModalButtonClass() {
                return `position-fieldtype-selector__button--${this.value}`;
            }
        },
        data() {
            return {
                selectorModalOpen: false,
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
