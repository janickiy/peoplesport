import ClassicEditor from '@ckeditor/ckeditor5-build-classic'
import '@ckeditor/ckeditor5-build-classic/build/translations/ru'

const editors = document.querySelectorAll('.form-item__control--editor')

editors.forEach(async editor => {
    const classicEditor = await ClassicEditor.create(editor, {
        language: 'ru',
        removePlugins: ['Heading'], // , 'EasyImage', 'ImageUpload', 'Table'
        ckfinder: {
            uploadUrl: '/api/media/upload'
        }
    })

    classicEditor.editing.view.change( writer => {
        writer.setStyle('height', '12rem', classicEditor.editing.view.document.getRoot())
    })
})
