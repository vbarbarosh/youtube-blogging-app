<template>
    <div class="form-floating">
        <input v-on:input="input" v-bind:value="value" v-bind:id="id" v-bind:readonly="readonly" placeholder="placeholder" type="password" class="form-control">
        <label v-bind:for="id">
            {{ label || 'Password' }}
        </label>
    </div>
</template>

<script>
    const input_password = {
        props: ['value', 'label', 'placeholder', 'readonly'],
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

    export default input_password;
</script>
