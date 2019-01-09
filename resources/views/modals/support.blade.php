<support-ticket inline-template>
    <modal name="support-ticket" height="auto" width="60%">
        <div class="container p-5">
            <div class="level">
                <h3>Contact Support</h3>
                <a @click="$modal.hide('support-ticket')" class="level-left is-medium">
                    <i class="fas fa-times"></i>
                </a>
            </div>

            <form class="mt-4" @submit.prevent="sendTicket()" autocomplete="off" @keydown="submitted = false">
                <div class="field">
                    <input type="text" class="input is-medium" placeholder="What's your name?" name="name" id="name"
                           v-model="form.name" @keydown="delete errors.name">
                    <div v-if="errors.name" v-text="errors.name[0]" class="text-sm text-danger"></div>
                </div>
                <div class="field mt-4">
                    <input class="input is-medium" type="email" name="from" id="from"
                           placeholder="Which email address should we respond to?"
                           v-model="form.from" @keydown="delete errors.from"
                    >
                    <div v-if="errors.from" v-text="errors.from[0]" class="text-sm text-danger"></div>
                </div>
                <div class="field mt-4">
                    <textarea class="textarea is-medium" name="body" id="body" placeholder="What's your question?"
                              v-model="form.body" @keydown="delete errors.body"
                    ></textarea>
                    <div v-if="errors.body" v-text="errors.body[0]" class="text-sm text-danger"></div>
                </div>
                <div class="mt-4 is-flex justify-content-center">

                    <a class="button is-danger flex-fill mr-5 has-text-white" @click="cancel">Cancel</a>

                    <button class="button is-primary flex-fill ml-5"
                            type="submit"
                            :disabled="submitted"
                    >
                        Send Ticket
                    </button>
                </div>
            </form>
        </div>
    </modal>
</support-ticket>

