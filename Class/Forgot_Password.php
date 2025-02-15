ws.Automation.AutomationElement" /> to compare.</param>
      <param name="right">The second <see cref="T:System.Windows.Automation.AutomationElement" /> to compare.</param>
      <returns>
        <see langword="true" /> if the two objects refer to different UI elements; otherwise <see langword="false" />.</returns>
    </member>
    <member name="M:System.Windows.Automation.AutomationElement.SetFocus">
      <summary>Sets focus on the <see cref="T:System.Windows.Automation.AutomationElement" />.</summary>
      <exception cref="T:System.Windows.Automation.ElementNotAvailableException">The UI for the <see cref="T:System.Windows.Automation.AutomationElement" /> no longer exists.</exception>
    </member>
    <member name="M:System.Windows.Automation.AutomationElement.TryGetCachedPattern(System.Windows.Automation.AutomationPattern,System.Object@)">
      <summary>Retrieves a control pattern from the cache.</summary>
      <param name="pattern">The identifier of the control pattern to retrieve.</param>
      <param name="patternObject">On return, contains the pattern if it is in the cache; otherwise <see langword="null" />.</param>
      <returns>
        <see langword="true" /> if the pattern is in the cache; <see langword="false" /> if it is not in the cache or not supported.</returns>
    </member>
    <member name="M:System.Windows.Automation.AutomationElement.TryGetClickablePoint(System.Windows.Point@)">
      <summary>Retrieves a point within the element that can be clicked.</summary>
      <param name="pt">When this method returns, contains the physical screen coordinates of a clickable point.</param>
      <returns>
        <see langword="true" /> if there is a point that is clickable; otherwise <see langword="false" />.</returns>
    </member>
    <member name="M:System.Windows.Automation.AutomationElement.TryGetCurrentPattern(System.Windows.Automation.AutomationPatt