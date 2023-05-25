<template> 
    <div v-if="editor" class="flex gap-9 py-3">
        <div @click="editor.chain().focus().toggleBold().run()" :disabled="!editor.can().chain().focus().toggleBold().run()" :class="{ 'is-active': editor.isActive('bold') }" class="py-1 px-2  text-white bg-blue-700 rounded focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800 ">
          жирный
        </div>
        <div @click="editor.chain().focus().toggleHeading({ level: 3 }).updateAttributes('heading', { color: 'pink'}).run()" :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }" class="py-1 px-2 text-white bg-blue-700 rounded focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
          подзаголовок
        </div>
        <div @click="editor.chain().focus().toggleBulletList().run()" :class="{ 'is-active': editor.isActive('bulletList') }" class="py-1 px-2  text-white bg-blue-700 rounded focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
          список
        </div>
    </div>

    <editor-content :editor="editor"
    name="body" 
    class="form-control
                    
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
                  placeholder="Здесь Ваше интересное описание"
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
  min-height: 300px;
  padding: 10px;  
  
  > * + * {
   // margin-top: 0.75em;
    
  }

  ul,
  ol {
    padding: 0 1rem;
    list-style-type: square;
  }

  h3{
    line-height: 2;
    font-size: 2rem;
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