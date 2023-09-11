<script setup>
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import Modal from '@/Components/Modal.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { useForm, usePage } from '@inertiajs/inertia-vue3';
import { nextTick, ref } from 'vue';
import { ModalsContainer, useModal } from 'vue-final-modal'
import DeleteModalConfirm from '@/Components/DeleteModalConfirm.vue'
import { Inertia } from "@inertiajs/inertia";

const user = usePage().props.value.user;
const confirmingUserDeletion = ref(false);
const passwordInput = ref(null);

const { open, close } = useModal({
  component: DeleteModalConfirm,
  attrs: {
    title: user.name,
    id: user.id,
    onConfirm(id) {
      Inertia.get(`/admin/users/${id}/delete`)
    },
    onClose() {
      close()
    }
  },
  slots: {
    default: '<p>UseModal: The content of the modal</p>',
  },
})

const handleDelete = (id) => {
    open()
}

const form = useForm({
    password: '',
});

const confirmUserDeletion = () => {
    confirmingUserDeletion.value = true;

    nextTick(() => passwordInput.value.focus());
};

const deleteUser = () => {
    form.delete(route('admin.users.delete', {id: user.id}), {
        preserveScroll: true,
        onSuccess: () => closeModal(),
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};

const closeModal = () => {
    confirmingUserDeletion.value = false;

    form.reset();
};
</script>

<template>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">Удалить аккаунт</h2>

            <p class="mt-1 text-sm text-gray-600">
                После того как Вы удалите аккаунт возврата к данным уже не будет.
            </p>
        </header>

        <DangerButton @click="handleDelete(user.id)">Удалить аккаунт</DangerButton>

        <ModalsContainer />
    </section>
</template>
