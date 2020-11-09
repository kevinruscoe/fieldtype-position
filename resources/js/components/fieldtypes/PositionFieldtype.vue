<template>

    <div class="position-fieldtype">
        <button
            v-on:click.prevent="toggleModalVisibility()"
            v-bind:class="toggleModalClass"
            type="button">
            <span class="position-fieldtype__toggle-modal__icon">
                <component v-bind:is=value />
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
                    <component v-bind:is=position />
                </button>
            </div>

        </div>
    </div>

</template>
<script>

    import IconTopLeft from "./../icons/IconTopLeft";
    import IconTop from "./../icons/IconTop";
    import IconTopRight from "./../icons/IconTopRight";
    import IconLeft from "./../icons/IconLeft";
    import IconCenter from "./../icons/IconCenter";
    import IconRight from "./../icons/IconRight";
    import IconBottomLeft from "./../icons/IconBottomLeft";
    import IconBottom from "./../icons/IconBottom";
    import IconBottomRight from "./../icons/IconBottomRight";

    export default {
        components: {
            'top-left': IconTopLeft,
            'top': IconTop,
            'top-right': IconTopRight,
            'left': IconLeft,
            'center': IconCenter,
            'right': IconRight,
            'bottom-left': IconBottomLeft,
            'bottom': IconBottom,
            'bottom-right': IconBottomRight,
        },
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
