export default {
  init() {
    // JavaScript to be fired on the dispositions page
    const filters = [].slice.call(document.querySelectorAll('.js-state-filter'))
    const dispositions = [].slice.call(document.querySelectorAll('.data tr'))
    const table = document.getElementById('dispositions')
    const filterState = document.querySelector('.js-filter-state')

    if (window.matchMedia('(max-width: 1023px)').matches) {
      filterState.addEventListener('change', (e) => {
        if (e.target.value == 'all') {
          // Show all dispositions
          dispositions.forEach(disposition => {
            disposition.style.display = 'table-row'
          })

          // Scroll table into view
          table.scrollIntoView({ behavior: 'smooth', block: 'start' })
        } else {
          // Filter dispositions to current state filter
          const filteredDispositions = dispositions.filter(disposition => disposition.dataset.state === e.target.value)

          // Hide all dispositions
          dispositions.forEach(disposition => {
            disposition.style.display = 'none'
          })

          // Show all matched dispositions
          filteredDispositions.forEach(filteredDisposition => {
            filteredDisposition.style.display = 'table-row'
          })

          // Scroll table into view
          table.scrollIntoView({ behavior: 'smooth', block: 'start' })
        }
      })
    }

    let currentFilter, prevFilter

    // Loop through all state filters and listen for a click event
    filters.forEach(filter => {
      filter.addEventListener('click', (e) => {
        e.preventDefault()

        currentFilter = e.currentTarget
        currentFilter.classList.add('is-active')

        // Determine if previous filter is equal to current filter
        if (prevFilter !== undefined) {
          if (prevFilter.dataset.state !== currentFilter.dataset.state) {
            prevFilter.classList.remove('is-active')
          } else {
            currentFilter.classList.remove('is-active')

            dispositions.forEach(disposition => {
              disposition.style.display = 'table-row'
            })

            table.scrollIntoView({ behavior: 'smooth', block: 'start' })

            return
          }
        }

        // Filter dispositions to current state filter
        const filteredDispositions = dispositions.filter(disposition => disposition.dataset.state === currentFilter.dataset.state)

        // Hide all dispositions
        dispositions.forEach(disposition => {
          disposition.style.display = 'none'
        })

        // Show all matched dispositions
        filteredDispositions.forEach(filteredDisposition => {
          filteredDisposition.style.display = 'table-row'
        })

        // Scroll table into view
        table.scrollIntoView({ behavior: 'smooth', block: 'start' })

        // Set the previous filter
        prevFilter = currentFilter
      })
    })
  },
  finalize() {
    // JavaScript to be fired on the dispositions page, after the init JS
  },
};
