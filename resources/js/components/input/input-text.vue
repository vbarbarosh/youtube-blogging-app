<template>
    <div class="form-floating">
        <input v-on:input="input" v-bind:value="value" v-bind:id="id" placeholder="placeholder" type="text" class="form-control">
        <label v-bind:for="id">
            {{ label }}
        </label>
    </div>
</template>

<script>
    const input_text = {
        props: ['value', 'label', 'placeholder'],
        data: function () {
            return {
                id: this.uid(),
            };
        },
        methods: {
            input: function (event) {
                this.emit_input(event.currentTarget.value);
            },
        },
    };

    export default input_text;
</script>
