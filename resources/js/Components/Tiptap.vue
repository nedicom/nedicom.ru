<template> 
    <div v-if="editor">
        <div @click="editor.chain().focus().toggleBold().run()" :disabled="!editor.can().chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }">
        bold
        </div>
        <div @click="editor.chain().focus().toggleHeading({ level: 3 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }">
        h3
        </div>
        <div @click="editor.chain().focus().toggleHeading({ level: 4 })" :class="{ 'is-active': editor.isActive('heading', { level: 4 }) }">
        h4
        </div>
        <div @click="editor.chain().focus().toggleHeading({ level: 5 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 5 }) }">
        h5
        </div>
        <div @click="editor.chain().focus().toggleHeading({ level: 6 }).run()" :class="{ 'is-active': editor.isActive('heading', { level: 6 }) }">
        h6
        </div>
    </div>

    <editor-content :editor="editor" 
    class="
                    form-control
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700
                    focus:bg-white
                    focus:border-blue-600
                    focus:outline-none
                    
                  "
                  name="body"
                  id=""
                  rows="8"
                  />
</template>
  
  <script>
  

  import StarterKit from '@tiptap/starter-kit'
  import { Editor, EditorContent } from '@tiptap/vue-3'
  
  export default {
    components: {
      EditorContent,
    },
  
    props: {
      modelValue: {
        type: String,
        default: '',
      },
    },
  
    emits: ['update:modelValue'],
  
    data() {
      return {
        editor: null,
      }
    },
  
    watch: {
      modelValue(value) {
        // HTML
        const isSame = this.editor.getHTML() === value
  
        // JSON
        // const isSame = JSON.stringify(this.editor.getJSON()) === JSON.stringify(value)
  
        if (isSame) {
          return
        }
  
        this.editor.commands.setContent(value, false)
      },
    },
  
    mounted() {
      this.editor = new Editor({
        extensions: [
          StarterKit,
        ],
        content: this.modelValue,
        onUpdate: () => {
          // HTML
          this.$emit('update:modelValue', this.editor.getHTML())
  
          // JSON
          // this.$emit('update:modelValue', this.editor.getJSON())
        },
      })
    },
  
    beforeUnmount() {
      this.editor.destroy()
    },
  }
  </script>

<style lang="scss">
/* Basic editor styles */

.ProseMirror {
  > * + * {
    margin-top: 0.75em;
  }

  ul,
  ol {
    padding: 0 1rem;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    line-height: 1.1;
  }

  code {
    background-color: rgba(#616161, 0.1);
    color: #616161;
  }

  pre {
    background: #0D0D0D;
    color: #FFF;
    font-family: 'JetBrainsMono', monospace;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;

    code {
      color: inherit;
      padding: 0;
      background: none;
      font-size: 0.8rem;
    }
  }

  img {
    max-width: 100%;
    height: auto;
  }

  blockquote {
    padding-left: 1rem;
    border-left: 2px solid rgba(#0D0D0D, 0.1);
  }

  hr {
    border: none;
    border-top: 2px solid rgba(#0D0D0D, 0.1);
    margin: 2rem 0;
  }
}
</style>