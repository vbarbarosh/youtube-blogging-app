<template>
    <div class="form-check">
        <input v-on:input="input" v-bind:value="value" v-bind:id="id" class="form-check-input" type="checkbox">
        <label v-bind:for="id" class="form-check-label">
            {{ label }}
        </label>
    </div>
</template>

<script>
    const input_checkbox = {
        props: ['value', 'label'],
        data: function () {
            return {
                id: this.uid(),
            };
        },
        methods: {
            input: function (event) {
                this.emit_input(event.currentTarget.checked);
            },
        },
    };

    export default input_checkbox;
</script>
