@auth
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>

    <script>
        const editableFields = document.querySelectorAll('[data-editable]');

        editableFields.forEach((field) => {
            const button = field.querySelector('button');
            button.addEventListener('click', () => {
                const text = field.querySelector('.text-span').innerHTML;
                const id = field.dataset.id;

                axios.patch('{{ config('text-widget.route-path') }}', {id: id, text: text}).then((response) => {
                    button.innerText = '{{ __('cms::text-widget.Text was updated') }}';
                    button.classList.remove('bg-blue-500');
                    button.classList.remove('hover:bg-blue-700');
                    button.classList.add('bg-green-500');
                    button.classList.add('hover:bg-green-700');

                    setTimeout(() => {
                        button.innerText = '{{ __('cms::text-widget.Update text') }}';
                        button.classList.add('bg-blue-500');
                        button.classList.add('hover:bg-blue-700');
                        button.classList.remove('bg-green-500');
                        button.classList.remove('hover:bg-green-700');
                    }, 3000)

                }).catch((error) => {
                    console.log(error.response);
                    alert('{{ __('cms::text-widget.Something went wrong, please try again.') }}')
                });

            });
        });
    </script>
@endauth
