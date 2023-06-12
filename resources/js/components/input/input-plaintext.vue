<template>
    <div class="form-floating">
        <input v-bind:value="value" v-bind:id="id" placeholder="placeholder" type="text" class="form-control-plaintext">
        <label v-bind:for="id">
            {{ label }}
        </label>
    </div>
</template>

<script>
    const input_plaintext = {
        props: ['value', 'label', 'placeholder'],
        data: function () {
            return {
                id: this.uid(),
            };
        },
    };

    export default input_plaintext;
</script>
