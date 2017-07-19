<template>
    <div class="columns">
        <div class="column">
            <div class="field">
                <label for="start_at" class="label">Start at</label>
                <p class="control">
                    <vue-datetime-picker class="vue-start-picker" name="start-picker"
                     v-ref:start-picker
                     :model.sync="startDatetime"
                     :on-change="onStartDatetimeChanged">
                    </vue-datetime-picker>
                </p>
            </div>
        </div>
        <div class="column">
            <div class="field">
                <label for="start_at" class="label">End at</label>
                <p class="control">
                    <vue-datetime-picker class="vue-end-picker" name="end-picker"
                                         v-ref:end-picker
                                         :model.sync="endDatetime"
                                         :on-change="onEndDatetimeChanged">
                    </vue-datetime-picker>
                </p>
            </div>
        </div>
    </div>
</template>

<script>

import VueDatetimePicker from 'vue-datetime-picker'

export default {

    data() {
        return {
            startDatetime: moment(),
            endDatetime: null
        }
    },
    components: {
        VueDatetimePicker
    },
    methods: {
        onStartDatetimeChanged: function(newStart) {
          var endPicker = this.$.endPicker.control;
          endPicker.minDate(newStart);
        },
        onEndDatetimeChanged: function(newEnd) {
          var startPicker = this.$.startPicker.control;
          startPicker.maxDate(newEnd);
        }
    }
}
</script>
