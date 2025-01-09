<template>
    <Teleport to="body">
        <div v-if="isVisible" class="modal-overlay" @click.self="close">
            <div class="modal">
                <header class="modal-header justify-center">
                    <h3>{{ title }}</h3>
                    <button @click="close" class="modal-close">&times;</button>
                </header>
                <section class="modal-body">
                    <slot></slot>
                </section>
                <footer class="modal-footer">
                    <slot name="footer"></slot>
                </footer>
            </div>
        </div>
    </Teleport>
</template>

<script setup>
import { computed, defineProps, defineEmits } from 'vue';

const props = defineProps({
    modal: {
        type: Boolean,
        required: true
    },
    title: {
        type: String,
        default: 'Modal Title'
    }
});

const emit = defineEmits(['close']);

// const isVisible = computed(() => props.modal.isVisible);
const isVisible = computed(() => props.modal);

const close = () => {
    emit('close');
};

</script>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.4);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}
.modal {
  background: white;
  border-radius: 8px;
  width: 90%;
  max-width: 500px;
  padding: 1rem;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}
.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
}
.modal-close {
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
}
.modal-body {
  margin-bottom: 1rem;
}
.modal-footer {
  text-align: right;
}
</style>