<template>
    <div class="form-floating">
        <textarea ref="textarea" v-on:input="input" v-bind:value="value" v-bind:id="id" v-bind:placeholder="placeholder" class="input-textarea-minheight form-control" />
        <label v-bind:for="id">
            {{ label }}
        </label>
    </div>
</template>

<script>
    import autosize from 'autosize/dist/autosize';

    const input_textarea = {
        props: ['value', 'label', 'placeholder'],
        data: function () {
            return {
                id: this.uid(),
            };
        },
        watch: {
            value: function () {
                this.$nextTick(function () {
                    autosize.update(this.$refs.textarea);
                });
            },
        },
        methods: {
            input: function (event) {
                this.emit_input(event.currentTarget.value);
            },
        },
        mounted: function () {
            autosize(this.$refs.textarea);
        },
    };

    export default input_textarea;
</script>

<style lang="sass">
    .input-textarea-minheight
        min-height: 100px !important
</style>
