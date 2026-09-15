document.addEventListener('DOMContentLoaded', () => {
    let currentStep = 1
    const totalSteps = 3
    const steps = document.querySelectorAll('.class-reclamaciones-step-item')
    const formSteps = document.querySelectorAll('.class-reclamaciones-step-content-form')
    const nextButton = document.getElementById('class-reclamaciones-next')
    const backButton = document.getElementById('class-reclamaciones-back')
    const progress = document.getElementById('class-reclamaciones-progress')
    const success = document.getElementById('class-reclamaciones-success')
    const actions = document.getElementById('class-reclamaciones-actions')

    if (!steps.length || !formSteps.length || !nextButton || !backButton || !progress || !success || !actions) {
        return
    }

    function updateUI() {
        steps.forEach((step, index) => {
            const stepNumber = index + 1
            const circle = step.querySelector('.class-reclamaciones-step-circle')
            const label = step.querySelector('.class-reclamaciones-step-label')
            const lines = step.querySelectorAll('.class-reclamaciones-step-line')

            circle.classList.remove(
                'class-reclamaciones-step-circle-active',
                'class-reclamaciones-step-circle-completed'
            )

            label.classList.remove('class-reclamaciones-step-label-active')

            lines.forEach(line => {
                line.classList.remove('class-reclamaciones-step-line-active')
            })

            if (stepNumber === currentStep) {
                circle.classList.add('class-reclamaciones-step-circle-active')
                label.classList.add('class-reclamaciones-step-label-active')

                lines.forEach(line => {
                    line.classList.add('class-reclamaciones-step-line-active')
                })

                circle.innerHTML = stepNumber
            }

            if (stepNumber < currentStep) {
                circle.classList.add('class-reclamaciones-step-circle-completed')
                circle.innerHTML = '✓'

                lines.forEach(line => {
                    line.classList.add('class-reclamaciones-step-line-active')
                })
            }

            if (stepNumber > currentStep) {
                circle.innerHTML = stepNumber
            }
        })

        formSteps.forEach(step => {
            if (Number(step.dataset.step) === currentStep) {
                step.style.display = 'block'
            } else {
                step.style.display = 'none'
            }
        })

        if (currentStep === 1) {
            backButton.style.visibility = 'hidden'
        } else {
            backButton.style.visibility = 'visible'
        }

        if (currentStep === 3) {
            nextButton.classList.add('class-reclamaciones-next-submit')
            nextButton.innerHTML = `
                <span class="class-reclamaciones-next-submit-text">
                    ENVIAR
                </span>
            `
        } else {
            nextButton.classList.remove('class-reclamaciones-next-submit')
            nextButton.innerHTML = `
                <span class="class-reclamaciones-next-text">
                    Siguiente
                </span>

                <div class="class-reclamaciones-next-circle">
                    <span class="class-reclamaciones-next-icon">
                        &#10095;
                    </span>
                </div>
            `
        }
    }

    nextButton.addEventListener('click', () => {
        if (currentStep < totalSteps) {
            currentStep++
            updateUI()
        } else {
            progress.style.display = 'none'
            formSteps.forEach(step => {
                step.style.display = 'none'
            })
            actions.style.display = 'none'
            success.style.display = 'flex'
        }
    })

    backButton.addEventListener('click', () => {
        if (currentStep > 1) {
            currentStep--
            updateUI()
        }
    })

    updateUI()
})
