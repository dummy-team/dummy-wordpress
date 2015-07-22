# jQuery header function
jQuery.fn.header = (height) ->
  $this   = jQuery(this)
  $window = jQuery(window)
  $height = height

  # Init
  init = ->
    setHeight()
    return

  # @param height [Integer]
  # Example : setHeight(85) will set header's height to 85% of window
  setHeight = ->
    if($height == 100)
      return
    $this.height( (($height * $window.height()) / 100) + 'px' )
    return

  # Adjust height on window resize
  $window.resize( ->
    setHeight()
    return
  )

  # Add class to fix header on scroll
  $window.scroll( ->
    if( window.pageYOffset > 43 )
      $this.addClass('fixed')
    else
      $this.removeClass('fixed')
  )

  init()
  return $this
