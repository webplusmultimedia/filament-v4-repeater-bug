# Filament v4 Repeater Bug Report

[![bug](https://img.shields.io/badge/bug-yes-red.svg)]()

## Bug Description

There is an issue with the Filament v4 repeater component when used in combination with the markdown editor. The content in the markdown editor is not properly
rendered when the repeater items are initially collapsed.

## Steps to Reproduce

1. Create a form with a repeater component
2. Add a markdown editor inside the repeater items
3. Set the repeater to be collapsible and collapsed by default
4. Add content to the markdown editor
5. Save and reload the form
6. Observe that the markdown content is not visible until clicking into the editor

## Video Demonstration

The following video shows the bug in action:

https://github.com/user-attachments/assets/688b220c-e02c-4d33-b60e-b497c5fca5a3

## Technical Details

- Environment: Filament v4
- Components: Repeater, Markdown Editor
- Issue: reordering the items & Content visibility in collapsed repeater items
- Expected behavior:
    - On reordering : item move to another level
    - Content should be visible immediately after expanding repeater items
- Current behavior:
    - On reordering : when item drop onto the markdown editor, just drop into the editor
    - Content only appears after clicking into the markdown editor
