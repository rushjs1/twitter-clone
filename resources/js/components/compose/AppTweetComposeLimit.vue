<template>
    <div class="h-10 w-10 relative">
        <svg class="transform -rotate-90" viewBox="0 0 120 120">
            <circle
                cx="60"
                cy="60"
                fill="none"
                stroke-width="8"
                radius="100"
                :r="radius"
                class="stroke-current text-gray-700"
            />
            <circle
                cx="60"
                cy="60"
                fill="none"
                stroke-width="8"
                radius="100"
                :r="radius"
                class="stroke-current"
                :stroke-dasharray="dash"
                :stroke-dashoffset="offset"
                :class="{
                    'text-red-500': percentageIsOver,
                    'text-blue-700': !percentageIsOver,
                }"
            />
        </svg>
    </div>
</template>

<script>
export default {
    name: "AppTweetComposeLimit",
    props: {
        body: {
            required: true,
            type: String,
        },
    },
    data() {
        return {
            radius: 30,
        };
    },
    watch: {
        percentageIsOver() {
            this.$emit("input", this.percentageIsOver);
        },
    },
    computed: {
        dash() {
            return 2 * Math.PI * this.radius;
        },
        offset() {
            let circ = this.dash;
            let progres = this.displayPercentage / 100;
            return circ * (1 - progres);
        },
        percentage() {
            return Math.round((this.body.length * 100) / 280);
        },
        displayPercentage() {
            return this.percentage <= 100 ? this.percentage : 100;
        },
        percentageIsOver() {
            // this.$emit("input", this.percentageIsOver);
            return this.percentage > 100;
        },
    },
};
</script>
