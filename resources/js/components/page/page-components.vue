<template>
    <div class="mg15">
        <h2>sandbox</h2>
        <h3>buttons</h3>
        <div class="mi15">
            <button-danger v-on:click="click_danger" />
            <button-dark v-on:click="click_dark" />
            <button-info v-on:click="click_info" />
            <button-light v-on:click="click_light" />
            <button-link v-on:click="click_link" />
            <button-primary v-on:click="click_primary" />
            <button-secondary v-on:click="click_secondary" />
            <button-success v-on:click="click_success" />
            <button-warning v-on:click="click_warning" />
        </div>
        <div class="mi15">
            <button-outline-danger v-on:click="click_outline_danger" />
            <button-outline-dark v-on:click="click_outline_dark" />
            <button-outline-info v-on:click="click_outline_info" />
            <button-outline-light v-on:click="click_outline_light" />
            <button-outline-link v-on:click="click_outline_link" />
            <button-outline-primary v-on:click="click_outline_primary" />
            <button-outline-secondary v-on:click="click_outline_secondary" />
            <button-outline-success v-on:click="click_outline_success" />
            <button-outline-warning v-on:click="click_outline_warning" />
        </div>
        <div class="mi15">
            <badge-danger />
            <badge-dark />
            <badge-info />
            <badge-light />
            <badge-primary />
            <badge-secondary />
            <badge-success />
            <badge-warning />
        </div>
    </div>
</template>

<script>
    const sandbox = {
        methods: {
            click_danger: function () {
                console.log('click_danger');
            },
            click_dark: function () {
                console.log('click_dark');
            },
            click_info: function () {
                console.log('click_info');
            },
            click_light: function () {
                console.log('click_light');
            },
            click_link: function () {
                console.log('click_link');
            },
            click_primary: function () {
                console.log('click_primary');
            },
            click_secondary: function () {
                console.log('click_secondary');
            },
            click_success: function () {
                console.log('click_success');
            },
            click_warning: function () {
                console.log('click_warning');
            },
            click_outline_danger: function () {
                console.log('click_outline_danger');
            },
            click_outline_dark: function () {
                console.log('click_outline_dark');
            },
            click_outline_info: function () {
                console.log('click_outline_info');
            },
            click_outline_light: function () {
                console.log('click_outline_light');
            },
            click_outline_link: function () {
                console.log('click_outline_link');
            },
            click_outline_primary: function () {
                console.log('click_outline_primary');
            },
            click_outline_secondary: function () {
                console.log('click_outline_secondary');
            },
            click_outline_success: function () {
                console.log('click_outline_success');
            },
            click_outline_warning: function () {
                console.log('click_outline_warning');
            },
        }
    };

    export default sandbox;
</script>
